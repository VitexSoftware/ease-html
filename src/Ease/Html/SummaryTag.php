<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 summary tag.
 */
class SummaryTag extends PairTag
{

	/**
	 * Defines a visible heading for a <details> element
	 *
	 * @param mixed  $content    items included
	 * @param array  $properties summary tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('summary', $properties, $content);
	}
}
