<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProprietaireSelf
 *
 * @ORM\Table(name="representant_bien")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RepresentantBienRepository")
 */
class RepresentantBien extends Proprietaire
{

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="owners")
     * @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     */
    protected $bien;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set bien
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return ProprietaireSelf
     */
    public function setBien(Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }
}

