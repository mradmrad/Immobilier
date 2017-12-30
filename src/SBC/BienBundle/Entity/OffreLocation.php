<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreLocation
 *
 * @ORM\Table(name="offre_location")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\OffreLocationRepository")
 */
class OffreLocation extends Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type_contrat", type="string", length=255 , nullable=true)
     */
    protected $contratType;

    /**
     * @var string
     *
     * @ORM\Column(name="usage", type="string", length=255 , nullable=true)
     */
    protected $usage;
    /**
     * @var string
     *
     * @ORM\Column(name="loyer_ht", type="string", length=255 , nullable=true)
     */
    protected $loyerHT;
    /**
     * @var string
     *
     * @ORM\Column(name="loyer_ttc", type="string", length=255 , nullable=true)
     */
    protected $loyerTTC;

    /**
     * @var string
     *
     * @ORM\Column(name="retenue", type="string", length=255 , nullable=true)
     */
    protected $retenue;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=255 , nullable=true)
     */
    protected $modalite;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite_per", type="string", length=255 , nullable=true)
     */
    protected $modalitePer;

    /**
     * @var string
     *
     * @ORM\Column(name="garantie", type="string", length=255 , nullable=true)
     */
    protected $garantie;

    /**
     * @var string
     *
     * @ORM\Column(name="augmentation", type="string", length=255 , nullable=true)
     */
    protected $augmentation;
    /**
     * @var string
     *
     * @ORM\Column(name="augmentation_per", type="string", length=255 , nullable=true)
     */
    protected $augmentationPer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="entry_date", type="datetime" , nullable=true)
     */
    protected $entryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="entry", type="string", length=255 , nullable=true)
     */
    protected $entry;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_deht", type="string", length=255 , nullable=true)
     */
    protected $prixDEHT;
    /**
     * @var string
     *
     * @ORM\Column(name="prix_dettc", type="string", length=255 , nullable=true)
     */
    protected $entryDETTC;
    /**
     * @var string
     *
     * @ORM\Column(name="moyen_de", type="string", length=255 , nullable=true)
     */
    protected $moyenDE;
    /**
     * @var string
     *
     * @ORM\Column(name="moyen_detype", type="string", length=255 , nullable=true)
     */
    protected $moyenDEType;
    /**
     * @var string
     *
     * @ORM\Column(name="avance_de", type="string", length=255 , nullable=true)
     */
    protected $avanceDE;
    /**
     * @var string
     *
     * @ORM\Column(name="avance_type", type="string", length=255 , nullable=true)
     */
    protected $avanceType;
    /**
     * @var string
     *
     * @ORM\Column(name="modalite_de", type="string", length=255 , nullable=true)
     */
    protected $modaliteDE;

    /**
     * @var string
     *
     * @ORM\Column(name="condition_de", type="string", length=255 , nullable=true)
     */
    protected $conditionDE;

    /**
     * @var string
     *
     * @ORM\Column(name="irrevocabilite", type="string", length=255 , nullable=true)
     */
    protected $irrevocabilite;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat", inversedBy="propositionsLocation")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $mandat;


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
     * Set contratType
     *
     * @param string $contratType
     *
     * @return OffreLocation
     */
    public function setContratType($contratType)
    {
        $this->contratType = $contratType;

        return $this;
    }

    /**
     * Get contratType
     *
     * @return string
     */
    public function getContratType()
    {
        return $this->contratType;
    }

    /**
     * Set usage
     *
     * @param string $usage
     *
     * @return OffreLocation
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * Get usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Set loyerHT
     *
     * @param string $loyerHT
     *
     * @return OffreLocation
     */
    public function setLoyerHT($loyerHT)
    {
        $this->loyerHT = $loyerHT;

        return $this;
    }

    /**
     * Get loyerHT
     *
     * @return string
     */
    public function getLoyerHT()
    {
        return $this->loyerHT;
    }

    /**
     * Set loyerTTC
     *
     * @param string $loyerTTC
     *
     * @return OffreLocation
     */
    public function setLoyerTTC($loyerTTC)
    {
        $this->loyerTTC = $loyerTTC;

        return $this;
    }

    /**
     * Get loyerTTC
     *
     * @return string
     */
    public function getLoyerTTC()
    {
        return $this->loyerTTC;
    }

    /**
     * Set retenue
     *
     * @param string $retenue
     *
     * @return OffreLocation
     */
    public function setRetenue($retenue)
    {
        $this->retenue = $retenue;

        return $this;
    }

    /**
     * Get retenue
     *
     * @return string
     */
    public function getRetenue()
    {
        return $this->retenue;
    }

    /**
     * Set modalite
     *
     * @param string $modalite
     *
     * @return OffreLocation
     */
    public function setModalite($modalite)
    {
        $this->modalite = $modalite;

        return $this;
    }

    /**
     * Get modalite
     *
     * @return string
     */
    public function getModalite()
    {
        return $this->modalite;
    }

    /**
     * Set modalitePer
     *
     * @param string $modalitePer
     *
     * @return OffreLocation
     */
    public function setModalitePer($modalitePer)
    {
        $this->modalitePer = $modalitePer;

        return $this;
    }

    /**
     * Get modalitePer
     *
     * @return string
     */
    public function getModalitePer()
    {
        return $this->modalitePer;
    }

    /**
     * Set garantie
     *
     * @param string $garantie
     *
     * @return OffreLocation
     */
    public function setGarantie($garantie)
    {
        $this->garantie = $garantie;

        return $this;
    }

    /**
     * Get garantie
     *
     * @return string
     */
    public function getGarantie()
    {
        return $this->garantie;
    }

    /**
     * Set augmentation
     *
     * @param string $augmentation
     *
     * @return OffreLocation
     */
    public function setAugmentation($augmentation)
    {
        $this->augmentation = $augmentation;

        return $this;
    }

    /**
     * Get augmentation
     *
     * @return string
     */
    public function getAugmentation()
    {
        return $this->augmentation;
    }

    /**
     * Set augmentationPer
     *
     * @param string $augmentationPer
     *
     * @return OffreLocation
     */
    public function setAugmentationPer($augmentationPer)
    {
        $this->augmentationPer = $augmentationPer;

        return $this;
    }

    /**
     * Get augmentationPer
     *
     * @return string
     */
    public function getAugmentationPer()
    {
        return $this->augmentationPer;
    }

    /**
     * Set entryDate
     *
     * @param \DateTime $entryDate
     *
     * @return OffreLocation
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get entryDate
     *
     * @return \DateTime
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * Set entry
     *
     * @param string $entry
     *
     * @return OffreLocation
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set prixDEHT
     *
     * @param string $prixDEHT
     *
     * @return OffreLocation
     */
    public function setPrixDEHT($prixDEHT)
    {
        $this->prixDEHT = $prixDEHT;

        return $this;
    }

    /**
     * Get prixDEHT
     *
     * @return string
     */
    public function getPrixDEHT()
    {
        return $this->prixDEHT;
    }

    /**
     * Set entryDETTC
     *
     * @param string $entryDETTC
     *
     * @return OffreLocation
     */
    public function setEntryDETTC($entryDETTC)
    {
        $this->entryDETTC = $entryDETTC;

        return $this;
    }

    /**
     * Get entryDETTC
     *
     * @return string
     */
    public function getEntryDETTC()
    {
        return $this->entryDETTC;
    }

    /**
     * Set moyenDE
     *
     * @param string $moyenDE
     *
     * @return OffreLocation
     */
    public function setMoyenDE($moyenDE)
    {
        $this->moyenDE = $moyenDE;

        return $this;
    }

    /**
     * Get moyenDE
     *
     * @return string
     */
    public function getMoyenDE()
    {
        return $this->moyenDE;
    }

    /**
     * Set moyenDEType
     *
     * @param string $moyenDEType
     *
     * @return OffreLocation
     */
    public function setMoyenDEType($moyenDEType)
    {
        $this->moyenDEType = $moyenDEType;

        return $this;
    }

    /**
     * Get moyenDEType
     *
     * @return string
     */
    public function getMoyenDEType()
    {
        return $this->moyenDEType;
    }

    /**
     * Set avanceDE
     *
     * @param string $avanceDE
     *
     * @return OffreLocation
     */
    public function setAvanceDE($avanceDE)
    {
        $this->avanceDE = $avanceDE;

        return $this;
    }

    /**
     * Get avanceDE
     *
     * @return string
     */
    public function getAvanceDE()
    {
        return $this->avanceDE;
    }

    /**
     * Set avanceType
     *
     * @param string $avanceType
     *
     * @return OffreLocation
     */
    public function setAvanceType($avanceType)
    {
        $this->avanceType = $avanceType;

        return $this;
    }

    /**
     * Get avanceType
     *
     * @return string
     */
    public function getAvanceType()
    {
        return $this->avanceType;
    }

    /**
     * Set modaliteDE
     *
     * @param string $modaliteDE
     *
     * @return OffreLocation
     */
    public function setModaliteDE($modaliteDE)
    {
        $this->modaliteDE = $modaliteDE;

        return $this;
    }

    /**
     * Get modaliteDE
     *
     * @return string
     */
    public function getModaliteDE()
    {
        return $this->modaliteDE;
    }

    /**
     * Set conditionDE
     *
     * @param string $conditionDE
     *
     * @return OffreLocation
     */
    public function setConditionDE($conditionDE)
    {
        $this->conditionDE = $conditionDE;

        return $this;
    }

    /**
     * Get conditionDE
     *
     * @return string
     */
    public function getConditionDE()
    {
        return $this->conditionDE;
    }

    /**
     * Set mandat
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandat
     *
     * @return OffreLocation
     */
    public function setMandat(\SBC\BienBundle\Entity\Mandat $mandat = null)
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
     * Set irrevocabilite
     *
     * @param string $irrevocabilite
     *
     * @return OffreLocation
     */
    public function setIrrevocabilite($irrevocabilite)
    {
        $this->irrevocabilite = $irrevocabilite;

        return $this;
    }

    /**
     * Get irrevocabilite
     *
     * @return string
     */
    public function getIrrevocabilite()
    {
        return $this->irrevocabilite;
    }

    public function __toString()
    {
        parent::__toString();
    }
}
