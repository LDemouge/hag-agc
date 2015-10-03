<?php

namespace Hager\TransformationBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Hager\TransformationBundle\Command\UserLoginCommand;
use Hager\TransformationBundle\Form\Type\LoginType;

class PublicController extends Controller
{
    /**
	 * @Route("/", name="transformation_home")
	 */	
	public function homeAction()
    {
        $form = $this->createForm(new LoginType(), new UserLoginCommand(), array(
    											'action' => $this->generateUrl('login_check'),
    											'method' => 'POST',
												)
									);
										
        //return $this->render('TransformationBundle::public.html.twig', array('form'=>$form->createView()));
        
         $authenticationUtils = $this->get('security.authentication_utils');

    		// get the login error if there is one
   		 $error = $authenticationUtils->getLastAuthenticationError();

    		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

    	return $this->render('TransformationBundle::public.html.twig', array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        	));
        
        
    }
	
	/**
	 * @Route("/login", name="transformation_login_form")
	 */
	public function loginAction()
	{
		
		$form = $this->createForm(new LoginType(), new UserLoginCommand());
		return $this->render('TransformationBundle::login.html.twig', array('form' => $form->createView()));
	}
	
	/**
	 * @Route("/login_ckeck", name="login_check")
	 */
	public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }
	
	/**
	 * @Route("/login_success", name="login_success")
	 */
	public function loginSuccessAction()
	{
		//$this->denyAccessUnlessGranted('ROLE_REPORTER', 'ROLE_SUPERVISOR');
		
		 if ($this->get('security.context')->isGranted('ROLE_REPORTER')) {
      	
      		return $this->redirectToRoute('reporter');
		 }
		 
		 if ($this->get('security.context')->isGranted('ROLE_SUPERVISOR')) {
      	
      		return $this->redirectToRoute('supervisor_home');
		 }
		 
		 return new Response($this->createAccessDeniedException());
	}
	
	/**
	 * @Route("/logout", name="logout")
	 */
	public function logoutAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }
}
