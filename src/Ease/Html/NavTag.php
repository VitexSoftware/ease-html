<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 nav tag.
 */
class NavTag extends PairTag
{

    /**
     * Defines navigation links
     *
     * @param mixed  $content    items included
     * @param array  $properties nav tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('nav', $properties, $content);
    }
}
