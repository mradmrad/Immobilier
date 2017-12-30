<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnQualiteDe
 *
 * @ORM\Table(name="en_qualite_de")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\EnQualiteDeRepository")
 */
class EnQualiteDe extends Representant
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="representants")
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
     * @return EnQualiteDe
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