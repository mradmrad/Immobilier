<?php

namespace SBC\BienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SBC\GeoTunisieBundle\Entity\Gouvernorat;
use SBC\GeoTunisieBundle\Entity\Ville;

/**
 * Requete
 *
 * @ORM\Table(name="requete")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RequeteRepository")
 */
class Requete
{
    const EN_COURS = 'EN_COURS';
    const CONCLU = 'CONCLU';
    const ECHU = 'ECHU';

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
     * @ORM\Column(name="reference", type="string", length=255, unique=true)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var float
     *
     * @ORM\Column(name="budgetMin", type="float")
     */
    private $budgetMin;

    /**
     * @var float
     *
     * @ORM\Column(name="budgetMax", type="float")
     */
    private $budgetMax;

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
     * @var float
     *
     * @ORM\Column(name="totalAreaMin", type="float", nullable=true)
     */
    private $totalAreaMin;

    /**
     * @var float
     *
     * @ORM\Column(name="coveredAreaMin", type="float", nullable=true)
     */
    private $coveredAreaMin;

    /**
     * @var float
     *
     * @ORM\Column(name="totalAreaMax", type="float", nullable=true)
     */
    private $totalAreaMax;

    /**
     * @var float
     *
     * @ORM\Column(name="coveredAreaMax", type="float", nullable=true)
     */
    private $coveredAreaMax;

    /**
     * @var bool
     *
     * @ORM\Column(name="furnished", type="boolean" , nullable = true)
     */
    private $furnished;

