<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Hager\TransformationBundle\Form\Type\AddInventoryItemType;

/**
 * @Route("/app/target")
 */

class TargetController extends Controller
{
	/**
	 * @Route("/")
	 */
		
	public function indexAction()
	{
		return $this->render('TransformationBundle:Inventory:inventory.html.twig');
	}
	
	/**
	 * @Route("/add-item", name="add_target", options={"expose"=true})
	 */
	public function addInventoryItemAction()
	{
		//$form = $this->createForm(new AddInventoryItemType);
		
		//return $this->render('TransformationBundle:Inventory:addInventoryItem.html.twig', array('form' =>$form->createView()));
		return $this->render('TransformationBundle:Target:addTarget.html.twig');
		
	}
	
	public function removeInventoryItem()
	{
		
	}
	
}
