<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML top tag class.
 */
class HtmlTag extends PairTag
{
    /**
     * HTML.
     *
     * @param mixed $content inserted content - page body
     */
    public function __construct($content = null)
    {
        parent::__construct('html', ['lang' => \Ease\Locale::singleton()->get2Code()], $content);
    }

    /**
     * Sets object name to "html".
     *
     * @param string $ObjectName    object name
     * 
     * @return string               final object name
     */
    public function setObjectName($ObjectName = null)
    {
        return parent::setObjectName('html');
    }
}