    /**
     * @var bool
     *
     * @ORM\Column(name="notfurnished", type="boolean",nullable = true)
     */
    private $notfurnished;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="entryDate", type="datetime" , nullable=true)
     */
    private $entryDate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\TiersBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false, name="client_code", referencedColumnName="code")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;


    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\TypeBien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeBiens;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Gouvernorat", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $gouvernorats;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Ville", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $villes;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $natureRequete;

    /**
     * @var string
     *
     * @ORM\Column(name="view", type="string", length=255, nullable=true)
     */
    private $view;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", length=255 , nullable=true)
     */
    private $orientation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Equipement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $equipements;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Origine", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $origines;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Commodite", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commodites;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\TacheRequete", mappedBy="requete")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Proposal", mappedBy="requete", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="proposal_id", referencedColumnName="id")
     */

    private $proposals;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\RequeteMeeting", mappedBy="requete")
     */
    private $meetings;

    /**
     * @var string
     *
     * @ORM\Column(name="etatRequete", type="string", length=255)
     */
    private $etatRequete;


    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->gouvernorats = new ArrayCollection();
        $this->villes = new ArrayCollection();
        $this->equipements = new ArrayCollection();
        $this->typeBiens = new ArrayCollection();
        $this->origines = new ArrayCollection();
        $this->commodites = new ArrayCollection();
        $this->taches = new ArrayCollection();
        $this->proposals = new ArrayCollection();
        $this->meetings = new ArrayCollection();

        $this->etatRequete = Requete::EN_COURS;
        $this->budgetMax = 0;
        $this->budgetMin = 0;
        $this->totalAreaMin = 0;
        $this->totalAreaMax = 0;
        $this->coveredAreaMax = 0;
        $this->coveredAreaMin = 0;
    }

    public function __toString()
    {
        return $this->reference;
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
     * Set reference
     *
     * @param string $reference
     *
     * @return Requete
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Requete
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
     * Set budgetMin
     *
     * @param float $budgetMin
     *
     * @return Requete
     */
    public function setBudgetMin($budgetMin)
    {
        $this->budgetMin = $budgetMin;

        return $this;
    }

    /**
     * Get budgetMin
     *
     * @return float
     */
    public function getBudgetMin()
    {
        return $this->budgetMin;
    }

    /**
     * Set budgetMax
     *
     * @param float $budgetMax
     *
     * @return Requete
     */
    public function setBudgetMax($budgetMax)
    {
        $this->budgetMax = $budgetMax;

        return $this;
    }

    /**
     * Get budgetMax
     *
     * @return float
     */
    public function getBudgetMax()
    {
        return $this->budgetMax;
    }

    /**
     * Set bedroom
     *
     * @param integer $bedroom
     *
     * @return Requete
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
     * @return Requete
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
     * Set totalAreaMin
     *
     * @param float $totalAreaMin
     *
     * @return Requete
     */
    public function setTotalAreaMin($totalAreaMin)
    {
        $this->totalAreaMin = $totalAreaMin;

        return $this;
    }

    /**
     * Get totalAreaMin
     *
     * @return float
     */
    public function getTotalAreaMin()
    {
        return $this->totalAreaMin;
    }

    /**
     * Set coveredAreaMin
     *
     * @param float $coveredAreaMin
     *
     * @return Requete
     */
    public function setCoveredAreaMin($coveredAreaMin)
    {
        $this->coveredAreaMin = $coveredAreaMin;

        return $this;
    }

    /**
     * Get coveredAreaMin
     *
     * @return float
     */
    public function getCoveredAreaMin()
    {
        return $this->coveredAreaMin;
    }

    /**
     * Set totalAreaMax
     *
     * @param float $totalAreaMax
     *
     * @return Requete
     */
    public function setTotalAreaMax($totalAreaMax)
    {
        $this->totalAreaMax = $totalAreaMax;

        return $this;
    }

    /**
     * Get totalAreaMax
     *
     * @return float
     */
    public function getTotalAreaMax()
    {
        return $this->totalAreaMax;
    }

    /**
     * Set coveredAreaMax
     *
     * @param float $coveredAreaMax
     *
     * @return Requete
     */
    public function setCoveredAreaMax($coveredAreaMax)
    {
        $this->coveredAreaMax = $coveredAreaMax;

        return $this;
    }

    /**
     * Get coveredAreaMax
     *
     * @return float
     */
    public function getCoveredAreaMax()
    {
        return $this->coveredAreaMax;
    }

    /**
     * Set natureRequete
     *
     * @param string $natureRequete
     *
     * @return Requete
     */
    public function setNatureRequete($natureRequete)
    {
        $this->natureRequete = $natureRequete;

        return $this;
    }

    /**
     * Get natureRequete
     *
     * @return string
     */
    public function getNatureRequete()
    {
        return $this->natureRequete;
    }

    /**
     * Set client
     *
     * @param \SBC\TiersBundle\Entity\Client $client
     *
     * @return Requete
     */
    public function setClient(\SBC\TiersBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \SBC\TiersBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set personnel
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $personnel
     *
     * @return Requete
     */
    public function setPersonnel(\SBC\PersonnelBundle\Entity\Personnel $personnel)
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * Get personnel
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getPersonnel()
    {
        return $this->personnel;
    }


    public function addGouvernorat(Gouvernorat $gouvernorat)
    {

        $this->gouvernorats[] = $gouvernorat;

        return $this;
    }

    public function removeGouvernorat(Gouvernorat $gouvernorat)
    {

        $this->gouvernorats->removeElement($gouvernorat);
    }


    public function getGouvernorats()
    {
        return $this->gouvernorats;
    }


    public function addVille(Ville $ville)
    {

        $this->villes[] = $ville;

        return $this;
    }

    public function removeVille(Ville $ville)
    {

        $this->villes->removeElement($ville);
    }


    public function getVilles()
    {
        return $this->villes;
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Requete
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


    public function addTypeBien(TypeBien $typeBien)
    {

        $this->typeBiens[] = $typeBien;

        return $this;
    }

    public function removeTypeBien(TypeBien $typeBien)
    {

        $this->typeBiens->removeElement($typeBien);
    }


    public function getTypeBiens()
    {
        return $this->typeBiens;
    }


    public function addOrigine(Origine $origine)
    {

        $this->origines[] = $origine;

        return $this;
    }

    public function removeOrigine(Origine $origine)
    {

        $this->origines->removeElement($origine);
    }


    public function getOrigines()
    {
        return $this->origines;
    }

    public function addCommodite(Commodite $commodite)
    {

        $this->commodites[] = $commodite;

        return $this;
    }

    public function removeCommodite(Commodite $commodite)
    {

        $this->commodites->removeElement($commodite);
    }


    public function getCommodites()
    {
        return $this->commodites;
    }

    /**
     * @param TacheRequete $tache
     * @return Requete
     */
    public function addTache(TacheRequete $tache)
    {
        $this->taches[] = $tache;
        $tache->setRequete($this);

        return $this;
    }

    /**
     * @param TacheRequete $tache
     */
    public function removeTache(TacheRequete $tache)
    {
        $this->taches->removeElement($tache);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $tache->setRequete(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getTaches()
    {
        return $this->taches;
    }


    /**
     * Add proposal
     *
     * @param \SBC\BienBundle\Entity\Proposal $proposal
     *
     * @return Requete
     */
    public function addProposal(\SBC\BienBundle\Entity\Proposal $proposal)
    {
        $this->proposals[] = $proposal;
        $proposal->setRequete($this);
        return $this;
    }

    /**
     * Remove proposal
     *
     * @param \SBC\BienBundle\Entity\Proposal $proposal
     */
    public function removeProposal(\SBC\BienBundle\Entity\Proposal $proposal)
    {
        $this->proposals->removeElement($proposal);
    }

    /**
     * Get proposals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProposals()
    {
        return $this->proposals;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Requete
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
     * @param RequeteMeeting $meeting
     * @return Requete
     */
    public function addMeeting(RequeteMeeting $meeting)
    {
        $this->meetings[] = $meeting;
        $meeting->setRequete($this);

        return $this;
    }

    /**
     * @param RequeteMeeting $meeting
     */
    public function removeMeeting(RequeteMeeting $meeting)
    {
        $this->meetings->removeElement($meeting);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $meeting->setRequete(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getMeetings()
    {
        return $this->meetings;
    }

    /**
     * Set etatRequete
     *
     * @param string $etatRequete
     *
     * @return Requete
     */
    public function setEtatRequete($etatRequete)
    {
        $this->etatRequete = $etatRequete;

        return $this;
    }

    /**
     * Get etatRequete
     *
     * @return string
     */
    public function getEtatRequete()
    {
        return $this->etatRequete;
    }

    /**
     * Add tach
     *
     * @param \SBC\BienBundle\Entity\TacheRequete $tach
     *
     * @return Requete
     */
    public function addTach(\SBC\BienBundle\Entity\TacheRequete $tach)
    {
        $this->taches[] = $tach;

        return $this;
    }

    /**
     * Remove tach
     *
     * @param \SBC\BienBundle\Entity\TacheRequete $tach
     */
    public function removeTach(\SBC\BienBundle\Entity\TacheRequete $tach)
    {
        $this->taches->removeElement($tach);
    }

    /**
     * Set furnished
     *
     * @param boolean $furnished
     *
     * @return Requete
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;

        return $this;
    }

    /**
     * Get furnished
     *
     * @return boolean
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * Set entryDate
     *
     * @param \DateTime $entryDate
     *
     * @return Requete
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
     * Set view
     *
     * @param string $view
     *
     * @return Requete
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get view
     *
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set orientation
     *
     * @param string $orientation
     *
     * @return Requete
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
     * Set notfurnished
     *
     * @param boolean $notfurnished
     *
     * @return Requete
     */
    public function setNotfurnished($notfurnished)
    {
        $this->notfurnished = $notfurnished;

        return $this;
    }

    /**
     * Get notfurnished
     *
     * @return boolean
     */
    public function getNotfurnished()
    {
        return $this->notfurnished;
    }

    /**
     * Set piece
     *
     * @param integer $piece
     *
     * @return Requete
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
     * @return Requete
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
}
