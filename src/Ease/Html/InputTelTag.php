<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 tel input tag.
 */
class InputTelTag extends InputTag
{

    /**
     * The <input type="tel"> is used for input fields that should contain a phone number.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input tel iinput submit tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'tel';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
