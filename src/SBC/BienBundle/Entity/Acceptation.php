<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acceptation
 *
 * @ORM\Table(name="acceptation")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\AcceptationRepository")
 */
class Acceptation
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="identity", type="string", length=255, nullable=true)
     */
    private $identity;

    /**
     * @var string
     *
     * @ORM\Column(name="delivered", type="string", length=255, nullable=true)
     */
    private $delivered;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", length=255, nullable=true)
     */
    private $quality;

    /**
     * @var string
     *
     * @ORM\Column(name="society", type="string", length=255, nullable=true)
     */
    private $society;

    /**
     * @var string
     *
     * @ORM\Column(name="account", type="string", length=255, nullable=true)
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="acte", type="string", length=255, nullable=true)
     */
    private $acte;

    /**
     * @var string
     *
     * @ORM\Column(name="reserve", type="string", length=255, nullable=true)
     */
    private $reserve;

    /**
     * @var string
     *
     * @ORM\Column(name="contre_offre", type="string", length=255, nullable=true)
     */
    private $contreOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="name_o", type="string", length=255, nullable=true)
     */
    private $nameO;

    /**
     * @var string
     *
     * @ORM\Column(name="identity_o", type="string", length=255, nullable=true)
     */
    private $identityO;

    /**
     * @var string
     *
     * @ORM\Column(name="delivered_o", type="string", length=255, nullable=true)
     */
    private $deliveredO;

    /**
     * @var string
     *
     * @ORM\Column(name="quality_o", type="string", length=255, nullable=true)
     */
    private $qualityO;

    /**
     * @var string
     *
     * @ORM\Column(name="society_o", type="string", length=255, nullable=true)
     */
    private $societyO;

    /**
     * @var string
     *
     * @ORM\Column(name="account_o", type="string", length=255, nullable=true)
     */
    private $accountO;

    /**
     * @var string
     *
     * @ORM\Column(name="acte_o", type="string", length=255, nullable=true)
     */
    private $acteO;

    /**
     * @var string
     *
     * @ORM\Column(name="reserve_o", type="string", length=255, nullable=true)
     */
    private $reserveO;

    /**
     * @var string
     *
     * @ORM\Column(name="contre_offre_o", type="string", length=255, nullable=true)
     */
    private $contreOffreO;

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
     * Set name
     *
     * @param string $name
     *
     * @return Acceptation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set identity
     *
     * @param string $identity
     *
     * @return Acceptation
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * Get identity
     *
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Set delivered
     *
     * @param string $delivered
     *
     * @return Acceptation
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;

        return $this;
    }

    /**
     * Get delivered
     *
     * @return string
     */
    public function getDelivered()
    {
        return $this->delivered;
    }

    /**
     * Set quality
     *
     * @param string $quality
     *
     * @return Acceptation
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set society
     *
     * @param string $society
     *
     * @return Acceptation
     */
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get society
     *
     * @return string
     */
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return Acceptation
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set acte
     *
     * @param string $acte
     *
     * @return Acceptation
     */
    public function setActe($acte)
    {
        $this->acte = $acte;

        return $this;
    }

    /**
     * Get acte
     *
     * @return string
     */
    public function getActe()
    {
        return $this->acte;
    }

    /**
     * Set reserve
     *
     * @param string $reserve
     *
     * @return Acceptation
     */
    public function setReserve($reserve)
    {
        $this->reserve = $reserve;

        return $this;
    }

    /**
     * Get reserve
     *
     * @return string
     */
    public function getReserve()
    {
        return $this->reserve;
    }

    /**
     * Set contreOffre
     *
     * @param string $contreOffre
     *
     * @return Acceptation
     */
    public function setContreOffre($contreOffre)
    {
        $this->contreOffre = $contreOffre;

        return $this;
    }

    /**
     * Get contreOffre
     *
     * @return string
     */
    public function getContreOffre()
    {
        return $this->contreOffre;
    }

    /**
     * Set nameO
     *
     * @param string $nameO
     *
     * @return Acceptation
     */
    public function setNameO($nameO)
    {
        $this->nameO = $nameO;

        return $this;
    }

    /**
     * Get nameO
     *
     * @return string
     */
    public function getNameO()
    {
        return $this->nameO;
    }

    /**
     * Set identityO
     *
     * @param string $identityO
     *
     * @return Acceptation
     */
    public function setIdentityO($identityO)
    {
        $this->identityO = $identityO;

        return $this;
    }

    /**
     * Get identityO
     *
     * @return string
     */
    public function getIdentityO()
    {
        return $this->identityO;
    }

    /**
     * Set deliveredO
     *
     * @param string $deliveredO
     *
     * @return Acceptation
     */
    public function setDeliveredO($deliveredO)
    {
        $this->deliveredO = $deliveredO;

        return $this;
    }

    /**
     * Get deliveredO
     *
     * @return string
     */
    public function getDeliveredO()
    {
        return $this->deliveredO;
    }

    /**
     * Set qualityO
     *
     * @param string $qualityO
     *
     * @return Acceptation
     */
    public function setQualityO($qualityO)
    {
        $this->qualityO = $qualityO;

        return $this;
    }

    /**
     * Get qualityO
     *
     * @return string
     */
    public function getQualityO()
    {
        return $this->qualityO;
    }

    /**
     * Set societyO
     *
     * @param string $societyO
     *
     * @return Acceptation
     */
    public function setSocietyO($societyO)
    {
        $this->societyO = $societyO;

        return $this;
    }

    /**
     * Get societyO
     *
     * @return string
     */
    public function getSocietyO()
    {
        return $this->societyO;
    }

    /**
     * Set accountO
     *
     * @param string $accountO
     *
     * @return Acceptation
     */
    public function setAccountO($accountO)
    {
        $this->accountO = $accountO;

        return $this;
    }

    /**
     * Get accountO
     *
     * @return string
     */
    public function getAccountO()
    {
        return $this->accountO;
    }

    /**
     * Set acteO
     *
     * @param string $acteO
     *
     * @return Acceptation
     */
    public function setActeO($acteO)
    {
        $this->acteO = $acteO;

        return $this;
    }

    /**
     * Get acteO
     *
     * @return string
     */
    public function getActeO()
    {
        return $this->acteO;
    }

    /**
     * Set reserveO
     *
     * @param string $reserveO
     *
     * @return Acceptation
     */
    public function setReserveO($reserveO)
    {
        $this->reserveO = $reserveO;

        return $this;
    }

    /**
     * Get reserveO
     *
     * @return string
     */
    public function getReserveO()
    {
        return $this->reserveO;
    }

    /**
     * Set contreOffreO
     *
     * @param string $contreOffreO
     *
     * @return Acceptation
     */
    public function setContreOffreO($contreOffreO)
    {
        $this->contreOffreO = $contreOffreO;

        return $this;
    }

    /**
     * Get contreOffreO
     *
     * @return string
     */
    public function getContreOffreO()
    {
        return $this->contreOffreO;
    }
}
