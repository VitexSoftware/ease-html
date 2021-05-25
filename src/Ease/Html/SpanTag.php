<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML span tag.
 */
class SpanTag extends PairTag
{

	/**
	 * <span> tag.
	 *
	 * @param mixed $content    content entered
	 * @param array $properties span tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('span', $properties, $content);
	}
}
