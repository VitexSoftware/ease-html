<?php

/**
 * Simple html page class.
 *
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * @copyright  2009-2020 Vitex@hippy.cz (G)
 */

namespace Ease;

/**
 * An object designed to "hold" content - not visible itself
 *
 *  
 */
class Document extends Container
{

	/**
	 * Saves obejct instace (singleton...).
	 */
	private static $instance = null;

	/**
	 * A link to the base object of the page.
	 *
	 * @var WebPage
	 */
	public static $webPage = null;

	/**
	 * Which objects to take over from the accepting object.
	 *
	 * @var array
	 */
	public $raiseItems = ['SetUpUser' => 'User', 'webPage', 'OutputFormat'];

	/**
	 * A link to the last element added.
	 *
	 * @var object
	 */
	public $lastItem = null;

	/**
	 * Is page closed for adding new contents?
	 *
	 * @var bool
	 */
	public static $pageClosed = false;

	/**
	 * Array of links to all embedded objects.
	 *
	 * @var array pole odkazů
	 */
	public static $allItems = [];

	/**
	 * Inserts javascript into the page.
	 *
	 * @param string $javaScript      JS code
	 * @param string $position        final position: '+','-','0','--',...
	 * @param bool   $inDocumentReady to insert into a DocumentReady block?
	 *
	 * @return int 
	 */
	public function addJavaScript(
		$javaScript,
		$position = null,
		$inDocumentReady = true
	) {
		return WebPage::singleton()->addJavaScript(
			$javaScript,
			$position,
			$inDocumentReady
		);
	}

	/**
	 * Includes Javascript into the page.
	 *
	 * @param string $javaScriptFile javascriptem using file
	 * @param string $position       final positione: '+','-','0','--',...
	 *
	 * @return string
	 */
	public function includeJavaScript($javaScriptFile, $position = null)
	{
		return WebPage::singleton()->includeJavaScript(
			$javaScriptFile,
			$position
		);
	}

	/**
	 * Add another CSS definition to stack.
	 *
	 * @param string $css css definition
	 *
	 * @return bool
	 */
	public function addCSS($css)
	{
		return \Ease\WebPage::singleton()->addCSS($css);
	}

	/**
	 * Include an CSS file call into page.
	 *
	 * @param string $cssFile  path to the file inserted into the page
	 * @param bool   $fwPrefix add framework prefix (usually/Ease/) ?
	 * @param string $media    medium screen | print | braile etc ...
	 *
	 * @return boolean
	 */
	public function includeCss($cssFile, $fwPrefix = false, $media = 'screen')
	{
		return WebPage::singleton()->includeCss($cssFile, $fwPrefix, $media);
	}

	/**
	 * Perform http redirect
	 *
	 * @param string $url redirect to URL
	 */
	public function redirect($url)
	{
		$messages = \Ease\Shared::logger()->getMessages();
		if (count($messages)) {
			$_SESSION[\Ease\Shared::appName()]['EaseMessages'] = $messages;
		}
		if (headers_sent()) {
			$this->addJavaScript('window.location = "' . $url . '"', 0, false);
		} else {
			header('Location: ' . $url);
		}
		session_write_close();
		WebPage::$pageClosed = true;
	}

	/**
	 * Returns the desired address.
	 *
	 * @return string
	 */
	public static function getUri()
	{
		return $_SERVER['REQUEST_URI'];
	}

