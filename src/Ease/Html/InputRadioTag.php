<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Radio button.
 */
class InputRadioTag extends InputTag
{
    /**
     * Return value.
     *
     * @var string
     */
    public $value = null;

    /**
     * Radio button.
     *
     * @param string $name          tag name
     * @param string $value         return value
     * @param array  $properties    input radio tag properties
     */
    public function __construct($name, $value = null, $properties = null)
    {
        parent::__construct($name, $value);
        if ($properties) {
            $this->setTagProperties($properties);
        }
        $this->setTagProperties(['type' => 'radio']);
        $this->value = $value;
    }

    /**
     * Sets the checkbox value for the first time. The second call sets the checked flag, if the value is the same as already charged.
     *
     * @param string $value return value
     */
    public function setValue($value)
    {
        $currentValue = $this->getTagProperty('value');
        if ($currentValue) {
            if ($currentValue == $value) {
                $this->setTagProperties(['checked']);
            }
        } else {
            $this->setTagProperties(['value' => $value]);
        }
    }
}
