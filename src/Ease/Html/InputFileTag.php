<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Input element for sending a file.
 */
class InputFileTag extends InputTag
{

    /**
     * Input box for file selection.
     *
     * @param string $name          tag name
     * @param string $value         pre-defined value
     * @param array  $properties    input file tag properties
     */
    public function __construct($name, $value = null, array $properties = [])
    {
        parent::__construct($name, $value);
        $properties['type'] = 'file';
        $this->setTagProperties($properties);
    }
}
