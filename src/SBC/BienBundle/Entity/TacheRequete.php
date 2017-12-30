<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TacheRequete
 *
 * @ORM\Table(name="tache_requete")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TacheRequeteRepository")
 */
class TacheRequete extends Tache
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Requete", inversedBy="taches")
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
     * @return TacheRequete
     */
    public function setRequete(\SBC\BienBundle\Entity\Requete $requete)
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

