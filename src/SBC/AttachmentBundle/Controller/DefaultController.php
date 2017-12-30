<?php

namespace SBC\AttachmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AttachmentBundle:Default:index.html.twig');
    }
}
