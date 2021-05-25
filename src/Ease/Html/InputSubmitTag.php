<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Form submit button. 
 */
class InputSubmitTag extends InputTag
{

    /**
     * Odesílací tlačítko formuláře.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input submit tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        if (is_null($value)) {
            $value = $name;
        }
        $properties['type']  = 'submit';
        $properties['name']  = $name;
        $properties['value'] = $value;
        parent::__construct($name, $value, $properties);
    }

    /**
     * Mockup for label.
     *
     * @param bool $value is ignored
     */
    public function setValue($value = true)
    {
        
    }
}
