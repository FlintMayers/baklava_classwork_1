<?php

namespace AppBundle\Markdown;

use Parsedown;

class MarkdownConverter
{
    public function convert($name)
    {
        $Parsedown = new Parsedown();
        return $Parsedown->text($name);
    }

}