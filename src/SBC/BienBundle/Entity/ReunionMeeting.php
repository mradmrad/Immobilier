<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReunionMeeting
 *
 * @ORM\Table(name="reunion_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\ReunionMeetingRepository")
 */
class ReunionMeeting extends Meeting
{
    public function __construct()
    {
        parent::__construct();
    }

}

