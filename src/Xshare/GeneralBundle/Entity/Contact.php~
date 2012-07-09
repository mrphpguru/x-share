<?php

namespace Xshare\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable="false")
     * @Assert\NotBlank()
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=20, nullable="false")
     * @Assert\NotBlank()
     */
    protected $lastname;
    
    /**
     * @ORM\Column(type="string", length=20, nullable="false")
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", nullable="false")
     * @Assert\Type(type="numeric")
     */
    protected $phone;
    
    /**
     * @ORM\Column(type="string", nullable="false")
     * @Assert\NotBlank()
     */
    protected $subject;
    
    /**
     * @Assert\NotBlank()
     */
    protected $securitycod;
    
    /**
     * @ORM\Column(type="text", length=50, nullable="false")
     * @Assert\MaxLength(500)
     * @Assert\NotBlank()
     */
    protected $body;

    /**
     * @ORM\Column(type="datetime", nullable="false")
     */
    protected $createdat;
    
    
    public function __construct()
    {
        $this->setCreatedat(new \DateTime());
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdat
     *
     * @param datetime $createdat
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    }

    /**
     * Get createdat
     *
     * @return datetime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }
    
    public function getSecurityCod()
    {
        return $this->securitycod;
    }

    public function setSecurityCod($scod)
    {   
        $this->securitycod = $scod;
    }
    
    public function isSecurityCod($scod)
    {   
        return ($this->securitycod == $scod);
    }
}