<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML major heading tag.
 */
class SmallTag extends PairTag
{

	/**
	 * Small font tag
	 *
	 * @param mixed $content    inserted content
	 * @param array $properties small tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('small', $properties, $content);
	}
}
