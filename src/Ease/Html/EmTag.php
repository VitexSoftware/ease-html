<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML em tag.
 */
class EmTag extends PairTag
{

    /**
     * emphasis Tag.
     *
     * @param mixed $content    inserted content
     * @param array $properties em tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('em', $properties, $content);
    }
}
