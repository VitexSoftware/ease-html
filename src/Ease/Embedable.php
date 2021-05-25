<?php

namespace Ease;

/**
 *
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 */
interface Embedable
{

	/**
	 * Include next element into current object.
	 *
	 * @param Embedable|string  $pageItem     value or EaseClass with draw() method
	 *
	 * @return mixed Pointer to included object
	 */
	public function addItem($pageItem);

	/**
	 * Notify component about its embed name
	 *
	 * @param string  $embedName parent::$pageParts[$embedName] == self
	 *
	 * @return boolean success
	 */
	public function setEmbedName($embedName);

	/**
	 * Method executed after adding object into new one
	 */
	public function afterAdd();

	/**
	 * Method executed before rendering
	 */
	public function finalize();

	/**
	 * Recursive draw object and its contents
	 */
	public function draw();
}
