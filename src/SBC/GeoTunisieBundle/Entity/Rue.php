<?php

namespace SBC\GeoTunisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Rue
 *
 * @ORM\Table(name="rue")
 * @ORM\Entity(repositoryClass="SBC\GeoTunisieBundle\Repository\RueRepository")
 */
class Rue implements \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=255, unique=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Adresse", mappedBy="rue", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id")
     */

    private $adresses;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    private $creationdate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\GeoTunisieBundle\Entity\Localite", inversedBy="rues")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id")
     */
    protected $localite;


    public function __construct()
    {
        $this->adresses = new ArrayCollection();
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
     * @return Rue
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
     * @return Rue
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

    public function addAddresse(Adresse $adresse)
    {
        $adresse->setRue($this);
        $this->adresses[] = $adresse;


        return $this;
    }

    public function removeAdresse(Adresse $adresse)
    {
        $this->adresses->removeElement($adresse);
    }

    public function getAdresses()
    {
        return $this->adresses;
    }


    /**
     * Set localite
     *
     * @param \SBC\GeoTunisieBundle\Entity\Localite $localite
     *
     * @return Rue
     */
    public function setLocalite(Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \SBC\GeoTunisieBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Add adress
     *
     * @param \SBC\GeoTunisieBundle\Entity\Adresse $adress
     *
     * @return Rue
     */
    public function addAdress(\SBC\GeoTunisieBundle\Entity\Adresse $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \SBC\GeoTunisieBundle\Entity\Adresse $adress
     */
    public function removeAdress(\SBC\GeoTunisieBundle\Entity\Adresse $adress)
    {
        $this->adresses->removeElement($adress);
    }
}
