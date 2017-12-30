<?php

namespace SBC\GeoTunisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Gouvernorat
 *
 * @ORM\Table(name="gouvernorat")
 * @ORM\Entity(repositoryClass="SBC\GeoTunisieBundle\Repository\GouvernoratRepository")
 */
class Gouvernorat implements \JsonSerializable
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
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", length=255, unique=true , nullable = true)
     */
    private $position;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Ville", mappedBy="gouvernorat", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */

    private $villes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $creationdate;


    public function __construct()
    {
        $this->villes = new ArrayCollection();
        $this->creationdate = new \Datetime();
    }
    function jsonSerialize()
    {
        return get_object_vars($this);
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
     * @return Gouvernorat
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
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Gouvernorat
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

    public function addVille(Ville $ville)
    {
        $ville->setGouvernorat($this);
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

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Gouvernorat
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }
}
