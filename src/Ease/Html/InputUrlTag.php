<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 url input tag.
 */
class InputUrlTag extends InputTag
{

    /**
     * The <input type="url"> is used for input fields that should contain a
     * URL address.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input tel input url tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'url';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
