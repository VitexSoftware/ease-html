<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 track tag.
 */
class TrackTag extends PairTag
{

    /**
     * Defines text tracks for media elements (<video> and <audio>)
     *
     * @param mixed  $content    items included
     * @param array  $properties track tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('track', $properties, $content);
    }
}
