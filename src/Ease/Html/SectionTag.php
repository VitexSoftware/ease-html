<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 section tag.
 */
class SectionTag extends PairTag
{

    /**
     * Defines a section in a document
     *
     * @param mixed  $content    items included
     * @param array  $properties section tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('section', $properties, $content);
    }
}
