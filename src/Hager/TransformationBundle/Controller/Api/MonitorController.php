<?php

namespace Hager\TransformationBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 *  @Route("/api/monitor")
 */

class MonitorController extends Controller
{
	
	/**
	 * @Route("/load", name="api_monitor_load", options={"expose"=true})
	 *	@Method("GET")
	 */	
	public function loadAction(Request $request)
	{
		$cartoLoader = $this->get('transformation.carto_loader');
		$carto = $cartoLoader->load();
		
		return new JsonResponse($carto);
		
		//return new Response($data['leader']);
		
	}
}
