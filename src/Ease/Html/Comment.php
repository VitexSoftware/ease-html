<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * Description of a Comment.
 */
class Comment extends Tag
{
    /**
     * Tag type - f.e. A or STRONG.
     *
     * @var string
     */
    public $tagType = '!--';

    /**
     * Trailing for xhtml.
     *
     * @var string
     */
    public $trail = ' --';

    /**
     * 
     * @param string $comment
     */
    public function __construct($comment)
    {
        parent::__construct('!--', [$comment]);
    }
}
