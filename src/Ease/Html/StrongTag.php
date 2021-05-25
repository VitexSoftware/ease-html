<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML major heading tag.
 */
class StrongTag extends PairTag
{

	/**
	 * Tag for bold text.
	 *
	 * @param mixed $content    inserted value
	 * @param array $properties strong tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('strong', $properties, $content);
	}
}
