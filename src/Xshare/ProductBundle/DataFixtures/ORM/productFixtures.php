<?php

namespace Xshare\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection;
use Xshare\ProductBundle\Entity\Product;

/**
 * Description of productFixtures
 *
 * @author vmoroi
 */
class productFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     * creates Product objects and saves them into the BD
     * @param ObjectManager $manager 
     */
    public function load(ObjectManager $manager)
    {
        
        $product1 = new Product();
        $product1->setName("A Gentle Introduction to symfony 1.4");
        $product1->setDescription("Autori: Fabien Potencier, François Zaninotto. This book introduces you to symfony, the leading framework for PHP developers, showing you how to wield its many features to develop web applications faster and more efficiently, even if you only know a bit of PHP. ");
        $product1->setUser($manager->merge($this->getReference('xshare')));
        $product1->setCategory($manager->merge($this->getReference('category-1')));
        $product1->setStatus(1);
        $manager->persist($product1);
        
        $product2 = new Product();
        $product2->setName("The Avengers");
        $product2->setDescription("Regizor: Joss Whedon. Nick Fury of S.H.I.E.L.D. brings together a team of super humans to form The Avengers to help save the Earth from Loki and his army.");
        $product2->setUser($manager->merge($this->getReference('xshare')));
        $product2->setCategory($manager->merge($this->getReference('category-2')));
        $product2->setStatus(1);
        $manager->persist($product2);
        
        $product3 = new Product();
        $product3->setName("Invincible");
        $product3->setDescription("Michael Jackson album. Invincible was released 29th/30th October 2001 and featured 16 new tracks. ");
        $product3->setUser($manager->merge($this->getReference('xshare')));
        $product3->setCategory($manager->merge($this->getReference('category-3')));
        $product3->setStatus(1);
        $manager->persist($product3);
        
        
        //movies product
        $product4 = new Product();
        $product4->setName("The Shawshank Redemption");
        $product4->setDescription("Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.");
        $product4->setUser($manager->merge($this->getReference('user0')));
        $product4->setCategory($manager->merge($this->getReference('category-2')));
        $product4->setStatus(1);
        $product4->setImage('shawshank.jpg');
        $manager->persist($product4);
        
        $product5 = new Product();
        $product5->setName("The Godfather");
        $product5->setDescription("The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son. ");
        $product5->setUser($manager->merge($this->getReference('user1')));
        $product5->setCategory($manager->merge($this->getReference('category-2')));
        $product5->setStatus(1);
        $product5->setImage('godfather.jpg');
        $manager->persist($product5);
        
        $product6 = new Product();
        $product6->setName("The Godfather: Part II");
        $product6->setDescription("The early life and career of Vito Corleone in 1920s New York is portrayed while his son, Michael, expands and tightens his grip on his crime syndicate stretching from Lake Tahoe, Nevada to pre-revolution 1958 Cuba. ");
        $product6->setUser($manager->merge($this->getReference('user1')));
        $product6->setCategory($manager->merge($this->getReference('category-2')));
        $product6->setStatus(1);
        $product6->setImage('godfather2.jpg');
        $manager->persist($product6);
        
        
        $product7 = new Product();
        $product7->setName("Pulp Fiction");
        $product7->setDescription("The lives of two mob hit men, a boxer, a gangster's wife, and a pair of diner bandits intertwine in four tales of violence and redemption. ");
        $product7->setUser($manager->merge($this->getReference('user4')));
        $product7->setCategory($manager->merge($this->getReference('category-2')));
        $product7->setStatus(1);
        $product7->setImage('pulpfiction.jpg');
        $manager->persist($product7);
        
        
        $product8 = new Product();
        $product8->setName("The Good, the Bad and the Ugly");
        $product8->setDescription("A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.");
        $product8->setUser($manager->merge($this->getReference('user3')));
        $product8->setCategory($manager->merge($this->getReference('category-2')));
        $product8->setStatus(1);
        $product8->setImage('good-bad-ugly.jpg');
        $manager->persist($product8);
        
        
        $product9 = new Product();
        $product9->setName("12 Angry Men");
        $product9->setDescription("A dissenting juror in a murder trial slowly manages to convince the others that the case is not as obviously clear as it seemed in court. ");
        $product9->setUser($manager->merge($this->getReference('user0')));
        $product9->setCategory($manager->merge($this->getReference('category-2')));
        $product9->setStatus(1);
        $product9->setImage('angry-men.jpg');
        $manager->persist($product9);
        
        
        $product10 = new Product();
        $product10->setName("Schindler's List");
        $product10->setDescription("In Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis. ");
        $product10->setUser($manager->merge($this->getReference('user3')));
        $product10->setCategory($manager->merge($this->getReference('category-2')));
        $product10->setStatus(1);
        $product10->setImage('schinderslist.jpg');
        $manager->persist($product10);
        
        
        $product11 = new Product();
        $product11->setName("The Dark Knight");
        $product11->setDescription("When Batman, Gordon and Harvey Dent launch an assault on the mob, they let the clown out of the box, the Joker, bent on turning Gotham on itself and bringing any heroes down to his level. ");
        $product11->setUser($manager->merge($this->getReference('user4')));
        $product11->setCategory($manager->merge($this->getReference('category-2')));
        $product11->setStatus(1);
        $product11->setImage('dark-knight.jpg');
        $manager->persist($product11);
        
        $product12 = new Product();
        $product12->setName("The Lord of the Rings: The Return of the King");
        $product12->setDescription("Aragorn leads the World of Men against Sauron's army to draw the dark lord's gaze from Frodo and Sam who are on the doorstep of Mount Doom with the One Ring. ");
        $product12->setUser($manager->merge($this->getReference('user4')));
        $product12->setCategory($manager->merge($this->getReference('category-2')));
        $product12->setStatus(1);
        $product12->setImage('lord-rings.jpg');
        $manager->persist($product12);
        
        $product13 = new Product();
        $product13->setName("One Flew Over the Cuckoo's Nest");
        $product13->setDescription("Upon arrival at a mental institution, a brash rebel rallies the patients together to take on the oppressive Nurse Ratched, a woman more a dictator than a nurse. ");
        $product13->setUser($manager->merge($this->getReference('user3')));
        $product13->setCategory($manager->merge($this->getReference('category-2')));
        $product13->setStatus(1);
        $product13->setImage('flewover.jpg');
        $manager->persist($product13);
        
        
        $product14 = new Product();
        $product14->setName("Star Wars: Episode V - The Empire Strikes Back");
        $product14->setDescription("As Luke trains with Master Yoda to become a Jedi, his friends evade the Imperial fleet under the command of Darth Vader who is obsessed with turning Skywalker to the Dark Side.");
        $product14->setUser($manager->merge($this->getReference('user4')));
        $product14->setCategory($manager->merge($this->getReference('category-2')));
        $product14->setStatus(1);
        $product14->setImage('star-wars.jpg');
        $manager->persist($product14);
        
        $product15 = new Product();
        $product15->setName("Fight Club");
        $product15->setDescription("An insomniac office worker and a devil-may-care soap maker form an underground fight club that transforms into a violent revolution.");
        $product15->setUser($manager->merge($this->getReference('user1')));
        $product15->setCategory($manager->merge($this->getReference('category-2')));
        $product15->setStatus(1);
        $product15->setImage('Fight-club.jpg');
        $manager->persist($product15);
        
        
        //books products
        $product16 = new Product();
        $product16->setName("Information Technology: An Introduction");
        $product16->setDescription("This book is an introduction to the current concepts, applications and tools of information technology. No previous knowledge of the underlying and engineering ideas is required, making it invaluable to specialists and non-specialists alike. \n Authors: Peter Zorkoczy, Nicholas Heap, Nick W Heap");
        $product16->setUser($manager->merge($this->getReference('user1')));
        $product16->setCategory($manager->merge($this->getReference('category-1')));
        $product16->setStatus(1);
        $product16->setImage('ITintro.jpg');
        $manager->persist($product16);
        
        $product17 = new Product();
        $product17->setName("Case Study Research: Design and Methods");
        $product17->setDescription("This new edition of the best-selling Case Study Research has been carefully revised, updated, and expanded while retaining virtually all of the features and coverage of the Second Edition. Robert Yin's comprehensive presentation covers all aspects of the case study method--from problem definition, design, and data collection, to data analysis and composition and reporting. Yin also traces the uses and importance of case studies to a wide range of disciplines, from sociology, psychology and history to management, planning, social work, and education. \n Author: Robert K. Yin");
        $product17->setUser($manager->merge($this->getReference('user0')));
        $product17->setCategory($manager->merge($this->getReference('category-1')));
        $product17->setStatus(1);
        $product17->setImage('case-study-research.jpg');
        $manager->persist($product17);
        
        
        $product18 = new Product();
        $product18->setName("PHP: A Beginner's Guide");
        $product18->setDescription("Essential Skills--Made Easy!</p><p>Learn how to build dynamic, data-driven Web applications using PHP. Covering the latest release of this cross-platform, open-source scripting language, PHP: A BeginnerAnd's Guide teaches you how to write basic PHP programs and enhance them with more advanced features such as MySQL and SQLite database integration, XML input, and third-party extensions. This fast-paced tutorial provides one-stop coverage of software installation, language syntax and data structures, flow control routines, built-in functions, and best practices. \n Author: Vikram Vaswani");
        $product18->setUser($manager->merge($this->getReference('user0')));
        $product18->setCategory($manager->merge($this->getReference('category-1')));
        $product18->setStatus(1);
        $product18->setImage('php-guide.jpg');
        $manager->persist($product18);
        
        
        $product19 = new Product();
        $product19->setName("Beginning Zend Framework");
        $product19->setDescription("The Zend Framework is one of today’s most popular PHP–based web application development frameworks. Beginning Zend Framework is a beginner’s guide to learning and using the Zend Framework. It covers everything from the installation to the various features of the framework to get the reader up and running quickly. \n Author: Armando Padilla");
        $product19->setUser($manager->merge($this->getReference('user4')));
        $product19->setCategory($manager->merge($this->getReference('category-1')));
        $product19->setStatus(1);
        $product19->setImage('zend.jpg');
        $manager->persist($product19);
        
        $product20 = new Product();        
        $product20->setName("Pro Drupal Development");
        $product20->setDescription("Widely praised for its in-depth coverage of Drupal internals, bestsellingPro Drupal Developmenthas been updated for Drupal 6 in this edition, and provides are even more tricks of the trade to help you further yourself as a professional Drupal developer. Assuming you already know how to install and bring a standard installation online,John K. VanDykgives you everything else you need to customize your Drupal installation however you see fit.Pro Drupal Development, Second Editiondelves deep into Drupal internals, showing you how to take full advantage of its powerful architecture. What you'll learn Find out how to create your own modules, develop your own themes, and produce your own filters. Learn the inner workings of each key part of Drupal \n Author: John K. VanDyk");
        $product20->setUser($manager->merge($this->getReference('user3')));
        $product20->setCategory($manager->merge($this->getReference('category-1')));
        $product20->setStatus(1);
        $product20->setImage('drupal.jpg');
        $manager->persist($product20);
        
        
        $product21 = new Product();        
        $product21->setName("Zend Framework in Action");
        $product21->setDescription("From rather humble beginnings as the Personal Home Page scripting language, PHP has found its way into almost every server, corporation, and dev shop in the world. On an average day, somewhere between 500,000 and 2 million coders do something in PHP. Even when you use a well-understood language like PHP, building a modern web application requires tools that decrease development time and cost while improving code quality. Frameworks such as Ruby-on-Rails and Django have been getting a lot of attention as a result. <p> For PHP coders, the Zend Framework offers that same promise without the need to move away from PHP. This powerful collection of components can be used in part or as a whole to speed up the development process.  \n Authors: Rob Allen, Nick Lo, Steven Brown");
        $product21->setUser($manager->merge($this->getReference('user0')));
        $product21->setCategory($manager->merge($this->getReference('category-1')));
        $product21->setStatus(1);
        $product21->setImage('zend-action.jpg');
        $manager->persist($product21);
        
        
        $product22 = new Product();        
        $product22->setName("Strategic Planning for Information Systems");
        $product22->setDescription("Accessibility and clarity of purpose maintained throughout. Journal of Information Technology. Clear, practical, comprehensive.  \n Authors: John Ward, Joe Peppard");
        $product22->setUser($manager->merge($this->getReference('user0')));
        $product22->setCategory($manager->merge($this->getReference('category-1')));
        $product22->setStatus(1);
        $product22->setImage('strategic-planning.jpg');
        $manager->persist($product22);
        
        
        $product23 = new Product();        
        $product23->setName("JQuery in Action, Second Edition");
        $product23->setDescription("A really good web development framework anticipates your needs. jQuery does more-it practically reads your mind. Developers fall in love with this JavaScript library the moment they see 20 lines of code reduced to three. jQuery is concise and readable. \n Authors: Bear Bibeault, Yehuda Katz");
        $product23->setUser($manager->merge($this->getReference('user4')));
        $product23->setCategory($manager->merge($this->getReference('category-1')));
        $product23->setStatus(1);
        $product23->setImage('jquery-action.jpg');
        $manager->persist($product23);
        
        
        $product24 = new Product();        
        $product24->setName("Professional Joomla!");
        $product24->setDescription("As a major force in the world of affordable, advanced web site deployment, Joomla! has become the most important noncommercial Content Management System (CMS) in the world. The number of Joomla! downloads and add-ons continues to grow at lightning pace, spurring the need for a resource that explores the diverse needs of professional Joomla! developers. This book fills that void by covering the two main areas of the Joomla! field--development and deployment--with a focus on the new Joomla! version 1.5 and all the features it provides. \n Author: Dan Rahmel");
        $product24->setUser($manager->merge($this->getReference('user3')));
        $product24->setCategory($manager->merge($this->getReference('category-1')));
        $product24->setStatus(1);
        $product24->setImage('joomla.jpg');
        $manager->persist($product24);
        
        $product25 = new Product();        
        $product25->setName("Java The Complete Reference, Eighth Edition");
        $product25->setDescription("The Definitive Java Programming Guide \n Author: Herbert Schildt");
        $product25->setUser($manager->merge($this->getReference('user'.mt_rand(0,4))));
        $product25->setCategory($manager->merge($this->getReference('category-1')));
        $product25->setStatus(1);
        $product25->setImage('java.jpg');
        $manager->persist($product25);
        
        
        $product26 = new Product();        
        $product26->setName("Design Patterns: Elements of Reusable Object-Oriented Software");
        $product26->setDescription("An excellent foundational book for any serious programmer who is looking to design more than just a pocket-full of scripts. The book has two primary aspects; one to substantiate the concept of a design pattern, and the other to serve as a reference for fundamental patterns. The book also illustrates with examples, how those fundamental patterns could work together. I think that the prose could have been a little more down to earth, though some would say it was \"dumbed down\" too much. Did not read the book cover to cover, but I don't believe it was intended to be. It is now a part of my reference section. \n Author: Gamma");
        $product26->setUser($manager->merge($this->getReference('user'.mt_rand(0,4))));
        $product26->setCategory($manager->merge($this->getReference('category-1')));
        $product26->setStatus(1);
        $product26->setImage('design-patterns.gif');
        $manager->persist($product26);
        
        
        $product27 = new Product();        
        $product27->setName("Linux Apache Web Server Administration");
        $product27->setDescription("Authoratative Answers to All Your Apache Questions--Now Updated to Cover Apache 2.0 Linux Apache Web Server Administration is the most complete, most advanced guide to the Apache Web server you'll find anywhere. Written by a leading Apache expert--and now updated to cover Apache 2.0--this book teaches you, step-by-step, all the standard and advanced techniques you need to know to administer Apache on a Linux box. Hundreds of clear, consistent examples illustrate these techniques in detail--so you stay on track and accomplish all your goals. \n Author: Charles Aulds");
        $product27->setUser($manager->merge($this->getReference('user'.mt_rand(0,4))));
        $product27->setCategory($manager->merge($this->getReference('category-1')));
        $product27->setStatus(1);
        $product27->setImage('apache.jpg');
        $manager->persist($product27);
        
        
        $manager->flush();
        
        $this->addReference('p1', $product1);
        $this->addReference('p2', $product2);
        $this->addReference('p3', $product3);
        $this->addReference('p4', $product4);
        $this->addReference('p5', $product5);
        $this->addReference('p6', $product6);
        $this->addReference('p7', $product7);
        $this->addReference('p8', $product8);
        $this->addReference('p9', $product9);
        $this->addReference('p10', $product10);
        $this->addReference('p11', $product11);
        $this->addReference('p12', $product12);
        $this->addReference('p13', $product13);
        $this->addReference('p14', $product14);
        $this->addReference('p15', $product15);
        $this->addReference('p16', $product16);
        $this->addReference('p17', $product17);
        $this->addReference('p18', $product18);
        $this->addReference('p19', $product19);
        $this->addReference('p20', $product20);
        $this->addReference('p21', $product21);
        $this->addReference('p22', $product22);
        $this->addReference('p23', $product23);
        $this->addReference('p24', $product24);
        $this->addReference('p25', $product25);
        $this->addReference('p26', $product26);
        $this->addReference('p27', $product27);
        
    }
    
    /**
     * inicates the order of execution of this fixture
     * @return int 
     */
    public function getOrder()
    {
        return 3;
    }
}

?>