<?php

namespace SBC\PersonnelBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SBC\BienBundle\Entity\Agency;
use SBC\BienBundle\Entity\Event;
use SBC\BienBundle\Entity\Goal;
use SBC\BienBundle\Entity\Meeting;
use SBC\BienBundle\Entity\Tache;
use SBC\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Personnel
 *
 * @ORM\Table(name="personnel")
 * @ORM\Entity(repositoryClass="SBC\PersonnelBundle\Repository\PersonnelRepository")
 * @Vich\Uploadable
 */
class Personnel implements \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\Length(min=2, max=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, unique=true, nullable=false)
     * @Assert\Length(min=11, max=11)
     */
    private $cin;


    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true, nullable=false)
     */
    private $code;

    /**
     * @ORM\OneToOne(targetEntity="SBC\PersonnelBundle\Entity\AddressPersonnel",cascade={"persist"}, orphanRemoval=true)
     */
    private $address;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="personnel_picture", fileNameProperty="pictureName")
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"image/png", "image/jpeg", "image/jpg"},
     *     mimeTypesMessage = "Please upload a valid IMAGE"
     * )
     *
     * @var File
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $pictureName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="phonenumber", type="string", length=255, unique=true, nullable=false)
     * @Assert\Length(min=10, max=10)
     */
    private $phonenumber;


    /**
     * @var string
     *
     * @ORM\Column(name="agencyPhoneNumber", type="string", length=255, nullable=false)
     * @Assert\Length(min=10, max=10)
     */
    private $agencyPhoneNumber;



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Length(max=100)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Agency", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agency;


    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Tache", mappedBy="personnel")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $taches;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Meeting", mappedBy="remindFors")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $meetings;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Goal", mappedBy="goalFor")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $goals;

    /**
     * @ORM\OneToOne(targetEntity="SBC\UserBundle\Entity\User" , mappedBy="personnel"  , cascade={"persist"})
     */
    private $user;


    function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function __construct()
    {
        $date = new \DateTime('now');

        $this->code = 'PERS'.$date->getTimestamp();
        $this->creationdate = new \Datetime();
        $this->taches = new ArrayCollection();
        $this->meetings = new ArrayCollection();
        $this->goals = new ArrayCollection();

    }

    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     *
     * @return Personnel
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
     * Set cin
     *
     * @param string $cin
     *
     * @return Personnel
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }


    /**
     * Set code
     *
     * @param string $code
     *
     * @return Personnel
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
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Personnel
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }





    /**
     * Set address
     *
     * @param \SBC\PersonnelBundle\Entity\AddressPersonnel $address
     *
     * @return Personnel
     */
    public function setAddress(AddressPersonnel $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \SBC\PersonnelBundle\Entity\AddressPersonnel
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     *
     *
     * @return Personnel
     */
    public function setPictureFile($picture = null)
    {
        $this->pictureFile = $picture;
        if ($picture) {
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return File|null
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * @param string $pictureName
     *
     * @return Personnel
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     *
     * @return Personnel
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }


    /**
     * Set agencyPhoneNumber
     *
     * @param string $agencyPhoneNumber
     *
     * @return Personnel
     */
    public function setAgencyPhoneNumber($agencyPhoneNumber)
    {
        $this->agencyPhoneNumber = $agencyPhoneNumber;

        return $this;
    }

    /**
     * Get agencyPhoneNumber
     *
     * @return string
     */
    public function getAgencyPhoneNumber()
    {
        return $this->agencyPhoneNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Personnel
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Personnel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
     * Set agency
     *
     * @param \SBC\BienBundle\Entity\Agency $agency
     *
     * @return Personnel
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
     * @param Tache $tache
     * @return Personnel
     */
    public function addTache(Tache $tache)
    {
        $this->taches[] = $tache;
        $tache->setPersonnel($this);

        return $this;
    }

    /**
     * @param Tache $tache
     */
    public function removeTache(Tache $tache)
    {
        $this->taches->removeElement($tache);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $tache->setPersonnel(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @param Meeting $meeting
     * @return Personnel
     */
    public function addMeeting(Meeting $meeting)
    {
        $this->meetings[] = $meeting;
        $meeting->getRemindFors()->add($this);

        return $this;
    }

    /**
     * @param Meeting $meeting
     */
    public function removeMeeting(Meeting $meeting)
    {
        $this->meetings->removeElement($meeting);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $meeting->getRemindFors()->add(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getMeetings()
    {
        return $this->meetings;
    }


    /**
     * @param Goal $goal
     * @return Personnel
     */
    public function addGoal(Goal $goal)
    {
        $this->goals[] = $goal;
        $goal->setGoalFor($this);

        return $this;
    }

    /**
     * @param Goal $goal
     */
    public function removeGoal(Goal $goal)
    {
        $this->goals->removeElement($goal);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $goal->setGoalFor(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Add tach
     *
     * @param \SBC\BienBundle\Entity\Tache $tach
     *
     * @return Personnel
     */
    public function addTach(\SBC\BienBundle\Entity\Tache $tach)
    {
        $this->taches[] = $tach;

        return $this;
    }

    /**
     * Remove tach
     *
     * @param \SBC\BienBundle\Entity\Tache $tach
     */
    public function removeTach(\SBC\BienBundle\Entity\Tache $tach)
    {
        $this->taches->removeElement($tach);
    }

    /**
     * Set user
     *
     * @param \SBC\UserBundle\Entity\User $user
     *
     * @return Personnel
     */
    public function setUser(\SBC\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SBC\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
