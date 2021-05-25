<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Siple HTML head tag class.
 */
class SimpleHeadTag extends PairTag
{
    /**
     * Content type of webpage.
     *
     * @var string
     */
    public static $contentType = 'text/html';

    /**
     * Content Charset
     *
     * @var string
     */
    public $charSet = 'utf-8';

    /**
     * head tag with defined meta http-equiv content type.
     *
     * @param mixed $contents   inserted content
     * @param array $properties simple head tag properties
     */
    public function __construct($contents = null, $properties = [])
    {
        parent::__construct('head', $properties, $contents);
        $this->addItem('<meta http-equiv="Content-Type" content="'.self::$contentType.'; charset='.$this->charSet.'" />');
    }
}
