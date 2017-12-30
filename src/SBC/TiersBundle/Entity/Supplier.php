<?php

namespace SBC\TiersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Entity(repositoryClass="SBC\TiersBundle\Repository\SupplierRepository")
 */
class Supplier extends Tiers
{
    /**
     * @var string
     * @ORM\Column(name="activity", type="string", length=255, nullable=true)
     */
    private $activity;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Address", mappedBy="supplier", cascade={"persist", "remove"})
     */
    private $addresses;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="supplier", cascade={"persist", "remove"})
     */
    private $contacts;
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \SBC\TiersBundle\Entity\Address $address
     *
     * @return Supplier
     */
    public function addAddress(\SBC\TiersBundle\Entity\Address $address)
    {
        $address->setSupplier($this);
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \SBC\TiersBundle\Entity\Address $address
     */
    public function removeAddress(\SBC\TiersBundle\Entity\Address $address)
    {
        $this->addresses->removeElement($address);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add contact
     *
     * @param \SBC\TiersBundle\Entity\Contact $contact
     *
     * @return Supplier
     */
    public function addContact(\SBC\TiersBundle\Entity\Contact $contact)
    {
        $contact->setSupplier($this);
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \SBC\TiersBundle\Entity\Contact $contact
     */
    public function removeContact(\SBC\TiersBundle\Entity\Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set activity
     *
     * @param string $activity
     *
     * @return Supplier
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
