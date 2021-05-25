<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Definition list.
 */
class DlTag extends PairTag
{

    /**
     * Definition
     *
     * @param mixed $content       content included
     * @param array $properties    dl tag properties
     */
    public function __construct($content = null, $properties = null)
    {
        parent::__construct('dl', $properties, $content);
    }

    /**
     * Inserts new definition
     *
     * @param string|mixed $term    subject
     * @param string|mixed $value   subject description
     */
    public function addDef($term, $value)
    {
        $this->addItem(new DtTag($term));
        $this->addItem(new DdTag($value));
    }
}
