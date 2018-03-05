<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Canalisation
 *
 * @ORM\Table(name="canalisation")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\CanalisationRepository")
 */
class Canalisation
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
     * @var string
     *
     * @ORM\Column(name="steg", type="string", length=255,nullable = true)
     */
    private $steg;

    /**
     * @var string
     *
     * @ORM\Column(name="sonede", type="string", length=255,nullable = true)
     */
    private $sonede;

    /**
     * @var string
     *
     * @ORM\Column(name="gaz", type="string", length=255,nullable = true)
     */
    private $gaz;

    /**
     * @var string
     *
     * @ORM\Column(name="onas", type="string", length=255,nullable = true)
     */
    private $onas;

    /**
     * @var string
     *
     * @ORM\Column(name="eclairage", type="string", length=255,nullable = true)
     */
    private $eclairage;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255,nullable = true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255,nullable = true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="trottoir", type="string", length=255,nullable = true)
     */
    private $trottoir;


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
     * Set steg
     *
     * @param string $steg
     *
     * @return Canalisation
     */
    public function setSteg($steg)
    {
        $this->steg = $steg;

        return $this;
    }

    /**
     * Get steg
     *
     * @return string
     */
    public function getSteg()
    {
        return $this->steg;
    }

    /**
     * Set sonede
     *
     * @param string $sonede
     *
     * @return Canalisation
     */
    public function setSonede($sonede)
    {
        $this->sonede = $sonede;

        return $this;
    }

    /**
     * Get sonede
     *
     * @return string
     */
    public function getSonede()
    {
        return $this->sonede;
    }

    /**
     * Set gaz
     *
     * @param string $gaz
     *
     * @return Canalisation
     */
    public function setGaz($gaz)
    {
        $this->gaz = $gaz;

        return $this;
    }

    /**
     * Get gaz
     *
     * @return string
     */
    public function getGaz()
    {
        return $this->gaz;
    }

    /**
     * Set onas
     *
     * @param string $onas
     *
     * @return Canalisation
     */
    public function setOnas($onas)
    {
        $this->onas = $onas;

        return $this;
    }

    /**
     * Get onas
     *
     * @return string
     */
    public function getOnas()
    {
        return $this->onas;
    }

    /**
     * Set eclairage
     *
     * @param string $eclairage
     *
     * @return Canalisation
     */
    public function setEclairage($eclairage)
    {
        $this->eclairage = $eclairage;

        return $this;
    }

    /**
     * Get eclairage
     *
     * @return string
     */
    public function getEclairage()
    {
        return $this->eclairage;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Canalisation
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return Canalisation
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set trottoir
     *
     * @param string $trottoir
     *
     * @return Canalisation
     */
    public function setTrottoir($trottoir)
    {
        $this->trottoir = $trottoir;

        return $this;
    }

    /**
     * Get trottoir
     *
     * @return string
     */
    public function getTrottoir()
    {
        return $this->trottoir;
    }
}
