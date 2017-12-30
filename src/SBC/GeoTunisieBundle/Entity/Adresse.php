<?php

namespace SBC\GeoTunisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Adresse
 * @ORM\Table(name="adresse")
 * @ORM\Entity(repositoryClass="SBC\GeoTunisieBundle\Repository\AdresseRepository")
 */
class Adresse
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;


    /**
     * @ORM\ManyToOne(targetEntity="SBC\GeoTunisieBundle\Entity\Rue", inversedBy="adresses")
     * @ORM\JoinColumn(name="rue_id", referencedColumnName="id")
     */
    protected $rue;


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
     * @return Adresse
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
     * Set rue
     *
     * @param \SBC\GeoTunisieBundle\Entity\Rue $rue
     *
     * @return Adresse
     */
    public function setRue(Rue $rue = null)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return \SBC\GeoTunisieBundle\Entity\Rue
     */
    public function getRue()
    {
        return $this->rue;
    }

    public function __toString()
    {
        return $this->name;
    }
}

