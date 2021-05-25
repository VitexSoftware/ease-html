<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Page script.
 */
class ScriptTag extends PairTag
{

    /**
     * Script.
     *
     * @param string|mixed $content     tag content
     * @param array        $properties  script tag properties
     */
    public function __construct($content = null, $properties = null)
    {
        parent::__construct(
            'script', $properties, '// <![CDATA[
'.$content.'
// ]]>'
        );
    }
}
