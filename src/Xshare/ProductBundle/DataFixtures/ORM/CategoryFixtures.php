<?php

namespace Xshare\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Xshare\ProductBundle\Entity\Category;

/**
 * Description of CategoryFixtures
 *
 * @author vmoroi
 */
class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     * creates Category objects and saves them to the BD
     * @param ObjectManager $manager 
     */
    public function load(ObjectManager $manager) {
    
        $category1 = new Category();
        $category1->setName("Carti");
        $category1->setDescription("Categorie pentru toate cartile");
        $category1->setStatus("1");
        $category1->setUser($manager->merge($this->getReference('user0')));
        $manager->persist($category1);
        
        $category2 = new Category();
        $category2->setName("Filme");
        $category2->setDescription("Categorie pentru toate filmele");
        $category2->setStatus("1");
        $category2->setUser($manager->merge($this->getReference('user1')));
        $manager->persist($category2);
        
        $category3 = new Category();
        $category3->setName("Muzica");
        $category3->setDescription("Categorie pentru toata muzica");
        $category3->setStatus("1");
        $category3->setUser($manager->merge($this->getReference('user2')));
        $manager->persist($category3);
        
        $manager->flush();
        
        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);
        $this->addReference('category-3', $category3);
    }
    
    /**
     * sets the order of execution of the fixture Class
     * @return int 
     */
    public function getOrder()
    {
        return 2;
    }
    
}
