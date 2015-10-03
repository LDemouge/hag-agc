<?php

namespace Hager\TransformationBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User implements UserInterface, EquatableInterface
{
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
		 
	 /**
	 * @ORM\Column(name="username", type="string", length=255, unique=true)
	 */
    private $username;
	
	/**
	 * @ORM\Column(name="password", type="string", length=255, unique=true)
	 */
    private $password;
	
	/**
	 * @ORM\Column(name="salt", type="string", length=255, unique=true)
	 */
    private $salt;
	
	/**
	 * @ORM\Column(name="roles", type="array")
	 */
    private $roles = array();
	
	/**
	 * @ORM\Column(name="apikey", type="string", length=255, unique=true)
	 */
	private $apikey;

    public function __construct($username, $password, $salt = null, array $roles = array())
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = '';
        $this->roles = $roles;
		$this->apikey = '95e80a0c-6830-11e5-9d70-feff819cdc9f';
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}