	/**
	 * Returns the current URL. This is instead of PHP_SELF which is unsafe.
	 *
	 * @param bool $dropqs whether to drop the querystring or not. Default true
	 *
	 * @return string the current URL or NULL for php-cli
	 */
	public static function phpSelf($dropqs = true)
	{
		$url = null;
		if (php_sapi_name() != 'cli') {

			$schema = 'http';
			if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) {
				$schema .= 's';
			}
			$url = sprintf(
				'%s://%s%s',
				$schema,
				$_SERVER['SERVER_NAME'],
				$_SERVER['REQUEST_URI']
			);

			$parts = parse_url($url);

			$port = $_SERVER['SERVER_PORT'];
			$scheme = $parts['scheme'];
			$host = $parts['host'];
			if (isset($parts['path'])) {
				$path = $parts['path'];
			} else {
				$path = null;
			}
			if (isset($parts['query'])) {
				$qs = $parts['query'];
			} else {
				$qs = null;
			}
			$port || $port = ($scheme == 'https') ? '443' : '80';

			if (($scheme == 'https' && $port != '443') || ($scheme == 'http' && $port != '80')
			) {
				$host = "$host:$port";
			}
			$url = "$scheme://$host$path";
			if (!$dropqs) {
				$url = "{$url}?{$qs}";
			}
		}
		return $url;
	}

	/**
	 * Redirects the unlogged-in user to the login page.
	 *
	 * @param string $loginPage login page address
	 */
	public function onlyForLogged($loginPage = 'login.php', $message = null)
	{

		if (!method_exists(\Ease\Shared::user(), 'isLogged') || !\Ease\Shared::user()->isLogged()) {
			if (!empty($message)) {
				\Ease\User::singleton()->addStatusMessage(
					_('Sign in first please'),
					'warning'
				);
			}
			$this->redirect($loginPage);
			self::$pageClosed = true;
		}
	}

	/**
	 * Include next element into current page (if not closed).
	 *
	 * @param mixed  $pageItem     value or EaseClass with draw() method
	 *
	 * @return null|Embedable Pointer to included object
	 */
	public function addItem($pageItem)
	{
		return self::$pageClosed ? null : parent::addItem($pageItem);
	}

	/**
	 * Returns $_REQUEST field.
	 *
	 * @return array
	 */
	public function getRequestValues()
	{
		return $_REQUEST;
	}

	/**
	 * Is page called by Form Post ?
	 *
	 * @return bool
	 */
	public static function isPosted()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * It treats the transformation according to its expected type.
	 *
	 * @param mixed  $value      value
	 * @param string $sanitizeAs value type int|string|float|null
	 *
	 * @return mixed
	 */
	public static function sanitizeAsType($value, $sanitizeAs)
	{
		$sanitized = null;
		switch ($sanitizeAs) {
			case 'string':
				$sanitized = (string) $value;
				break;
			case 'int':
				$sanitized = strlen($value) ? (int) $value : null;
				break;
			case 'float':
				$sanitized = (float) $value;
				break;
			case 'bool':
			case 'boolean':
				switch ($value) {
					case 'FALSE':
					case 'false':
						$sanitized = false;
						break;
					case 'true':
					case 'TRUE':
						$sanitized = true;
						break;
					default:
						$sanitized = boolval($value);
						break;
				}
				break;
			case 'null':
			default:
				$sanitized = $value;
				break;
		}

		return $sanitized;
	}

	/**
	 * Returns the value of the page call parameter key.
	 *
	 * @param string $field      key POST or GET
	 * @param string $sanitizeAs treat the returned value as float|int|string
	 *
	 * @return mixed
	 */
	public static function getRequestValue($field, $sanitizeAs = null)
	{
		$value = null;
		if (isset($_REQUEST[$field])) {
			$value = empty($sanitizeAs) ? $_REQUEST[$field] : self::sanitizeAsType(
				$_REQUEST[$field],
				$sanitizeAs
			);
		}
		return $value;
	}

	/**
	 * Returns the value of the page key parameter.
	 *
	 * @param string $field      key GET
	 * @param string $sanitizeAs treat the returned value as float|int|string
	 *
	 * @return string
	 */
	public static function getGetValue($field, $sanitizeAs = null)
	{
		$value = null;
		if (isset($_GET[$field])) {
			$value = empty($sanitizeAs) ? $_GET[$field] : self::sanitizeAsType(
				$_GET[$field],
				$sanitizeAs
			);
		}
		return $value;
	}

	/**
	 * Returns the value of the page key parameter.
	 *
	 * @param string $field      key POST
	 * @param string $sanitizeAs treat the returned value as float|int|string
	 *
	 * @return string
	 */
	public static function getPostValue($field, $sanitizeAs = null)
	{
		$value = null;
		if (isset($_POST[$field])) {
			$value = empty($sanitizeAs) ? $_POST[$field] : self::sanitizeAsType(
				$_POST[$field],
				$sanitizeAs
			);
		}
		return $value;
	}

	/**
	 * Was the page displayed after the form was submitted using the POST method?
	 *
	 * @category requestValue
	 *
	 * @return bool
	 */
	public static function isFormPosted()
	{
		return isset($_POST) && count($_POST);
	}

	/**
	 *Returns fields as URL parameters.
	 *
	 * @param array  $params
	 * @param string $baseUrl
	 */
	public static function arrayToUrlParams($params, $baseUrl = '')
	{
		if (strstr($baseUrl, '?')) {
			return $baseUrl . '&' . http_build_query($params);
		} else {
			return $baseUrl . '?' . http_build_query($params);
		}
	}

	/**
	 * Registers the item for finalization.
	 *
	 * @param mixed $itemPointer
	 */
	public static function registerItem(&$itemPointer)
	{
		self::$allItems[] = $itemPointer;
	}

	/**
	 * Returns or registers an instance of a Web page.
	 *
	 * @param WebPage $oPage website object to register
	 *
	 * @return WebPage
	 */
	public static function &webPage($oPage = null)
	{
		if (is_object($oPage)) {
			self::$webPage = &$oPage;
		}
		if (!is_object(self::$webPage)) {
			self::$webPage = WebPage::singleton();
		}
		return self::$webPage;
	}

	/**
	 * @return WebPage
	 */
	public static function singleton()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
