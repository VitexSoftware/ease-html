<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 embed tag.
 */
class EmbedTag extends PairTag
{

    /**
     * Defines a container for an external (non-HTML) application
     *
     * @param mixed  $content    items included
     * @param array  $properties embed tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('embed', $properties, $content);
    }
}
