<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 rt tag.
 *
 *  
 */
class RtTag extends PairTag
{

    /**
     * Defines an explanation/pronunciation of characters (for East Asian typography)
     *
     * @param mixed  $content    items included
     * @param array  $properties rt tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('rt', $properties, $content);
    }
}
