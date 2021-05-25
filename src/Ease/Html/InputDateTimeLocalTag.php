<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 input datetime-local tag.
 */
class InputDateTimeLocalTag extends InputTag
{

    /**
     * The <input type="datetime-local"> is used for input fields that should contain a
     * date and time with no time zone.
     *
     * @param string           $name       name
     * @param string|\DateTime $value      initial value as string or DateTime 
     * @param array            $properties additional input date time local properties
     */
    public function __construct($name,
    /** @scrutinizer ignore-type */
    $value = null, $properties = [])
    {
        $properties['type']  = 'datetime-local';
        $properties['value'] = is_object($value) ? $value->format('c') : $value;
        $properties['name']  = $name;
        parent::__construct($name, $value, $properties);
    }
}
