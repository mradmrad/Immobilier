<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\EventRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"event"="Event", "meeting" = "Meeting", "remind" = "Remind","meeting"="Meeting", "reunion_meeting" = "ReunionMeeting", "other_meeting" = "OtherMeeting", "acquisition_meeting" = "AcquisitionMeeting", "bien_meeting" = "BienMeeting", "nouvelle_meeting" = "NouvelleMeeting", "requete_meeting" = "RequeteMeeting", "mandat_meeting" = "MandatMeeting", "remind_nouvelle" = "RemindNouvelle", "remind_acquisition" = "RemindAcquisition", "remind_mandat" = "RemindMandat", "remind_requete" = "RemindRequete", "visite" = "Visite"})
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    protected $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginDate", type="datetime")
     */
    protected $beginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishDate", type="datetime")
     */
    protected $finishDate;


    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $createdBy;



    public function __construct()
    {
        $this->creationDate = new \Datetime("now", new \DateTimeZone('Etc/GMT'));
//        $this->beginDate = new \Datetime("now", new \DateTimeZone('Etc/GMT'));
//        $this->finishDate = new \Datetime("now", new \DateTimeZone('Etc/GMT'));
    }

    /**
     * Get entityType
     *
     * @return string
     */
    public function getEntityType()
    {
        $entityType = explode('\\', get_class($this));

        return end($entityType);
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
     * @return Event
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
     * Set createdBy
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $createdBy
     *
     * @return Event
     */
    public function setCreatedBy(\SBC\PersonnelBundle\Entity\Personnel $createdBy)
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
     * Set beginDate
     *
     * @param \DateTime $beginDate
     *
     * @return Event
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    /**
     * Get beginDate
     *
     * @return \DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Set finishDate
     *
     * @param \DateTime $finishDate
     *
     * @return Event
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Get finishDate
     *
     * @return \DateTime
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Event
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
     * Set color
     *
     * @param string $color
     *
     * @return Event
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }


}
