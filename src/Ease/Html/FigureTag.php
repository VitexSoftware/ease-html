<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 figure tag.
 */
class FigureTag extends PairTag
{

    /**
     * Defines self-contained content.
     *
     * @param mixed  $content    items included
     * @param array  $properties figure tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('figure', $properties, $content);
    }
}
