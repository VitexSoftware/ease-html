<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Hidden input.
 */
class InputHiddenTag extends InputTag
{

    /**
     * Hidden input.
     *
     * @param string $name       tag name
     * @param string $value      return value
     * @param array  $properties input hidden tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        parent::__construct($name, $value);
        $properties['type'] = 'hidden';
        $this->setTagProperties($properties);
    }
}
