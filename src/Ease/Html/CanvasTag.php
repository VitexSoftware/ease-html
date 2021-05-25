<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 canvas tag.
 */
class CanvasTag extends PairTag
{

    /**
     * Renders graphics, on the fly, via scripting (usually JavaScript)
     *
     * @param mixed  $content    items included
     * @param array  $properties canvas properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('canvas', $properties, $content);
    }
}
