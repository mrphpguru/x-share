<?php

namespace Xshare\PollBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Xshare\PollBundle\Entity\Poll
 *
 * @ORM\Table(name="poll", indexes={@ORM\Index(name="search_idx", columns={"created_at"})})
 * @ORM\Entity(repositoryClass="Xshare\PollBundle\Repository\PollRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Poll 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $poll_id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $question;
    
    /**
     * @ORM\Column(type="array")
     * @Assert\NotBlank()
     */
    private $answers;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $status;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank();
     * @Assert\Date();
     */
    private $expired_at;
   
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;
    
    /**
     * @ORM\OneToMany(targetEntity="PollResult", mappedBy="poll")
     */
    protected $poll_results;
    
    public function __construct()
    {   
        $this->poll_results = new ArrayCollection();
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
     * Get poll_id
     *
     * @return integer 
     */
    public function getPollId()
    {
        return $this->poll_id;
    }

    /**
     * Set question
     *
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answers
     *
     * @param array $answers
     */
    public function setAnswers($answers)
    {
        $arr= array();
        if(is_array($answers)){
            $arr = $answers;
            return;
        }
        $answers = trim($answers);
        $answers = str_replace("\n", "", $answers);
        $arr = explode("|", $answers);
        $arr = array_map('trim',$arr);
        foreach($arr as $k=>$v){
            if($v==""){
                unset($arr[$k]);
            }
        }
        $this->answers = serialize($arr);
    }

    /**
     * Get answers
     *
     * @return array 
     */
    public function getAnswers()
    {
        if(is_array($this->answers)){
            return implode(" | \n",$this->answers);
        }else{
           $arr = unserialize($this->answers);
           if($arr!==false)
                return implode(" | \n",$arr);
           else 
                return "";
        }
    }
    
    /**
     * @author s.pasat
     * unserialize answers
     * @return type array
     */
    public function getArrayAnswers(){
        if(is_array($this->answers))
            return $this->answers;
        if($this->answers !=""){
            $arr = array();
            $arr = unserialize($this->answers);
            if($arr!==false)
                return $arr;
        }
        return array();
        //return $this->answers;
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
        return $this->status;
    }

    /**
     * Set expired_at
     *
     * @param datetime $expiredAt
     */
    public function setExpiredAt($expiredAt)
    {
        $this->expired_at = new \DateTime($expiredAt);
    }

    /**
     * Get expired_at
     *
     * @return datetime 
     */
    public function getExpiredAt()
    {
        return $this->expired_at;
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
     * Add poll_results
     *
     * @param Xshare\PollBundle\Entity\PollResult $pollResults
     */
    public function addPollResult(\Xshare\PollBundle\Entity\PollResult $pollResults)
    {
        $this->poll_results[] = $pollResults;
    }

    /**
     * Get poll_results
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPollResults()
    {
        return $this->poll_results;
    }
    /**
     * cut long question
     * @param type int $numberOfChars 
     * @param type int $afterText string to put after cut long question
     */
    public function getQuestionCuted($numberOfChars = 100 , $afterText = "...")
    {
        $charNr = mb_strlen($this->question,'utf8');
        if($charNr>$numberOfChars){
            return mb_substr($this->question,0,$numberOfChars,"utf8").$afterText;
        }else{
            return $this->question;
        }
    }
}