<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML meta tag.
 */
class MetaTag extends Tag
{

    /**
     * Describe metadata within an HTML document
     *
     * @param string $name       meta property name
     * @param string $content    meta property value
     * @param array  $properties other html tag properties
     */
    public function __construct($name = null, $content = null, $properties = [])
    {
        if (!is_null($name)) {
            $properties['name'] = $name;
        }
        if (!is_null($content)) {
            $properties['content'] = $content;
        }
        parent::__construct('meta', $properties);
    }
}
