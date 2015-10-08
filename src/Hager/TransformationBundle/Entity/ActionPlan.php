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
     * @var boolean
     *
     * @ORM\Column(name="complete", type="boolean")
     */
    private $complete = false;
	
	/**
	 * @ORM\Column(name="validatedBy", type="string", nullable=true)
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

    /**
     * Set validatedBy
     *
     * @param string $validatedBy
     *
     * @return ActionPlan
     */
    public function setValidatedBy($validatedBy)
    {
        $this->validatedBy = $validatedBy;

        return $this;
    }

    /**
     * Get validatedBy
     *
     * @return string
     */
    public function getValidatedBy()
    {
        return $this->validatedBy;
    }

    /**
     * Set complete
     *
     * @param boolean $complete
     *
     * @return ActionPlan
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;

        return $this;
    }

    /**
     * Get complete
     *
     * @return boolean
     */
    public function getComplete()
    {
        return $this->complete;
    }
}
