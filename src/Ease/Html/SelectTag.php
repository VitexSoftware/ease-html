<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Html Select.
 */
class SelectTag extends PairTag
{

    /**
     * Default item #.
     *
     * @var string|int
     */
    public $defaultValue = null;

    /**
     * Automatic setting of the elemnet name.
     *
     * @var bool
     */
    public $setName = true;

    /**
     * @var array field values to use in select
     */
    public $items = [];

    /**
     * Html select box.
     *
     * @param string $name         name
     * @param array  $items        items
     * @param string $defaultValue default item id
     * @param array  $properties   select tag properties
     */
    public function __construct(
        $name,
        $items = null,
        $defaultValue = null,
        $properties = []
    ) {
        parent::__construct('select', $properties);
        $this->defaultValue = $defaultValue;
        $this->setTagName($name);
        if (is_array($items)) {
            $this->addItems($items);
        }
    }

    /**
     * Bulk insert items.
     *
     * @param array $items          selection items
     */
    public function addItems($items)
    {
        foreach ($items as $itemName => $itemValue) {
            $newItem = $this->addItem(new OptionTag($itemValue, $itemName));
            if (($this->defaultValue == $itemName)) {
                $this->lastItem()->setDefault();
            }
        }
    }

    /**
     * Mockup of loading items.
     *
     * @return array
     */
    public function loadItems()
    {
        return [];
    }

    /**
     * Value setting.
     *
     * @param string $value     the set value
     */
    public function setValue($value)
    {
        if (trim(strlen($value))) {
            foreach ($this->pageParts as $option) {
                if ($option->getValue() == $value) {
                    $option->setDefault();
                } else {
                    $pos = array_search('selected', $option->tagProperties);
                    if (($pos !== false) && is_numeric($pos)) {
                        unset($option->tagProperties[$pos]);
                    }
                }
            }
        } else {
            if (isset($this->pageParts) && count($this->pageParts)) {
                $firstItem = &reset($this->pageParts);
                $firstItem->setDefault();
            }
        }
    }

    /**
     * Inserta loaded items.
     */
    public function finalize()
    {
        if (!count($this->pageParts)) {
            //Uninitialised Select - so we load items
            $this->addItems($this->loadItems());
        }
    }

    /**
     * Removes an item from the menu.
     *
     * @param string $itemID value key for removing from the list
     */
    public function delItem($itemID)
    {
        foreach ($this->pageParts as $optionId => $option) {
            if ($option->getValue() == $itemID) {
                unset($this->pageParts[$optionId]);
            }
        }
    }

    /**
     * Disable menu item
     *  
     * @param int $itemID
     */
    public function disableItem($itemID)
    {
        foreach ($this->pageParts as $optionId => $option) {
            if ($option->getValue() == $itemID) {
                $this->pageParts[$optionId]->setTagProperties(['disabled']);
            }
        }
    }
}
