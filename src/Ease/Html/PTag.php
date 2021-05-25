<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML Paragraph class tag.
 */
class PTag extends PairTag
{

    /**
     * Paragraph.
     *
     * @param mixed $content    inserted content
     * @param array $properties p tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('p', $properties, $content);
    }
}
