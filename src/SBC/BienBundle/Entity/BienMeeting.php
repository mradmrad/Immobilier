<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BienMeeting
 *
 * @ORM\Table(name="bien_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\BienMeetingRepository")
 */
class BienMeeting extends Meeting
{


    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=255)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    private $rue;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return BienMeeting
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return BienMeeting
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }
}

