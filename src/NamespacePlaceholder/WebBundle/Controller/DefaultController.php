<?php

namespace NamespacePlaceholder\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NamespacePlaceholderWebBundle:Default:index.html.twig');
    }
}
