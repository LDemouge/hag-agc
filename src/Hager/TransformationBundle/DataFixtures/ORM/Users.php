<?php

namespace Hager\TransformationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Hager\TransformationBundle\Entity\User;

class Users extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = array(
        	array('laurent', 'laurentpass', null, array('ROLE_REPORTER')),
			array('erwan', 'erwanpass', null, array('ROLE_REPORTER')),
			array('francois', 'francoispass', null, array('ROLE_REPORTER'))
			);
        
		foreach($users as $i=>$user)
		{
			$list[$i] = new User();
			$list[$i]->setUsername($user[0])
				->setPassword($user[1])
				->setSalt($user[2])
				->setRoles($user[3]);
			$manager->persist($list[$i]);
		}
        
        $manager->flush();
		
		foreach($list as $i=>$user)
		{
			$this->addReference($i, $user);
		}
    }
	
	public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}