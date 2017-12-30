<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procuration
 *
 * @ORM\Table(name="procuration")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\ProcurationRepository")
 */
class Procuration extends Representant
{

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateProcuration", type="datetime")
     */
    private $dateProcuration;


    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="procurations")
     * @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     */
    protected $bien;

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set bien
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return Procuration
     */
    public function setBien(Bien $bien = null)
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


    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Procuration
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }


    /**
     * Set dateProcuration
     *
     * @param \DateTime $dateProcuration
     *
     * @return Procuration
     */
    public function setDateProcuration($dateProcuration)
    {
        $this->dateProcuration = $dateProcuration;

        return $this;
    }

    /**
     * Get dateProcuration
     *
     * @return \DateTime
     */
    public function getDateProcuration()
    {
        return $this->dateProcuration;
    }

}

