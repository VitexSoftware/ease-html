<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 color input tag.
 */
class InputColorTag extends InputTag
{

    /**
     * The <input type="color"> is used for input fields that should contain a color.
     *
     * @param string $name       name
     * @param string $value      initial value
     * @param array  $properties additional input color tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'color';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
