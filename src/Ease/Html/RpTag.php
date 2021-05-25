<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 rp tag.
 */
class RpTag extends PairTag
{

    /**
     * Defines what to show in browsers that do not support ruby annotations
     *
     * @param mixed  $content    items included
     * @param array  $properties rp tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('rp', $properties, $content);
    }
}
