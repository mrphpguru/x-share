<?php

namespace Xshare\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Xshare\ProductBundle\Entity\SearchStatistics;

/**
 * Description of SearchStatisticsFixtures
 *
 * @author cchiu
 */
class SearchStatisticsFixtures extends AbstractFixture {
    
    /**
     * creates SearchStatistics objects and saves them to the BD
     * @param ObjectManager $manager 
     */
    public function load(ObjectManager $manager) {
    
        $search1 = new SearchStatistics();
        $search1->setKeywordSearch('cărți');
        $manager->persist($search1);
        
        $search2 = new SearchStatistics();
        $search2->setKeywordSearch('filme');
        $manager->persist($search2);
        
        $search3 = new SearchStatistics();
        $search3->setKeywordSearch('muzică');
        $manager->persist($search3);
        
        $search4 = new SearchStatistics();
        $search4->setKeywordSearch('Necromonicon');
        $manager->persist($search4);
        
        $search5 = new SearchStatistics();
        $search5->setKeywordSearch('Necromonicon');
        $manager->persist($search5);
        
        $search6 = new SearchStatistics();
        $search6->setKeywordSearch('Necromonicon');
        $manager->persist($search6);
        
        $search7 = new SearchStatistics();
        $search7->setKeywordSearch('filme');
        $manager->persist($search7);
        
        $search8 = new SearchStatistics();
        $search8->setKeywordSearch('filme');
        $manager->persist($search8);
        
        $search9 = new SearchStatistics();
        $search9->setKeywordSearch('Naufragiatii');
        $manager->persist($search9);
        
        $search10 = new SearchStatistics();
        $search10->setKeywordSearch('carti');
        $manager->persist($search10);
        
        $search11 = new SearchStatistics();
        $search11->setKeywordSearch('Bowling Plaza');
        $manager->persist($search11);
        
        $search12 = new SearchStatistics();
        $search12->setKeywordSearch('filme');
        $manager->persist($search12);
        
        $search13 = new SearchStatistics();
        $search13->setKeywordSearch('Naufragiatii');
        $manager->persist($search13);
        
        $search14 = new SearchStatistics();
        $search14->setKeywordSearch('Necromonicon');
        $manager->persist($search14);
        
        $search15 = new SearchStatistics();
        $search15->setKeywordSearch('Bowling Plaza');
        $manager->persist($search15);
        
        
        $manager->flush();
        
        $this->addReference('search-1', $search1);
        $this->addReference('search-2', $search2);
        $this->addReference('search-3', $search3);
        $this->addReference('search-4', $search4);
        $this->addReference('search-5', $search5);
        $this->addReference('search-6', $search6);
        $this->addReference('search-7', $search7);
        $this->addReference('search-8', $search8);
        $this->addReference('search-9', $search9);
        $this->addReference('search-10', $search10);
        $this->addReference('search-11', $search11);
        $this->addReference('search-12', $search12);
        $this->addReference('search-13', $search13);
        $this->addReference('search-14', $search14);
        $this->addReference('search-15', $search15);
    }
    
}

