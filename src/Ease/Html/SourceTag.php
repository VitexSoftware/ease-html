<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 source tag.
 */
class SourceTag extends PairTag
{

	/**
	 * Defines multiple media resources for media elements (<video> and <audio>)
	 *
	 * @param mixed  $content    items included
	 * @param array  $properties source tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('source', $properties, $content);
	}
}
