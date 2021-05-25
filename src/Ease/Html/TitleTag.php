<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * 
 * HTML title class.
 */
class TitleTag extends PairTag
{

	/**
	 * Title html tag.
	 *
	 * @param string $contents   caption content
	 * @param array  $properties title tag properties
	 */
	public function __construct($contents = null, $properties = [])
	{
		parent::__construct('title', $properties, $contents);
	}
}
