<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 menuitem tag.
 */
class MenuItemTag extends PairTag
{

    /**
     * Defines a command/menu item that the user can invoke from a popup menu
     *
     * @param mixed  $content    items included
     * @param array  $properties menu tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('menuitem', $properties, $content);
    }
}
