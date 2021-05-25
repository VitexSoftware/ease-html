<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 week input tag.
 */
class InputWeekTag extends InputTag
{

    /**
     * The <input type="week"> allows the user to select a week and year.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input tel input week tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type']  = 'week';
        $properties['value'] = $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
