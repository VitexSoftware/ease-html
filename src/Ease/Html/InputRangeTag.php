<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 range input tag.
 */
class InputRangeTag extends InputTag {

    /**
     * The &lt;input type="range"&gt; defines a control for entering a number whose exact value is not important 
     * 
     * @see https://www.w3schools.com/tags/att_input_type_range.asp
     *
     * @param string $name       name
     * @param string $value      initial value
     * @param array  $properties additional input range tag properties min,max,step...
     */
    public function __construct($name, $value = null, $properties = []) {
        $properties['type'] = 'range';
        $properties['value'] = $value;
        $properties['name'] = $name;
        parent::__construct($name, $value, $properties);
    }

}
