<?php

namespace SBC\PersonnelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\AddressBundle\Entity\Address;

/**
 * AddressPersonnel
 *
 * @ORM\Table(name="address_personnel")
 * @ORM\Entity(repositoryClass="SBC\PersonnelBundle\Repository\AddressPersonnelRepository")
 */
class AddressPersonnel extends Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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

