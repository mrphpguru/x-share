<?php

namespace Xshare\ProductBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="product", indexes = {@ORM\Index(name="search_idx", columns={"name", "created_at"})})
 * @ORM\Entity(repositoryClass="Xshare\ProductBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $product_id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *      message="product.not_blank"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=1000)
     * @Assert\NotBlank(
     *      message="product.not_blank"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Xshare\UserBundle\Entity\User", inversedBy="products")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", onDelete="NO ACTION", onUpdate="NO ACTION")
     *
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Requests", mappedBy="product")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", onDelete="CASCADE", onUpdate="NO ACTION")
     *  
     */
    protected $requests;
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="product")
     */
    protected $bookings;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total_nb = 0;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    private $status = 0;
    
    /**
     * @ORM\Column(type="boolean" )
     */
    private $enable = 1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @Assert\Image(maxSize = "1024k")
     */
    public $file;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statistics = 0;
    
    public function __construct()
    {
        $this->requests = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->setImage("no_photo.png");
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\preUpdate
     */
    public function setUpdatedAtValue()
    {
       $this->setUpdatedAt(new \DateTime());
    }

    /**
     * Get product_id
     *
     * @return integer
     */

    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = trim(strip_tags($name));
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = trim(strip_tags($description));
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set total_nb
     *
     * @param integer $totalNb
     */
    public function setTotalNb($totalNb)
    {
        $this->total_nb = $totalNb;
    }

    /**
     * Get total_nb
     *
     * @return integer
     */
    public function getTotalNb()
    {
        return $this->total_nb;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        if ($this->status == '1') {
            return true;
        }
        return false;
    }
    
    /**
     * Set statistics
     *
     * @param integer $status
     */
    public function setStatistics($nr)
    {
        $this->statistics = $nr;
    }

    /**
     * Get statistics
     *
     * @return integer
     */
    public function getStatistics()
    {
        return $this->statistics;
    }
    
    /**
     * Set enable
     *
     * @param integer $status
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    /**
     * Get enable
     *
     * @return integer
     */
    public function getEnable()
    {
        return $this->enable;
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
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set category
     *
     * @param Xshare\ProductBundle\Entity\Category $category
     */
    public function setCategory(\Xshare\ProductBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Xshare\ProductBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
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
     * Add loans
     *
     * @param Xshare\ProductBundle\Entity\Loans $loans
     */
    public function addRequests(\Xshare\ProductBundle\Entity\Requests $request)
    {
        $this->requests[] = $request;
    }

    /**
     * Get bookings
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBookings()
    {
        return $this->bookings;
    }
    
    /**
     * Add Bookings
     *
     * @param Xshare\ProductBundle\Entity\Booking $booking
     */
    public function addBookings(\Xshare\ProductBundle\Entity\Booking $booking)
    {
        $this->bookings[] = $booking;
    }

    /**
     * Get loans
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * returns the name of the user
     * @return type 
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * returns the directory where the picture of the user is saved
     * @return string 
     */
    public function getUploadDir()
    {
        return 'uploads/product';
    }

    /**
     * returns the absolute path to the directory where the picture of the user is saved
     * @return type 
     */
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * returns the path to the user image
     * @return type 
     */
    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    /**
     * returns the absolute path to the user image
     * @return type 
     */
    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

   /**
    * performs some actions before the insert of the user
    * @ORM\prePersist
    */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image = uniqid().'.'.$this->file->guessExtension();
        }
    }

   /**
    * performs some actions after the insert of the user
    * @ORM\postPersist
    */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }

   /**
    * performs some actions after the delete of the user
    * @ORM\postRemove
    */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
    /**
     * cut to long names
     * @param type int $numberOfChars
     * @param type string $afterText
     * @return type string
     */
    public function getNameCuted($numberOfChars = 100 , $afterText = "...")
    {
        $charNr = mb_strlen($this->name,'utf8');
        if($charNr>$numberOfChars){
            return mb_substr($this->name,0,$numberOfChars,"utf8").$afterText;
        }else{
            return $this->name;
        }
    }


    /**
     * Add bookings
     *
     * @param Xshare\ProductBundle\Entity\Booking $bookings
     */
    public function addBooking(\Xshare\ProductBundle\Entity\Booking $bookings)
    {
        $this->bookings[] = $bookings;
    }
}