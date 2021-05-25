<?php

/**
 * Common webpage class
 *
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * @copyright  2009-2020 Vitex@hippy.cz (G)
 */

namespace Ease;

use Ease\Html\BodyTag;
use Ease\Html\HeadTag;
use Ease\Html\HtmlTag;

/**
 * Common Web Page class
 *
 * @author Vítězslav Dvořák <vitex@hippy.cz>
 */
class WebPage extends Document
{

	/**
	 * Saves obejct instace (singleton...).
	 */
	private static $instance = null;

	/**
	 * Where to look for jquery script
	 * @var string path or url
	 */
	public $jqueryJavaScript = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js';

	/**
	 * JavaScripts to be in page
	 *
	 * @var array
	 */
	public $javaScripts = null;

	/**
	 * CSS fields to render.
	 *
	 * @var array
	 */
	public $cascadeStyles = null;

	/**
	 * Page title.
	 *
	 * @var string
	 */
	public $pageTitle = null;

	/**
	 * Page head.
	 *
	 * @var HeadTag
	 */
	public $head = null;

	/**
	 * The object of the page body itself.
	 *
	 * @var BodyTag
	 */
	public $body = null;

	/**
	 * Do not connect to the DB.
	 *
	 * @var string|bool
	 */
	public $myTable = false;

	/**
	 * Default javascripts location in Debian.
	 *
	 * @var string
	 */
	public $jsPrefix = '/javascript/';

	/**
	 * Default CSS locaton in Debian.
	 *
	 * @var string
	 */
	public $cssPrefix = '/javascript/';

	/**
	 * Content to place inside of body
	 *
	 * @param $pageTitle string
	 * @param $toBody    mixed
	 */
	public function __construct($pageTitle = null, $toBody = [])
	{
		$this->setPageTitle($pageTitle);

		parent::__construct();
		parent::addItem('<!DOCTYPE html>');
		$html = parent::addItem(new HtmlTag());
		$this->head = $html->addItem(new HeadTag());
		$this->body = $html->addItem(new BodyTag($toBody));
		$this->javaScripts = &$this->head->javaScripts;
		$this->cascadeStyles = &$this->head->cascadeStyles;
		self::singleton($this);
	}

	/**
	 *
	 * @return string
	 */
	public function getPageTitle()
	{
		return $this->pageTitle;
	}

	/**
	 * Set ID for page body
	 *
	 * @return string
	 */
	public function setTagID($tagID = null)
	{
		return $this->body->setTagID($tagID);
	}

	/**
	 * Get ID for page body
	 *
	 * @return string|null Page BODY ID
	 */
	public function getTagID()
	{
		return $this->body->getTagID();
	}

	/**
	 * Get body Contentets
	 *
	 * @return mixed
	 */
	public function getContents()
	{
		return $this->body->getContents();
	}

	/**
	 * Add item into page body
	 *
	 * @param mixed  $item         inserted item
	 * @param string $pageItemName Under this name, the object is inserted into the tree
	 *
	 * @return Document poiner to object well included
	 */
	public function &addItem($item, $pageItemName = null)
	{
		$added = $this->body->addItem($item, $pageItemName);

		return $added;
	}

	/**
	 * Includes Javascript into the Page.
	 *
	 * @param string $javaScriptFile javascript file
	 * @param string $position       final position: '+','-','0','--',...
	 *
	 * @return string
	 */
	public function includeJavaScript($javaScriptFile, $position = null)
	{
		return $this->addToScriptsStack('#' . $javaScriptFile, $position);
	}

	/**
	 * Inserts javascript into the Page.
	 *
	 * @param string $javaScript      JS code
	 * @param string $position        final position: '+','-','0','--',...
	 * @param bool   $inDocumentReady paste into a DocumentReady block ?
	 *
	 * @return int
	 */
	public function addJavaScript(
		$javaScript,
		$position = null,
		$inDocumentReady = true
	) {
		return $this->addToScriptsStack(($inDocumentReady ? '$' : '@') . $javaScript,
			$position
		);
	}

	/**
	 * Inserts javascript into the bin of the page script.
	 *
	 * @param string $code     JS code
	 * @param string $position final position: '+','-','0','--',...
	 *
	 * @return int
	 */
	public function addToScriptsStack($code, $position = 0)
	{
		$javaScripts = &\Ease\WebPage::singleton()->javaScripts;
		if ($position == 0) {
			if (!empty($javaScripts)) {
				$scriptFound = array_search($code, $javaScripts);
				if (!$scriptFound && ($javaScripts[0] != $code)) {
					$javaScripts[] = $code;

					return key($javaScripts);
				} else {
					return $scriptFound;
				}
			} else {
				$javaScripts[] = $code;
			}
		} else { //Force Position
			if (isset($javaScripts[$position])) { //Already taken
				if ($javaScripts[$position] == $code) {
					return $position;
				}

				$scriptFound = array_search($code, $javaScripts);
				if ($scriptFound) {
					unset($javaScripts[$scriptFound]);
				}

				$backup = array_slice($javaScripts, $position);
				$javaScripts[$position] = $code;
				$nextFreeID = $position + 1;
				foreach ($backup as $code) {
					$javaScripts[$nextFreeID++] = $code;
				}

				return $nextFreeID - 1;
			} else { //position still free
				$javaScripts[] = $code;

				return key($javaScripts);
			}
		}

		return $position;
	}

