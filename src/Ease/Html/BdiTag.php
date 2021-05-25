<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 BDI tag.
 */
class BdiTag extends PairTag
{

    /**
     * Isolates a part of text that might be formatted in a different way then the remaining content (f.e. left->right vs right<-left)
     *
     * @param mixed  $content    items included
     * @param array  $properties bdi tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('bdi', $properties, $content);
    }
}
