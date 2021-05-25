<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML unsorted list.
 *
 *  
 */
class UlTag extends PairTag
{

    /**
     * Creates UL container.
     *
     * @param mixed $ulContents list items
     * @param array $properties ul tag properties
     */
    public function __construct($ulContents = null, $properties = [])
    {
        parent::__construct('ul', $properties, $ulContents);
    }

    /**
     * Inserts an array of elements.
     *
     * @param array $itemsArray field of values or EaseObjektů with draw() method.
     */
    public function addItems($itemsArray)
    {
        $itemsAdded = [];
        foreach ($itemsArray as $item) {
            $itemsAdded[] = $this->addItemSmart($item);
        }

        return $itemsAdded;
    }

    /**
     * Every item id added in LiTag envelope.
     *
     * @param mixed  $pageItem      content inserted as an enumeration item
     * @param array $properties     ul tag properties
     *
     * @return mixed
     */
    public function &addItemSmart($pageItem, $properties = [])
    {
        if (is_array($pageItem)) {
            foreach ($pageItem as $item) {
                $this->addItemSmart($item);
            }
            $itemAdded = &$this->lastItem;
        } else {
            if (is_object($pageItem) && method_exists($pageItem,'getTagType') && ($pageItem->getTagType() == 'li')) {
                $itemAdded = parent::addItem($pageItem);
            } else {
                $itemAdded = parent::addItem(new LiTag($pageItem, $properties));
            }
        }

        return $itemAdded;
    }
}
