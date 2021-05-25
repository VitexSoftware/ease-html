<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Html Fieldset.
 */
class FieldSet extends PairTag
{
    /**
     * Frame legend.
     *
     * @var mixed
     */
    public $legend = null;

    /**
     * Object with legend tag.
     *
     * @var PairTag
     */
    public $legendTag = null;

    /**
     * Frame content.
     *
     * @var mixed
     */
    public $content = null;

    /**
     * Displays the frame.
     *
     * @param string|mixed $legend      frame title in text format or ease framework object
     * @param mixed        $content     elements inserted into the frame
     */
    public function __construct($legend, $content = null)
    {
        $this->setTagName($legend);
        $this->legend    = $legend;
        $this->legendTag = $this->addItem(new PairTag('legend', null,
                $this->legend));
        if ($content) {
            $this->content = $this->addItem($content);
        }
        parent::__construct('fieldset');
    }

    /**
     * Legend settings.
     *
     * @param string $legend description
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    /**
     * Inserts the legend.
     */
    public function finalize()
    {
        if ($this->legend) {
            if (is_object(reset($this->pageParts))) {
                reset($this->pageParts)->pageParts = [$this->legend];
            } else {
                array_unshift($this->pageParts, $this->legendTag);
                reset($this->pageParts)->pageParts = [$this->legend];
            }
        }
    }
}
