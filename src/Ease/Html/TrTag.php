<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML Table row class.
 */
class TrTag extends PairTag
{

    /**
     * TR tag.
     *
     * @param mixed $content    inserted value
     * @param array $properties tr tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('tr', $properties, $content);
    }
}
