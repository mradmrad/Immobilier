<?php

namespace SBC\BienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acquisition
 *
 * @ORM\Table(name="acquisition")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\AcquisitionRepository")
 */
class Acquisition
{

    const EN_INSTANCE = 'EN_INSTANCE';
    const SUCCES = 'SUCCES';


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
     * @var float
     *
     * @ORM\Column(name="clientEstimation", type="float")
     */
    private $clientEstimation;

    /**
     * @var float
     *
     * @ORM\Column(name="agencyEstimation", type="float")
     */
    private $agencyEstimation;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\TacheAcquisition", mappedBy="acquisition")
     */
    private $taches;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\AcquisitionMeeting", mappedBy="acquisition")
     */
    private $meetings;


    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->clientEstimation = 0;
        $this->agencyEstimation = 0;
        $this->status = Acquisition::EN_INSTANCE;
        $this->taches = new ArrayCollection();
        $this->meetings = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getBien()->getTitle();
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Acquisition
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
     * Set clientEstimation
     *
     * @param float $clientEstimation
     *
     * @return Acquisition
     */
    public function setClientEstimation($clientEstimation)
    {
        $this->clientEstimation = $clientEstimation;

        return $this;
    }

    /**
     * Get clientEstimation
     *
     * @return float
     */
    public function getClientEstimation()
    {
        return $this->clientEstimation;
    }

    /**
     * Set agencyEstimation
     *
     * @param float $agencyEstimation
     *
     * @return Acquisition
     */
    public function setAgencyEstimation($agencyEstimation)
    {
        $this->agencyEstimation = $agencyEstimation;

        return $this;
    }

    /**
     * Get agencyEstimation
     *
     * @return float
     */
    public function getAgencyEstimation()
    {
        return $this->agencyEstimation;
    }
    /**
     * Set owner
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return Acquisition
     */
    public function setBien(Bien $bien)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Acquisition
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
     * Set status
     *
     * @param string $status
     *
     * @return Acquisition
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param TacheAcquisition $tache
     * @return Acquisition
     */
    public function addTache(TacheAcquisition $tache)
    {
        $this->taches[] = $tache;
        $tache->setAcquisition($this);

        return $this;
    }

    /**
     * @param TacheAcquisition $tache
     */
    public function removeTache(TacheAcquisition $tache)
    {
        $this->taches->removeElement($tache);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
         $tache->setAcquisition(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Acquisition
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
     * @param AcquisitionMeeting $meeting
     * @return Acquisition
     */
    public function addMeeting(AcquisitionMeeting $meeting)
    {
        $this->meetings[] = $meeting;
        $meeting->setAcquisition($this);

        return $this;
    }

    /**
     * @param AcquisitionMeeting $meeting
     */
    public function removeMeeting(AcquisitionMeeting $meeting)
    {
        $this->meetings->removeElement($meeting);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $meeting->setAcquisition(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getMeetings()
    {
        return $this->meetings;
    }
}