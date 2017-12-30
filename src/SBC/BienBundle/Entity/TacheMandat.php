<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TacheMandat
 *
 * @ORM\Table(name="tache_mandat")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TacheMandatRepository")
 */
class TacheMandat extends Tache
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat", inversedBy="taches")
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
     * @return TacheMandat
     */
    public function setMandat(\SBC\BienBundle\Entity\Mandat $mandat)
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
