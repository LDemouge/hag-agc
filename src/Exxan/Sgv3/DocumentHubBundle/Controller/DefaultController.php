<?php

namespace Exxan\Sgv3\DocumentHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Sgv3DocBundle:Default:index.html.twig', array('name' => $name));
    }
}
