<?php

namespace AppBundle\Twig;

class ParsedownExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('parsedown', array($this, 'parsedownFilter')),
        );
    }

    public function parsedownFilter($text)
    {

        $parsedown = new \Parsedown();
        $parsedText = $parsedown->text($text);

        return $parsedText;
    }
}