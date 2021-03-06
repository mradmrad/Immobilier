<?php

namespace SBC\BienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SBC\PersonnelBundle\Entity\Personnel;

/**
 * Meeting
 *
 * @ORM\Table(name="meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\MeetingRepository")
 */
class Meeting extends Event
{

    const CONFIRMED = 'Confirmé';
    const NOT_CONFIRMED = 'Non confirmé';
    const CANCELLED = 'Annulé';
    const DONE = 'Effectué';

    /**
     * @ORM\ManyToOne(targetEntity="SBC\TiersBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=true, name="owner_code", referencedColumnName="code")
     */
    protected $client;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\PersonnelBundle\Entity\Personnel", inversedBy="meetings", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $remindFors;

    /**
     * @var string
     *
     * @ORM\Column(name="typeMeeting", type="string", length=255)
     */
    private $typeMeeting;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", length=255)
     */
    private $CreationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="otherClients", type="string", length=255)
     */
    private $otherClients;

    /**
     * @var string
     *
     * @ORM\Column(name="othernumbers", type="string", length=255)
     */
    private $otherNumbers;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    public function __construct()
    {
        parent::__construct();
        $this->remindFors = new ArrayCollection();
        $this->setCreationDate(new \DateTime('now'));
    }


    /**
     * Set client
     *
     * @param \SBC\TiersBundle\Entity\Client $client
     *
     * @return Meeting
     */
    public function setClient(\SBC\TiersBundle\Entity\Client $client = null)
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

    public function addRemindFor(Personnel $personnel)
    {

        $this->remindFors[] = $personnel;

        return $this;
    }

    public function removeRemindFor(Personnel $personnel)
    {

        $this->remindFors->removeElement($personnel);
    }


    public function getRemindFors()
    {
        return $this->remindFors;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Meeting
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
    public function getstatus()
    {
        return $this->status;
    }

    /**
     * Set typeMeeting
     *
     * @param string $typeMeeting
     *
     * @return Meeting
     */
    public function setTypeMeeting($typeMeeting)
    {
        $this->typeMeeting = $typeMeeting;

        return $this;
    }

    /**
     * Get typeMeeting
     *
     * @return string
     */
    public function getTypeMeeting()
    {
        return $this->typeMeeting;
    }


    /**
     * Set otherClients
     *
     * @param string $otherClients
     *
     * @return Meeting
     */
    public function setOtherclients($otherClients)
    {
        $this->otherClients = $otherClients;

        return $this;
    }

    /**
     * Get otherClients
     *
     * @return string
     */
    public function getOtherClients()
    {
        if ($this->otherClients != null)
        return $this->otherClients;
        else return '' ;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Meeting
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
     * Set otherNumbers
     *
     * @param string $otherNumbers
     *
     * @return Meeting
     */
    public function setOtherNumbers($otherNumbers)
    {
        $this->otherNumbers = $otherNumbers;

        return $this;
    }

    /**
     * Get otherNumbers
     *
     * @return string
     */
    public function getOtherNumbers()
    {
        return $this->otherNumbers;
    }
}
