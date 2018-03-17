<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 *
 * @ORM\Table(name="proprietaire")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\ProprietaireRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"proprietaire"="Proprietaire", "representant"="Representant" , "proprietaire_self"="ProprietaireSelf", "locataire"="Locataire" , "representant_bien"="RepresentantBien" , "en_qualite_de"="EnQualiteDe", "procuration"="Procuration"})
 */
class Proprietaire
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
     * @ORM\ManyToOne(targetEntity="SBC\TiersBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=true, name="proprietaire", referencedColumnName="code")
     */
    protected $client;

    public function __construct()
    {
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
     * Set client
     *
     * @param \SBC\TiersBundle\Entity\Client $client
     *
     * @return Proprietaire
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
}

