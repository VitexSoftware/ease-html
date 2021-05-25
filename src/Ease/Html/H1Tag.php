<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML major heading tag.
 */
class H1Tag extends PairTag
{

    /**
     * H1 Tag.
     *
     * @param mixed $content    inserted content
     * @param array $properties h1 tag propoerties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('h1', $properties, $content);
    }
}
