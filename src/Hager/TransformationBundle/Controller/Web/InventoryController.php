<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Hager\TransformationBundle\Form\Type\AddInventoryItemType;

/**
 * @Route("/application/inventory")
 */

class InventoryController extends Controller
{
	/**
	 * @Route("/")
	 */
		
	public function indexAction()
	{
		return $this->render('TransformationBundle:Inventory:inventory.html.twig');
	}
	
	/**
	 * @Route("/add-item", name="inventory_addItem", options={"expose"=true})
	 */
	public function addInventoryItemAction()
	{
		//$form = $this->createForm(new AddInventoryItemType);
		
		//return $this->render('TransformationBundle:Inventory:addInventoryItem.html.twig', array('form' =>$form->createView()));
		return $this->render('TransformationBundle:Inventory:addInventoryItem.html.twig');
		
	}
	
	public function removeInventoryItem()
	{
		
	}
	
}
