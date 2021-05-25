<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML H4 tag.
 */
class H4Tag extends PairTag
{

    /**
     * H4 tag.
     *
     * @param mixed $content    inserted content
     * @param array $properties h4 tag propoerties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('h4', $properties, $content);
    }
}
