<?php

namespace Hager\TransformationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
	 public function buildForm(FormBuilderInterface $builder, array $options)
	 {
	 	$builder->add('user', 'text', array('attr'=>array('placeholder'=>'Enter your username ...[reporter | supervisor]', 'name'=>'_username')))
				->add('password', 'text', array('attr'=>array('placeholder'=>'Enter your password ...[reporter | supervisor]')));
				//->add('login', 'submit');
				//->add('transfer', 'submit')
				//->add('keep', 'submit')
				//->add('later', 'submit');
				
	 }
	 
	 public function getName()
	 {
	 	return 'login';
	 }
}
