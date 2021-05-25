<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Horizontal line tag.
 */
class HrTag extends Tag
{

    /**
     * Horizontal line tag.
     *
     * @param array $properties tag parameters
     */
    public function __construct($properties = [])
    {
        parent::__construct('hr', $properties);
    }
}
