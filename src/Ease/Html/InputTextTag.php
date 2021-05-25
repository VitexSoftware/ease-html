<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Displays the input text tag.
 */
class InputTextTag extends InputTag
{

    /**
     * Displays the input text tag.
     *
     * @param string $name       tag name
     * @param string $value      intial value
     * @param array  $properties additional input tel input text tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        if (!isset($properties['type'])) {
            $properties['type'] = 'text';
        }
        if (!is_null($value)) {
            $properties['value'] = $value;
        }
        if ($name) {
            $properties['name'] = $name;
        }
        $this->setTagProperties($properties);
        parent::__construct($name, $value);
    }
}
