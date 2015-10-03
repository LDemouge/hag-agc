<?php

namespace exxan\maquetteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdjustOrdoItemType extends AbstractType
// devrait être en fait chargeContractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('jour', 'number')
        		->add('collabId', new SelectActivePerformersType())
				->add('InvoicingDateRange', 'hidden')
				->add('contractId', 'hidden');
    }

    public function getName()
    {
        return 'AdjustOrdoItem';
    }
}