<?php

namespace exxan\maquetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GoController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('goBundle:Default:index.html.twig', array('name' => $name));
    }
	
	public function adjustOrdoItemAction()
	{
		$form = $this->createForm('AdjustOrdoItem');
		$form->add('submit', 'submit');
		
		return $this->render('goBundle::adjustOrdoItem.html.twig', array('form' =>$form->createView()));
		
		//return $this->render('goBundle:Default:index.html.twig', array('name' => $collabId));
	}
	
	public function employeesListAction()
	{
		return $this->render('goBundle::employeesList.html.twig');
	}
	
	public function employeesListPartialAction()
	{
		return $this->render('goBundle:partials:list.html.twig');
	}
	
	public function renderFormAction()
	{
		$form = $this->createForm('AdjustOrdoItem');
		//$form->add('Ajuster', 'submit');
		
		return $this->render('goBundle::form.html.twig', array('form' =>$form->createView()));
		//return $this->render('goBundle::form.html.twig');
	}
	
	public function syntheseProposalsAction()
	{
		return $this->render('goBundle::synthese.html.twig');
	}
}
