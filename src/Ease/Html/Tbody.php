<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 */
class Tbody extends PairTag
{

	/**
	 * <tbody>.
	 *
	 * @param mixed $content
	 * @param array $properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('tbody', $properties, $content);
	}
}
