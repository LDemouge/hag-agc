<?php

namespace Hager\TransformationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Hager\TransformationBundle\Entity\User;

class Users implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User('laurent', 'laurentpass', null, array('ROLE_REPORTER'));
        
        $manager->persist($userAdmin);
        $manager->flush();
    }
}