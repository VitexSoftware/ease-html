<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 Dialog tag.
 */
class DialogTag extends PairTag
{

    /**
     * Defines a dialog box or a window
     *
     * @param mixed  $content    items included
     * @param array  $properties dialog tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('dialog', $properties, $content);
    }
}
