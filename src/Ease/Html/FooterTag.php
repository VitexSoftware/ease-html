<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 footer tag.
 */
class FooterTag extends PairTag
{

    /**
     * Defines a footer for a document or section.
     *
     * @param mixed  $content    items included
     * @param array  $properties footer tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('footer', $properties, $content);
    }
}
