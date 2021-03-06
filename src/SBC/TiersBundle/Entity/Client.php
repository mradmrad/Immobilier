<?php

namespace SBC\TiersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Client
 *
 * @ORM\Entity(repositoryClass="SBC\TiersBundle\Repository\ClientRepository")
 * @Vich\Uploadable
 */
class Client extends Tiers implements \JsonSerializable
{
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
    /**
     * @var string
     * @ORM\Column(name="activity", type="string", length=255, nullable=true)
     */
    private $activity;

    /**
     * @var string
     * @ORM\Column(name="sexe", type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @var DateTime
     * @ORM\Column(name="naissance", type="date", length=255, nullable=true)
     */
    private $naissance;

    /**
     * @var string
     * @ORM\Column(name="etude", type="string", length=255, nullable=true)
     */
    private $etude;

    /**
     * @var string
     * @ORM\Column(name="travail", type="string", length=255, nullable=true)
     */
    private $travail;

    /**
     * @var string
     * @ORM\Column(name="domaine", type="string", length=255, nullable=true)
     */
    private $domaine;

    /**
     * @var string
     * @ORM\Column(name="origine", type="string", length=255, nullable=true)
     */
    private $origine;



    /**
     * @ORM\OneToOne(targetEntity="SBC\BienBundle\Entity\Preference", cascade={"persist"})
     */
    private $preferences;



    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Address", mappedBy="client", cascade={"persist", "remove"})
     */
    private $addresses;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="client", cascade={"persist", "remove"})
     */
    private $contacts;

    /**
     * @var string
     * @ORM\Column(name="telfixe", type="string", length=255, nullable=true)
     */
    private $telfixe;

    /**
     * @var string
     * @ORM\Column(name="secondtel", type="string", length=255, nullable=true)
     */
    private $secondtel;

    /**
     * @var string
     * @ORM\Column(name="thirdtel", type="string", length=255, nullable=true)
     */
    private $thirdtel;

    /**
     * @var string
     * @ORM\Column(name="telbureau", type="string", length=255, nullable=true)
     */
    private $telbureau;

    /**
     * @var string
     * @ORM\Column(name="secondmail", type="string", length=255, nullable=true)
     */
    private $secondmail;

    /**
     * @var string
     * @ORM\Column(name="birthplace", type="string", length=255, nullable=true)
     */
    private $birthplace;

    /**
     * @var string
     * @ORM\Column(name="nationalite", type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @var string
     * @ORM\Column(name="familySituation", type="string", length=255, nullable=true)
     */
    private $familySituation;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Requete" , mappedBy="client", cascade={"persist","remove"})
     */
    private $requetes;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\ProprietaireSelf" , mappedBy="client", cascade={"persist","remove"})
     */
    private $biens;

    /**
     * @ORM\OneToOne(targetEntity="SBC\BienBundle\Entity\BienPicture", cascade={"persist", "merge", "remove"})
     */

    private $cinRecto;

    /**
     * @ORM\OneToOne(targetEntity="SBC\BienBundle\Entity\BienPicture", cascade={"persist", "merge", "remove"})
     */

    private $cinVerso;





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
     * @return Client
     */
    public function addAddress(\SBC\TiersBundle\Entity\Address $address)
    {
        $address->setClient($this);
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
     * @return Client
     */
    public function addContact(\SBC\TiersBundle\Entity\Contact $contact)
    {
        $contact->setClient($this);
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
     * @return Client
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

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Client
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set naissance
     *
     * @param \DateTime $naissance
     *
     * @return Client
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get naissance
     *
     * @return \DateTime
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set etude
     *
     * @param string $etude
     *
     * @return Client
     */
    public function setEtude($etude)
    {
        $this->etude = $etude;

        return $this;
    }

    /**
     * Get etude
     *
     * @return string
     */
    public function getEtude()
    {
        return $this->etude;
    }

    /**
     * Set travail
     *
     * @param string $travail
     *
     * @return Client
     */
    public function setTravail($travail)
    {
        $this->travail = $travail;

        return $this;
    }

    /**
     * Get travail
     *
     * @return string
     */
    public function getTravail()
    {
        return $this->travail;
    }

    /**
     * Set domaine
     *
     * @param string $domaine
     *
     * @return Client
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return string
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Client
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }



    /**
     * Set preferences
     *
     * @param \SBC\BienBundle\Entity\Preference $preferences
     *
     * @return Client
     */
    public function setPreferences(\SBC\BienBundle\Entity\Preference $preferences = null)
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get preferences
     *
     * @return \SBC\BienBundle\Entity\Preference
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set telfixe
     *
     * @param string $telfixe
     *
     * @return Client
     */
    public function setTelfixe($telfixe)
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    /**
     * Get telfixe
     *
     * @return string
     */
    public function getTelfixe()
    {
        return $this->telfixe;
    }

    /**
     * Set secondtel
     *
     * @param string $secondtel
     *
     * @return Client
     */
    public function setSecondtel($secondtel)
    {
        $this->secondtel = $secondtel;

        return $this;
    }

    /**
     * Get secondtel
     *
     * @return string
     */
    public function getSecondtel()
    {
        return $this->secondtel;
    }

    /**
     * Set thirdtel
     *
     * @param string $thirdtel
     *
     * @return Client
     */
    public function setThirdtel($thirdtel)
    {
        $this->thirdtel = $thirdtel;

        return $this;
    }

    /**
     * Get thirdtel
     *
     * @return string
     */
    public function getThirdtel()
    {
        return $this->thirdtel;
    }

    /**
     * Set telbureau
     *
     * @param string $telbureau
     *
     * @return Client
     */
    public function setTelbureau($telbureau)
    {
        $this->telbureau = $telbureau;

        return $this;
    }

    /**
     * Get telbureau
     *
     * @return string
     */
    public function getTelbureau()
    {
        return $this->telbureau;
    }

    /**
     * Set secondmail
     *
     * @param string $secondmail
     *
     * @return Client
     */
    public function setSecondmail($secondmail)
    {
        $this->secondmail = $secondmail;

        return $this;
    }

    /**
     * Get secondmail
     *
     * @return string
     */
    public function getSecondmail()
    {
        return $this->secondmail;
    }

    /**
     * Set birthplace
     *
     * @param string $birthplace
     *
     * @return Client
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    /**
     * Get birthplace
     *
     * @return string
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * Set familySituation
     *
     * @param string $familySituation
     *
     * @return Client
     */
    public function setFamilySituation($familySituation)
    {
        $this->familySituation = $familySituation;

        return $this;
    }

    /**
     * Get familySituation
     *
     * @return string
     */
    public function getFamilySituation()
    {
        return $this->familySituation;
    }

    /**
     * Add requete
     *
     * @param \SBC\BienBundle\Entity\Requete $requete
     *
     * @return Client
     */
    public function addRequete(\SBC\BienBundle\Entity\Requete $requete)
    {
        $this->requetes[] = $requete;

        return $this;
    }

    /**
     * Remove requete
     *
     * @param \SBC\BienBundle\Entity\Requete $requete
     */
    public function removeRequete(\SBC\BienBundle\Entity\Requete $requete)
    {
        $this->requetes->removeElement($requete);
    }

    /**
     * Get requetes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequetes()
    {
        return $this->requetes;
    }

    /**
     * Add bien
     *
     * @param \SBC\BienBundle\Entity\ProprietaireSelf $bien
     *
     * @return Client
     */
    public function addBien(\SBC\BienBundle\Entity\ProprietaireSelf $bien)
    {
        $this->biens[] = $bien;

        return $this;
    }

    /**
     * Remove bien
     *
     * @param \SBC\BienBundle\Entity\ProprietaireSelf $bien
     */
    public function removeBien(\SBC\BienBundle\Entity\ProprietaireSelf $bien)
    {
        $this->biens->removeElement($bien);
    }

    /**
     * Get biens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBiens()
    {
        return $this->biens;
    }

    /**
     * Set cinRecto
     *
     * @param \SBC\BienBundle\Entity\BienPicture $cinRecto
     *
     * @return Client
     */
    public function setCinRecto(\SBC\BienBundle\Entity\BienPicture $cinRecto = null)
    {
        $this->cinRecto = $cinRecto;

        return $this;
    }

    /**
     * Get cinRecto
     *
     * @return \SBC\BienBundle\Entity\BienPicture
     */
    public function getCinRecto()
    {
        return $this->cinRecto;
    }

    /**
     * Set cinVerso
     *
     * @param \SBC\BienBundle\Entity\BienPicture $cinVerso
     *
     * @return Client
     */
    public function setCinVerso(\SBC\BienBundle\Entity\BienPicture $cinVerso = null)
    {
        $this->cinVerso = $cinVerso;

        return $this;
    }

    /**
     * Get cinVerso
     *
     * @return \SBC\BienBundle\Entity\BienPicture
     */
    public function getCinVerso()
    {
        return $this->cinVerso;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Client
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }
}
