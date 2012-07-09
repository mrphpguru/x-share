<?php

namespace Xshare\ProductBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Xshare\ProductBundle\Entity\Booking
 *
 * @ORM\Table(name="booking", indexes={@ORM\Index(name="search_idx", columns={"borrow_date", "return_date"})})
 * @ORM\Entity(repositoryClass="Xshare\ProductBundle\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $booking_id;
    
    /**
     * @ORM\OneToOne(targetEntity="Requests", inversedBy="booking")
     * @ORM\JoinColumn(name="request_id", referencedColumnName="request_id", onDelete="CASCADE", onUpdate="CASCADE")
     */
    private $request;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Xshare\UserBundle\Entity\User", inversedBy="requests")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", onDelete="CASCADE", onUpdate="CASCADE")
     */
    private $user;
    
    /**
     * @ORM\Column(type="date")
     */
    private $borrow_date;
    
    /**
     * @ORM\Column(type="date")
     */
    private $return_date;
    
    /**
     * @ORM\Column(type="date")
     */
    private $created_at;
    
    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * Get booking_id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->booking_id;
    }

    /**
     * Set borrow_date
     *
     * @param date $borrowDate
     */
    public function setBorrowDate($borrowDate)
    {
        $this->borrow_date = $borrowDate;
    }

    /**
     * Get borrow_date
     *
     * @return date 
     */
    public function getBorrowDate()
    {
        return $this->borrow_date;
    }
    /**
     * Set return_date
     *
     * @param date $returnDate
     */
    public function setReturnDate($returnDate)
    {
        $this->return_date = $returnDate;
    }

    /**
     * Get return_date
     *
     * @return date 
     */
    public function getReturnDate()
    {
        return $this->return_date;
    }
    /**
     * Set real_return_date
     *
     * @param date $realReturnDate
     */
    public function setRealReturnDate($realReturnDate)
    {
        $this->real_return_date = $realReturnDate;
    }
    /**
     * Set real_return_date
     *
     * @param date $realReturnDate
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * Get real_return_date
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
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
    
    /**
     * Set user
     *
     * @param Xshare\UserBundle\Entity\User $product
     */
    public function setUser(\Xshare\UserBundle\Entity\user $user)
    {
        $this->user = $user;
    }
    
    /**
     * Get request
     *
     * @return Xshare\ProductBundle\Entity\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * Set request
     *
     * @param \Xshare\ProductBundle\Entity\Requests $request
     */
    public function setRequest(\Xshare\ProductBundle\Entity\Requests $request)
    {
        $this->request = $request;
    }
    
    /**
     *
     * @param type $product_id 
     */
    public function setProductId($product_id){
        $this->product_id=$product_id;
    }
    
    /**
     *
     * @return type int
     */
    public function getProductId(){
        return $this->product_id;
    }

    /**
     * Get booking_id
     *
     * @return integer 
     */
    public function getBookingId()
    {
        return $this->booking_id;
    }
}