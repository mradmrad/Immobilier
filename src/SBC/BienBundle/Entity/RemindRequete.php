<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemindRequete
 *
 * @ORM\Table(name="remind_requete")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\RemindRequeteRepository")
 */
class RemindRequete extends Remind
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Requete")
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
     * @return RemindRequete
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
