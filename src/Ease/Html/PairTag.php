<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * General HTML pair tag.
 */
class PairTag extends Tag
{
    /**
     * Character to close tag.
     *
     * @var string
     */
    public $trail = '';

    /**
     * Common pair tag.
     *
     * @param string       $tagType         tag type
     * @param array|string $properties      pair tag properties
     * @param mixed        $content         Content to insert into tag
     */
    public function __construct(
        $tagType = null,
        $properties = null,
        $content = null
    ) {
        parent::__construct($tagType, $properties);
        if (empty($content) === false) {
            $this->addItem($content);
        }
    }

    /**
     * Render tag and its contents.
     */
    public function draw()
    {
        $this->tagBegin();
        $this->drawAllContents();
        $this->tagEnclousure();
    }

    /**
     * Show pair tag begin.
     */
    public function tagBegin()
    {
        parent::draw();
    }

    /**
     * Show pair tag ending.
     */
    public function tagEnclousure()
    {
        echo '</' . $this->getTagType() . '>';
    }
}
