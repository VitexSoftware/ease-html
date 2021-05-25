<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * iFrame element.
 */
class IframeTag extends PairTag
{
    /**
     * iFrame element.
     *
     * @param string $src        content url
     * @param array  $properties HTML tag proberties
     */
    public function __construct( string $src, $properties = [])
    {
        $properties['src'] = $src;
        parent::__construct('iframe',$properties);
    }
}
