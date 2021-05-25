<?php

/**
 * Object able to contain other object in int.
 *
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * @copyright  2009-2019 Vitex@hippy.cz (G)
 */

namespace Ease;

class Container extends Sand implements Embedable
{

	use Glue;

	/**
	 * Library version
	 * @var string 
	 */
	public static $libVersion = 1.0;

	/**
	 * A container that can contain embedded objects that are rendered.
	 *
	 * @param Embedable|string $initialContent value or EaseObject with draw () method
	 */
	public function __construct($initialContent = null)
	{
		if (!empty($initialContent)) {
			$this->addItem($initialContent);
		}
	}

	/**
	 * Inserts as the first element in the object.
	 *
	 * @param mixed  $pageItem     value or EaseObject with draw () method
	 * @param string $pageItemName Under this name, object is inserted into the tree
	 *
	 * @return mixed A link to the embedded object
	 */
	public function &addAsFirst($pageItem, $pageItemName = null)
	{
		$swap = $this->pageParts;
		$this->emptyContents();
		$itemPointer = $this->addItem($pageItem);
		$this->addItems($swap);
		return $itemPointer;
	}

	/**
	 * Allows an already inserted object to be removed from the tree for rendering.
	 */
	public function suicide()
	{
		if (isset($this->parentObject) && isset($this->parentObject->pageParts[$this->embedName])) {
			unset($this->parentObject->pageParts[$this->embedName]);

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Returns number of enclosed items in current or given object.
	 *
	 * @return int number of parts enclosed
	 */
	public function getItemsCount()
	{
		return count($this->pageParts);
	}

	/**
	 * Inserts another element after the existing one.
	 *
	 * @param mixed $pageItem value or EaseObject with draw () method
	 *
	 * @return Embedable|string A link to the embedded object.
	 */
	public function &addNextTo($pageItem)
	{
		$itemPointer = $this->parentObject->addItem($pageItem);

		return $itemPointer;
	}

	/**
	 * Vrací odkaz na poslední vloženou položku.
	 *
	 * @return Brick|mixed
	 */
	public function &lastItem()
	{
		$lastPart = empty($this->pageParts) ? null : end($this->pageParts);
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
		return $this->isEmpty() ? null : end($this->pageParts)->addItem($pageItem);
	}

	/**
	 * Returns the first inserted item.
	 */
	public function getFirstPart()
	{
		return $this->isEmpty() ? null : reset($this->pageParts);
	}

	/**
	 * Insert an array of elemnts
	 *
	 * @param array $itemsArray value field or EaseObject with draw () method
	 */
	public function addItems($itemsArray)
	{
		$itemsAdded = [];
		foreach ($itemsArray as $itemID => $item) {
			$itemsAdded[$itemID] = $this->addItem($item);
		}

		return $itemsAdded;
	}

	/**
	 * Empty container contents
	 */
	public function emptyContents()
	{
		$this->pageParts = [];
	}

	/**
	 * Contentets
	 * 
	 * @return mixed
	 */
	public function getContents()
	{
		return $this->pageParts;
	}

	/**
	 * It recursively scans all inserted objects and calls their draw ().
	 */
	public function drawAllContents()
	{
		if (!empty($this->pageParts)) {
			foreach ($this->pageParts as $part) {
				if (is_object($part) && method_exists($part, 'draw')) {
					$part->draw();
				} else {
					echo $part;
				}
			}
		}
		$this->drawStatus = true;
	}

	/**
	 * Returns the rendered contents of objects.
	 *
	 * @return string
	 */
	public function getRendered()
	{
		$retVal = '';
		ob_start();
		$this->draw();
		$retVal .= ob_get_contents();
		ob_end_clean();

		return $retVal;
	}

	/**
	 * Draw contents not drawn yet.
	 */
	public function drawIfNotDrawn()
	{
		if ($this->drawStatus === false) {
			$this->draw();
		}
	}

	/**
	 * Returns the status of the part finalization of the flag.
	 *
	 * @return bool
	 */
	public function isFinalized()
	{
		return $this->finalized;
	}

	/**
	 * Set label of parts finalized.
	 *
	 * @param bool $flag finalization flag
	 */
	public function setFinalized($flag = true)
	{
		$this->finalized = $flag;
	}

	/**
	 * Is the element empty?
	 *
	 * @return bool emptiness
	 */
	public function isEmpty()
	{
		return empty($this->pageParts);
	}

	/**
	 * Always returns Embedable item
	 * 
	 * @param mixed $item
	 * 
	 * @return Embedable
	 */
	public static function embedablize($item)
	{
		return (is_object($item) && $item instanceof Embedable) ? $item : new self($item);
	}

	/**
	 * Render Obect (and its contents) as string.
	 *
	 * @return string
	 */
	public function __toString()
	{
		ob_start();
		$this->draw();
		$objectOut = ob_get_contents();
		ob_end_clean();

		return $objectOut;
	}
}
