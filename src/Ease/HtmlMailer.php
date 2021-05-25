<?php

namespace Ease;

/**
 * HTML ✉Class.
 *
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * @copyright 2009-2019 Vitex@hippy.cz (G)
 */

use Ease\Html\BodyTag;
use Ease\Html\HtmlTag;
use Ease\Html\SimpleHeadTag;
use Ease\Html\TitleTag;
use Mail;
use Mail_mime;

/**
 * Build & Send email
 *
 *  
 */
class HtmlMailer extends Document
{

	/**
	 * Object for sending mail.
	 *
	 * @var
	 */
	public $mailer = null;
	public $mimer = null;
	public $textBody = null;
	public $mailHeaders = [];
	public $mailHeadersDone = null;
	public $crLf = "\n";
	public $mailBody = null;
	public $finalized = false;

	/**
	 * Already rendered HTML.
	 *
	 * @var string
	 */
	public $htmlBodyRendered = null;

	/**
	 * Sender's email address.
	 *
	 * @var string
	 */
	public $emailAddress = 'postmaster@localhost';
	public $emailSubject = null;

	/**
	 * Sender's email address.
	 *
	 * @var string
	 */
	public $fromEmailAddress = null;

	/**
	 * Show user information about sending a message?
	 *
	 * @var bool
	 */
	public $notify = true;

	/**
	 * Has the message already been sent?
	 *
	 * @var bool
	 */
	public $sendResult = false;

	/**
	 * Page object for rendering to email.
	 *
	 * @var HtmlTag
	 */
	public $htmlDocument = null;

	/**
	 *
	 * @var SimpleHtmlHeadTag 
	 */
	public $htmlHead = null;

	/**
	 * Pointer to the BODY html document.
	 *
	 * @var BodyTag
	 */
	public $htmlBody = null;

	/**
	 * Outgoing mail parameters.
	 *
	 * @var array
	 */
	public $parameters = [];

	/**
	 * Ease Mail - compiles and sends.
	 *
	 * @param string $emailAddress  address
	 * @param string $mailSubject   suject
	 * @param mixed  $emailContents body - any mix of text and EaseObjects
	 */
	public function __construct(
		$emailAddress,
		$mailSubject,
		$emailContents = null
	) {
		if (defined('EASE_SMTP')) {
			$this->parameters = (array) json_decode(constant('EASE_SMTP'));
		}

		if (is_array($emailAddress)) {
			$emailAddress = current($emailAddress) . ' <' . key($emailAddress) . '>';
		}

		$this->setMailHeaders(
			[
				'To' => $emailAddress,
				'From' => $this->fromEmailAddress,
				'Reply-To' => $this->fromEmailAddress,
				'Subject' => $mailSubject,
				'Content-Type' => 'text/html; charset=utf-8',
				'Content-Transfer-Encoding' => '8bit',
			]
		);


		$mimer_params = array(
			'html_charset' => 'utf-8',
			'text_charset' => 'utf-8',
			'head_charset' => 'utf-8',
			'eol' => $this->crLf,
		);

		$this->mimer = new Mail_mime($mimer_params);

		parent::__construct();

		$this->htmlDocument = new HtmlTag();
		$this->htmlHead = $this->htmlDocument->addItem(new SimpleHeadTag(new TitleTag($this->emailSubject)));
		$this->htmlBody = $this->htmlDocument->addItem(new BodyTag($emailContents));
	}

	/**
	 * Returns the contents of the mail header.
	 *
	 * @param string $headername header name
	 *
	 * @return string
	 */
	public function getMailHeader($headername)
	{
		if (isset($this->mailHeaders[$headername])) {
			return $this->mailHeaders[$headername];
		}
	}

