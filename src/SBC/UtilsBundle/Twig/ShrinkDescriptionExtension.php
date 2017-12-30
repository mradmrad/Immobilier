<?php
namespace SBC\UtilsBundle\Twig;


class ShrinkDescriptionExtension extends \Twig_Extension
{

    public function getFunctions(){
        return array(
            new \Twig_SimpleFunction('shrink', array($this, 'shrinkDescription')),
        );
    }

    public function shrinkDescription($description, $maxLength = 150){
        $shrank = strip_tags(html_entity_decode($description));
        if(strlen($shrank) > $maxLength){
            $shrank = substr($shrank, 0, $maxLength).'...';
        }

        echo $shrank;
    }

    public function getName()
    {
        return 'shrink_text_extension';
    }

}