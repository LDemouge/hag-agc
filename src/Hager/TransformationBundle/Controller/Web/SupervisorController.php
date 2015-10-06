<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/application/supervisor")
 */

class SupervisorController extends Controller
{
	
	
	/**
	 * @Route ("/", name="supervisor_home", options={"expose"=true})
	 */
	 public function homeAction()
	 {
	 	$cartoLoader = $this->get('transformation.carto_loader');
		$carto = $cartoLoader->load();

					
		
	 	return $this->render('TransformationBundle::supervisor.html.twig', array('user'=>$this->getUser()->getUsername(), 'carto'=>$carto));
	 }
	
	/**
	 * @Route ("/cartography", name="supervisor_cartography", options={"expose"=true})
	 */
	public function cartographyAction()
	{
		return $this->render('TransformationBundle::cartography.html.twig');
	}
}
