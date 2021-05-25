<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Definition content.
 */
class DdTag extends PairTag
{

    /**
     * Definition content
     *
     * @param string|mixed $content     content included
     * @param array        $properties  Dd tag properties
     */
    public function __construct($content = null, $properties = null)
    {
        parent::__construct('dd', $properties, $content);
    }
}
