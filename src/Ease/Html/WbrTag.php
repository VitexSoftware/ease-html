<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 wbr tag.
 */
class WbrTag extends PairTag
{

    /**
     * Defines a possible line-break
     *
     * @param mixed  $content    items included
     * @param array  $properties wbr tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('wbr', $properties, $content);
    }
}
