<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 figcaption tag.
 */
class FigCaptionTag extends PairTag
{

    /**
     * Defines a caption for a <figure> element
     *
     * @param mixed  $content    items included
     * @param array  $properties fig caption tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('figcaption', $properties, $content);
    }
}
