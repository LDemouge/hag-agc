<?php

namespace Exxan\Sgv3\DirectoryHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Sgv3DirectoryBundle:Default:index.html.twig', array('name' => $name));
    }
}
