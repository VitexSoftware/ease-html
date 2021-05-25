<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * List item.
 */
class OptionTag extends PairTag
{
    /**
     * Value.
     *
     * @var string
     */
    public $value = null;

    /**
     * Drop-down menu item tag.
     *
     * @param string|mixed $content text volby
     * @param string|int   $value   return value
     */
    public function __construct($content, $value = null)
    {
        parent::__construct('option', ['value' => $value], $content);
        $this->setObjectName($this->getObjectName().'@'.$value);
        $this->value = &$this->tagProperties['value'];
    }

    /**
     * Sets the default item.
     * 
     * @return boolean
     */
    public function setDefault()
    {
        return $this->setTagProperties(['selected']);
    }

    /**
     * Sets value.
     *
     * @param int|string $value return value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Value Getter.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
