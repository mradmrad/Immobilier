<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TacheAcquisition
 *
 * @ORM\Table(name="tache_acquisition")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TacheAcquisitionRepository")
 */
class TacheAcquisition extends  Tache
{
    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition", inversedBy="taches")
     * @ORM\JoinColumn(nullable=true)
     */
    private $acquisition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginDate", type="datetime" , nullable=true)
     */
    protected $beginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishDate", type="datetime" , nullable= true)
     */
    protected $finishDate;




    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set acquisition
     *
     * @param \SBC\BienBundle\Entity\Acquisition $acquisition
     *
     * @return TacheAcquisition
     */
    public function setAcquisition(\SBC\BienBundle\Entity\Acquisition $acquisition)
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
     * Set beginDate
     *
     * @param \DateTime $beginDate
     *
     * @return TacheAcquisition
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    /**
     * Get beginDate
     *
     * @return \DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Set finishDate
     *
     * @param \DateTime $finishDate
     *
     * @return TacheAcquisition
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Get finishDate
     *
     * @return \DateTime
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }
}
