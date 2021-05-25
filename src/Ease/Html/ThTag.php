<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML Table Header cell class.
 */
class ThTag extends PairTag
{

    /**
     * Cell with table label.
     *
     * @param mixed $content    inserted content
     * @param array $properties th tag properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct('th', $properties, $content);
    }
}
