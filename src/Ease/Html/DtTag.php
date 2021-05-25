<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Term definition.
 */
class DtTag extends PairTag
{

    /**
     * Term definition.
     *
     * @param string|mixed  $content     term name / keyword
     * @param array         $properties  dt tag properties   
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('dt', $properties, $content);
    }
}
