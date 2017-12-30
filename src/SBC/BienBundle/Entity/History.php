<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\HistoryRepository")
 */
class History extends Tache
{

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Agency")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agency;

    /**
     * @var string
     *
     * @ORM\Column(name="type_bien", type="string", length=255)
     */
    private $typeBien;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition")
     * @ORM\JoinColumn(nullable=true)
     */
    private $acquisition;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Requete")
     * @ORM\JoinColumn(nullable=true)
     */
    private $requete;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mandat;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bien;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nouvelle;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set agency
     *
     * @param \SBC\BienBundle\Entity\Agency $agency
     *
     * @return History
     */
    public function setAgency(\SBC\BienBundle\Entity\Agency $agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency
     *
     * @return \SBC\BienBundle\Entity\Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set typeBien
     *
     * @param string $typeBien
     *
     * @return History
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return string
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Set acquisition
     *
     * @param \SBC\BienBundle\Entity\Acquisition $acquisition
     *
     * @return History
     */
    public function setAcquisition(\SBC\BienBundle\Entity\Acquisition $acquisition = null)
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    /**
     * Get acquisition
     *
     * @return \SBC\BienBundle\Entity\Acquisition
     */
    public function getAcquisition()
    {
        return $this->acquisition;
    }

    /**
     * Set requete
     *
     * @param \SBC\BienBundle\Entity\Requete $requete
     *
     * @return History
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

    /**
     * Set mandat
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandat
     *
     * @return History
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
     * Set nouvelle
     *
     * @param \SBC\BienBundle\Entity\Bien $nouvelle
     *
     * @return History
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

    /**
     * Set bien
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return History
     */
    public function setBien(\SBC\BienBundle\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }
}
