<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Hager\TransformationBundle\Form\Type\AddActionPlanItemType;

/**
 * @Route("/app/action-plan")
 */

class ActionPlanController extends Controller
{
	/**
	 * @Route("/")
	 */
		
	public function indexAction()
	{
		return $this->render('TransformationBundle:Reporter:action-plan.html.twig');
	}
	
	/**
	 * @Route("/addItem", name="actionPlan_addItem", options={"expose"=true})
	 */
	public function addActionPlanItemAction()
	{
		//$form = $this->createForm(new AddInventoryItemType);
		
		//return $this->render('TransformationBundle:Inventory:addInventoryItem.html.twig', array('form' =>$form->createView()));
		return $this->render('TransformationBundle:ActionPlan:addItem.html.twig');
		
	}
	
	public function removeInventoryItem()
	{
		
	}
	
}
