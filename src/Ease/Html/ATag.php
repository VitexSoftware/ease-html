<?php

namespace Ease\Html;

/**
 *   @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com> 
 *
 * HTML hyperlink class.
 */
class ATag extends PairTag
{

    /**
     * displays HTML link.
     *
     * @param string|null $href       link url
     * @param mixed       $contents   inserted content
     * @param array       $properties A tag properties
     */
    public function __construct($href, $contents = null, $properties = [])
    {
        if (!is_null($href)) {
            $properties['href'] = $href;
        }
        parent::__construct('a', $properties, $contents);
    }
}
