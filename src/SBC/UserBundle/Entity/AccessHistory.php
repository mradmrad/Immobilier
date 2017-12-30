<?php

namespace SBC\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessHistory
 *
 * @ORM\Table(name="access_history")
 * @ORM\Entity(repositoryClass="SBC\UserBundle\Repository\AccessHistoryRepository")
 */
class AccessHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="loginDate", type="datetime")
     */
    private $loginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logoutDate", type="datetime", nullable=true)
     */
    private $logoutDate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\UserBundle\Entity\User", inversedBy="accesses")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(name="sessionId", type="string",length=255, nullable=true)
     */
    private $sessionId;

    public function __construct()
    {
        $this->loginDate = new \Datetime('now');
        $this->sessionId = $this->generateSessionId();

    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set loginDate
     *
     * @param \DateTime $loginDate
     *
     * @return AccessHistory
     */
    public function setLoginDate($loginDate)
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    /**
     * Get loginDate
     *
     * @return \DateTime
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }

    /**
     * Set logoutDate
     *
     * @param \DateTime $logoutDate
     *
     * @return AccessHistory
     */
    public function setLogoutDate($logoutDate)
    {
        $this->logoutDate = $logoutDate;

        return $this;
    }

    /**
     * Get logoutDate
     *
     * @return \DateTime
     */
    public function getLogoutDate()
    {
        return $this->logoutDate;
    }

    /**
     * Set user
     *
     * @param \SBC\UserBundle\Entity\User $user
     *
     * @return AccessHistory
     */
    public function setUser(\SBC\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SBC\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     *
     * @return AccessHistory
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    private  function generateSessionId(){
        return uniqid('', true) ;
    }
}
