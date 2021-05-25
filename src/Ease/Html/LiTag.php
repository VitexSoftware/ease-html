<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML list item tag class.
 */
class LiTag extends PairTag
{

    /**
     * Simple LI tag.
     *
     * @param mixed $liContents list item content
     * @param array $properties Li tag properties
     */
    public function __construct($liContents = null, $properties = [])
    {
        parent::__construct('li', $properties, $liContents);
    }
}
