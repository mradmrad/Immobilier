<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemindNouvelle
 *
 * @ORM\Table(name="remind_nouvelle")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RemindNouvelleRepository")
 */
class RemindNouvelle extends Remind
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien")
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
     * @return RemindNouvelle
     */
    public function setNouvelle(\SBC\BienBundle\Entity\Bien $nouvelle = null)
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
