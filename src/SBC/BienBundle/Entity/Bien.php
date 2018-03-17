<?php

namespace SBC\BienBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use SBC\GeoTunisieBundle\Entity\Adresse;
use SBC\PersonnelBundle\Entity\Personnel;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\BienRepository")
 * @Vich\Uploadable
 */
class Bien implements \JsonSerializable
{

    const RECHERCHE = 'RECHERCHE';
    const NOUVELLE_NON_CONFIRMEE = 'NOUVELLE_NON_CONFIRMEE';
    const NOUVELLE_CONFIRMEE = 'NOUVELLE_CONFIRMEE';
    const ACQUISITION = 'ACQUISITION';
    const MANDAT = 'MANDAT';
    const VENTE = 'Vente';
    const LOCATION = 'Location';

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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=255, nullable=true)
     */
    private $nature;

    /**
     * @var float
     *
     * @ORM\Column(name="estimatedPrice", type="float", nullable=true)
     */
    private $estimatedPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="priceType", type="string", length=255, nullable=true)
     */
    private $priceType;

    /**
     * @var float
     *
     * @ORM\Column(name="display_price", type="float", nullable=true)
     */
    private $displayPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="total_area", type="float", nullable=true)
     */
    private $totalArea;

    /**
     * @var float
     *
     * @ORM\Column(name="covered_area", type="float", nullable=true)
     */
    private $coveredArea;

    /**
     * @var int
     *
     * @ORM\Column(name="bedroom", type="integer", nullable=true)
     */
    private $bedroom;

    /**
     * @var int
     *
     * @ORM\Column(name="piece", type="integer", nullable=true)
     */
    private $piece;

    /**
     * @var int
     *
     * @ORM\Column(name="sde", type="integer", nullable=true)
     */
    private $sde;

    /**
     * @var int
     *
     * @ORM\Column(name="bathroom", type="integer", nullable=true)
     */
    private $bathroom;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="architecture", type="string", length=255, nullable=true)
     */
    private $architecture;

    /**
     * @var string
     *
     * @ORM\Column(name="provenance", type="string", length=255, nullable=true)
     */
    private $provenance;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_prop", type="string", length=255, nullable=true)
     */
    private $nomProp;

    /**
     * @var string
     *
     * @ORM\Column(name="usage_b", type="string", length=255, nullable=true)
     */
    private $usage;

    /**
     * @var string
     *
     * @ORM\Column(name="exterieur", type="string", length=255, nullable=true)
     */
    private $exterieur;


    /**
     * @var bool
     *
     * @ORM\Column(name="furnished", type="boolean", nullable=true)
     */
    private $furnished;

    /**
     * @var bool
     *
     * @ORM\Column(name="ismapped", type="boolean", nullable=true)
     */
    private $ismapped;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;


    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Agency")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agency;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\TypeBien")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeBien;

    /**
     * @Vich\UploadableField(mapping="bien_main_picture", fileNameProperty="mainPictureName")
     * @Assert\File(
     *     mimeTypes = {"image/png", "image/jpeg", "image/jpg"},
     *     mimeTypesMessage = "Please upload a valid IMAGE"
     * )
     *
     * @var File
     */
    private $mainPictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $mainPictureName;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\BienPicture", mappedBy="bien", cascade={"persist", "merge", "remove"})
     */

    private $pictures;
    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\BienAttachement", mappedBy="bien", cascade={"persist", "merge", "remove"})
     */

    private $papers;


    /**
     * @ORM\OneToOne(targetEntity="SBC\BienBundle\Entity\Commision", cascade={"persist", "merge", "remove"})
     */

    private $commision;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Equipement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $equipements;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Exterieur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $exterieurs;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\ProprietaireSelf", mappedBy="bien", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $owners;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\RepresentantBien", mappedBy="bien", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="representant_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $representants;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Locataire", mappedBy="bien", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="locataire_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $locataires;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Procuration", mappedBy="bien", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="procuration_id", referencedColumnName="id")
     * @Assert\Valid()
     */
    private $procurations;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $representantscomme;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $societePoste;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $representantNom;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\GeoTunisieBundle\Entity\Adresse")
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255 , nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255 , nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="residence", type="string", length=255 , nullable=true)
     */
    private $residence;

    /**
     * @var string
     *
     * @ORM\Column(name="bloc", type="string", length=255 , nullable=true)
     */
    private $bloc;

    /**
     * @var string
     *
     * @ORM\Column(name="etage", type="string", length=255 , nullable=true)
     */
    private $etage;

    /**
     * @var string
     *
     * @ORM\Column(name="numApp", type="string", length=255 , nullable=true)
     */
    private $numApp;

    /**
     * @var string
     *
     * @ORM\Column(name="nbrEtage", type="string", length=255 , nullable=true)
     */
    private $nbrEtage;

    /**
     * @var string
     *
     * @ORM\Column(name="espaceCommun", type="string", length=255 , nullable=true)
     */
    private $espaceCommun;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=255 , nullable=true)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="coSol", type="string", length=255 , nullable=true)
     */
    private $coSol;

    /**
     * @var string
     *
     * @ORM\Column(name="coFinanciere", type="string", length=255 , nullable=true)
     */
    private $coFinanciere;

    /**
     * @var string
     *
     * @ORM\Column(name="facade", type="string", length=255 , nullable=true)
     */
    private $facade;

    /**
     * @var string
     *
     * @ORM\Column(name="vitrine", type="string", length=255 , nullable=true)
     */
    private $vitrine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="construction", type="string", length=255 , nullable=true)
     */
    private $construction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="renovation", type="string", length=255 , nullable=true)
     */
    private $renovation;

    /**
     * @var string
     *
     * @ORM\Column(name="statutConstruction", type="string", length=255 , nullable=true)
     */
    private $statutConstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="formeTerrain", type="string", length=255 , nullable=true)
     */
    private $formeTerrain;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", length=255 , nullable=true)
     */
    private $orientation;

    /**
     * @var string
     *
     * @ORM\Column(name="delimination", type="string", length=255 , nullable=true)
     */
    private $delimination;

    /**
     * @var string
     *
     * @ORM\Column(name="stationnement", type="string", length=255 , nullable=true)
     */
    private $stationnement;

    /**
     * @var string
     *
     * @ORM\Column(name="largeurFacade", type="string", length=255 , nullable=true)
     */
    private $largeurFacade;

    /**
     * @var string
     *
     * @ORM\Column(name="ProfondeurFacade", type="string", length=255 , nullable=true)
     */
    private $ProfondeurFacade;

    /**
     * @var string
     *
     * @ORM\Column(name="panorama", type="string", length=255 , nullable=true)
     */
    private $panorama;

    /**
     * @var string
     *
     * @ORM\Column(name="paysage", type="string", length=255 , nullable=true)
     */
    private $paysage;

    /**
     * @var string
     *
     * @ORM\Column(name="loisir", type="string", length=255 , nullable=true)
     */
    private $loisir;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255 , nullable=true)
     */
    private $style;

    /**
     * @var array
     *
     * @ORM\Column(name="proximite", type="array", length=255 , nullable=true)
     */
    private $proximite;

    /**
     * @var string
     *
     * @ORM\Column(name="distanceCV", type="string", length=255 , nullable=true)
     */
    private $distanceCV;


    /**
     * @var array
     *
     * @ORM\Column(name="influence", type="array", length=255 , nullable=true)
     */
    private $influence;

    /**
     * @var string
     *
     * @ORM\Column(name="margeNegociation", type="string", length=255 , nullable=true)
     */
    private $margeNegociation;


    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Contrat", mappedBy="bien", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="contrat_id", referencedColumnName="id")
     */
    private $contrats;



    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Commodite", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commodites;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\TacheNouvelle", mappedBy="nouvelle")
     */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\NouvelleMeeting", mappedBy="nouvelle")
     */
    private $meetings;

    /**
     * @ORM\OneToOne(targetEntity="SBC\BienBundle\Entity\Canalisation", cascade={"persist"})
     */
    private $canalisations;

    private $transfert;

    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->pictures = new ArrayCollection();
        $this->equipements = new ArrayCollection();
        $this->exterieurs = new ArrayCollection();
        $this->contrats = new ArrayCollection();
        $this->commodites = new ArrayCollection();
        $this->taches = new ArrayCollection();
        $this->meetings = new ArrayCollection();
        $this->owners = new ArrayCollection();
        $this->procurations = new ArrayCollection();
        $this->representants = new ArrayCollection();
        $this->evaluation = new ArrayCollection();

        $this->coveredArea = 0;
        $this->totalArea = 0;
        $this->estimatedPrice = 0;
        $this->displayPrice = 0;
        $this->price = 0;

        $this->transfert = 0;
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function __toString()
    {
        return $this->title;
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
     * Set title
     *
     * @param string $title
     *
     * @return Bien
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Bien
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Bien
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nature
     *
     * @param string $nature
     *
     * @return Bien
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set estimatedPrice
     *
     * @param float $estimatedPrice
     *
     * @return Bien
     */
    public function setEstimatedPrice($estimatedPrice)
    {
        $this->estimatedPrice = $estimatedPrice;

        return $this;
    }

    /**
     * Get estimatedPrice
     *
     * @return float
     */
    public function getEstimatedPrice()
    {
        return $this->estimatedPrice;
    }

    /**
     * Set totalArea
     *
     * @param float $totalArea
     *
     * @return Bien
     */
    public function setTotalArea($totalArea)
    {
        $this->totalArea = $totalArea;

        return $this;
    }

    /**
     * Get totalArea
     *
     * @return float
     */
    public function getTotalArea()
    {
        return $this->totalArea;
    }

    /**
     * Set coveredArea
     *
     * @param float $coveredArea
     *
     * @return Bien
     */
    public function setCoveredArea($coveredArea)
    {
        $this->coveredArea = $coveredArea;

        return $this;
    }

    /**
     * Get coveredArea
     *
     * @return float
     */
    public function getCoveredArea()
    {
        return $this->coveredArea;
    }

    /**
     * Set bedroom
     *
     * @param integer $bedroom
     *
     * @return Bien
     */
    public function setBedroom($bedroom)
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    /**
     * Get bedroom
     *
     * @return int
     */
    public function getBedroom()
    {
        return $this->bedroom;
    }

    /**
     * Set bathroom
     *
     * @param integer $bathroom
     *
     * @return Bien
     */
    public function setBathroom($bathroom)
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    /**
     * Get bathroom
     *
     * @return int
     */
    public function getBathroom()
    {
        return $this->bathroom;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Bien
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }


    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Bien
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Bien
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set furnished
     *
     * @param boolean $furnished
     *
     * @return Bien
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;

        return $this;
    }

    /**
     * Get furnished
     *
     * @return bool
     */
    public function getFurnished()
    {
        return $this->furnished;
    }


    /**
     * Set ismapped
     *
     * @param boolean $ismapped
     *
     * @return Bien
     */
    public function setIsMapped($ismapped)
    {
        $this->ismapped = $ismapped;

        return $this;
    }

    /**
     * Get ismapped
     *
     * @return bool
     */
    public function getIsMapped()
    {
        return $this->ismapped;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Bien
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
     * Set price
     *
     * @param float $price
     *
     * @return Bien
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceType
     *
     * @param string $priceType
     *
     * @return Bien
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;

        return $this;
    }

    /**
     * Get priceType
     *
     * @return string
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * Set displayPrice
     *
     * @param float $displayPrice
     *
     * @return Bien
     */
    public function setDisplayPrice($displayPrice)
    {
        $this->displayPrice = $displayPrice;

        return $this;
    }

    /**
     * Get displayPrice
     *
     * @return float
     */
    public function getDisplayPrice()
    {
        return $this->displayPrice;
    }

    /**
     * Set createdbBy
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $createdBy
     *
     * @return Bien
     */
    public function setCreatedBy(Personnel $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set agency
     *
     * @param \SBC\BienBundle\Entity\Agency $agency
     *
     * @return Bien
     */
    public function setAgency(Agency $agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set typeBien
     *
     * @param \SBC\BienBundle\Entity\TypeBien $typeBien
     *
     * @return Bien
     */
    public function setTypeBien(TypeBien $typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return \SBC\BienBundle\Entity\TypeBien
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $mainPictureFile
     *
     * @return Bien
     */
    public function setMainPictureFile(File $mainPictureFile = null)
    {
        $this->mainPictureFile = $mainPictureFile;

        if ($mainPictureFile) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getMainPictureFile()
    {
        return $this->mainPictureFile;
    }

    /**
     *
     * @param string $mainPictureName
     *
     * @return Bien
     */
    public function setMainPictureName($mainPictureName)
    {
        $this->mainPictureName = $mainPictureName;

        return $this;
    }

    /**
     *
     * @return string|null
     */
    public function getMainPictureName()
    {
        return $this->mainPictureName;
    }


    public function addPicture(BienPicture $picture)
    {
        $picture->setBien($this);
        $this->pictures[] = $picture;


        return $this;
    }

    public function removePicture(BienPicture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    public function getPictures()
    {
        return $this->pictures;
    }


    public function addEquipement(Equipement $equipement)
    {

        $this->equipements[] = $equipement;

        return $this;
    }

    public function removeEquipement(Equipement $equipement)
    {

        $this->equipements->removeElement($equipement);
    }


    public function getEquipements()
    {
        return $this->equipements;
    }


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Bien
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set address
     *
     * @param \SBC\GeoTunisieBundle\Entity\Adresse $address
     *
     * @return Bien
     */
    public function setAddress(Adresse $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \SBC\GeoTunisieBundle\Entity\Adresse
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function addContrat(Contrat $contrat)
    {
        $contrat->setBien($this);
        $this->contrats[] = $contrat;

        return $this;
    }

    public function removeContrat(Contrat $contrat)
    {
        $this->contrats->removeElement($contrat);
        //relation facultative
        $contrat->setBien(null);
    }

    public function getContrats()
    {
        return $this->contrats;
    }


    /**
     * @param Commodite $commodite
     * @return $this
     */
    public function addCommodite(Commodite $commodite)
    {

        $this->commodites[] = $commodite;

        return $this;
    }

    /**
     * @param Commodite $commodite
     */
    public function removeCommodite(Commodite $commodite)
    {

        $this->commodites->removeElement($commodite);
    }

    /**
     * @return ArrayCollection
     */

    public function getCommodites()
    {
        return $this->commodites;
    }


    /**
     * @param TacheNouvelle $tache
     * @return Bien
     */
    public function addTache(TacheNouvelle $tache)
    {
        $this->taches[] = $tache;
        $tache->setNouvelle($this);

        return $this;
    }

    /**
     * @param TacheNouvelle $tache
     */
    public function removeTache(TacheNouvelle $tache)
    {
        $this->taches->removeElement($tache);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $tache->setNouvelle(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getTaches()
    {
        return $this->taches;
    }


    /**
     * @param NouvelleMeeting $meeting
     * @return Bien
     */
    public function addMeeting(NouvelleMeeting $meeting)
    {
        $this->meetings[] = $meeting;
        $meeting->setNouvelle($this);

        return $this;
    }

    /**
     * @param NouvelleMeeting $meeting
     */
    public function removeMeeting(NouvelleMeeting $meeting)
    {
        $this->meetings->removeElement($meeting);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $meeting->setNouvelle(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getMeetings()
    {
        return $this->meetings;
    }


    /**
     * @param $transfert
     * @return $this
     */
    public function setTransfert($transfert)
    {
        $this->transfert = $transfert;

        return $this;
    }

    /**
     * @return int
     */
    public function getTransfert()
    {
        return $this->transfert;
    }


    /**
     * @param ProprietaireSelf $proprietaire
     * @return $this
     */
    public function addOwner(ProprietaireSelf $proprietaire)
    {

        $proprietaire->setBien($this);
        $this->owners[] = $proprietaire;

        return $this;
    }

    /**
     * @param ProprietaireSelf $proprietaire
     */
    public function removeOwner(ProprietaireSelf $proprietaire)
    {

        $this->owners->removeElement($proprietaire);
    }

    /**
     * @return ArrayCollection
     */

    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @param Procuration $procuration
     * @return $this
     */

    public function addProcuration(Procuration $procuration)
    {
        $procuration->setBien($this);
        $procuration->setBien($this);
        $this->procurations[] = $procuration;

        return $this;
    }

    /**
     * @param Procuration $procuration
     */
    public function removeProcuration(Procuration $procuration)
    {

        $this->procurations->removeElement($procuration);
    }

    /**
     * @return ArrayCollection
     */
    public function getProcurations()
    {
        return $this->procurations;
    }


    /**
     * Set residence
     *
     * @param string $residence
     *
     * @return Bien
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get residence
     *
     * @return string
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * Set bloc
     *
     * @param string $bloc
     *
     * @return Bien
     */
    public function setBloc($bloc)
    {
        $this->bloc = $bloc;

        return $this;
    }

    /**
     * Get bloc
     *
     * @return string
     */
    public function getBloc()
    {
        return $this->bloc;
    }

    /**
     * Set etage
     *
     * @param string $etage
     *
     * @return Bien
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage
     *
     * @return string
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * Set numApp
     *
     * @param string $numApp
     *
     * @return Bien
     */
    public function setNumApp($numApp)
    {
        $this->numApp = $numApp;

        return $this;
    }

    /**
     * Get numApp
     *
     * @return string
     */
    public function getNumApp()
    {
        return $this->numApp;
    }

    /**
     * Set nbrEtage
     *
     * @param string $nbrEtage
     *
     * @return Bien
     */
    public function setNbrEtage($nbrEtage)
    {
        $this->nbrEtage = $nbrEtage;

        return $this;
    }

    /**
     * Get nbrEtage
     *
     * @return string
     */
    public function getNbrEtage()
    {
        return $this->nbrEtage;
    }

    /**
     * Set copropriete
     *
     * @param string $copropriete
     *
     * @return Bien
     */
    public function setCopropriete($copropriete)
    {
        $this->copropriete = $copropriete;

        return $this;
    }

    /**
     * Get copropriete
     *
     * @return string
     */
    public function getCopropriete()
    {
        return $this->copropriete;
    }

    /**
     * Set typeCopropriete
     *
     * @param string $typeCopropriete
     *
     * @return Bien
     */
    public function setTypeCopropriete($typeCopropriete)
    {
        $this->typeCopropriete = $typeCopropriete;

        return $this;
    }

    /**
     * Get typeCopropriete
     *
     * @return string
     */
    public function getTypeCopropriete()
    {
        return $this->typeCopropriete;
    }

    /**
     * Add tach
     *
     * @param \SBC\BienBundle\Entity\TacheNouvelle $tach
     *
     * @return Bien
     */
    public function addTach(\SBC\BienBundle\Entity\TacheNouvelle $tach)
    {
        $this->taches[] = $tach;

        return $this;
    }

    /**
     * Remove tach
     *
     * @param \SBC\BienBundle\Entity\TacheNouvelle $tach
     */
    public function removeTach(\SBC\BienBundle\Entity\TacheNouvelle $tach)
    {
        $this->taches->removeElement($tach);
    }

    /**
     * Set espaceCommun
     *
     * @param string $espaceCommun
     *
     * @return Bien
     */
    public function setEspaceCommun($espaceCommun)
    {
        $this->espaceCommun = $espaceCommun;

        return $this;
    }

    /**
     * Get espaceCommun
     *
     * @return string
     */
    public function getEspaceCommun()
    {
        return $this->espaceCommun;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return Bien
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set coSol
     *
     * @param string $coSol
     *
     * @return Bien
     */
    public function setCoSol($coSol)
    {
        $this->coSol = $coSol;

        return $this;
    }

    /**
     * Get coSol
     *
     * @return string
     */
    public function getCoSol()
    {
        return $this->coSol;
    }

    /**
     * Set coFinanciere
     *
     * @param string $coFinanciere
     *
     * @return Bien
     */
    public function setCoFinanciere($coFinanciere)
    {
        $this->coFinanciere = $coFinanciere;

        return $this;
    }

    /**
     * Get coFinanciere
     *
     * @return string
     */
    public function getCoFinanciere()
    {
        return $this->coFinanciere;
    }

    /**
     * Add exterieur
     *
     * @param \SBC\BienBundle\Entity\Exterieur $exterieur
     *
     * @return Bien
     */
    public function addExterieur(\SBC\BienBundle\Entity\Exterieur $exterieur)
    {
        $this->exterieurs[] = $exterieur;

        return $this;
    }

    /**
     * Remove exterieur
     *
     * @param \SBC\BienBundle\Entity\Exterieur $exterieur
     */
    public function removeExterieur(\SBC\BienBundle\Entity\Exterieur $exterieur)
    {
        $this->exterieurs->removeElement($exterieur);
    }

    /**
     * Get exterieurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExterieurs()
    {
        return $this->exterieurs;
    }

    /**
     * Set facade
     *
     * @param string $facade
     *
     * @return Bien
     */
    public function setFacade($facade)
    {
        $this->facade = $facade;

        return $this;
    }

    /**
     * Get facade
     *
     * @return string
     */
    public function getFacade()
    {
        return $this->facade;
    }

    /**
     * Set vitrine
     *
     * @param string $vitrine
     *
     * @return Bien
     */
    public function setVitrine($vitrine)
    {
        $this->vitrine = $vitrine;

        return $this;
    }

    /**
     * Get vitrine
     *
     * @return string
     */
    public function getVitrine()
    {
        return $this->vitrine;
    }

    /**
     * Set construction
     *
     * @param string $construction
     *
     * @return Bien
     */
    public function setConstruction($construction)
    {
        $this->construction = $construction;

        return $this;
    }

    /**
     * Get construction
     *
     * @return string
     */
    public function getConstruction()
    {
        return $this->construction;
    }

    /**
     * Set renovation
     *
     * @param string $renovation
     *
     * @return Bien
     */
    public function setRenovation($renovation)
    {
        $this->renovation = $renovation;

        return $this;
    }

    /**
     * Get renovation
     *
     * @return string
     */
    public function getRenovation()
    {
        return $this->renovation;
    }

    /**
     * Set statutConstruction
     *
     * @param string $statutConstruction
     *
     * @return Bien
     */
    public function setStatutConstruction($statutConstruction)
    {
        $this->statutConstruction = $statutConstruction;

        return $this;
    }

    /**
     * Get statutConstruction
     *
     * @return string
     */
    public function getStatutConstruction()
    {
        return $this->statutConstruction;
    }

    /**
     * Set formeTerrain
     *
     * @param string $formeTerrain
     *
     * @return Bien
     */
    public function setFormeTerrain($formeTerrain)
    {
        $this->formeTerrain = $formeTerrain;

        return $this;
    }

    /**
     * Get formeTerrain
     *
     * @return string
     */
    public function getFormeTerrain()
    {
        return $this->formeTerrain;
    }

    /**
     * Set orientation
     *
     * @param string $orientation
     *
     * @return Bien
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set delimination
     *
     * @param string $delimination
     *
     * @return Bien
     */
    public function setDelimination($delimination)
    {
        $this->delimination = $delimination;

        return $this;
    }

    /**
     * Get delimination
     *
     * @return string
     */
    public function getDelimination()
    {
        return $this->delimination;
    }

    /**
     * Set stationnement
     *
     * @param string $stationnement
     *
     * @return Bien
     */
    public function setStationnement($stationnement)
    {
        $this->stationnement = $stationnement;

        return $this;
    }

    /**
     * Get stationnement
     *
     * @return string
     */
    public function getStationnement()
    {
        return $this->stationnement;
    }

    /**
     * Set largeurFacade
     *
     * @param string $largeurFacade
     *
     * @return Bien
     */
    public function setLargeurFacade($largeurFacade)
    {
        $this->largeurFacade = $largeurFacade;

        return $this;
    }

    /**
     * Get largeurFacade
     *
     * @return string
     */
    public function getLargeurFacade()
    {
        return $this->largeurFacade;
    }

    /**
     * Set profondeurFacade
     *
     * @param string $profondeurFacade
     *
     * @return Bien
     */
    public function setProfondeurFacade($profondeurFacade)
    {
        $this->ProfondeurFacade = $profondeurFacade;

        return $this;
    }

    /**
     * Get profondeurFacade
     *
     * @return string
     */
    public function getProfondeurFacade()
    {
        return $this->ProfondeurFacade;
    }

    /**
     * Set canalisations
     *
     * @param \SBC\BienBundle\Entity\Canalisation $canalisations
     *
     * @return Bien
     */
    public function setCanalisations(\SBC\BienBundle\Entity\Canalisation $canalisations = null)
    {
        $this->canalisations = $canalisations;

        return $this;
    }

    /**
     * Get canalisations
     *
     * @return \SBC\BienBundle\Entity\Canalisation
     */
    public function getCanalisations()
    {
        return $this->canalisations;
    }

    /**
     * Set panorama
     *
     * @param string $panorama
     *
     * @return Bien
     */
    public function setPanorama($panorama)
    {
        $this->panorama = $panorama;

        return $this;
    }

    /**
     * Get panorama
     *
     * @return string
     */
    public function getPanorama()
    {
        return $this->panorama;
    }

    /**
     * Set paysage
     *
     * @param string $paysage
     *
     * @return Bien
     */
    public function setPaysage($paysage)
    {
        $this->paysage = $paysage;

        return $this;
    }

    /**
     * Get paysage
     *
     * @return string
     */
    public function getPaysage()
    {
        return $this->paysage;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return Bien
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set proximite
     *
     * @param string $proximite
     *
     * @return Bien
     */
    public function setProximite($proximite)
    {
        $this->proximite = $proximite;

        return $this;
    }

    /**
     * Get proximite
     *
     * @return string
     */
    public function getProximite()
    {
        return $this->proximite;
    }

    /**
     * Set distanceCV
     *
     * @param string $distanceCV
     *
     * @return Bien
     */
    public function setDistanceCV($distanceCV)
    {
        $this->distanceCV = $distanceCV;

        return $this;
    }

    /**
     * Get distanceCV
     *
     * @return string
     */
    public function getDistanceCV()
    {
        return $this->distanceCV;
    }

    /**
     * Set influence
     *
     * @param string $influence
     *
     * @return Bien
     */
    public function setInfluence($influence)
    {
        $this->influence = $influence;

        return $this;
    }

    /**
     * Get influence
     *
     * @return string
     */
    public function getInfluence()
    {
        return $this->influence;
    }

    /**
     * Set margeNegociation
     *
     * @param string $margeNegociation
     *
     * @return Bien
     */
    public function setMargeNegociation($margeNegociation)
    {
        $this->margeNegociation = $margeNegociation;

        return $this;
    }

    /**
     * Get margeNegociation
     *
     * @return string
     */
    public function getMargeNegociation()
    {
        return $this->margeNegociation;
    }

    /**
     * Set commision
     *
     * @param \SBC\BienBundle\Entity\Commision $commision
     *
     * @return Bien
     */
    public function setCommision(\SBC\BienBundle\Entity\Commision $commision = null)
    {
        $this->commision = $commision;

        return $this;
    }

    /**
     * Get commision
     *
     * @return \SBC\BienBundle\Entity\Commision
     */
    public function getCommision()
    {
        return $this->commision;
    }


    /**
     * Add paper
     *
     * @param \SBC\BienBundle\Entity\BienAttachement $paper
     *
     * @return Bien
     */
    public function addPaper(\SBC\BienBundle\Entity\BienAttachement $paper)
    {
        $this->papers[] = $paper;

        return $this;
    }

    /**
     * Remove paper
     *
     * @param \SBC\BienBundle\Entity\BienAttachement $paper
     */
    public function removePaper(\SBC\BienBundle\Entity\BienAttachement $paper)
    {
        $this->papers->removeElement($paper);
    }

    /**
     * Get papers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPapers()
    {
        return $this->papers;
    }

    /**
     * Set architecture
     *
     * @param string $architecture
     *
     * @return Bien
     */
    public function setArchitecture($architecture)
    {
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * Get architecture
     *
     * @return string
     */
    public function getArchitecture()
    {
        return $this->architecture;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Bien
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

   

    /**
     * Set societePoste
     *
     * @param string $societePoste
     *
     * @return Bien
     */
    public function setSocietePoste($societePoste)
    {
        $this->societePoste = $societePoste;

        return $this;
    }

    /**
     * Get societePoste
     *
     * @return string
     */
    public function getSocietePoste()
    {
        return $this->societePoste;
    }

    /**
     * Set representantNom
     *
     * @param string $representantNom
     *
     * @return Bien
     */
    public function setRepresentantNom($representantNom)
    {
        $this->representantNom = $representantNom;

        return $this;
    }

    /**
     * Get representantNom
     *
     * @return string
     */
    public function getRepresentantNom()
    {
        return $this->representantNom;
    }

    /**
     * Set provenance
     *
     * @param string $provenance
     *
     * @return Bien
     */
    public function setProvenance($provenance)
    {
        $this->provenance = $provenance;

        return $this;
    }

    /**
     * Get provenance
     *
     * @return string
     */
    public function getProvenance()
    {
        return $this->provenance;
    }

    /**
     * Set nomProp
     *
     * @param string $nomProp
     *
     * @return Bien
     */
    public function setNomProp($nomProp)
    {
        $this->nomProp = $nomProp;

        return $this;
    }

    /**
     * Get nomProp
     *
     * @return string
     */
    public function getNomProp()
    {
        return $this->nomProp;
    }

    /**
     * Set usage
     *
     * @param string $usage
     *
     * @return Bien
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
     * Set exterieur
     *
     * @param string $exterieur
     *
     * @return Bien
     */
    public function setExterieur($exterieur)
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    /**
     * Get exterieur
     *
     * @return string
     */
    public function getExterieur()
    {
        return $this->exterieur;
    }


    /**
     * Set piece
     *
     * @param integer $piece
     *
     * @return Bien
     */
    public function setPiece($piece)
    {
        $this->piece = $piece;

        return $this;
    }

    /**
     * Get piece
     *
     * @return integer
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set sde
     *
     * @param integer $sde
     *
     * @return Bien
     */
    public function setSde($sde)
    {
        $this->sde = $sde;

        return $this;
    }

    /**
     * Get sde
     *
     * @return integer
     */
    public function getSde()
    {
        return $this->sde;
    }

    /**
     * Set loisir
     *
     * @param string $loisir
     *
     * @return Bien
     */
    public function setLoisir($loisir)
    {
        $this->loisir = $loisir;

        return $this;
    }

    /**
     * Get loisir
     *
     * @return string
     */
    public function getLoisir()
    {
        return $this->loisir;
    }

    /**
     * Set representantscomme
     *
     * @param string $representantscomme
     *
     * @return Bien
     */
    public function setRepresentantscomme($representantscomme)
    {
        $this->representantscomme = $representantscomme;

        return $this;
    }

    /**
     * Get representantscomme
     *
     * @return string
     */
    public function getRepresentantscomme()
    {
        return $this->representantscomme;
    }

    /**
     * Add representant
     *
     * @param \SBC\BienBundle\Entity\RepresentantBien $representant
     *
     * @return Bien
     */
    public function addRepresentant(\SBC\BienBundle\Entity\RepresentantBien $representant)
    {
        $representant->setBien($this);
        $this->representants[] = $representant;

        return $this;
    }

    /**
     * Remove representant
     *
     * @param \SBC\BienBundle\Entity\RepresentantBien $representant
     */
    public function removeRepresentant(\SBC\BienBundle\Entity\RepresentantBien $representant)
    {
        $this->representants->removeElement($representant);
    }

    /**
     * Add locataire
     *
     * @param \SBC\BienBundle\Entity\ProprietaireSelf $locataire
     *
     * @return Bien
     */
    public function addLocataire(\SBC\BienBundle\Entity\Locataire $locataire)
    {
        $locataire->setBien($this);
        $this->locataires[] = $locataire;

        return $this;
    }

    /**
     * Remove locataire
     *
     * @param \SBC\BienBundle\Entity\ProprietaireSelf $locataire
     */
    public function removeLocataire(\SBC\BienBundle\Entity\Locataire $locataire)
    {
        $this->locataires->removeElement($locataire);
    }

    /**
     * Get locataires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocataires()
    {
        return $this->locataires;
    }



    /**
     * Get representants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepresentants()
    {
        return $this->representants;
    }
}
