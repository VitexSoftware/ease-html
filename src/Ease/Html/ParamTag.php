<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HtmlParam tag.
 */
class ParamTag extends Tag
{

    /**
     * Paramm tag.
     *
     * @param string $name  tag name
     * @param string $value tag value
     */
    public function __construct($name, $value)
    {
        parent::__construct('param', ['name' => $name, 'value' => $value]);
    }
}
