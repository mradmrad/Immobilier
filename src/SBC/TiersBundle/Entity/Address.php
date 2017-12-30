<?php

namespace SBC\TiersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="SBC\TiersBundle\Repository\AddressRepository")
 */
class Address
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
     * @var Client
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="addresses")
     * @ORM\JoinColumn(name="client_code", referencedColumnName="code")
     */
    protected $client;

    /**
     * @var Supplier
     * @ORM\ManyToOne(targetEntity="Supplier", inversedBy="addresses")
     * @ORM\JoinColumn(name="supplier_code", referencedColumnName="code")
     */
    protected $supplier;

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
     * Set address
     *
     * @param string $address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
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

    /**
     * Set client
     *
     * @param \SBC\TiersBundle\Entity\Client $client
     *
     * @return Address
     */
    public function setClient(\SBC\TiersBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \SBC\TiersBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set supplier
     *
     * @param \SBC\TiersBundle\Entity\Supplier $supplier
     *
     * @return Address
     */
    public function setSupplier(\SBC\TiersBundle\Entity\Supplier $supplier = null)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return \SBC\TiersBundle\Entity\Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
    
    function __toString()
    {
        return $this->getTitle();
    }
}
