<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goal
 *
 * @ORM\Table(name="goal")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\GoalRepository")
 */
class Goal implements \JsonSerializable
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
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginDate", type="datetime")
     */
    private $beginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishDate", type="datetime")
     */
    private $finishDate;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="rechercheGoal", type="integer", nullable=true)
     */
    private $rechercheGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="nouvelleGoal", type="integer", nullable=true)
     */
    private $nouvelleGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="acquisitionGoal", type="integer", nullable=true)
     */
    private $acquisitionGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="mandatVenteGoal", type="integer", nullable=true)
     */
    private $mandatVenteGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="mandatLocationGoal", type="integer", nullable=true)
     */
    private $mandatLocationGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="requeteGoal", type="integer", nullable=true)
     */
    private $requeteGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="transactionVenteGoal", type="integer", nullable=true)
     */
    private $transactionVenteGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="transactionLocationGoal", type="integer", nullable=true)
     */
    private $transactionLocationGoal;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Agency")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agency;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel" , inversedBy="goals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $goalFor;

    public function __construct()
    {
        $this->creationDate = new \Datetime('now');
        $this->rechercheGoal = 0;
        $this->nouvelleGoal = 0;
        $this->acquisitionGoal = 0;
        $this->mandatVenteGoal = 0;
        $this->mandatLocationGoal = 0;
        $this->requeteGoal = 0;
        $this->transactionVenteGoal = 0;
        $this->transactionLocationGoal = 0;
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function __toString()
    {
        return $this->code;
    }



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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Goal
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set beginDate
     *
     * @param \DateTime $beginDate
     *
     * @return Goal
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
     * @return Goal
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

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Goal
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set rechercheGoal
     *
     * @param integer $rechercheGoal
     *
     * @return Goal
     */
    public function setRechercheGoal($rechercheGoal)
    {
        $this->rechercheGoal = $rechercheGoal;

        return $this;
    }

    /**
     * Get rechercheGoal
     *
     * @return int
     */
    public function getRechercheGoal()
    {
        return $this->rechercheGoal;
    }

    /**
     * Set nouvelleGoal
     *
     * @param integer $nouvelleGoal
     *
     * @return Goal
     */
    public function setNouvelleGoal($nouvelleGoal)
    {
        $this->nouvelleGoal = $nouvelleGoal;

        return $this;
    }

    /**
     * Get nouvelleGoal
     *
     * @return int
     */
    public function getNouvelleGoal()
    {
        return $this->nouvelleGoal;
    }

    /**
     * Set acquisitionGoal
     *
     * @param integer $acquisitionGoal
     *
     * @return Goal
     */
    public function setAcquisitionGoal($acquisitionGoal)
    {
        $this->acquisitionGoal = $acquisitionGoal;

        return $this;
    }

    /**
     * Get acquisitionGoal
     *
     * @return int
     */
    public function getAcquisitionGoal()
    {
        return $this->acquisitionGoal;
    }

    /**
     * Set mandatVenteGoal
     *
     * @param integer $mandatVenteGoal
     *
     * @return Goal
     */
    public function setMandatVenteGoal($mandatVenteGoal)
    {
        $this->mandatVenteGoal = $mandatVenteGoal;

        return $this;
    }

    /**
     * Get mandatVenteGoal
     *
     * @return int
     */
    public function getMandatVenteGoal()
    {
        return $this->mandatVenteGoal;
    }


    /**
     * Set mandatLocationGoal
     *
     * @param integer $mandatLocationGoal
     *
     * @return Goal
     */
    public function setMandatLocationGoal($mandatLocationGoal)
    {
        $this->mandatLocationGoal = $mandatLocationGoal;

        return $this;
    }

    /**
     * Get mandatLocationGoal
     *
     * @return int
     */
    public function getMandatLocationGoal()
    {
        return $this->mandatLocationGoal;
    }

    /**
     * Set requeteGoal
     *
     * @param integer $requeteGoal
     *
     * @return Goal
     */
    public function setRequeteGoal($requeteGoal)
    {
        $this->requeteGoal = $requeteGoal;

        return $this;
    }

    /**
     * Get requeteGoal
     *
     * @return int
     */
    public function getRequeteGoal()
    {
        return $this->requeteGoal;
    }

    /**
     * Set createdBy
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $createdBy
     *
     * @return Goal
     */
    public function setCreatedBy(\SBC\PersonnelBundle\Entity\Personnel $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set agency
     *
     * @param \SBC\BienBundle\Entity\Agency $agency
     *
     * @return Goal
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
     * Set goalFor
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $goalFor
     *
     * @return Goal
     */
    public function setGoalFor(\SBC\PersonnelBundle\Entity\Personnel $goalFor)
    {
        $this->goalFor = $goalFor;

        return $this;
    }

    /**
     * Get goalFor
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getGoalFor()
    {
        return $this->goalFor;
    }


    /**
     * Set transactionVenteGoal
     *
     * @param integer $transactionVenteGoal
     *
     * @return Goal
     */
    public function setTransactionVenteGoal($transactionVenteGoal)
    {
        $this->transactionVenteGoal = $transactionVenteGoal;

        return $this;
    }

    /**
     * Get transactionVenteGoal
     *
     * @return int
     */
    public function getTransactionVenteGoal()
    {
        return $this->transactionVenteGoal;
    }



    /**
     * Set transactionLcationGoal
     *
     * @param integer $transactionLocationGoal
     *
     * @return Goal
     */
    public function setTransactionLocationGoal($transactionLocationGoal)
    {
        $this->transactionLocationGoal = $transactionLocationGoal;

        return $this;
    }

    /**
     * Get transactionLocationGoal
     *
     * @return int
     */
    public function getTransactionLocationGoal()
    {
        return $this->transactionVenteGoal;
    }

}
