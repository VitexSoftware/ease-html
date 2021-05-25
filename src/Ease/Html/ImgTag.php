<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * IMG tag class.
 */
class ImgTag extends Tag
{

    /**
     * Html Image.
     *
     * @param string $image         image URL
     * @param string $alt           alternat name for text only browsers
     * @param array  $properties IMG tag properties
     */
    public function __construct($image, $alt = null, $properties = [])
    {
        $properties['src'] = $image;
        if (isset($alt)) {
            $properties['alt'] = $alt;
        }
        parent::__construct('img', $properties);
    }

    /**
     * Generate base64 for img src from file.
     * 
     * @param string $imgFileName source image path 
     * 
     * @return string
     */
    public static function fileBase64src($imgFileName)
    {
        return self::base64src(file_get_contents($imgFileName), mime_content_type($imgFileName));
    }

    /**
     * Convert. 
     * 
     * @param string $imgRawData   raw image data
     * @param string $contentType  mime type eg. image/gif
     * 
     * @return type
     */
    public static function base64src($imgRawData, $contentType)
    {
        return 'data: ' . $contentType . ';base64,' . base64_encode($imgRawData);
    }
}
