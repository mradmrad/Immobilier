<?php

namespace SBC\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="SBC\MessageBundle\Repository\MessageRepository")
 */
class Message implements \JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime")
     */
    private $creationdate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $receiver;

    public function __construct()
    {
        $this->creationdate = new \Datetime('now');

    }
    function jsonSerialize()
    {
        return get_object_vars($this);
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
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Message
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set sender
     *
     * @param \SBC\UserBundle\Entity\User $sender
     *
     * @return Message
     */
    public function setSender(\SBC\UserBundle\Entity\User $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \SBC\UserBundle\Entity\User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param \SBC\UserBundle\Entity\User $receiver
     *
     * @return Message
     */
    public function setReceiver(\SBC\UserBundle\Entity\User $receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return \SBC\UserBundle\Entity\User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }
}
