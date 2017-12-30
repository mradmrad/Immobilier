<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemindMandat
 *
 * @ORM\Table(name="remind_mandat")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RemindMandatRepository")
 */
class RemindMandat extends Remind
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat")
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
     * @return RemindMandat
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
