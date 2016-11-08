<?php

namespace AdminBundle\Twig;

class AdminExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('extract', array($this, 'extractFilter')),
        );
    }

    public function extractFilter($string = "", $regex = "/(.*)/")
    {
        $matchs = array();
        if (preg_match($regex, $string, $matchs)) {
            return $matchs[1];
        }
        return null;
    }

    public function getName()
    {
        return 'admin_extension';
    }
}