<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML Div tag.
 */
class DivTag extends PairTag
{
    /**
     * Simple Div tag
     *
     * @param mixed  $content    items included
     * @param array  $properties div tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('div', $properties, $content);
    }
}
