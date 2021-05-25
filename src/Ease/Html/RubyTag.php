<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 ruby tag.
 */
class RubyTag extends PairTag
{

    /**
     * Defines a ruby annotation (for East Asian typography)
     *
     * @param mixed  $content    items included
     * @param array  $properties ruby tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('ruby', $properties, $content);
    }
}
