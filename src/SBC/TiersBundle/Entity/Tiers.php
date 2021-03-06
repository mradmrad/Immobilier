<?php

namespace SBC\TiersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiers
 *
 * @ORM\Table(name="tiers")
 * @ORM\Entity(repositoryClass="SBC\TiersBundle\Repository\TiersRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"tiers" = "Tiers", "client" = "Client", "supplier" = "Supplier"})
 */
class Tiers
{
    /**
     * @var int
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     * @ORM\Id
     */
    protected $code;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_creation", type="datetime")
     */
    protected $dateCreation;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_update", type="datetime", nullable=true)
     */
    protected $dateUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="denomination", type="string", length=255)
     */
    protected $denomination;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255 , nullable = true)
     */
    protected $prenom;

    /**
     * Identifiant du tier (Matricule Fiscal, CIN, Autre...)
     * @var string
     * @ORM\Column(name="identifier", type="string", length=255, nullable=true)
     */
    protected $identifier;

    /**
     * @var boolean
     * @ORM\Column(name="passenger", type="boolean", nullable=true)
     */
    protected $passenger;

    /**
     * @var boolean
     * @ORM\Column(name="archived", type="boolean", nullable=true)
     */
    protected $archived;

    /**
     * @var string
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    protected $fax;

    /**
     * @var string
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    protected $tel;

    /**
     * @var string
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    protected $website;

    /**
     * @var string
     * @ORM\Column(name="more_informations", type="text", nullable=true)
     */
    protected $moreInformations;

    /**
     * @var Address
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="main_address_id", referencedColumnName="id", onDelete="CASCADE"))
     */
    protected $mainAddress;
    
    function __construct()
    {
        $this->dateCreation = new \DateTime("now", new \DateTimeZone('Etc/GMT'));
    }

    /**
     * Set denomination
     *
     * @param string $denomination
     *
     * @return Tiers
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get denomination
     *
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination ;
    }
    
    /**
     * Set code
     *
     * @param string $code
     *
     * @return Tiers
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     *
     * @return Tiers
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set passenger
     *
     * @param boolean $passenger
     *
     * @return Tiers
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * Get passenger
     *
     * @return boolean
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Tiers
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Tiers
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Tiers
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel ;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Tiers
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set moreInformations
     *
     * @param string $moreInformations
     *
     * @return Tiers
     */
    public function setMoreInformations($moreInformations)
    {
        $this->moreInformations = $moreInformations;

        return $this;
    }

    /**
     * Get moreInformations
     *
     * @return string
     */
    public function getMoreInformations()
    {
        return $this->moreInformations;
    }

    /**
     * Set mainAddress
     *
     * @param \SBC\TiersBundle\Entity\Address $mainAddress
     *
     * @return Tiers
     */
    public function setMainAddress(\SBC\TiersBundle\Entity\Address $mainAddress = null)
    {
        $this->mainAddress = $mainAddress;

        return $this;
    }

    /**
     * Get mainAddress
     *
     * @return \SBC\TiersBundle\Entity\Address
     */
    public function getMainAddress()
    {
        return $this->mainAddress;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Tiers
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return Tiers
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    public function __toString()
    {
        return $this->prenom.' '.$this->denomination;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Tiers
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
}
