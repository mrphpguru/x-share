<?php

namespace Xshare\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Xshare\PollBundle\Entity\Poll;

/**
 * Description of CategoryFixtures
 *
 * @author vmoroi
 */
class PollFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     * creates Category objects and saves them to the BD
     * @param ObjectManager $manager 
     */
    public function load(ObjectManager $manager) {
    
        $poll1 = new Poll();
        $poll1->setQuestion("What is the best Framework?");
        $poll1->setAnswers("ZendFramework | Symfony2 | CodeIgniter | YiiFramework");
        $poll1->setExpiredAt("2012-07-20");
        $poll1->setStatus(1);
        $manager->persist($poll1);
        
        $poll2 = new Poll();
        $poll2->setQuestion("What do you think about www.xshare.com?");
        $poll2->setAnswers("Very good site | Nice | Not very interesting | Worst site ever seen!");
        $poll2->setExpiredAt("2012-07-20");
        $poll2->setStatus(1);
        $manager->persist($poll2);
        
        $manager->flush();
    }
    
    /**
     * sets the order of execution of the fixture Class
     * @return int 
     */
    public function getOrder()
    {
        return 6;
    }
    
}