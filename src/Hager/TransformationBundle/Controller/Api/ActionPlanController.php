<?php

namespace Hager\TransformationBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 *  @Route("/api/action-plan")
 */

class ActionPlanController extends Controller
{
	
	/**
	 * @Route("/add-item", name="api_actionPlan_addItem", options={"expose"=true})
	 *	@Method("POST")
	 */	
	public function addItem(Request $request)
	{
		$data = $request->getContent();
		$username = $this->getUser()->getUsername();
		
		$response = new Response();
		$response->setContent(json_encode($username));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
		
		//return new Response($data['leader']);
		
	}
}
