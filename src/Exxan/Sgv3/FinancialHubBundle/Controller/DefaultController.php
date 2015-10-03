<?php

namespace Exxan\Sgv3\FinancialHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('sgcv3FinancialBundle:Default:index.html.twig', array('name' => $name));
    }
}
