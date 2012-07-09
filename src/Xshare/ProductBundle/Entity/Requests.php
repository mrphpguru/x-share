<?php

namespace Xshare\ProductBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Xshare\ProductBundle\Entity\Requests
 *
 * @ORM\Table(name="requests", indexes={@ORM\Index(name="search_idx", columns={"borrow_date", "return_date"})})
 * @ORM\Entity(repositoryClass="Xshare\ProductBundle\Repository\RequestsRepository")
 */
class Requests
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $request_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="requests")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     */
    private $product;
    
    /**
     * @ORM\OneToOne(targetEntity="Booking", cascade={"all"}, mappedBy="request")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="booking_id", onDelete="SET NULL", onUpdate="CASCADE")
     */
    private $booking;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
     private $booking_id;
     
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
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $user_id;
    /**
     * @ORM\Column(type="date")
     */
    private $borrow_date;
    
    /**
     * @ORM\Column(type="date")
     */
    private $return_date;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $real_return_date;
    
    /**
     * @ORM\Column(type="datetime" )
     */
    private $created_at;
    
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Get loans_id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->request_id;
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
     * Set booking
     *
     * @param Booking Entity $booking
     */
    public function setBooking($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get booking
     *
     * @return Booking Entity
     */
    public function getBooking()
    {
        return $this->booking;
    }
    
    /** Set booking_id
     *
     * @param Booking Entity $booking
     */
    public function setBookingId($bookingid)
    {
        $this->booking_id = $bookingid;
    }

    /**
     * Get booking_id
     *
     * @return Booking Entity
     */
    public function getBookingId()
    {
        return $this->booking_id;
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
     * Get real_return_date
     *
     * @return date 
     */
    public function getRealReturnDate()
    {
        return $this->real_return_date;
    }

    /**
     * Set product
     *
     * @param Xshare\ProductBundle\Entity\Product $product
     */
    public function setProduct(\Xshare\ProductBundle\Entity\Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Get product
     *
     * @return Xshare\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
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
    
    /**
     * Set user_id
     *
     * @param type integer user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Get user_id
     *
     * @return integer user_id 
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    
    /**
     * Set created_at
     *
     * @param date $createdat
     */
    public function setCreatedAt($createdat)
    {
        $this->created_at = $createdat;
    }

    /**
     * Get created_at
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get request_id
     *
     * @return integer 
     */
    public function getRequestId()
    {
        return $this->request_id;
    }
}