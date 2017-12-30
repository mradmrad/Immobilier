<?php

namespace SBC\BienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SBC\PersonnelBundle\Entity\Personnel;

/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\AgencyRepository")
 */
class Agency
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\OneToMany(targetEntity="SBC\PersonnelBundle\Entity\Personnel", mappedBy="agency")
     */
    private $personnels;

    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->personnels = new ArrayCollection();
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
     * @return Agency
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
     * Set description
     *
     * @param string $description
     *
     * @return Agency
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Agency
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

    public function __toString()
    {
        return $this->name;
    }


    /**
     * @param Personnel $personnel
     * @return Agency
     */
    public function addPersonnel(Personnel $personnel)
    {
        $this->personnels[] = $personnel;
        $personnel->setAgency($this);

        return $this;
    }

    /**
     * @param Personnel $personnel
     */
    public function removePersonnel(Personnel $personnel)
    {
        $this->personnels->removeElement($personnel);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $personnel->setAgency(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getPersonnels()
    {
        return $this->personnels;
    }

}

