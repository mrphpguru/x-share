<?php

namespace Xshare\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection;
use Xshare\ProductBundle\Entity\Requests;

/**
 * Description of RequestFixtures
 *
 */
class RequestsFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     *
     * @param ObjectManager $manager 
     */
    public function load(ObjectManager $manager) {
        
        $firstDates  = array(new \DateTime('2012/06/11'),new \DateTime('2012/06/13'),new \DateTime('2012/06/15'),new \DateTime('2012/06/18'),new \DateTime('2012/06/20')); 
        $secondDates = array(new \DateTime('2012/06/20'),new \DateTime('2012/06/23'),new \DateTime('2012/06/25'),new \DateTime('2012/06/29'),new \DateTime('2012/06/27'));
        for($i=0;$i<20;$i++){
            $request = new Requests();
            $request->setBorrowDate($firstDates[mt_rand(0, count($firstDates)-1)]);
            $request->setProductId($manager->merge($this->getReference('p'.mt_rand(1,2)))->getProductId());
            $request->setReturnDate($secondDates[mt_rand(0, count($secondDates)-1)]);
            $user = $manager->merge($this->getReference('user'.mt_rand(0,4)));
            $request->setUserId($user->getUserId());
            $manager->persist($request);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 5;
    }
}

?>
