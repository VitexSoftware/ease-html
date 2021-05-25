<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Reformatted text.
 */
class PreTag extends PairTag
{

    /**
     * Reformatted text.
     *
     * @param string|mixed $content     tag content
     * @param array        $properties  pre tag properties
     */
    public function __construct($content = null, $properties = null)
    {
        parent::__construct('pre', $properties, $content);
    }
}
