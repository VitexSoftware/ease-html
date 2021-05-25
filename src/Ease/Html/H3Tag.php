p<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML H3 tag. 
 */
class H3Tag extends PairTag
{

    /**
     * H3 tag.
     *
     * @param mixed $content    inserted content
     * @param array $properties h3 tag propoerties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('h3', $properties, $content);
    }
}
