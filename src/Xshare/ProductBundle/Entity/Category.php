<?php

namespace Xshare\ProductBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 

/**
 * Xshare\ProductBundle\Entity\Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="search_idx", columns={"name", "created_at"})})
 * @ORM\Entity(repositoryClass="Xshare\ProductBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="name", message="category.name.not_unique")
 */
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $category_id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *      message="product.not_blank"
     * )
     * @Assert\MaxLength(
     *     limit=100,
     *     message="Category name must have maximum {{ limit }} characters."
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $status = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Xshare\UserBundle\Entity\User", inversedBy="categories")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", onDelete="CASCADE", onUpdate="NO ACTION")
     */
    private $user;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;

    /**
     * @Assert\Image()
     */
    public $file;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $statistics = 0;
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->setImage("category-icon.png");
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
     * Get category_id
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
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
     * performs some actions after updating the database
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
     * returns the directory in which the photos of the users are stored in
     * @return string 
     */
    public function getUploadDir()
    {
        return 'uploads/categories';
    }

    /**
     * returns the absolute path to the directory in which the photos of the users are stored in
     * @return type 
     */
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * returns the path to the image
     * @return type 
     */
    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    /**
     * returns the absolute path to the image
     * @return type 
     */
    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    /**
     * uploads the file
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
     * returns the name of the category
     * @return type 
     */
    public function __toString()
    {
        return $this->getName();
    }
    
    /**
     * performs some actions after deleting from the DB
    * @ORM\postRemove
    */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
}