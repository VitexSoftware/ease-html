<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 Details tag.
 */
class DetailsTag extends PairTag
{

    /**
     * Defines additional details that the user can view or hide
     *
     * @param mixed  $content    items included
     * @param array  $properties details tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('details', $properties, $content);
    }
}
