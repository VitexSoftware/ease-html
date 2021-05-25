<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Text area.
 */
class TextareaTag extends PairTag
{
    /**
     * Link to content.
     */
    public $content = null;
    public $setName = true;

    /**
     * Text area.
     *
     * @param string $name       tag name
     * @param string $content    text arrey content
     * @param array  $properties text area tag properties
     */
    public function __construct($name, $content = '', $properties = [])
    {
        $this->setTagName($name);
        parent::__construct('textarea', $properties);
        if ($content) {
            $this->addItem($content);
        }
    }

    /**
     * Sets content.
     *
     * @param string $value value
     */
    public function setValue($value)
    {
        $this->pageParts = [];
        $this->addItem($value);
    }
}
