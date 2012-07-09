<?php

namespace Xshare\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Xshare\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

/**
 * Description of UserFixtures
 *
 * @author vmoroi
 */
class UserFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager)
    {
        //simple user
        $user1 = new User();
        $user1->setActive(1);
        $user1->setBirthDate('11/07/1989');
        $user1->setEmail('xshare@xshare.com');
        $user1->setFirstname('xshare');
        $user1->setLastname('xshare');
        $user1->setPassword('xshare');
        
        $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
        $password = $encoder->encodePassword($user1->getPassword(), $user1->getSalt());
        $user1->setPassword($password);        
        
        $user1->setPhone('079256354');
        $user1->setSex('m');
        $user1->setTypeAccess('user');
        $user1->setUsername('xshare');
        $manager->persist($user1);        
        
        //admin user
        $user2 = new User();
        $user2->setActive(1);
        $user2->setBirthDate('22/08/1985');
        $user2->setEmail('admin@admin.com');
        $user2->setFirstname('admin');
        $user2->setLastname('admin');
        $user2->setPassword('admin');
        
        $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
        $password = $encoder->encodePassword($user2->getPassword(), $user2->getSalt());
        $user2->setPassword($password);        
        
        $user2->setPhone('77777774');
        $user2->setSex('m');
        $user2->setTypeAccess('admin');
        $user2->setUsername('admin');
        $manager->persist($user2);
        
        $sex = array('w','m');
        $uarr=array();
        for($i=0;$i<5;$i++){
            //simple user
            $user = new User();
            $user->setActive(1);
            $user->setBirthDate('17/08/198'.$i);
            $user->setEmail('exemple'.$i.'@email.com');
            $user->setFirstname('User'.$i);
            $user->setLastname('User'.$i);
            $user->setPassword('1');

            $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);        

            $user->setPhone('111111111');
            $user->setSex($sex[mt_rand(0,1)]);
            $user->setTypeAccess('user');
            $user->setUsername('user'.$i);
            $uarr[]=$user;
            $manager->persist($user);
        }
        
        $manager->flush();
        foreach($uarr as $k=>$u)$this->addReference('user'.$k, $u);
        $this->addReference('xshare', $user1);
        $this->addReference('admin', $user2);
        
        /*$this->addReference('user0', $user3);
        $this->addReference('user1', $user4);
        $this->addReference('user2', $user5);
        $this->addReference('user3', $user6);
        $this->addReference('user4', $user7);*/
    }
    
    public function getOrder()
    {
        return 1;
    }  
    
}

?>