<?php

namespace SBC\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 */
class Address
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="governorate", type="string", length=255, nullable=true)
     */
    protected $governorate;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=255, nullable=true)
     */
    protected $zipCode;


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
     * Set title
     *
     * @param string $title
     *
     * @return Address
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Address
     */
    public function setAddress($adress)
    {
        $this->address = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set governorate
     *
     * @param string $governorate
     *
     * @return Address
     */
    public function setGovernorate($governorate)
    {
        $this->governorate = $governorate;

        return $this;
    }

    /**
     * Get governorate
     *
     * @return string
     */
    public function getGovernorate()
    {
        return $this->governorate;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function __toString()
    {
        return $this->governorate.", ".$this->city." ".$this->getZipCode().", ".$this->getAddress();
    }
}
