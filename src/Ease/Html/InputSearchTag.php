<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Show search input field.
 */
class InputSearchTag extends InputTag
{
    /**
     * URL data source for the hinter.
     *
     * @var string
     */
    public $dataSourceURL = null;

    /**
     *Displays a tag for the search box.
     *
     * @param string $name       tag name
     * @param string $value      initial value
     * @param array  $properties additional input search tag properties
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $properties['type'] = 'search';
        if ($value) {
            $properties['value'] = $value;
        }
        if ($name) {
            $properties['name'] = $name;
        }
        parent::__construct($name, $value, $properties);
    }
}
