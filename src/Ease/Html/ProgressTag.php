<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML5 progress tag.
 */
class ProgressTag extends PairTag
{

    /**
     * Represents the progress of a task
     *
     * @param mixed  $content    items included
     * @param array  $properties progress tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('progress', $properties, $content);
    }
}
