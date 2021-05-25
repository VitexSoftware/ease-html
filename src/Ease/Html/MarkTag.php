<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 mark tag.
 */
class MarkTag extends PairTag
{

    /**
     * Defines marked/highlighted text
     *
     * @param mixed  $content    items included
     * @param array  $properties mark tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('mark', $properties, $content);
    }
}
