<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 output tag.
 */
class OutputTag extends PairTag
{

    /**
     * Defines the result of a calculation
     *
     * @param mixed  $content    items included
     * @param array  $properties output tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('output', $properties, $content);
    }
}
