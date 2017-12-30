<?php

namespace SBC\ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\UserBundle\Entity\User;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="SBC\ReclamationBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var Reclamation
     * 
     * @ORM\ManyToOne(targetEntity="Reclamation", inversedBy="comments")
     */
    private $reclamation;

    /**
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="SBC\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date_comment", type="datetime")
     */
    private $dateComment;

    function __construct()
    {
        $this->dateComment = new \DateTime("now", new \DateTimeZone('Etc/GMT'));
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set reclamation
     *
     * @param \SBC\ReclamationBundle\Entity\Reclamation $reclamation
     *
     * @return Comment
     */
    public function setReclamation(\SBC\ReclamationBundle\Entity\Reclamation $reclamation = null)
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    /**
     * Get reclamation
     *
     * @return \SBC\ReclamationBundle\Entity\Reclamation
     */
    public function getReclamation()
    {
        return $this->reclamation;
    }

    /**
     * Set user
     *
     * @param \SBC\UserBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\SBC\UserBundle\Entity\User $user = null)
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
     * Set dateComment
     *
     * @param \DateTime $dateComment
     *
     * @return Comment
     */
    public function setDateComment($dateComment)
    {
        $this->dateComment = $dateComment;

        return $this;
    }

    /**
     * Get dateComment
     *
     * @return \DateTime
     */
    public function getDateComment()
    {
        return $this->dateComment;
    }


}
