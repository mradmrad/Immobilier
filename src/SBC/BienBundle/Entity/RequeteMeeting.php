<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequeteMeeting
 *
 * @ORM\Table(name="requete_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RequeteMeetingRepository")
 */
class RequeteMeeting extends Meeting
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Requete", inversedBy="meetings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $requete;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set requete
     *
     * @param \SBC\BienBundle\Entity\Requete $requete
     *
     * @return RequeteMeeting
     */
    public function setRequete(\SBC\BienBundle\Entity\Requete $requete = null)
    {
        $this->requete = $requete;

        return $this;
    }

    /**
     * Get requete
     *
     * @return \SBC\BienBundle\Entity\Requete
     */
    public function getRequete()
    {
        return $this->requete;
    }
}

