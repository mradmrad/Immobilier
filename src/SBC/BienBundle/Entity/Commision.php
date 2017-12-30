<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commision
 *
 * @ORM\Table(name="commision")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\CommisionRepository")
 */
class Commision
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
     * @var int
     *
     * @ORM\Column(name="commisionPercent", type="integer" , nullable=true)
     */
    private $commisionPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="comissionHt", type="integer" , nullable=true)
     */
    private $comissionHt;

    /**
     * @var int
     *
     * @ORM\Column(name="comissionTtc", type="integer" , nullable=true)
     */
    private $comissionTtc;

    /**
     * @var int
     *
     * @ORM\Column(name="remise", type="integer" , nullable=true)
     */
    private $remise;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer" , nullable=true)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="montantLettres", type="string", length=255 , nullable=true)
     */
    private $montantLettres;

    /**
     * @var string
     *
     * @ORM\Column(name="coordiantriceNom", type="string", length=255 , nullable=true)
     */
    private $coordiantriceNom;

    /**
     * @var int
     *
     * @ORM\Column(name="coordiantricePercent", type="integer" , nullable=true)
     */
    private $coordiantricePercent;

    /**
     * @var int
     *
     * @ORM\Column(name="coordiantriceMontant", type="integer" , nullable=true)
     */
    private $coordiantriceMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="marketingNom", type="string", length=255 , nullable=true)
     */
    private $marketingNom;

    /**
     * @var int
     *
     * @ORM\Column(name="marketingPercent", type="integer" , nullable=true)
     */
    private $marketingPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="marketingMontant", type="integer" , nullable=true)
     */
    private $marketingMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="responsableNom", type="string", length=255 , nullable=true)
     */
    private $responsableNom;

    /**
     * @var int
     *
     * @ORM\Column(name="responsablePercent", type="integer" , nullable=true)
     */
    private $responsablePercent;

    /**
     * @var int
     *
     * @ORM\Column(name="responsableMontant", type="integer" , nullable=true)
     */
    private $responsableMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="responsablepNom", type="string", length=255 , nullable=true)
     */
    private $responsablepNom;

    /**
     * @var int
     *
     * @ORM\Column(name="responsablepPercent", type="integer" , nullable=true)
     */
    private $responsablepPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="responsablepMontant", type="integer" , nullable=true)
     */
    private $responsablepMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="superviseurNom", type="string", length=255 , nullable=true)
     */
    private $superviseurNom;

    /**
     * @var int
     *
     * @ORM\Column(name="superviseurPercent", type="integer" , nullable=true)
     */
    private $superviseurPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="superviseurMontant", type="integer" , nullable=true)
     */
    private $superviseurMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="responsablemNom", type="string", length=255 , nullable=true)
     */
    private $responsablemNom;

    /**
     * @var int
     *
     * @ORM\Column(name="responsablemPercent", type="integer" , nullable=true)
     */
    private $responsablemPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="responsablemMontant", type="integer" , nullable=true)
     */
    private $responsablemMontant;

    /**
     * @var int
     *
     * @ORM\Column(name="intervenantNom", type="integer" , nullable=true)
     */
    private $intervenantNom;

    /**
     * @var int
     *
     * @ORM\Column(name="intervenantPercent", type="integer" , nullable=true)
     */
    private $intervenantPercent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="intervenantHt", type="boolean" , nullable=true)
     */
    private $intervenantHt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="intervenantTtc", type="boolean" , nullable=true)
     */
    private $intervenantTtc;

    /**
     * @var int
     *
     * @ORM\Column(name="intervenantMontant", type="integer" , nullable=true)
     */
    private $intervenantMontant;


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
     * Set commisionPercent
     *
     * @param integer $commisionPercent
     *
     * @return Commision
     */
    public function setCommisionPercent($commisionPercent)
    {
        $this->commisionPercent = $commisionPercent;

        return $this;
    }

    /**
     * Get commisionPercent
     *
     * @return int
     */
    public function getCommisionPercent()
    {
        return $this->commisionPercent;
    }

    /**
     * Set comissionHt
     *
     * @param integer $comissionHt
     *
     * @return Commision
     */
    public function setComissionHt($comissionHt)
    {
        $this->comissionHt = $comissionHt;

        return $this;
    }

    /**
     * Get comissionHt
     *
     * @return int
     */
    public function getComissionHt()
    {
        return $this->comissionHt;
    }

    /**
     * Set comissionTtc
     *
     * @param integer $comissionTtc
     *
     * @return Commision
     */
    public function setComissionTtc($comissionTtc)
    {
        $this->comissionTtc = $comissionTtc;

        return $this;
    }

    /**
     * Get comissionTtc
     *
     * @return int
     */
    public function getComissionTtc()
    {
        return $this->comissionTtc;
    }

    /**
     * Set remise
     *
     * @param integer $remise
     *
     * @return Commision
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return int
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Commision
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set montantLettres
     *
     * @param string $montantLettres
     *
     * @return Commision
     */
    public function setMontantLettres($montantLettres)
    {
        $this->montantLettres = $montantLettres;

        return $this;
    }

    /**
     * Get montantLettres
     *
     * @return string
     */
    public function getMontantLettres()
    {
        return $this->montantLettres;
    }

    /**
     * Set coordiantriceNom
     *
     * @param string $coordiantriceNom
     *
     * @return Commision
     */
    public function setCoordiantriceNom($coordiantriceNom)
    {
        $this->coordiantriceNom = $coordiantriceNom;

        return $this;
    }

    /**
     * Get coordiantriceNom
     *
     * @return string
     */
    public function getCoordiantriceNom()
    {
        return $this->coordiantriceNom;
    }

    /**
     * Set coordiantricePercent
     *
     * @param integer $coordiantricePercent
     *
     * @return Commision
     */
    public function setCoordiantricePercent($coordiantricePercent)
    {
        $this->coordiantricePercent = $coordiantricePercent;

        return $this;
    }

    /**
     * Get coordiantricePercent
     *
     * @return int
     */
    public function getCoordiantricePercent()
    {
        return $this->coordiantricePercent;
    }

    /**
     * Set coordiantriceMontant
     *
     * @param integer $coordiantriceMontant
     *
     * @return Commision
     */
    public function setCoordiantriceMontant($coordiantriceMontant)
    {
        $this->coordiantriceMontant = $coordiantriceMontant;

        return $this;
    }

    /**
     * Get coordiantriceMontant
     *
     * @return int
     */
    public function getCoordiantriceMontant()
    {
        return $this->coordiantriceMontant;
    }

    /**
     * Set intervenantNom
     *
     * @param integer $intervenantNom
     *
     * @return Commision
     */
    public function setIntervenantNom($intervenantNom)
    {
        $this->intervenantNom = $intervenantNom;

        return $this;
    }

    /**
     * Get intervenantNom
     *
     * @return int
     */
    public function getIntervenantNom()
    {
        return $this->intervenantNom;
    }

    /**
     * Set intervenantPercent
     *
     * @param integer $intervenantPercent
     *
     * @return Commision
     */
    public function setIntervenantPercent($intervenantPercent)
    {
        $this->intervenantPercent = $intervenantPercent;

        return $this;
    }

    /**
     * Get intervenantPercent
     *
     * @return int
     */
    public function getIntervenantPercent()
    {
        return $this->intervenantPercent;
    }

    /**
     * Set intervenantHt
     *
     * @param integer $intervenantHt
     *
     * @return Commision
     */
    public function setIntervenantHt($intervenantHt)
    {
        $this->intervenantHt = $intervenantHt;

        return $this;
    }

    /**
     * Get intervenantHt
     *
     * @return int
     */
    public function getIntervenantHt()
    {
        return $this->intervenantHt;
    }

    /**
     * Set intervenantTtc
     *
     * @param integer $intervenantTtc
     *
     * @return Commision
     */
    public function setIntervenantTtc($intervenantTtc)
    {
        $this->intervenantTtc = $intervenantTtc;

        return $this;
    }

    /**
     * Get intervenantTtc
     *
     * @return int
     */
    public function getIntervenantTtc()
    {
        return $this->intervenantTtc;
    }

    /**
     * Set intervenantMontant
     *
     * @param integer $intervenantMontant
     *
     * @return Commision
     */
    public function setIntervenantMontant($intervenantMontant)
    {
        $this->intervenantMontant = $intervenantMontant;

        return $this;
    }

    /**
     * Get intervenantMontant
     *
     * @return int
     */
    public function getIntervenantMontant()
    {
        return $this->intervenantMontant;
    }

    /**
     * Set marketingNom
     *
     * @param string $marketingNom
     *
     * @return Commision
     */
    public function setMarketingNom($marketingNom)
    {
        $this->marketingNom = $marketingNom;

        return $this;
    }

    /**
     * Get marketingNom
     *
     * @return string
     */
    public function getMarketingNom()
    {
        return $this->marketingNom;
    }

    /**
     * Set marketingPercent
     *
     * @param integer $marketingPercent
     *
     * @return Commision
     */
    public function setMarketingPercent($marketingPercent)
    {
        $this->marketingPercent = $marketingPercent;

        return $this;
    }

    /**
     * Get marketingPercent
     *
     * @return integer
     */
    public function getMarketingPercent()
    {
        return $this->marketingPercent;
    }

    /**
     * Set marketingMontant
     *
     * @param integer $marketingMontant
     *
     * @return Commision
     */
    public function setMarketingMontant($marketingMontant)
    {
        $this->marketingMontant = $marketingMontant;

        return $this;
    }

    /**
     * Get marketingMontant
     *
     * @return integer
     */
    public function getMarketingMontant()
    {
        return $this->marketingMontant;
    }

    /**
     * Set responsableNom
     *
     * @param string $responsableNom
     *
     * @return Commision
     */
    public function setResponsableNom($responsableNom)
    {
        $this->responsableNom = $responsableNom;

        return $this;
    }

    /**
     * Get responsableNom
     *
     * @return string
     */
    public function getResponsableNom()
    {
        return $this->responsableNom;
    }

    /**
     * Set responsablePercent
     *
     * @param integer $responsablePercent
     *
     * @return Commision
     */
    public function setResponsablePercent($responsablePercent)
    {
        $this->responsablePercent = $responsablePercent;

        return $this;
    }

    /**
     * Get responsablePercent
     *
     * @return integer
     */
    public function getResponsablePercent()
    {
        return $this->responsablePercent;
    }

    /**
     * Set responsableMontant
     *
     * @param integer $responsableMontant
     *
     * @return Commision
     */
    public function setResponsableMontant($responsableMontant)
    {
        $this->responsableMontant = $responsableMontant;

        return $this;
    }

    /**
     * Get responsableMontant
     *
     * @return integer
     */
    public function getResponsableMontant()
    {
        return $this->responsableMontant;
    }

    /**
     * Set responsablepNom
     *
     * @param string $responsablepNom
     *
     * @return Commision
     */
    public function setResponsablepNom($responsablepNom)
    {
        $this->responsablepNom = $responsablepNom;

        return $this;
    }

    /**
     * Get responsablepNom
     *
     * @return string
     */
    public function getResponsablepNom()
    {
        return $this->responsablepNom;
    }

    /**
     * Set responsablepPercent
     *
     * @param integer $responsablepPercent
     *
     * @return Commision
     */
    public function setResponsablepPercent($responsablepPercent)
    {
        $this->responsablepPercent = $responsablepPercent;

        return $this;
    }

    /**
     * Get responsablepPercent
     *
     * @return integer
     */
    public function getResponsablepPercent()
    {
        return $this->responsablepPercent;
    }

    /**
     * Set responsablepMontant
     *
     * @param integer $responsablepMontant
     *
     * @return Commision
     */
    public function setResponsablepMontant($responsablepMontant)
    {
        $this->responsablepMontant = $responsablepMontant;

        return $this;
    }

    /**
     * Get responsablepMontant
     *
     * @return integer
     */
    public function getResponsablepMontant()
    {
        return $this->responsablepMontant;
    }

    /**
     * Set superviseurNom
     *
     * @param string $superviseurNom
     *
     * @return Commision
     */
    public function setSuperviseurNom($superviseurNom)
    {
        $this->superviseurNom = $superviseurNom;

        return $this;
    }

    /**
     * Get superviseurNom
     *
     * @return string
     */
    public function getSuperviseurNom()
    {
        return $this->superviseurNom;
    }

    /**
     * Set superviseurPercent
     *
     * @param integer $superviseurPercent
     *
     * @return Commision
     */
    public function setSuperviseurPercent($superviseurPercent)
    {
        $this->superviseurPercent = $superviseurPercent;

        return $this;
    }

    /**
     * Get superviseurPercent
     *
     * @return integer
     */
    public function getSuperviseurPercent()
    {
        return $this->superviseurPercent;
    }

    /**
     * Set superviseurMontant
     *
     * @param integer $superviseurMontant
     *
     * @return Commision
     */
    public function setSuperviseurMontant($superviseurMontant)
    {
        $this->superviseurMontant = $superviseurMontant;

        return $this;
    }

    /**
     * Get superviseurMontant
     *
     * @return integer
     */
    public function getSuperviseurMontant()
    {
        return $this->superviseurMontant;
    }

    /**
     * Set responsablemNom
     *
     * @param string $responsablemNom
     *
     * @return Commision
     */
    public function setResponsablemNom($responsablemNom)
    {
        $this->responsablemNom = $responsablemNom;

        return $this;
    }

    /**
     * Get responsablemNom
     *
     * @return string
     */
    public function getResponsablemNom()
    {
        return $this->responsablemNom;
    }

    /**
     * Set responsablemPercent
     *
     * @param integer $responsablemPercent
     *
     * @return Commision
     */
    public function setResponsablemPercent($responsablemPercent)
    {
        $this->responsablemPercent = $responsablemPercent;

        return $this;
    }

    /**
     * Get responsablemPercent
     *
     * @return integer
     */
    public function getResponsablemPercent()
    {
        return $this->responsablemPercent;
    }

    /**
     * Set responsablemMontant
     *
     * @param integer $responsablemMontant
     *
     * @return Commision
     */
    public function setResponsablemMontant($responsablemMontant)
    {
        $this->responsablemMontant = $responsablemMontant;

        return $this;
    }

    /**
     * Get responsablemMontant
     *
     * @return integer
     */
    public function getResponsablemMontant()
    {
        return $this->responsablemMontant;
    }
}
