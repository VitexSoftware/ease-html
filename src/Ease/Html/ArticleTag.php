<?php

namespace Ease\Html;

/** 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 Article tag.
 */
class ArticleTag extends PairTag
{

    /**
     * Defines an article in a document
     *
     * @param mixed  $content    items included
     * @param array  $properties article tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('article', $properties, $content);
    }
}
