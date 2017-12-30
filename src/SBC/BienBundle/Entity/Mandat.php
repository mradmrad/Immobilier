<?php

namespace SBC\BienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mandat
 *
 * @ORM\Table(name="mandat")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\MandatRepository")
 */
class Mandat
{
    const EN_COURS = 'EN_COURS';
    const CONCLU = 'CONCLU';
    const ECHU = 'ECHU';

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
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Acquisition", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $acquisition;


    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="provenance", type="string", length=255, nullable=true)
     */
    private $provenance;

    /**
     * @var string
     *
     * @ORM\Column(name="usagee", type="string", length=255, nullable=true)
     */
    private $usage;

    /**
     * @var bool
     *
     * @ORM\Column(name="isConforme", type="boolean", nullable=true)
     */
    private $isConforme;

    /**
     * @var string
     *
     * @ORM\Column(name="isNotConformeFor", type="string", length=255, nullable=true)
     */
    private $isNotConformeFor;

    /**
     * @var string
     *
     * @ORM\Column(name="hypotheque", type="string", length=255, nullable=true)
     */
    private $hypotheque;

    /**
     * @var string
     *
     * @ORM\Column(name="hypothequefc", type="string", length=255, nullable=true)
     */
    private $hypothequefc;

    /**
     * @var string
     *
     * @ORM\Column(name="hypothequeFor", type="string", length=255, nullable=true)
     */
    private $hypothequeFor;


    /**
     * @var string
     *
     * @ORM\Column(name="etatBien", type="string", length=255, nullable=true)
     */
    private $etatBien;

    /**
     * @var string
     *
     * @ORM\Column(name="loueA", type="string", length=255, nullable=true)
     */
    private $loueA;

    /**
     * @var float
     *
     * @ORM\Column(name="loyeMensuel", type="float", nullable=true)
     */
    private $loyeMensuel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinLoyer", type="datetime", nullable=true)
     */
    private $dateFinLoyer;


    /**
     * @var float
     *
     * @ORM\Column(name="fraisDeCorporite", type="float", nullable=true)
     */
    private $fraisDeCorporite;

    /**
     * @var string
     *
     * @ORM\Column(name="periodeFraisDeCorporite", type="string", length=255, nullable=true)
     */
    private $periodeFraisDeCorporite;


    /**
     * @var float
     *
     * @ORM\Column(name="prixDeVenteDemande", type="float", nullable=true)
     */
    private $prixDeVenteDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="prixDeVenteDemandeTexte", type="string", length=255, nullable=true)
     */
    private $prixDeVenteDemandeTexte;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentageRegelement", type="float", nullable=true)
     */
    private $pourcentageRegelement;

    /**
     * @var string
     *
     * @ORM\Column(name="formeReglement", type="string", length=255, nullable=true)
     */
    private $formeReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="avance", type="string", nullable=true)
     */

    private $avance;

    /**
     * @var string
     *
     * @ORM\Column(name="intervalMinSignatureActe", type="string", nullable=true)
     */

    private $intervalMinSignatureActe;
    /**
     * @var string
     *
     * @ORM\Column(name="intervalMaxSignatureActe", type="string", nullable=true)
     */
    private $intervalMaxSignatureActe;

    /**
     * @var string
     *
     * @ORM\Column(name="consigne", type="string", length=255, nullable=true)
     */
    private $consigne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutEffetMandat", type="datetime", nullable=true)
     */
    private $dateDebutEffetMandat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="consigneDate", type="datetime", nullable=true)
     */
    private $consigneDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpirationEffetMandat", type="datetime", nullable=true)
     */
    private $dateExpirationEffetMandat;

    /**
     * @var string
     *
     * @ORM\Column(name="resoluOuRenouvele", type="string", length=255, nullable=true)
     */
    private $resoluOuRenouvele;

    /**
     * @var bool
     *
     * @ORM\Column(name="isExclusif", type="boolean", nullable=true)
     */
    private $isExclusif;

    /**
     * @ORM\ManyToMany(targetEntity="SBC\BienBundle\Entity\Origine", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotions;

    /**
     * @var string
     *
     * @ORM\Column(name="autresPromotion", type="string", length=255, nullable=true)
     */
    private $autresPromotion;

    /**
     * @var string
     *
     * @ORM\Column(name="visite", type="string", length=255, nullable=true)
     */
    private $visite;

    /**
     * @var string
     *
     * @ORM\Column(name="modalitePaiement", type="string", length=255, nullable=true)
     */
    private $modalitePaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contactVisite", type="datetime", length=255, nullable=true)
     */
    private $contactVisite;


    /**
     * @var float
     *
     * @ORM\Column(name="montantHonoraireAgent", type="float", nullable=true)
     */
    private $montantHonoraireAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="montantHonoraireAgentTexte", type="string", length=255, nullable=true)
     */
    private $montantHonoraireAgentTexte;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text" , nullable = true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="faitA", type="string", length=255, nullable=true)
     */
    private $faitA;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="faitLe", type="datetime", nullable=true)
     */
    private $faitLe;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\TypeContrat")
     */
    private $typeMandat;


    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\TacheMandat", mappedBy="mandat")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\OffreVente", mappedBy="mandat" , cascade={"persist"})
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $propositions;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\OffreLocation", mappedBy="mandat")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $propositionsLocation;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\MandatMeeting", mappedBy="mandat")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $meetings;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Mandat")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mandatParent;


    /**
     * @var string
     *
     * @ORM\Column(name="etatMandat", type="string", length=255, nullable=true)
     */
    private $etatMandat;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Offre", mappedBy="mandat")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $offres;


    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\Visite", mappedBy="mandat")
     */
    private $visites;

    /**
     * @var string
     *
     * @ORM\Column(name="typeContrat", type="string", length=255, nullable=true)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="loyeDe", type="string", length=255, nullable=true)
     */
    private $loyeDe;

    /**
     * @var string
     *
     * @ORM\Column(name="retenueSource", type="string", length=255, nullable=true)
     */
    private $retenueSource;

    /**
     * @var string
     *
     * @ORM\Column(name="payementLe", type="string", length=255, nullable=true)
     */
    private $payementLe;

    /**
     * @var string
     *
     * @ORM\Column(name="caution", type="string", length=255, nullable=true)
     */
    private $caution;

    /**
     * @var integer
     *
     * @ORM\Column(name="augmentationTaux", type="integer", length=255, nullable=true)
     */
    private $augmentationTaux;

    /**
     * @var integer
     *
     * @ORM\Column(name="augmentationPer", type="integer", length=255, nullable=true)
     */
    private $augmentationPer;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcloyer", type="integer", length=255, nullable=true)
     */
    private $fcloyer;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcprix", type="integer", length=255, nullable=true)
     */
    private $fcprix;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fcdateDebut", type="datetime", length=255, nullable=true)
     */
    private $fcdateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="fctitre", type="string", length=255, nullable=true)
     */
    private $fctitre;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcaugmentation", type="integer", length=255, nullable=true)
     */
    private $fcaugmentation;

    /**
     * @var string
     *
     * @ORM\Column(name="fcaugmentationPer", type="string", length=255, nullable=true)
     */
    private $fcaugmentationPer;

    /**
     * @var string
     *
     * @ORM\Column(name="fcretenue", type="string", length=255, nullable=true)
     */
    private $fcretenue;

    /**
     * @var string
     *
     * @ORM\Column(name="fcusage", type="string", length=255, nullable=true)
     */
    private $fcusage;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcgarantie", type="integer", length=255, nullable=true)
     */
    private $fcgarantie;

    /**
     * @var string
     *
     * @ORM\Column(name="fcimpot", type="string", length=255, nullable=true)
     */
    private $fcimpot;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcavance", type="integer", length=255, nullable=true)
     */
    private $fcavance;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcavanceMin", type="integer", length=255, nullable=true)
     */
    private $fcavanceMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="fcavanceMax", type="integer", length=255, nullable=true)
     */
    private $fcavanceMax;

    /**
     * @var string
     *
     * @ORM\Column(name="fcconsigne", type="string", length=255, nullable=true)
     */
    private $fcconsigne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fcconsigneDate", type="datetime", length=255, nullable=true)
     */
    private $fcconsigneDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="deloyer", type="integer", length=255, nullable=true)
     */
    private $deloyer;

    /**
     * @var integer
     *
     * @ORM\Column(name="deprix", type="integer", length=255, nullable=true)
     */
    private $deprix;

    /**
     * @var string
     *
     * @ORM\Column(name="detype", type="string", length=255, nullable=true)
     */
    private $detype;

    /**
     * @var string
     *
     * @ORM\Column(name="deusage", type="string", length=255, nullable=true)
     */
    private $deusage;

    /**
     * @var string
     *
     * @ORM\Column(name="deactivite", type="string", length=255, nullable=true)
     */
    private $deactivite;

    /**
     * @var string
     *
     * @ORM\Column(name="deretenue", type="string", length=255, nullable=true)
     */
    private $deretenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="depaiementDate", type="datetime", length=255, nullable=true)
     */
    private $depaiementDate;

    /**
     * @var string
     *
     * @ORM\Column(name="depaiementPer", type="string", length=255, nullable=true)
     */
    private $depaiementPer;

    /**
     * @var string
     *
     * @ORM\Column(name="decaution", type="string", length=255, nullable=true)
     */
    private $decaution;

    /**
     * @var integer
     *
     * @ORM\Column(name="deaugmentation", type="integer", length=255, nullable=true)
     */
    private $deaugmentation;

    /**
     * @var integer
     *
     * @ORM\Column(name="deaugmentationPer", type="integer", length=255, nullable=true)
     */
    private $deaugmentationPer;

    /**
     * @var string
     *
     * @ORM\Column(name="dedisponibilite", type="string", length=255, nullable=true)
     */
    private $dedisponibilite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dedisponibiliteDate", type="datetime", length=255, nullable=true)
     */
    private $dedisponibiliteDate;

    /**
     * @var string
     *
     * @ORM\Column(name="destate", type="string", length=255, nullable=true)
     */
    private $destate;


    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255, nullable=true)
     */
    private $origine;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="destateDate", type="datetime", length=255, nullable=true)
     */
    private $destateDate;





    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->taches = new ArrayCollection();
        $this->meetings = new ArrayCollection();
        $this->visites = new ArrayCollection();
        $this->promotions = new ArrayCollection();
        $this->etatMandat = Mandat::EN_COURS;
        $this->offres = new ArrayCollection();
    }

    public function __toString()
    {
        return "$this->numero";
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
     * @return Mandat
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }


    /**
     * Set acquisition
     *
     * @param \SBC\BienBundle\Entity\Acquisition $acquisition
     *
     * @return Mandat
     */
    public function setAcquisition(Acquisition $acquisition)
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    /**
     * Get $acquisition
     *
     * @return \SBC\BienBundle\Entity\Acquisition
     */
    public function getAcquisition()
    {
        return $this->acquisition;
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Mandat
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Mandat
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set provenance
     *
     * @param string $provenance
     *
     * @return Mandat
     */
    public function setProvenance($provenance)
    {
        $this->provenance = $provenance;

        return $this;
    }

    /**
     * Get provenance
     *
     * @return string
     */
    public function getProvenance()
    {
        return $this->provenance;
    }

    /**
     * Set usage
     *
     * @param string $usage
     *
     * @return Mandat
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * Get usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Set isConforme
     *
     * @param boolean $isConforme
     *
     * @return Mandat
     */
    public function setIsConforme($isConforme)
    {
        $this->isConforme = $isConforme;

        return $this;
    }

    /**
     * Get isConforme
     *
     * @return boolean
     */
    public function getIsConforme()
    {
        return $this->isConforme;
    }

    /**
     * Set isNotConformeFor
     *
     * @param string $isNotConformeFor
     *
     * @return Mandat
     */
    public function setIsNotConformeFor($isNotConformeFor = null)
    {
        $this->isNotConformeFor = $isNotConformeFor;

        return $this;
    }

    /**
     * Get isNotConformeFor
     *
     * @return string
     */
    public function getIsNotConformeFor()
    {
        return $this->isNotConformeFor;
    }

    /**
     * Set hypotheque
     *
     * @param string $hypotheque
     *
     * @return Mandat
     */
    public function setHypotheque($hypotheque)
    {
        $this->hypotheque = $hypotheque;

        return $this;
    }

    /**
     * Get hypotheque
     *
     * @return string
     */
    public function getHypotheque()
    {
        return $this->hypotheque;
    }

    /**
     * Set hypothequeFor
     *
     * @param string $hypothequeFor
     *
     * @return Mandat
     */
    public function setHypothequeFor($hypothequeFor)
    {
        $this->hypothequeFor = $hypothequeFor;

        return $this;
    }

    /**
     * Get hypothequeFor
     *
     * @return string
     */
    public function getHypothequeFor()
    {
        return $this->hypothequeFor;
    }

    /**
     * Set etatBien
     *
     * @param string $etatBien
     *
     * @return Mandat
     */
    public function setEtatBien($etatBien)
    {
        $this->etatBien = $etatBien;

        return $this;
    }

    /**
     * Get etatBien
     *
     * @return string
     */
    public function getEtatBien()
    {
        return $this->etatBien;
    }

    /**
     * Set loyuA
     *
     * @param string $loueA
     *
     * @return Mandat
     */
    public function setLoueA($loueA)
    {
        $this->loueA = $loueA;

        return $this;
    }

    /**
     * Get loueA
     *
     * @return string
     */
    public function getLoueA()
    {
        return $this->loueA;
    }

    /**
     * Set loyeMensuel
     *
     * @param float $loyeMensuel
     *
     * @return Mandat
     */
    public function setLoyeMensuel($loyeMensuel)
    {
        $this->loyeMensuel = $loyeMensuel;

        return $this;
    }

    /**
     * Get loyeMensuel
     *
     * @return float
     */
    public function getLoyeMensuel()
    {
        return $this->loyeMensuel;
    }

    /**
     * Set dateFinLoyer
     *
     * @param \DateTime $dateFinLoyer
     *
     * @return Mandat
     */
    public function setDateFinLoyer($dateFinLoyer)
    {
        $this->dateFinLoyer = $dateFinLoyer;

        return $this;
    }

    /**
     * Get dateFinLoyer
     *
     * @return \DateTime
     */
    public function getDateFinLoyer()
    {
        return $this->dateFinLoyer;
    }

    /**
     * Set fraisDeCorporite
     *
     * @param float $fraisDeCorporite
     *
     * @return Mandat
     */
    public function setFraisDeCorporite($fraisDeCorporite)
    {
        $this->fraisDeCorporite = $fraisDeCorporite;

        return $this;
    }

    /**
     * Get fraisDeCorporite
     *
     * @return float
     */
    public function getFraisDeCorporite()
    {
        return $this->fraisDeCorporite;
    }

    /**
     * Set periodeFraisDeCorporite
     *
     * @param string $periodeFraisDeCorporite
     *
     * @return Mandat
     */
    public function setPeriodeFraisDeCorporite($periodeFraisDeCorporite)
    {
        $this->periodeFraisDeCorporite = $periodeFraisDeCorporite;

        return $this;
    }

    /**
     * Get periodeFraisDeCorporite
     *
     * @return string
     */
    public function getPeriodeFraisDeCorporite()
    {
        return $this->periodeFraisDeCorporite;
    }

    /**
     * Set prixDeVenteDemande
     *
     * @param float $prixDeVenteDemande
     *
     * @return Mandat
     */
    public function setPrixDeVenteDemande($prixDeVenteDemande)
    {
        $this->prixDeVenteDemande = $prixDeVenteDemande;

        return $this;
    }

    /**
     * Get prixDeVenteDemande
     *
     * @return float
     */
    public function getPrixDeVenteDemande()
    {
        return $this->prixDeVenteDemande;
    }

    /**
     * Set prixDeVenteDemandeTexte
     *
     * @param string $prixDeVenteDemandeTexte
     *
     * @return Mandat
     */
    public function setPrixDeVenteDemandeTexte($prixDeVenteDemandeTexte)
    {
        $this->prixDeVenteDemandeTexte = $prixDeVenteDemandeTexte;

        return $this;
    }

    /**
     * Get prixDeVenteDemandeTexte
     *
     * @return string
     */
    public function getPrixDeVenteDemandeTexte()
    {
        return $this->prixDeVenteDemandeTexte;
    }

    /**
     * Set pourcentageRegelement
     *
     * @param float $pourcentageRegelement
     *
     * @return Mandat
     */
    public function setPourcentageRegelement($pourcentageRegelement)
    {
        $this->pourcentageRegelement = $pourcentageRegelement;

        return $this;
    }

    /**
     * Get pourcentageRegelement
     *
     * @return float
     */
    public function getPourcentageRegelement()
    {
        return $this->pourcentageRegelement;
    }

    /**
     * Set formeReglement
     *
     * @param string $formeReglement
     *
     * @return Mandat
     */
    public function setFormeReglement($formeReglement)
    {
        $this->formeReglement = $formeReglement;

        return $this;
    }

    /**
     * Get formeReglement
     *
     * @return string
     */
    public function getFormeReglement()
    {
        return $this->formeReglement;
    }



    /**
     * Set consigne
     *
     * @param string $consigne
     *
     * @return Mandat
     */
    public function setConsigne($consigne)
    {
        $this->consigne = $consigne;

        return $this;
    }

    /**
     * Get consigne
     *
     * @return string
     */
    public function getConsigne()
    {
        return $this->consigne;
    }

    /**
     * Set dateDebutEffetMandat
     *
     * @param \DateTime $dateDebutEffetMandat
     *
     * @return Mandat
     */
    public function setDateDebutEffetMandat($dateDebutEffetMandat)
    {
        $this->dateDebutEffetMandat = $dateDebutEffetMandat;

        return $this;
    }

    /**
     * Get dateDebutEffetMandat
     *
     * @return \DateTime
     */
    public function getDateDebutEffetMandat()
    {
        return $this->dateDebutEffetMandat;
    }

    /**
     * Set dateExpirationEffetMandat
     *
     * @param \DateTime $dateExpirationEffetMandat
     *
     * @return Mandat
     */
    public function setDateExpirationEffetMandat($dateExpirationEffetMandat)
    {
        $this->dateExpirationEffetMandat = $dateExpirationEffetMandat;

        return $this;
    }

    /**
     * Get dateExpirationEffetMandat
     *
     * @return \DateTime
     */
    public function getDateExpirationEffetMandat()
    {
        return $this->dateExpirationEffetMandat;
    }

    /**
     * Set resoluOuRenouvele
     *
     * @param string $resoluOuRenouvele
     *
     * @return Mandat
     */
    public function setResoluOuRenouvele($resoluOuRenouvele)
    {
        $this->resoluOuRenouvele = $resoluOuRenouvele;

        return $this;
    }

    /**
     * Get resoluOuRenouvele
     *
     * @return string
     */
    public function getResoluOuRenouvele()
    {
        return $this->resoluOuRenouvele;
    }

    /**
     * Set isExclusif
     *
     * @param boolean $isExclusif
     *
     * @return Mandat
     */
    public function setIsExclusif($isExclusif)
    {
        $this->isExclusif = $isExclusif;

        return $this;
    }

    /**
     * Get isExclusif
     *
     * @return boolean
     */
    public function getIsExclusif()
    {
        return $this->isExclusif;
    }

    /**
     * Set autresPromotion
     *
     * @param string $autresPromotion
     *
     * @return Mandat
     */
    public function setAutresPromotion($autresPromotion)
    {
        $this->autresPromotion = $autresPromotion;

        return $this;
    }

    /**
     * Get autresPromotion
     *
     * @return string
     */
    public function getAutresPromotion()
    {
        return $this->autresPromotion;
    }

    /**
     * Set visite
     *
     * @param string $visite
     *
     * @return Mandat
     */
    public function setVisite($visite)
    {
        $this->visite = $visite;

        return $this;
    }

    /**
     * Get visite
     *
     * @return string
     */
    public function getVisite()
    {
        return $this->visite;
    }

    /**
     * Set contactVisite
     *
     * @param string $contactVisite
     *
     * @return Mandat
     */
    public function setContactVisite($contactVisite)
    {
        $this->contactVisite = $contactVisite;

        return $this;
    }

    /**
     * Get contactVisite
     *
     * @return string
     */
    public function getContactVisite()
    {
        return $this->contactVisite;
    }

    /**
     * Set montantHonoraireAgent
     *
     * @param float $montantHonoraireAgent
     *
     * @return Mandat
     */
    public function setMontantHonoraireAgent($montantHonoraireAgent)
    {
        $this->montantHonoraireAgent = $montantHonoraireAgent;

        return $this;
    }

    /**
     * Get montantHonoraireAgent
     *
     * @return float
     */
    public function getMontantHonoraireAgent()
    {
        return $this->montantHonoraireAgent;
    }

    /**
     * Set montantHonoraireAgentTexte
     *
     * @param string $montantHonoraireAgentTexte
     *
     * @return Mandat
     */
    public function setMontantHonoraireAgentTexte($montantHonoraireAgentTexte)
    {
        $this->montantHonoraireAgentTexte = $montantHonoraireAgentTexte;

        return $this;
    }

    /**
     * Get montantHonoraireAgentTexte
     *
     * @return string
     */
    public function getMontantHonoraireAgentTexte()
    {
        return $this->montantHonoraireAgentTexte;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Mandat
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

    /**
     * Set faitA
     *
     * @param string $faitA
     *
     * @return Mandat
     */
    public function setFaitA($faitA)
    {
        $this->faitA = $faitA;

        return $this;
    }

    /**
     * Get faitA
     *
     * @return string
     */
    public function getFaitA()
    {
        return $this->faitA;
    }

    /**
     * Set faitLe
     *
     * @param \DateTime $faitLe
     *
     * @return Mandat
     */
    public function setFaitLe($faitLe)
    {
        $this->faitLe = $faitLe;

        return $this;
    }

    /**
     * Get faitLe
     *
     * @return \DateTime
     */
    public function getFaitLe()
    {
        return $this->faitLe;
    }



    /**
     * Add promotion
     *
     * @param \SBC\BienBundle\Entity\Origine $promotion
     *
     * @return Mandat
     */
    public function addPromotion(\SBC\BienBundle\Entity\Origine $promotion)
    {
        $this->promotions[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \SBC\BienBundle\Entity\Origine $promotion
     */
    public function removePromotion(\SBC\BienBundle\Entity\Origine $promotion)
    {
        $this->promotions->removeElement($promotion);
    }

    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     * Set typeMandat
     *
     * @param \SBC\BienBundle\Entity\TypeContrat $typeMandat
     *
     * @return Mandat
     */
    public function setTypeMandat(\SBC\BienBundle\Entity\TypeContrat $typeMandat = null)
    {
        $this->typeMandat = $typeMandat;

        return $this;
    }

    /**
     * Get typeMandat
     *
     * @return \SBC\BienBundle\Entity\TypeContrat
     */
    public function getTypeMandat()
    {
        return $this->typeMandat;
    }


    /**
     * @param TacheMandat $tache
     * @return Mandat
     */
    public function addTache(TacheMandat $tache)
    {
        $this->taches[] = $tache;
        $tache->setMandat($this);

        return $this;
    }

    /**
     * @param TacheMandat $tache
     */
    public function removeTache(TacheMandat $tache)
    {
        $this->taches->removeElement($tache);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $tache->setMandat(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Mandat
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param MandatMeeting $meeting
     * @return Mandat
     */
    public function addMeeting(MandatMeeting $meeting)
    {
        $this->meetings[] = $meeting;
        $meeting->setMandat($this);

        return $this;
    }

    /**
     * @param MandatMeeting $meeting
     */
    public function removeMeeting(MandatMeeting $meeting)
    {
        $this->meetings->removeElement($meeting);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $meeting->setMandat(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getMeetings()
    {
        return $this->meetings;
    }

    /**
     * Add tache
     *
     * @param \SBC\BienBundle\Entity\TacheMandat $tache
     *
     * @return Mandat
     */
    public function addTach(\SBC\BienBundle\Entity\TacheMandat $tache)
    {
        $this->taches[] = $tache;

        return $this;
    }

    /**
     * Remove tache
     *
     * @param \SBC\BienBundle\Entity\TacheMandat $tache
     */
    public function removeTach(\SBC\BienBundle\Entity\TacheMandat $tache)
    {
        $this->taches->removeElement($tache);
    }

    /**
     * Set mandatParent
     *
     * @param \SBC\BienBundle\Entity\Mandat $mandatParent
     *
     * @return Mandat
     */
    public function setMandatParent(\SBC\BienBundle\Entity\Mandat $mandatParent = null)
    {
        $this->mandatParent = $mandatParent;

        return $this;
    }

    /**
     * Get mandatParent
     *
     * @return \SBC\BienBundle\Entity\Mandat
     */
    public function getMandatParent()
    {
        return $this->mandatParent;
    }

    public function __clone() {
        $this->creationDate = new \DateTime('now');
    }


    /**
     * Set etatMandat
     *
     * @param string $etatMandat
     *
     * @return Mandat
     */
    public function setEtatMandat($etatMandat)
    {
        $this->etatMandat = $etatMandat;

        return $this;
    }

    /**
     * Get etatMandat
     *
     * @return string
     */
    public function getEtatMandat()
    {
        return $this->etatMandat;
    }

    /**
     * @param Offre $offre
     * @return Mandat
     */
    public function addOffre(Offre $offre)
    {
        $this->offres[] = $offre;
        $offre->setMandat($this);

        return $this;
    }

    /**
     * @param Offre $offre
     */
    public function removeOffre(Offre $offre)
    {
        $this->offres->removeElement($offre);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $offre->setMandat(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getOffres()
    {
        return $this->offres;
    }



    /**
     * @param Visite $visite
     * @return Mandat
     */
    public function addVisite(Visite $visite)
    {
        $this->visites[] = $visite;
        $visite->setMandat($this);

        return $this;
    }

    /**
     * @param Visite $visite
     */
    public function removeVisite(Visite $visite)
    {
        $this->visites->removeElement($visite);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $visite->setMandat(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getVisites()
    {
        return $this->visites;
    }



    /**
     * Set typeContrat
     *
     * @param string $typeContrat
     *
     * @return Mandat
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    /**
     * Get typeContrat
     *
     * @return string
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * Set loyeDe
     *
     * @param string $loyeDe
     *
     * @return Mandat
     */
    public function setLoyeDe($loyeDe)
    {
        $this->loyeDe = $loyeDe;

        return $this;
    }

    /**
     * Get loyeDe
     *
     * @return string
     */
    public function getLoyeDe()
    {
        return $this->loyeDe;
    }

    /**
     * Set retenueSource
     *
     * @param string $retenueSource
     *
     * @return Mandat
     */
    public function setRetenueSource($retenueSource)
    {
        $this->retenueSource = $retenueSource;

        return $this;
    }

    /**
     * Get retenueSource
     *
     * @return string
     */
    public function getRetenueSource()
    {
        return $this->retenueSource;
    }

    /**
     * Set payementLe
     *
     * @param string $payementLe
     *
     * @return Mandat
     */
    public function setPayementLe($payementLe)
    {
        $this->payementLe = $payementLe;

        return $this;
    }

    /**
     * Get payementLe
     *
     * @return string
     */
    public function getPayementLe()
    {
        return $this->payementLe;
    }

    /**
     * Set caution
     *
     * @param string $caution
     *
     * @return Mandat
     */
    public function setCaution($caution)
    {
        $this->caution = $caution;

        return $this;
    }

    /**
     * Get caution
     *
     * @return string
     */
    public function getCaution()
    {
        return $this->caution;
    }

    /**
     * Set augmentationTaux
     *
     * @param integer $augmentationTaux
     *
     * @return Mandat
     */
    public function setAugmentationTaux($augmentationTaux)
    {
        $this->augmentationTaux = $augmentationTaux;

        return $this;
    }

    /**
     * Get augmentationTaux
     *
     * @return integer
     */
    public function getAugmentationTaux()
    {
        return $this->augmentationTaux;
    }

    /**
     * Set augmentationPer
     *
     * @param integer $augmentationPer
     *
     * @return Mandat
     */
    public function setAugmentationPer($augmentationPer)
    {
        $this->augmentationPer = $augmentationPer;

        return $this;
    }

    /**
     * Get augmentationPer
     *
     * @return integer
     */
    public function getAugmentationPer()
    {
        return $this->augmentationPer;
    }

    /**
     * Set modalitePaiement
     *
     * @param string $modalitePaiement
     *
     * @return Mandat
     */
    public function setModalitePaiement($modalitePaiement)
    {
        $this->modalitePaiement = $modalitePaiement;

        return $this;
    }

    /**
     * Get modalitePaiement
     *
     * @return string
     */
    public function getModalitePaiement()
    {
        return $this->modalitePaiement;
    }

    /**
     * Set fcloyer
     *
     * @param integer $fcloyer
     *
     * @return Mandat
     */
    public function setFcloyer($fcloyer)
    {
        $this->fcloyer = $fcloyer;

        return $this;
    }

    /**
     * Get fcloyer
     *
     * @return integer
     */
    public function getFcloyer()
    {
        return $this->fcloyer;
    }

    /**
     * Set fcprix
     *
     * @param integer $fcprix
     *
     * @return Mandat
     */
    public function setFcprix($fcprix)
    {
        $this->fcprix = $fcprix;

        return $this;
    }

    /**
     * Get fcprix
     *
     * @return integer
     */
    public function getFcprix()
    {
        return $this->fcprix;
    }

    /**
     * Set fcdateDebut
     *
     * @param \DateTime $fcdateDebut
     *
     * @return Mandat
     */
    public function setFcdateDebut($fcdateDebut)
    {
        $this->fcdateDebut = $fcdateDebut;

        return $this;
    }

    /**
     * Get fcdateDebut
     *
     * @return \DateTime
     */
    public function getFcdateDebut()
    {
        return $this->fcdateDebut;
    }

    /**
     * Set fctitre
     *
     * @param string $fctitre
     *
     * @return Mandat
     */
    public function setFctitre($fctitre)
    {
        $this->fctitre = $fctitre;

        return $this;
    }

    /**
     * Get fctitre
     *
     * @return string
     */
    public function getFctitre()
    {
        return $this->fctitre;
    }

    /**
     * Set fcaugmentation
     *
     * @param integer $fcaugmentation
     *
     * @return Mandat
     */
    public function setFcaugmentation($fcaugmentation)
    {
        $this->fcaugmentation = $fcaugmentation;

        return $this;
    }

    /**
     * Get fcaugmentation
     *
     * @return integer
     */
    public function getFcaugmentation()
    {
        return $this->fcaugmentation;
    }

    /**
     * Set fcaugmentationPer
     *
     * @param string $fcaugmentationPer
     *
     * @return Mandat
     */
    public function setFcaugmentationPer($fcaugmentationPer)
    {
        $this->fcaugmentationPer = $fcaugmentationPer;

        return $this;
    }

    /**
     * Get fcaugmentationPer
     *
     * @return string
     */
    public function getFcaugmentationPer()
    {
        return $this->fcaugmentationPer;
    }

    /**
     * Set fcretenue
     *
     * @param string $fcretenue
     *
     * @return Mandat
     */
    public function setFcretenue($fcretenue)
    {
        $this->fcretenue = $fcretenue;

        return $this;
    }

    /**
     * Get fcretenue
     *
     * @return string
     */
    public function getFcretenue()
    {
        return $this->fcretenue;
    }

    /**
     * Set fcusage
     *
     * @param string $fcusage
     *
     * @return Mandat
     */
    public function setFcusage($fcusage)
    {
        $this->fcusage = $fcusage;

        return $this;
    }

    /**
     * Get fcusage
     *
     * @return string
     */
    public function getFcusage()
    {
        return $this->fcusage;
    }

    /**
     * Set fcgarantie
     *
     * @param integer $fcgarantie
     *
     * @return Mandat
     */
    public function setFcgarantie($fcgarantie)
    {
        $this->fcgarantie = $fcgarantie;

        return $this;
    }

    /**
     * Get fcgarantie
     *
     * @return integer
     */
    public function getFcgarantie()
    {
        return $this->fcgarantie;
    }

    /**
     * Set fcimpot
     *
     * @param string $fcimpot
     *
     * @return Mandat
     */
    public function setFcimpot($fcimpot)
    {
        $this->fcimpot = $fcimpot;

        return $this;
    }

    /**
     * Get fcimpot
     *
     * @return string
     */
    public function getFcimpot()
    {
        return $this->fcimpot;
    }

    /**
     * Set fcavance
     *
     * @param integer $fcavance
     *
     * @return Mandat
     */
    public function setFcavance($fcavance)
    {
        $this->fcavance = $fcavance;

        return $this;
    }

    /**
     * Get fcavance
     *
     * @return integer
     */
    public function getFcavance()
    {
        return $this->fcavance;
    }

    /**
     * Set fcavanceMin
     *
     * @param integer $fcavanceMin
     *
     * @return Mandat
     */
    public function setFcavanceMin($fcavanceMin)
    {
        $this->fcavanceMin = $fcavanceMin;

        return $this;
    }

    /**
     * Get fcavanceMin
     *
     * @return integer
     */
    public function getFcavanceMin()
    {
        return $this->fcavanceMin;
    }

    /**
     * Set fcavanceMax
     *
     * @param integer $fcavanceMax
     *
     * @return Mandat
     */
    public function setFcavanceMax($fcavanceMax)
    {
        $this->fcavanceMax = $fcavanceMax;

        return $this;
    }

    /**
     * Get fcavanceMax
     *
     * @return integer
     */
    public function getFcavanceMax()
    {
        return $this->fcavanceMax;
    }

    /**
     * Set fcconsigne
     *
     * @param string $fcconsigne
     *
     * @return Mandat
     */
    public function setFcconsigne($fcconsigne)
    {
        $this->fcconsigne = $fcconsigne;

        return $this;
    }

    /**
     * Get fcconsigne
     *
     * @return string
     */
    public function getFcconsigne()
    {
        return $this->fcconsigne;
    }

    /**
     * Set fcconsigneDate
     *
     * @param \DateTime $fcconsigneDate
     *
     * @return Mandat
     */
    public function setFcconsigneDate($fcconsigneDate)
    {
        $this->fcconsigneDate = $fcconsigneDate;

        return $this;
    }

    /**
     * Get fcconsigneDate
     *
     * @return \DateTime
     */
    public function getFcconsigneDate()
    {
        return $this->fcconsigneDate;
    }

    /**
     * Set deloyer
     *
     * @param integer $deloyer
     *
     * @return Mandat
     */
    public function setDeloyer($deloyer)
    {
        $this->deloyer = $deloyer;

        return $this;
    }

    /**
     * Get deloyer
     *
     * @return integer
     */
    public function getDeloyer()
    {
        return $this->deloyer;
    }

    /**
     * Set deprix
     *
     * @param integer $deprix
     *
     * @return Mandat
     */
    public function setDeprix($deprix)
    {
        $this->deprix = $deprix;

        return $this;
    }

    /**
     * Get deprix
     *
     * @return integer
     */
    public function getDeprix()
    {
        return $this->deprix;
    }

    /**
     * Set detype
     *
     * @param string $detype
     *
     * @return Mandat
     */
    public function setDetype($detype)
    {
        $this->detype = $detype;

        return $this;
    }

    /**
     * Get detype
     *
     * @return string
     */
    public function getDetype()
    {
        return $this->detype;
    }

    /**
     * Set deusage
     *
     * @param string $deusage
     *
     * @return Mandat
     */
    public function setDeusage($deusage)
    {
        $this->deusage = $deusage;

        return $this;
    }

    /**
     * Get deusage
     *
     * @return string
     */
    public function getDeusage()
    {
        return $this->deusage;
    }

    /**
     * Set deactivite
     *
     * @param string $deactivite
     *
     * @return Mandat
     */
    public function setDeactivite($deactivite)
    {
        $this->deactivite = $deactivite;

        return $this;
    }

    /**
     * Get deactivite
     *
     * @return string
     */
    public function getDeactivite()
    {
        return $this->deactivite;
    }

    /**
     * Set deretenue
     *
     * @param string $deretenue
     *
     * @return Mandat
     */
    public function setDeretenue($deretenue)
    {
        $this->deretenue = $deretenue;

        return $this;
    }

    /**
     * Get deretenue
     *
     * @return string
     */
    public function getDeretenue()
    {
        return $this->deretenue;
    }

    /**
     * Set depaiementDate
     *
     * @param \DateTime $depaiementDate
     *
     * @return Mandat
     */
    public function setDepaiementDate($depaiementDate)
    {
        $this->depaiementDate = $depaiementDate;

        return $this;
    }

    /**
     * Get depaiementDate
     *
     * @return \DateTime
     */
    public function getDepaiementDate()
    {
        return $this->depaiementDate;
    }

    /**
     * Set depaiementPer
     *
     * @param string $depaiementPer
     *
     * @return Mandat
     */
    public function setDepaiementPer($depaiementPer)
    {
        $this->depaiementPer = $depaiementPer;

        return $this;
    }

    /**
     * Get depaiementPer
     *
     * @return string
     */
    public function getDepaiementPer()
    {
        return $this->depaiementPer;
    }

    /**
     * Set decaution
     *
     * @param string $decaution
     *
     * @return Mandat
     */
    public function setDecaution($decaution)
    {
        $this->decaution = $decaution;

        return $this;
    }

    /**
     * Get decaution
     *
     * @return string
     */
    public function getDecaution()
    {
        return $this->decaution;
    }

    /**
     * Set deaugmentation
     *
     * @param integer $deaugmentation
     *
     * @return Mandat
     */
    public function setDeaugmentation($deaugmentation)
    {
        $this->deaugmentation = $deaugmentation;

        return $this;
    }

    /**
     * Get deaugmentation
     *
     * @return integer
     */
    public function getDeaugmentation()
    {
        return $this->deaugmentation;
    }

    /**
     * Set deaugmentationPer
     *
     * @param integer $deaugmentationPer
     *
     * @return Mandat
     */
    public function setDeaugmentationPer($deaugmentationPer)
    {
        $this->deaugmentationPer = $deaugmentationPer;

        return $this;
    }

    /**
     * Get deaugmentationPer
     *
     * @return integer
     */
    public function getDeaugmentationPer()
    {
        return $this->deaugmentationPer;
    }

    /**
     * Set dedisponibilite
     *
     * @param string $dedisponibilite
     *
     * @return Mandat
     */
    public function setDedisponibilite($dedisponibilite)
    {
        $this->dedisponibilite = $dedisponibilite;

        return $this;
    }

    /**
     * Get dedisponibilite
     *
     * @return string
     */
    public function getDedisponibilite()
    {
        return $this->dedisponibilite;
    }

    /**
     * Set dedisponibiliteDate
     *
     * @param \DateTime $dedisponibiliteDate
     *
     * @return Mandat
     */
    public function setDedisponibiliteDate($dedisponibiliteDate)
    {
        $this->dedisponibiliteDate = $dedisponibiliteDate;

        return $this;
    }

    /**
     * Get dedisponibiliteDate
     *
     * @return \DateTime
     */
    public function getDedisponibiliteDate()
    {
        return $this->dedisponibiliteDate;
    }

    /**
     * Set destate
     *
     * @param string $destate
     *
     * @return Mandat
     */
    public function setDestate($destate)
    {
        $this->destate = $destate;

        return $this;
    }

    /**
     * Get destate
     *
     * @return string
     */
    public function getDestate()
    {
        return $this->destate;
    }

    /**
     * Set destateDate
     *
     * @param \DateTime $destateDate
     *
     * @return Mandat
     */
    public function setDestateDate($destateDate)
    {
        $this->destateDate = $destateDate;

        return $this;
    }

    /**
     * Get destateDate
     *
     * @return \DateTime
     */
    public function getDestateDate()
    {
        return $this->destateDate;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Mandat
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
     * Set intervalMinSignatureActe
     *
     * @param string $intervalMinSignatureActe
     *
     * @return Mandat
     */
    public function setIntervalMinSignatureActe($intervalMinSignatureActe)
    {
        $this->intervalMinSignatureActe = $intervalMinSignatureActe;

        return $this;
    }

    /**
     * Get intervalMinSignatureActe
     *
     * @return string
     */
    public function getIntervalMinSignatureActe()
    {
        return $this->intervalMinSignatureActe;
    }

    /**
     * Set intervalMaxSignatureActe
     *
     * @param string $intervalMaxSignatureActe
     *
     * @return Mandat
     */
    public function setIntervalMaxSignatureActe($intervalMaxSignatureActe)
    {
        $this->intervalMaxSignatureActe = $intervalMaxSignatureActe;

        return $this;
    }

    /**
     * Get intervalMaxSignatureActe
     *
     * @return string
     */
    public function getIntervalMaxSignatureActe()
    {
        return $this->intervalMaxSignatureActe;
    }

    /**
     * Set avance
     *
     * @param string $avance
     *
     * @return Mandat
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * Get avance
     *
     * @return string
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * Set consigneDate
     *
     * @param \DateTime $consigneDate
     *
     * @return Mandat
     */
    public function setConsigneDate($consigneDate)
    {
        $this->consigneDate = $consigneDate;

        return $this;
    }

    /**
     * Get consigneDate
     *
     * @return \DateTime
     */
    public function getConsigneDate()
    {
        return $this->consigneDate;
    }

    /**
     * Set hypothequefc
     *
     * @param string $hypothequefc
     *
     * @return Mandat
     */
    public function setHypothequefc($hypothequefc)
    {
        $this->hypothequefc = $hypothequefc;

        return $this;
    }

    /**
     * Get hypothequefc
     *
     * @return string
     */
    public function getHypothequefc()
    {
        return $this->hypothequefc;
    }

    /**
     * Add proposition
     *
     * @param \SBC\BienBundle\Entity\OffreVente $proposition
     *
     * @return Mandat
     */
    public function addProposition(\SBC\BienBundle\Entity\OffreVente $proposition)
    {
        $this->propositions[] = $proposition;
        $proposition->setMandat($this);

        return $this;
    }

    /**
     * Remove proposition
     *
     * @param \SBC\BienBundle\Entity\OffreVente $proposition
     */
    public function removeProposition(\SBC\BienBundle\Entity\OffreVente $proposition)
    {
        $this->propositions->removeElement($proposition);
    }

    /**
     * Get propositions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPropositions()
    {
        return $this->propositions;
    }

    /**
     * Add propositionsLocation
     *
     * @param \SBC\BienBundle\Entity\OffreLocation $propositionsLocation
     *
     * @return Mandat
     */
    public function addPropositionsLocation(\SBC\BienBundle\Entity\OffreLocation $propositionsLocation)
    {
        $this->propositionsLocation[] = $propositionsLocation;

        $propositionsLocation->setMandat($this);
        return $this;
    }

    /**
     * Remove propositionsLocation
     *
     * @param \SBC\BienBundle\Entity\OffreLocation $propositionsLocation
     */
    public function removePropositionsLocation(\SBC\BienBundle\Entity\OffreLocation $propositionsLocation)
    {
        $this->propositionsLocation->removeElement($propositionsLocation);
    }

    /**
     * Get propositionsLocation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPropositionsLocation()
    {
        return $this->propositionsLocation;
    }
}
