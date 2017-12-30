<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TacheNouvelle
 *
 * @ORM\Table(name="tache_nouvelle")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TacheNouvelleRepository")
 */
class TacheNouvelle extends Tache
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="taches")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nouvelle;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set nouvelle
     *
     * @param \SBC\BienBundle\Entity\Bien $nouvelle
     *
     * @return TacheNouvelle
     */
    public function setNouvelle(\SBC\BienBundle\Entity\Bien $nouvelle)
    {
        $this->nouvelle = $nouvelle;

        return $this;
    }

    /**
     * Get nouvelle
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getNouvelle()
    {
        return $this->nouvelle;
    }
}

