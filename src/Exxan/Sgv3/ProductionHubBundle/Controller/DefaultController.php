<?php

namespace Exxan\Sgv3\ProductionHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('sgv3ProdBundle:Default:index.html.twig', array('name' => $name));
    }
}
