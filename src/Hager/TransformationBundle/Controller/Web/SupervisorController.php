<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/app/supervisor")
 */

class SupervisorController extends Controller
{
	
	
	/**
	 * @Route ("/", name="supervisor_home", options={"expose"=true})
	 */
	 public function homeAction()
	 {
	 	return new Response("<h1>Supervisors'app - Home</h1>");
	 }
	 
	
	
}
