<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML H2 tag.
 */
class H2Tag extends PairTag
{

    /**
     * H2 Tag.
     *
     * @param mixed  $content    inserted content
     * @param string $properties h2 tag propoerties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('h2', $properties, $content);
    }
}
