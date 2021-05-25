<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 * HTML5 time tag.
 */
class TimeTag extends PairTag
{

    /**
     * Defines a date/time
     *
     * @param mixed  $content    items included
     * @param array  $properties time tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('time', $properties, $content);
    }
}
