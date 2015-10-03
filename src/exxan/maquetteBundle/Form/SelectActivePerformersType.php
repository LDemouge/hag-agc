<?php

namespace exxan\maquetteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SelectActivePerformersType extends AbstractType
// devrait être en fait chargeContractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('performers', 'choice', array("choices" => array("c1"=> "Consultant 1", 'c2'=> 'Consultant 2')));
        
    }

    public function getName()
    {
        return 'SelectActivePerformers';
    }
}