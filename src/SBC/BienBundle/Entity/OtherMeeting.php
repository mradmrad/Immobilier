<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OtherMeeting
 *
 * @ORM\Table(name="other_meeting")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\OtherMeetingRepository")
 */
class OtherMeeting extends Meeting
{
    public function __construct()
    {
        parent::__construct();
    }


}

