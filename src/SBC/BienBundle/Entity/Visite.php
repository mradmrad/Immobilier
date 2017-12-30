<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visite
 *
 * @ORM\Table(name="visite")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\VisiteRepository")
 */
class Visite extends Meeting
{

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat", inversedBy="visites")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mandat;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set mandat
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandat
     *
     * @return Visite
     */
    public function setMandat(\SBC\BienBundle\Entity\Mandat $mandat = null)
    {
        $this->mandat = $mandat;

        return $this;
    }

    /**
     * Get mandat
     *
     * @return \SBC\BienBundle\Entity\Mandat
     */
    public function getMandat()
    {
        return $this->mandat;
    }
}
