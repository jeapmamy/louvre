<?php

namespace JV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JVCoreBundle:Default:index.html.twig');
    }
}
