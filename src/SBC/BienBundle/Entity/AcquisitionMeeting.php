<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcquisitionMeeting
 *
 * @ORM\Table(name="acquisition_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\AcquisitionMeetingRepository")
 */
class AcquisitionMeeting extends Meeting
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition", inversedBy="meetings")
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
     * @return AcquisitionMeeting
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
