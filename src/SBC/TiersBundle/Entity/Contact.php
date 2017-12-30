<?php

namespace SBC\TiersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="SBC\TiersBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="denomination", type="string", length=255, nullable=true)
     */
    protected $denomination;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    protected $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    protected $tel;

    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="contacts")
     * @ORM\JoinColumn(name="client_code", referencedColumnName="code")
     */
    protected $client;

    /**
     * @var Supplier
     * @ORM\ManyToOne(targetEntity="Supplier", inversedBy="contacts")
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
     * Set denomination
     *
     * @param string $denomination
     *
     * @return Contact
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get denomination
     *
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Contact
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Contact
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set client
     *
     * @param \SBC\TiersBundle\Entity\Client $client
     *
     * @return Contact
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
     * @return Contact
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
        return $this->getDenomination();
    }
}
