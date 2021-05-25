<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML webPage head class.
 *
 */
class HeadTag extends PairTag
{
    /**
     * Javascripts to render in page.
     *
     * @var array
     */
    public $javaScripts = [];

    /**
     * Css definitions.
     *
     * @var array of strings
     */
    public $cascadeStyles = [];

    /**
     * Content Charset
     *
     * @var string
     */
    public $charSet = 'utf-8';

    /**
     * Html HEAD tag with basic contents and skin support.
     *
     * @param mixed $content        inserted content
     */
    public function __construct($content = null)
    {
        parent::__construct('head', null, $content);
        $this->addItem('<meta http-equiv="Content-Type" content="text/html; charset='.$this->charSet.'" />');
    }

    /**
     * Change name directly to head.
     *
     * @param string $objectName    object name
     * 
     * @return string               final object name
     */
    public function setObjectName($objectName = null)
    {
        return parent::setObjectName('head');
    }

    /**
     * Render a script block.
     *
     * @param string $javaScript    inserted script
     *
     * @return string
     */
    public static function jsEnclosure($javaScript)
    {
        return '
<script>
// <![CDATA[
'.$javaScript.'
// ]]>
</script>
';
    }

    /**
     * Hadle page title.
     */
    public function finalize()
    {
        $this->addItem('<title>'.\Ease\WebPage::singleton()->getPageTitle().'</title>');
    }

    /**
     * 
     * @param array $scriptsArray
     * @param string $divider use '' for optimized output
     * 
     * @return string
     */
    static public function getScriptsRendered(array $scriptsArray,
                                              $divider = "\n")
    {
        $scriptsRendered = '';
        ksort($scriptsArray, SORT_NUMERIC);
        $scriptsInline   = [];
        $scriptsIncluded = [];
        $ODRStack        = [];
        foreach ($scriptsArray as $script) {
            $scriptType = $script[0];
            $scriptBody = substr($script, 1);
            switch ($scriptType) {
                case '#':
                    $scriptsIncluded[] = '<script src="'.$scriptBody.'"></script>';
                    break;
                case '@':
                    $scriptsInline[]   = $scriptBody;
                    break;
                case '$':
                    $ODRStack[]        = $scriptBody;
                    break;
            }
        }

        if (!empty($scriptsIncluded)) {
            $scriptsRendered .= $divider.implode($divider, $scriptsIncluded);
        }

        if (!empty($scriptsInline)) {
            $scriptsRendered .= $divider.self::jsEnclosure(implode($divider,
                        $scriptsInline));
        }

        if (!empty($ODRStack)) {
            $scriptsRendered .= $divider.
                self::jsEnclosure(
                    '$(document).ready(function () { '.implode($divider,
                        $ODRStack).' });'
            );
        }
        return $scriptsRendered;
    }

    
    
    /**
     * Get included and inline Syles Fragment rendered
     * 
     * @param array  $stylesArray
     * @param string $media
     * @param string $divider use '' for optimized output
     * 
     * @return string
     */
    static public function getStylesRendered(array $stylesArray,
                                             $media = 'screen', $divider = "\n")
    {
        $cascadeStyles         = [];
        $cascadeStylesIncludes = [];
        foreach ($stylesArray as $styleRes => $style) {
            if ($styleRes == $style) {
                $cascadeStylesIncludes[] = '<link href="'.$style.'" rel="stylesheet" type="text/css" media="'.$media.'" />';
            } else {
                $cascadeStyles[] = $style;
            }
        }
        return empty($stylesArray) ? '' :  implode($divider, $cascadeStylesIncludes).$divider.'<style>'.implode($divider,
                $cascadeStyles).'</style>';
    }

    /**
     * Renders the header of the HTML page.
     */
    public function draw()
    {
        $this->addItem(self::getStylesRendered(\Ease\WebPage::singleton()->cascadeStyles));
        parent::draw();
    }
}
