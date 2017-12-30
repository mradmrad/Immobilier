<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityGroup
 *
 * @ORM\Table(name="activity_group")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\ActivityGroupRepository")
 */
class ActivityGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

