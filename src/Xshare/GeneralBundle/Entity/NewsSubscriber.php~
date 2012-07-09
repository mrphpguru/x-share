<?php

namespace Xshare\GeneralBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Xshare\GeneralBundle\Entity\Product
 *
 * @ORM\Table(name="news_subscriber")
 * @ORM\Entity(repositoryClass="Xshare\GeneralBundle\Repository\NewsSubscriberRepository")
 */
class NewsSubscriber
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $news_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Xshare\UserBundle\Entity\User", inversedBy="news")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Get news_id
     *
     * @return integer 
     */
    public function getNewsId()
    {
        return $this->news_id;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set user
     *
     * @param Xshare\UserBundle\Entity\User $user
     */
    public function setUser(\Xshare\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Xshare\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}