<?php

namespace Hager\TransformationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hager\TransformationBundle\Entity\ActionPlan;

/**
 * Action
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hager\TransformationBundle\Entity\ActionRepository")
 */
class Action
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
     * @var string
     *
     * @ORM\Column(name="activity", type="string", length=255)
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="leader", type="string", length=255)
     */
    private $leader;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date")
     */
    private $deadline;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Hager\TransformationBundle\Entity\ActionPlan")
	 * @ORM\JoinColumn(nullable=false)
	 */
	 private $actionPlan;


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
     * Set activity
     *
     * @param string $activity
     *
     * @return Action
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Action
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set leader
     *
     * @param string $leader
     *
     * @return Action
     */
    public function setLeader($leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return string
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Action
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set actionPlan
     *
     * @param \TransformationBundle\Entity\ActionPlan $actionPlan
     *
     * @return Action
     */
    public function setActionPlan(ActionPlan $actionPlan)
    {
        $this->actionPlan = $actionPlan;

        return $this;
    }

    /**
     * Get actionPlan
     *
     * @return \TransformationBundle\Entity\ActionPlan
     */
    public function getActionPlan()
    {
        return $this->actionPlan;
    }
}
