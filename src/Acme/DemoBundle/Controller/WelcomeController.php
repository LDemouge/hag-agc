<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
		$tenant = $this->get('acme.demo.tenant_greeter')->greet();
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig', array('tenant'=>$tenant));
    }
}
