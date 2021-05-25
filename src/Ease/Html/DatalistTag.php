<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 datalist tag.
 */
class DatalistTag extends PairTag
{

    /**
     * Specifies a list of pre-defined options for input controls
     *
     * @param mixed  $content    items included
     * @param array  $properties data list tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('datalist', $properties, $content);
    }
}