	/**
	 * Add another CSS definition to stack.
	 *
	 * @param string $css definice CSS pravidla
	 *
	 * @return bool
	 */
	public function addCSS($css)
	{
		if (is_array($css)) {
			$css = key($css) . '{' . current($css) . '}';
		}
		$this->cascadeStyles[md5($css)] = $css;
		return true;
	}

	/**
	 * Inserts a link to the CSS definition into the page.
	 *
	 * @param string $cssFile  file CSS url
	 * @param bool   $fwPrefix Add framework path? (usually /Ease/)
	 * @param string $media    screen|printer|braile etc
	 *
	 * @return boolean success
	 */
	public function includeCss($cssFile, $fwPrefix = false, $media = 'screen')
	{
		if ($fwPrefix) {
			$this->cascadeStyles[$this->cssPrefix . $cssFile] = $this->cssPrefix . $cssFile;
		} else {
			$this->cascadeStyles[$cssFile] = $cssFile;
		}

		return true;
	}

	/**
	 * Use this to show status messages on page
	 *
	 * @param array $properties Div properties
	 *
	 * @return \Ease\Html\DivTag
	 */
	public function getStatusMessagesBlock($properties = [])
	{
		$htmlFargment = new Html\DivTag(null, $properties);

		foreach (\Ease\Shared::logger()->getMessages() as $message) {
			$htmlFargment->addItem(new Html\DivTag(
				$message->body,
				['style' => Logger\Regent::singleton()->logStyles[$message->type], 'data-caller' => $message->caller]
			));
		}
		return $htmlFargment;
	}

	/**
	 * Renders the contents of the object.
	 */
	public function draw()
	{
		$this->finalizeRegistred();
		$this->drawAllContents();
	}

	/**
	 * Finalizes all registered objects.
	 */
	public function finalizeRegistred()
	{
		do {
			foreach (self::$allItems as $PartID => $part) {
				if (is_object($part)) {
					$part->finalize();
				}
				unset(self::$allItems[$PartID]);
			}
		} while (!empty(self::$allItems));
	}

	/**
	 * Sets the title of the web page.
	 *
	 * @param string $pageTitle title
	 */
	public function setPageTitle($pageTitle)
	{
		$this->pageTitle = $pageTitle;
	}

	/**
	 * Return number of enclosed items in current page body or given object.
	 *
	 * @return int number of parts enclosed
	 */
	public function getItemsCount()
	{
		return $this->body->getItemsCount();
	}

	/**
	 * Returns the first inserted item.
	 */
	public function getFirstPart()
	{
		return $this->isEmpty() ? null : reset($this->body->pageParts);
	}

	/**
	 * Is body element empty ?
	 *
	 * @return bool emptyness
	 */
	public function isEmpty($element = null)
	{
		return empty($this->body->pageParts);
	}

	/**
	 * Inserts as the first element in the object.
	 *
	 * @param mixed  $pageItem     value or EaseObject with draw () method
	 * @param string $pageItemName under this name, the object is inserted into the tree
	 *
	 * @return mixed A reference to the embedded object
	 */
	public function &addAsFirst($pageItem, $pageItemName = null)
	{
		return $this->body->addAsFirst($pageItem, $pageItemName);
	}

	/**
	 * Returns a link to the last inserted item.
	 *
	 * @return Embedable|string
	 */
	public function &lastItem()
	{
		$lastPart = empty($this->body->pageParts) ? null : end($this->body->pageParts);
		return $lastPart;
	}

	/**
	 * Adds an item to the last inserted item.
	 *
	 * @param object $pageItem value or EaseObject with draw () method
	 *
	 * @return Container|null success
	 */
	public function addToLastItem($pageItem)
	{
		return $this->isEmpty() ? null : end($this->body->pageParts)->addItem($pageItem);
	}

	/**
	 * Empties webpage contents
	 */
	public function emptyContents()
	{
		$this->body->emptyContents();
	}

	/**
	 * @return WebPage
	 */
	public static function singleton($webPage = null)
	{
		if (!isset(self::$instance)) {
			self::$instance = is_object($webPage) ? $webPage : new self();
			\Ease\Document::singleton()->registerItem(self::$instance);
		}
		return self::$instance;
	}
}
