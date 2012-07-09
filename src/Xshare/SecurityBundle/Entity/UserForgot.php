<?php

namespace Xshare\SecurityBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @Assert\Callback(methods={{"Xshare\SecurityBundle\UsernameValidatorClass", "isUsernameValid"}})
 */
class  UserForgot implements UserInterface
{    
    /**
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $username;
    
    
    
    /**
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $password;
    
    private $salt;
    
    /**
     * the contructor 
     */
    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
    }
    
    /**
     * sets the username
     * @param type $login - username
     */
    public function setUsername($login)
    {
        $this->username = $login;
    }
    
    /**
     * sets salt
     * @param type $salt 
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
    
    /**
     * sets the password
     * @param type $password 
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * returns the username
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * returns salt
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * returns the password
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * returns the roles of the user
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * checks the username
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }
    
}