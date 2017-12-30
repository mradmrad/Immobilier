<?php

namespace SBC\GeoTunisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="SBC\GeoTunisieBundle\Repository\LocaliteRepository")
 */
class Localite implements \JsonSerializable
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
     * @ORM\OneToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Rue", mappedBy="localite", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="rue_id", referencedColumnName="id")
     */

    private $rues;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    private $creationdate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\GeoTunisieBundle\Entity\Ville", inversedBy="localites")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    protected $ville;


    public function __construct()
    {
        $this->rues = new ArrayCollection();
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
     * @return Localite
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
     * @return Localite
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

    public function addRue(Rue $rue)
    {
        $rue->setLocalite($this);
        $this->rues[] = $rue;


        return $this;
    }

    public function removeRue(Rue $rue)
    {
        $this->rues->removeElement($rue);
    }

    public function getRues()
    {
        return $this->rues;
    }

    /**
     * Set ville
     *
     * @param \SBC\GeoTunisieBundle\Entity\Ville $ville
     *
     * @return Localite
     */
    public function setVille(Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \SBC\GeoTunisieBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    public function __toString()
    {
        return $this->name;
    }
}

