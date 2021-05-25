<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 email input tag.
 */
class InputEmailTag extends InputTag
{

    /**
     * The <input type="email"> is used for input fields that should contain an
     * e-mail address.
     *
     * @param string $name       name
     * @param string $value      initial value
     * @param array  $properties additional input email tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'email';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
