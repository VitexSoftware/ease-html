<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 keygen tag.
 */
class KeygenTag extends PairTag
{

    /**
     * Defines a key-pair generator field (for forms)
     *
     * @param mixed  $content    items included
     * @param array  $properties keygen tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('keygen', $properties, $content);
    }
}
