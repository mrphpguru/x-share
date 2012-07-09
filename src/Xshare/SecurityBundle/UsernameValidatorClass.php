<?php

namespace Xshare\SecurityBundle;

use Symfony\Component\Validator\ExecutionContext;
use Xshare\SecurityBundle\Entity\UserForgot;
use Xshare\UserBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;

class UsernameValidatorClass
{
    static public function isUsernameValid(UserForgot $user, ExecutionContext $context)
    {
        //get all usernames from the DB
        $em = XshareSecurityBundle::getContainer()->get('doctrine')->getEntityManager('default'); 
 
        $entities = $em->getRepository('XshareUserBundle:User')->getAllUsernameValues();
        $usernames = array();
        foreach ($entities as $value){
           $usernames[] = $value['username'];
        }
        
        // check if the username is actualy in the database
        if (!in_array($user->getUsername(), $usernames)) {
            $propertyPath = $context->getPropertyPath() . '.username';
            $context->setPropertyPath($propertyPath);
            $context->addViolation('username_invalid', array(), null);
        }
    }
}
