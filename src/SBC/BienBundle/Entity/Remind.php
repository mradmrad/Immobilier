<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remind
 *
 * @ORM\Table(name="remind")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RemindRepository")
 */
class Remind extends Event
{

    /**
     * @var bool
     *
     * @ORM\Column(name="is_notified", type="boolean")
     */
    private $isNotified;


    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $remindFor;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set isNotified
     *
     * @param boolean $isNotified
     *
     * @return Remind
     */
    public function setIsNotified($isNotified)
    {
        $this->isNotified = $isNotified;

        return $this;
    }

    /**
     * Get isNotified
     *
     * @return boolean
     */
    public function getIsNotified()
    {
        return $this->isNotified;
    }

    /**
     * Set remindFor
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $remindFor
     *
     * @return Event
     */
    public function setRemindFor(\SBC\PersonnelBundle\Entity\Personnel $remindFor)
    {
        $this->remindFor = $remindFor;

        return $this;
    }

    /**
     * Get remindFor
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getRemindFor()
    {
        return $this->remindFor;
    }
}