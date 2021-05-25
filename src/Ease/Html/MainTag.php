<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 main tag.
 */
class MainTag extends PairTag
{

    /**
     * Defines the main content of a document
     *
     * @param mixed  $content    items included
     * @param array  $properties main tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('main', $properties, $content);
    }
}
