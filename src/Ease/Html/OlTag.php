<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML unsorted list.
 */
class OlTag extends UlTag
{

    /**
     * Vytvori OL container.
     *
     * @param mixed $ulContents items included
     * @param array $properties ol tag properties
     */
    public function __construct($ulContents = null, $properties = [])
    {
        parent::__construct($ulContents, $properties);
        $this->setTagType('ol');
    }
}
