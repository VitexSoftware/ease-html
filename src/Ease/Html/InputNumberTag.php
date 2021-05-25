<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Vstupní pole čísla.
 */
class InputNumberTag extends InputTag
{

    /**
     * The <input type="number"> defines a numeric input field.
     * You can also set restrictions on what numbers are accepted.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input number tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'number';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
