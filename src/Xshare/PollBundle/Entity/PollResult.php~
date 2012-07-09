<?php

namespace Xshare\PollBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Xshare\PollBundle\Entity\PollResult
 *
 * @ORM\Table(name="poll_result", indexes={@ORM\Index(name="search_idx", columns={"user_ip", "poll_value"})})
 * @ORM\Entity(repositoryClass="Xshare\PollBundle\Repository\PollResultRepository")
 */
class PollResult
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $poll_result_id;
 
     /**
     * @ORM\ManyToOne(targetEntity="Poll", inversedBy="poll_results")
     * @ORM\JoinColumn(name="poll_id", referencedColumnName="poll_id")
     */
    private $poll;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $poll_id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $poll_value;
    
    /**
     * @ORM\Column(type="string")
     */
    private $user_ip;
    /**
     * Get poll_result_id
     *
     * @return integer 
     */
    public function getPollResultId()
    {
        return $this->poll_result_id;
    }

    /**
     * Set poll_value
     *
     * @param string $pollValue
     */
    public function setPollValue($pollValue)
    {
        $this->poll_value = $pollValue;
    }

    /**
     * Get poll_value
     *
     * @return string 
     */
    public function getPollValue()
    {
        return $this->poll_value;
    }

    /**
     * Set poll
     *
     * @param Xshare\PollBundle\Entity\Poll $poll
     */
    public function setPoll(\Xshare\PollBundle\Entity\Poll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Get poll
     *
     * @return Xshare\PollBundle\Entity\Poll 
     */
    public function getPoll()
    {
        return $this->poll;
    }
    
    /**
     * get poll_id
     * 
     * @return type integer
     */
    
    public function getPollId()
    {
        return $this->poll_id;
    }

    /**
     * Set poll_id
     *
     * @param string user_id
     */
    public function setPollId($pollId)
    {
        $this->poll_id = $pollId;
    }
    /**
     *
     * @param type string $user_ip 
     */
    public function setUserIp($userIp){
        $this->user_ip=$userIp;
    }
    /**
     *
     * @return type string $userIp
     */
    public function getUserIp(){
        return $this->user_ip;
    }
}