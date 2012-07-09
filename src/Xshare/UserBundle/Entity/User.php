<?php

namespace Xshare\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 


/**
 * Xshare\UserBundle\Entity\User
 *
 * @ORM\Table(name="user", indexes = {@ORM\Index(name="search_idx", columns={"firstname", "lastname", "created_at"})})
 * @ORM\Entity(repositoryClass="Xshare\UserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="email", message="user.email.not_unique")
 * @UniqueEntity(fields="username", message="user.login.not_unique")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $user_id;
    
    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $lastname;

    /**
     * @var string $username
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", length=256)
     */
    private $photo;
    
    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $sex;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birth_date;
    
     /**
     * @var string $email
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     * @Assert\Email(
     *      message="user.email_invalid",
     *      checkMX = true
     * )
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Regex( 
     *      pattern="/^[\+0-9\s\-\(\)]+$/",    
     *      message="user.phone.invalid"
     * )
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *      message="user.not_blank"
     * )
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=5)
     */
    private $type_access;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;
    
     /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;
    
     /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string")
     */
    private $salt;
    
    /**
     * @ORM\OneToMany(targetEntity="Xshare\ProductBundle\Entity\Category", mappedBy="user")
     */
    protected $categories;
    
    /**
     * @ORM\OneToMany(targetEntity="Xshare\ProductBundle\Entity\Product", mappedBy="user")
     */
    protected $products;
    
    /**
     * @ORM\OneToMany(targetEntity="Xshare\GeneralBundle\Entity\NewsSubscriber", mappedBy="user")
     */
    protected $news;

    /**
     * @ORM\OneToMany(targetEntity="Xshare\ProductBundle\Entity\Booking", mappedBy="user")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="booking_id", onDelete="CASCADE", onUpdate="CASCADE")
     */
    protected $bookings;
    
    /**
     * @ORM\OneToMany(targetEntity="Xshare\ProductBundle\Entity\Requests", mappedBy="user")
     * 
     */
    protected $requests;
    

    public $file;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $statistics = 0;
    
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->requests = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->active = 1;
        $this->type_access = 'user';
        $this->photo = 'defaultLogo.gif';
        
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
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
     * @ORM\preUpdate
     */
    public function setUpdatedAtValue()
    {
       $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set photo
     *
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set sex
     *
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set birth_date
     *
     * @param datetime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $birthDate);
        $this->birth_date = $date;    
    }

    /**
     * Get birth_date
     *
     * @return datetime 
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set type_access
     *
     * @param string $typeAccess
     */
    public function setTypeAccess($typeAccess)
    {
        $this->type_access = $typeAccess;
    }

    /**
     * Get type_access
     *
     * @return string 
     */
    public function getTypeAccess()
    {
        return $this->type_access;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
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
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }


    /**
     * Add categories
     *
     * @param Xshare\ProductBundle\Entity\Category $categories
     */
    public function addCategory(\Xshare\ProductBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add products
     *
     * @param Xshare\ProductBundle\Entity\Product $products
     */
    public function addProduct(\Xshare\ProductBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add news
     *
     * @param Xshare\GeneralBundle\Entity\NewsSubscriber $news
     */
    public function addNewsSubscriber(\Xshare\GeneralBundle\Entity\NewsSubscriber $news)
    {
        $this->news[] = $news;
    }

    /**
     * Get news
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Add requests
     *
     * @param Xshare\ProductBundle\Entity\Requests $requests
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
     * Get requests
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRequests()
    {
        return $this->requests;
    }
    
    public function __toString()
    {
        return $this->getActive();
    }
    
    protected function getUploadDir()
    {
        return 'uploads/users';
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->photo ? null : $this->getUploadDir().'/'.$this->photo;
    }

    public function getAbsolutePath()
    {
        return null === $this->photo ? null : $this->getUploadRootDir().'/'.$this->photo;
    }
    
    /**
    * @ORM\prePersist
    */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->photo = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
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
        $this->file->move($this->getUploadRootDir(), $this->photo);

        unset($this->file);
    }

    /**
    * @ORM\postRemove
    */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
    public function serialize()
    {
        return serialize(array(
            $this->user_id,
            $this->password,
            $this->username
        ));
    }
    
    public function unserialize($serialized)
    {
        list(
            $this->user_id,
            $this->password,
            $this->username
            ) = unserialize($serialized);
    }
    
    public function getAge() {
        
        $date = (array) $this->getBirthDate();        
        $date = explode(" ", $date['date']);
        list($y, $m, $d) = explode("-", $date[0]);
        $birth_time = mktime(0, 0, 0, $m, $d, $y);
        $time = time();
//        $leap_years = floor(((int) date("Y") - (int) $y)/4);
        $age = floor(($time - $birth_time) / (60 * 60 * 24 * 365));
        return $age;
    }
    
    /**
     * returns an array containg the number of available and not available products
     * @return type 
     */
    public function getANAProducts() {
        $available = 0;
        $not_available = 0;
        foreach ($this->getProducts() as $product) {
            if ($product->getStatus() == 0) {
                $not_available++;
            } else {
                $available++;
            }
        }
        return array('a' => $available, 'na' => $not_available);
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