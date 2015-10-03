<?php

namespace Exxan\Sgv3\HumanRessourcesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('sgv3HrBundle:Default:index.html.twig', array('name' => $name));
    }
}
