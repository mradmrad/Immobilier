<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposal
 *
 * @ORM\Table(name="proposal")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\ProposalRepository")
 */
class Proposal
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
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mandat;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proposedBy;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\TiersBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false, name="proposedfor_code", referencedColumnName="code" )
     */
    private $proposedFor;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Requete", inversedBy="proposals")
     * @ORM\JoinColumn(name="requete_id", referencedColumnName="id")
     */
    protected $requete;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepted", type="boolean")
     */
    private $accepted;

    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->accepted = false;
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
     * Set mandat
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandat
     *
     * @return Proposal
     */
    public function setMandat(\SBC\BienBundle\Entity\Mandat $mandat)
    {
        $this->mandat = $mandat;

        return $this;
    }

    /**
     * Get mandat
     *
     * @return \SBC\BienBundle\Entity\Mandat
     */
    public function getMandat()
    {
        return $this->mandat;
    }


    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Proposal
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }


    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Proposal
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * Set proposedBy
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $proposedBy
     *
     * @return Proposal
     */
    public function setProposedBy(\SBC\PersonnelBundle\Entity\Personnel $proposedBy)
    {
        $this->proposedBy = $proposedBy;

        return $this;
    }

    /**
     * Get proposedBy
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getProposedBy()
    {
        return $this->proposedBy;
    }

    /**
     * Set proposedFor
     *
     * @param \SBC\TiersBundle\Entity\Client $proposedFor
     *
     * @return Proposal
     */
    public function setProposedFor(\SBC\TiersBundle\Entity\Client $proposedFor)
    {
        $this->proposedFor = $proposedFor;

        return $this;
    }

    /**
     * Get proposedFor
     *
     * @return \SBC\TiersBundle\Entity\Client
     */
    public function getProposedFor()
    {
        return $this->proposedFor;
    }

    /**
     * Set requete
     *
     * @param \SBC\BienBundle\Entity\Requete $requete
     *
     * @return Proposal
     */
    public function setRequete(\SBC\BienBundle\Entity\Requete $requete = null)
    {
        $this->requete = $requete;

        return $this;
    }

    /**
     * Get requete
     *
     * @return \SBC\BienBundle\Entity\Requete
     */
    public function getRequete()
    {
        return $this->requete;
    }
}
