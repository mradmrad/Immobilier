<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NouvelleMeeting
 *
 * @ORM\Table(name="nouvelle_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\NouvelleMeetingRepository")
 */
class NouvelleMeeting extends Meeting
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="meetings")
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
     * @return NouvelleMeeting
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
