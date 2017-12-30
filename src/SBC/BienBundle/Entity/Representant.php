<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\TiersBundle\Entity\Client;

/**
 * Representant
 *
 * @ORM\Table(name="representant")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RepresentantRepository")
 */
class Representant extends Proprietaire
{

    /**
     * @ORM\ManyToOne(targetEntity="SBC\TiersBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=true, name="representant", referencedColumnName="code")
     */
    protected $representant;
    

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set representant
     *
     * @param \SBC\TiersBundle\Entity\Client $representant
     *
     * @return Representant
     */
    public function setRepresentant(Client $representant = null)
    {
        $this->representant = $representant;

        return $this;
    }

    /**
     * Get representant
     *
     * @return \SBC\TiersBundle\Entity\Client
     */
    public function getRepresentant()
    {
        return $this->representant;
    }

}

