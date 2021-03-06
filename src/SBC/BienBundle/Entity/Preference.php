<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preference
 *
 * @ORM\Table(name="preference")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\PreferenceRepository")
 */
class Preference
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
     * @var bool
     *
     * @ORM\Column(name="lundi", type="boolean")
     */
    private $lundi;

    /**
     * @var bool
     *
     * @ORM\Column(name="mardi", type="boolean")
     */
    private $mardi;

    /**
     * @var bool
     *
     * @ORM\Column(name="mercredi", type="boolean")
     */
    private $mercredi;

    /**
     * @var bool
     *
     * @ORM\Column(name="jeudi", type="boolean")
     */
    private $jeudi;

    /**
     * @var bool
     *
     * @ORM\Column(name="vendredi", type="boolean")
     */
    private $vendredi;

    /**
     * @var bool
     *
     * @ORM\Column(name="samedi", type="boolean")
     */
    private $samedi;

    /**
     * @var bool
     *
     * @ORM\Column(name="dimanche", type="boolean")
     */
    private $dimanche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurefin", type="time")
     */
    private $heureFin;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable = true)
     */
    private $note;


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
     * Set lundi
     *
     * @param string $lundi
     *
     * @return Preference
     */
    public function setLundi($lundi)
    {
        $this->lundi = $lundi;

        return $this;
    }

    /**
     * Get lundi
     *
     * @return string
     */
    public function getLundi()
    {
        return $this->lundi;
    }

    /**
     * Set mardi
     *
     * @param boolean $mardi
     *
     * @return Preference
     */
    public function setMardi($mardi)
    {
        $this->mardi = $mardi;

        return $this;
    }

    /**
     * Get mardi
     *
     * @return bool
     */
    public function getMardi()
    {
        return $this->mardi;
    }

    /**
     * Set mercredi
     *
     * @param boolean $mercredi
     *
     * @return Preference
     */
    public function setMercredi($mercredi)
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    /**
     * Get mercredi
     *
     * @return bool
     */
    public function getMercredi()
    {
        return $this->mercredi;
    }

    /**
     * Set jeudi
     *
     * @param boolean $jeudi
     *
     * @return Preference
     */
    public function setJeudi($jeudi)
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    /**
     * Get jeudi
     *
     * @return bool
     */
    public function getJeudi()
    {
        return $this->jeudi;
    }

    /**
     * Set vendredi
     *
     * @param boolean $vendredi
     *
     * @return Preference
     */
    public function setVendredi($vendredi)
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    /**
     * Get vendredi
     *
     * @return bool
     */
    public function getVendredi()
    {
        return $this->vendredi;
    }

    /**
     * Set samedi
     *
     * @param boolean $samedi
     *
     * @return Preference
     */
    public function setSamedi($samedi)
    {
        $this->samedi = $samedi;

        return $this;
    }

    /**
     * Get samedi
     *
     * @return bool
     */
    public function getSamedi()
    {
        return $this->samedi;
    }

    /**
     * Set dimanche
     *
     * @param boolean $dimanche
     *
     * @return Preference
     */
    public function setDimanche($dimanche)
    {
        $this->dimanche = $dimanche;

        return $this;
    }

    /**
     * Get dimanche
     *
     * @return bool
     */
    public function getDimanche()
    {
        return $this->dimanche;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Preference
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return Preference
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Preference
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
