<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 header tag.
 */
class HeaderTag extends PairTag
{

    /**
     * Defines a header for a document or section.
     *
     * @param mixed  $content    items included
     * @param array  $properties header tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('header', $properties, $content);
    }
}
