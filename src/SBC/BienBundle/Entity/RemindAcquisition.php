<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemindAcquisition
 *
 * @ORM\Table(name="remind_acquisition")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RemindAcquisitionRepository")
 */
class RemindAcquisition extends Remind
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition")
     * @ORM\JoinColumn(nullable=true)
     */
    private $acquisition;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set acquisition
     *
     * @param \SBC\BienBundle\Entity\Acquisition $acquisition
     *
     * @return RemindAcquisition
     */
    public function setAcquisition(\SBC\BienBundle\Entity\Acquisition $acquisition = null)
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    /**
     * Get acquisition
     *
     * @return \SBC\BienBundle\Entity\Acquisition
     */
    public function getAcquisition()
    {
        return $this->acquisition;
    }
}
