<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table(name="tache")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TacheRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"tache"="Tache", "tache_nouvelle" = "TacheNouvelle", "tache_acquisition" = "TacheAcquisition", "tache_mandat" = "TacheMandat", "tache_requete" = "TacheRequete", "history" = "History"})
 */
class Tache implements \JsonSerializable
{
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    protected $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\TypeTache")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $typeTache;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel", inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $personnel;

    public function __construct()
    {
        $this->creationDate = new \Datetime();

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
     * Set description
     *
     * @param string $description
     *
     * @return Tache
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
     * @return Tache
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
     * Set typeTache
     *
     * @param \SBC\BienBundle\Entity\TypeTache $typeTache
     *
     * @return Tache
     */
    public function setTypeTache(\SBC\BienBundle\Entity\TypeTache $typeTache)
    {
        $this->typeTache = $typeTache;

        return $this;
    }

    /**
     * Get typeTache
     *
     * @return \SBC\BienBundle\Entity\TypeTache
     */
    public function getTypeTache()
    {
        return $this->typeTache;
    }

    /**
     * Set personnel
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $personnel
     *
     * @return Tache
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
}
