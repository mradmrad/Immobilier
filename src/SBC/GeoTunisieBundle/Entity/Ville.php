<?php

namespace SBC\GeoTunisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="SBC\GeoTunisieBundle\Repository\VilleRepository")
 */
class Ville implements \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=255, unique=true, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="postCode", type="integer", nullable=true)
     */
    private $postCode;

    /**
     * @ORM\OneToMany(targetEntity="SBC\GeoTunisieBundle\Entity\Localite", mappedBy="ville", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id")
     */

    private $localites;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $creationdate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\GeoTunisieBundle\Entity\Gouvernorat", inversedBy="villes")
     * @ORM\JoinColumn(name="gouvernorat_id", referencedColumnName="id")
     */
    protected $gouvernorat;


    public function __construct()
    {
        $this->localites = new ArrayCollection();
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
     * @return Ville
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
     * Set postCode
     *
     * @param integer $postCode
     *
     * @return Ville
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Ville
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

    public function addLocalite(Localite $localite)
    {
        $localite->setVille($this);
        $this->localites[] = $localite;


        return $this;
    }

    public function removeLocalite(Localite $localite)
    {
        $this->localites->removeElement($localite);
    }

    public function getLocalites()
    {
        return $this->localites;
    }

    /**
     * Set gouvernorat
     *
     * @param \SBC\GeoTunisieBundle\Entity\Gouvernorat $gouvernorat
     *
     * @return Ville
     */
    public function setGouvernorat(Gouvernorat $gouvernorat = null)
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    /**
     * Get gouvernorat
     *
     * @return \SBC\GeoTunisieBundle\Entity\Gouvernorat
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    public function __toString()
    {
        return $this->name;
    }
}
