<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Html element for a button.
 */
class ButtonTag extends PairTag
{

    /**
     * Html element for a button.
     *
     * @param string $content       button content
     * @param array  $properties    button tag properties
     */
    public function __construct($content, $properties = [])
    {
        parent::__construct('button', $properties, $content);
    }
}
