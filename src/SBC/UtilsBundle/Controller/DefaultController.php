<?php

namespace SBC\UtilsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UtilsBundle:Default:index.html.twig');
    }
}
