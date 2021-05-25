<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML span tag.
 * @deprecated since version 1.4.1
 */
class Span extends PairTag
{

	/**
	 * <span> tag.
	 *
	 * @param mixed $content    inserted content
	 * @param array $properties span tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('span', $properties, $content);
	}
}
