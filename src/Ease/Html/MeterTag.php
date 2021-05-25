<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 meter tag.
 */
class MeterTag extends PairTag
{

    /**
     * Defines a scalar measurement within a known range (a gauge)
     *
     * @param mixed  $content    items included
     * @param array  $properties master tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('meter', $properties, $content);
    }
}
