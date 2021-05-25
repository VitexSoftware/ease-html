<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML Table cell class.
 */
class TdTag extends PairTag
{

    /**
     * Table cell.
     *
     * @param mixed $content    insertred value
     * @param array $properties td tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('td', $properties, $content);
    }
}
