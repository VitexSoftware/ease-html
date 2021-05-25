<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * General input TAG.
 */
class InputTag extends Tag
{
    /**
     * Sets tag name automatically
     *
     * @author Vítězslav Dvořák <vitex@hippy.cz>
     */
    public $setName = true;

    /**
     * General input TAG.
     *
     * @param string            $name       tag name
     * @param string            $value      return value
     * @param array             $properties additional input tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        parent::__construct('input');
        $this->setTagName($name);
        if (isset($properties)) {
            $this->setTagProperties($properties);
        }
        if (!is_null($value)) {
            $this->setValue($value);
        }
    }

    /**
     * Sets the value of the input field.
     *
     * @param string $value return value
     */
    public function setValue($value)
    {
        $this->setTagProperties(['value' => $value]);
    }

    /**
     * Returns the value of an input field.
     *
     * @return string $value
     */
    public function getValue()
    {
        return $this->getTagProperty('value');
    }
}
