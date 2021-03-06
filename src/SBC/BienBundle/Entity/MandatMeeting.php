<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MandatMeeting
 *
 * @ORM\Table(name="mandat_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\MandatMeetingRepository")
 */
class MandatMeeting extends Meeting
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat", inversedBy="meetings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mandat;

    /**
     * @var string
     *
     * @ORM\Column(name="typeMandaMeeting", type="string", length=255)
     */
    private $typeMandaMeeting;

    /**
     * @var float
     *
     * @ORM\Column(name="proposedPrice", type="float")
     */
    private $proposedPrice;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set mandat
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandat
     *
     * @return MandatMeeting
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

    /**
     * Set typeMandaMeeting
     *
     * @param string $typeMandaMeeting
     *
     * @return MandatMeeting
     */
    public function setTypeMandaMeeting($typeMandaMeeting)
    {
        $this->typeMandaMeeting = $typeMandaMeeting;

        return $this;
    }

    /**
     * Get typeMandaMeeting
     *
     * @return string
     */
    public function getTypeMandaMeeting()
    {
        return $this->typeMandaMeeting;
    }

    /**
     * Set proposedPrice
     *
     * @param float $proposedPrice
     *
     * @return MandatMeeting
     */
    public function setProposedPrice($proposedPrice)
    {
        $this->proposedPrice = $proposedPrice;

        return $this;
    }

    /**
     * Get proposedPrice
     *
     * @return float
     */
    public function getProposedPrice()
    {
        return $this->proposedPrice;
    }
}
