<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 video tag.
 */
class VideoTag extends PairTag
{

    /**
     * Defines video or movie
     *
     * @param mixed  $content    items included
     * @param array  $properties video tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('video', $properties, $content);
    }
}
