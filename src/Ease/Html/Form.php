<?php

/**
 * Html form able to be recursive filled.*/

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 */

class Form extends PairTag
{

    /**
     * Form goal.
     *
     * @var string URL form goal
     */
    public $formTarget = null;

    /**
     * sending method.
     *
     * @var string GET|POST
     */
    public $formMethod = null;

    /**
     * Sets up form name.
     *
     * @var boolean
     */
    public $setName = false;

    /**
     * Html Form Tag.
     *
     * @param array  $properties    tag properties f.e.
     *                              ('enctype' => 'multipart/form-data')
     * @param mixed  $formContents  inside form elements
     */
    public function __construct($properties = [], $formContents = null)
    {
        if (!array_key_exists('method', $properties)) {
            $properties['method'] = 'POST';
        }
        parent::__construct('form', $properties, $formContents);
    }

    /**
     * Tryes to find tag of the given name in inserted objects.
     *
     * @param string        $searchFor  searched elements name
     * @param \Ease\Container $where    object in where the search happens
     *
     * @return \Ease\Container
     */
    public function &objectContentSearch($searchFor, $where = null)
    {
        if (is_null($where)) {
            $where = &$this;
        }
        $itemFound = null;
        if (isset($where->pageParts) && is_array($where->pageParts) && count($where->pageParts)) {
            foreach ($where->pageParts as $pagePart) {
                if (is_object($pagePart)) {
                    if (method_exists($pagePart, 'getTagName')) {
                        if ($pagePart->getTagName() == $searchFor) {
                            return $pagePart;
                        }
                    } else {
                        $itemFound = $this->objectContentSearch(
                            $searchFor,
                            $pagePart
                        );
                        if ($itemFound) {
                            return $itemFound;
                        }
                    }
                }
            }
        }

        return $itemFound;
    }

    /**
     * Fills up inserted objects with data.
     *
     * @param string $data   asociative data field
     */
    public function fillUp($data = null)
    {
        if (is_null($data)) {
            $data = $this->getData();
        }
        self::fillMeUp($data, $this);
    }

    /**
     * Goes through all inserted objects and if their names match the data keys, sets up a value.
     *
     * @param array $data                   asociative data field
     * @param \Ease\Container|mixed $form   form to be filled
     */
    public static function fillMeUp($data, &$form)
    {
        if (!empty($form->pageParts)) {
            foreach ($form->pageParts as $partName => $part) {
                if (!empty($part->pageParts)) {
                    self::fillMeUp($data, $part);
                }
                if (is_object($part)) {
                    if (method_exists($part, 'setValue') && method_exists(
                        $part,
                        'getTagName'
                    )) {
                        $tagName = $part->getTagName();
                        if (isset($data[$tagName])) {
                            $part->setValue($data[$tagName], true);
                        }
                    }
                    if (method_exists($part, 'setValues')) {
                        $part->setValues($data);
                    }
                }
            }
        }
    }
}
