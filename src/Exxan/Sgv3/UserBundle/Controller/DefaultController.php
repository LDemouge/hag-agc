<?php

namespace Exxan\Sgv3\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Sgv3UserBundle:Default:index.html.twig', array('name' => $name));
    }
}
