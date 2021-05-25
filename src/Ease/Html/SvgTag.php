<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 svg tag.
 */
class SvgTag extends PairTag
{

    /**
     * Render scalable vector graphics
     *
     * @param mixed  $content    items included
     * @param array  $properties tag svg propertiess
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('svg', $properties, $content);
    }
}
