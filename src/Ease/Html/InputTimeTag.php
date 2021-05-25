<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 time input tag.
 */
class InputTimeTag extends InputTag
{

    /**
     * The <input type="time"> allows the user to select a time (no time zone).
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input tel input time tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'time';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
