<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\EvaluationRepository")
 */
class Evaluation
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
     * @var float
     *
     * @ORM\Column(name="supTerrainMin", type="float", nullable=true)
     */
    private $supTerrainMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supTerrainPMin", type="float", nullable=true)
     */
    private $supTerrainPMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supTerrainTMin", type="float", nullable=true)
     */
    private $supTerrainTMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertMin", type="float", nullable=true)
     */
    private $supCouvertMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertPMin", type="float", nullable=true)
     */
    private $supCouvertPMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertTMin", type="float", nullable=true)
     */
    private $supCouvertTMin;

    /**
     * @var float
     *
     * @ORM\Column(name="supTerrainMax", type="float", nullable=true)
     */
    private $supTerrainMax;

    /**
     * @var float
     *
     * @ORM\Column(name="supTerrainPMax", type="float", nullable=true)
     */
    private $supTerrainPMax;

    /**
     * @var float
     *
     * @ORM\Column(name="supTerrainTMax", type="float", nullable=true)
     */
    private $supTerrainTMax;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertMax", type="float", nullable=true)
     */
    private $supCouvertMax;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertPMax", type="float", nullable=true)
     */
    private $supCouvertPMax;

    /**
     * @var float
     *
     * @ORM\Column(name="supCouvertTMax", type="float", nullable=true)
     */
    private $supCouvertTMax;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition", inversedBy="meetings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $acquisition;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set supTerrainMin
     *
     * @param float $supTerrainMin
     *
     * @return Evaluation
     */
    public function setSupTerrainMin($supTerrainMin)
    {
        $this->supTerrainMin = $supTerrainMin;

        return $this;
    }

    /**
     * Get supTerrainMin
     *
     * @return float
     */
    public function getSupTerrainMin()
    {
        return $this->supTerrainMin;
    }

    /**
     * Set supTerrainPMin
     *
     * @param float $supTerrainPMin
     *
     * @return Evaluation
     */
    public function setSupTerrainPMin($supTerrainPMin)
    {
        $this->supTerrainPMin = $supTerrainPMin;

        return $this;
    }

    /**
     * Get supTerrainPMin
     *
     * @return float
     */
    public function getSupTerrainPMin()
    {
        return $this->supTerrainPMin;
    }

    /**
     * Set supTerrainTMin
     *
     * @param float $supTerrainTMin
     *
     * @return Evaluation
     */
    public function setSupTerrainTMin($supTerrainTMin)
    {
        $this->supTerrainTMin = $supTerrainTMin;

        return $this;
    }

    /**
     * Get supTerrainTMin
     *
     * @return float
     */
    public function getSupTerrainTMin()
    {
        return $this->supTerrainTMin;
    }

    /**
     * Set supCouvertMin
     *
     * @param float $supCouvertMin
     *
     * @return Evaluation
     */
    public function setSupCouvertMin($supCouvertMin)
    {
        $this->supCouvertMin = $supCouvertMin;

        return $this;
    }

    /**
     * Get supCouvertMin
     *
     * @return float
     */
    public function getSupCouvertMin()
    {
        return $this->supCouvertMin;
    }

    /**
     * Set supCouvertPMin
     *
     * @param float $supCouvertPMin
     *
     * @return Evaluation
     */
    public function setSupCouvertPMin($supCouvertPMin)
    {
        $this->supCouvertPMin = $supCouvertPMin;

        return $this;
    }

    /**
     * Get supCouvertPMin
     *
     * @return float
     */
    public function getSupCouvertPMin()
    {
        return $this->supCouvertPMin;
    }

    /**
     * Set supCouvertTMin
     *
     * @param float $supCouvertTMin
     *
     * @return Evaluation
     */
    public function setSupCouvertTMin($supCouvertTMin)
    {
        $this->supCouvertTMin = $supCouvertTMin;

        return $this;
    }

    /**
     * Get supCouvertTMin
     *
     * @return float
     */
    public function getSupCouvertTMin()
    {
        return $this->supCouvertTMin;
    }

    /**
     * Set supTerrainMax
     *
     * @param float $supTerrainMax
     *
     * @return Evaluation
     */
    public function setSupTerrainMax($supTerrainMax)
    {
        $this->supTerrainMax = $supTerrainMax;

        return $this;
    }

    /**
     * Get supTerrainMax
     *
     * @return float
     */
    public function getSupTerrainMax()
    {
        return $this->supTerrainMax;
    }

    /**
     * Set supTerrainPMax
     *
     * @param float $supTerrainPMax
     *
     * @return Evaluation
     */
    public function setSupTerrainPMax($supTerrainPMax)
    {
        $this->supTerrainPMax = $supTerrainPMax;

        return $this;
    }

    /**
     * Get supTerrainPMax
     *
     * @return float
     */
    public function getSupTerrainPMax()
    {
        return $this->supTerrainPMax;
    }

    /**
     * Set supTerrainTMax
     *
     * @param float $supTerrainTMax
     *
     * @return Evaluation
     */
    public function setSupTerrainTMax($supTerrainTMax)
    {
        $this->supTerrainTMax = $supTerrainTMax;

        return $this;
    }

    /**
     * Get supTerrainTMax
     *
     * @return float
     */
    public function getSupTerrainTMax()
    {
        return $this->supTerrainTMax;
    }

    /**
     * Set supCouvertMax
     *
     * @param float $supCouvertMax
     *
     * @return Evaluation
     */
    public function setSupCouvertMax($supCouvertMax)
    {
        $this->supCouvertMax = $supCouvertMax;

        return $this;
    }

    /**
     * Get supCouvertMax
     *
     * @return float
     */
    public function getSupCouvertMax()
    {
        return $this->supCouvertMax;
    }

    /**
     * Set supCouvertPMax
     *
     * @param float $supCouvertPMax
     *
     * @return Evaluation
     */
    public function setSupCouvertPMax($supCouvertPMax)
    {
        $this->supCouvertPMax = $supCouvertPMax;

        return $this;
    }

    /**
     * Get supCouvertPMax
     *
     * @return float
     */
    public function getSupCouvertPMax()
    {
        return $this->supCouvertPMax;
    }

    /**
     * Set supCouvertTMax
     *
     * @param float $supCouvertTMax
     *
     * @return Evaluation
     */
    public function setSupCouvertTMax($supCouvertTMax)
    {
        $this->supCouvertTMax = $supCouvertTMax;

        return $this;
    }

    /**
     * Get supCouvertTMax
     *
     * @return float
     */
    public function getSupCouvertTMax()
    {
        return $this->supCouvertTMax;
    }

    /**
     * Set bien
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return Evaluation
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

    /**
     * Set acquisition
     *
     * @param \SBC\BienBundle\Entity\Acquisition $acquisition
     *
     * @return Evaluation
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

    public function  __construct()
    {

//        $this->supCouvertMax=0;
//        $this->supTerrainTMin=0;
//        $this->supTerrainTMax=0;
//        $this->supTerrainPMin=0;
//        $this->supTerrainPMax=0;
//        $this->supTerrainMin=0;
//        $this->supTerrainMax=0;
//        $this->supCouvertTMin=0;
//        $this->supCouvertTMax=0;
//        $this->supTerrainTMin=0;
//        $this->supTerrainTMax=0;
    }
}
