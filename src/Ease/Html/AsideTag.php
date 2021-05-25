<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 Aside tag. 
 */
class AsideTag extends PairTag
{

    /**
     * Defines content aside from the page content
     *
     * @param mixed  $content    items included
     * @param array  $properties Aside tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('aside', $properties, $content);
    }
}
