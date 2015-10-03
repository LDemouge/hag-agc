<?php

namespace Hager\TransformationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionPlan
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ActionPlan
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
	 * @ORM\Column(name="validatedBy", type="string")
	 */
	 private $validatedBy;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

