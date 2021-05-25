<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 datetime input tag. 
 */
class InputDateTimeTag extends InputTag
{

    /**
     * The <input type="date"> is used for input fields that should contain a date and time.
     *
     * @param string $name       name
     * @param string $value      initial value
     * @param array  $properties additional input time tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'datetime';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
