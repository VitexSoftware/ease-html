<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML H5 tag.
 */
class H5Tag extends PairTag
{

    /**
     * H5 Tag.
     *
     * @param mixed $content    inserted content
     * @param array $properties h5 tag propoerties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('h5', $properties, $content);
    }
}