	/**
	 * Sets mail headers.
	 *
	 * @param mixed $mailHeaders    associative array of headers
	 *
	 * @return bool true            if the headers have been set
	 */
	public function setMailHeaders(array $mailHeaders)
	{
		if (is_array($this->mailHeaders)) {
			$this->mailHeaders = array_merge($this->mailHeaders, $mailHeaders);
		} else {
			$this->mailHeaders = $mailHeaders;
		}
		if (isset($this->mailHeaders['To'])) {
			$this->emailAddress = $this->mailHeaders['To'];
		}
		if (isset($this->mailHeaders['From'])) {
			$this->fromEmailAddress = $this->mailHeaders['From'];
		}
		if (isset($this->mailHeaders['Subject'])) {
			if (!strstr($this->mailHeaders['Subject'], '=?UTF-8?B?')) {
				$this->emailSubject = $this->mailHeaders['Subject'];
				$this->mailHeaders['Subject'] = '=?UTF-8?B?' . base64_encode($this->mailHeaders['Subject']) . '?=';
			}
		}
		$this->finalized = false;

		return true;
	}

	/**
	 * Adds an item to the body of the mail.
	 *
	 * @param mixed $item EaseObject or anything with the draw (); method
	 *
	 * @return mixed pointer to the inserted content
	 */
	public function &addItem($item, $pageItemName = null)
	{
		$added = $this->htmlBody->addItem($item, $pageItemName);
		return $added;
	}

	public function getContents()
	{
		return $this->htmlBody;
	}

	/**
	 * Obtain item count
	 *
	 * @return int
	 */
	public function getItemsCount()
	{
		return $this->htmlBody->getItemsCount($object);
	}

	/**
	 * Is object empty ?
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{

		return $this->htmlBody->isEmpty($element);
	}

	/**
	 * Empty container contents
	 */
	public function emptyContents()
	{
		$this->htmlBody->emptyContents();
	}

	/**
	 * Attaches an attachment from a file to the mail.
	 *
	 * @param string $filename path / file name to attach
	 * @param string $mimeType MIME attachement type
	 */
	public function addFile($filename, $mimeType = 'text/plain')
	{
		$this->mimer->addAttachment($filename, $mimeType);
	}

	/**
	 * Builds the body of the mail
	 */
	public function finalize()
	{
		if (method_exists($this->htmlDocument, 'GetRendered')) {
			$this->htmlBodyRendered = $this->htmlDocument->getRendered();
		} else {
			$this->htmlBodyRendered = $this->htmlDocument;
		}
		$this->mimer->setHTMLBody($this->htmlBodyRendered);

		if (isset($this->fromEmailAddress)) {
			$this->setMailHeaders(['From' => $this->fromEmailAddress]);
		}

		$this->setMailHeaders(['Date' => date('r')]);
		$this->mailBody = $this->mimer->get();
		$this->mailHeadersDone = $this->mimer->headers($this->mailHeaders);
		$this->finalized = true;
	}

	/**
	 * Do not draw mail included in page
	 */
	public function draw()
	{
		return;
	}

	/**
	 * Send mail.
	 */
	public function send()
	{
		if (!$this->finalized) {
			$this->finalize();
		}

		$oMail = new Mail();
		if (count($this->parameters)) {
			$this->mailer = $oMail->factory('smtp', $this->parameters);
		} else {
			$this->mailer = $oMail->factory('mail');
		}
		$this->sendResult = $this->mailer->send(
			$this->emailAddress,
			$this->mailHeadersDone,
			$this->mailBody
		);

		if ($this->notify === true) {
			$mailStripped = str_replace(['<', '>'], '', $this->emailAddress);
			if ($this->sendResult === true) {
				$this->addStatusMessage(sprintf(
					_('Message %s was sent to %s'),
					$this->emailSubject,
					$mailStripped
				), 'success');
			} else {
				$this->addStatusMessage(sprintf(
					_('Message %s, for %s was not sent because of %s'),
					$this->emailSubject,
					$mailStripped,
					$this->sendResult->message
				), 'warning');
			}
		}

		return $this->sendResult;
	}

	/**
	 * Sets the user notification flag.
	 *
	 * @param bool $notify required notification status
	 */
	public function setUserNotification($notify)
	{
		$this->notify = (bool) $notify;
	}

	/**
	 * Inserts another element after the existing one.
	 *
	 * @param mixed $pageItem value or EaseObject with draw () method
	 *
	 * @return Container A link to the embedded object
	 */
	public function &addNextTo($pageItem)
	{
		$itemPointer = $this->htmlBody->parentObject->addItem($pageItem);

		return $itemPointer;
	}
}
