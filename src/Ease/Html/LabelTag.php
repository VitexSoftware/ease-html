<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Tag Label for LabeledInput.
 */
class LabelTag extends PairTag
{
    /**
     * Link to content.
     *
     * @var mixed
     */
    public $contents = null;

    /**
     * Displays tag label.
     *
     * @param string $for        reference element
     * @param mixed  $contents   labeled content
     * @param array  $properties labe tag properties
     */
    public function __construct($for, $contents = null, $properties = [])
    {
        $this->setTagProperties(['for' => $for]);
        parent::__construct('label', $properties);
        $this->contents = $this->addItem($contents);
    }

    /**
     * Sets object name.
     *
     * @param string $objectName the set name
     *
     * @return string New object name
     */
    public function setObjectName($objectName = null)
    {
        if (is_null($objectName)) {
            $objectName = get_class($this).'@'.$this->getTagProperty('for');
        }

        return parent::setObjectName($objectName);
    }
}
