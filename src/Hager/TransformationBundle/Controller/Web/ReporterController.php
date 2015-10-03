<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Hager\TransformationBundle\Form\Type\AddInventoryItemType;

/**
 * @Route("/app/reporter")
 */

class ReporterController extends Controller
{
	/**
	 * @Route("/", name="reporter")
	 */
		
	public function startAction()
	{
		return $this->render('TransformationBundle::reporter.html.twig');
	}
	
	/**
	 * @Route ("/home", name="reporter_home", options={"expose"=true})
	 */
	 public function homeAction()
	 {
	 	return $this->render('TransformationBundle:Reporter:home.html.twig');
	 }
	 
	 /**
	 * @Route ("/inventory", name="reporter_inventory", options={"expose"=true})
	 */
	 public function inventoryAction()
	 {
	 	$response = $this->forward('TransformationBundle:Web/Inventory:index');
		return $response;
		
	 }
	 
	 /**
	 * @Route ("/functionning-target", name="reporter_functionningTarget", options={"expose"=true})
	 */
	 public function functionningTargetAction()
	 {
	 	return $this->render('TransformationBundle:Reporter:functionning-target.html.twig');
	 }
	 
	 /**
	 * @Route ("/action-plan", name="reporter_actionPlan", options={"expose"=true})
	 */
	 public function actionPlanAction()
	 {
	 	return $this->render('TransformationBundle:Reporter:action-plan.html.twig');
	 }
	 
	 /**
	 * @Route ("/hr-plan", name="reporter_hrPlan", options={"expose"=true})
	 */
	 public function hrPlanAction()
	 {
	 	return $this->render('TransformationBundle:Reporter:hr-plan.html.twig');
	 }
	 
	
	/**
	 * @Route("/addItem")
	 */
	public function addInventoryItem()
	{
		$form = $this->createForm(new AddInventoryItemType);
		
		return $this->render('TransformationBundle:Inventory:addInventoryItem.html.twig', array('form' =>$form->createView()));
		
	}
	
	public function removeInventoryItem()
	{
		
	}
	
}
