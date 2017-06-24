<?php

namespace JV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billetterie
 *
 * @ORM\Table(name="billetterie")
 * @ORM\Entity(repositoryClass="JV\CoreBundle\Repository\BilletterieRepository")
 */
class Billetterie
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
     * @ORM\Column(name="dateReservation", type="date")
     */
    private $dateReservation;

    /**
     * @var bool
     *
     * @ORM\Column(name="journee", type="boolean")
     */
    private $journee = true;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketNormal", type="integer")
     */
    private $nbTicketNormal;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketEnfant", type="integer")
     */
    private $nbTicketEnfant;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketSenior", type="integer")
     */
    private $nbTicketSenior;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketReduit", type="integer")
     */
    private $nbTicketReduit;

    /**
     * @var int
     *
     * @ORM\Column(name="tarif", type="integer")
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="codeReservation", type="string", length=255)
     */
    private $codeReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;
	

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
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Billetterie
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set journee
     *
     * @param boolean $journee
     *
     * @return Billetterie
     */
    public function setJournee($journee)
    {
        $this->journee = $journee;

        return $this;
    }

    /**
     * Get journee
     *
     * @return bool
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * Set nbTicketNormal
     *
     * @param integer $nbTicketNormal
     *
     * @return Billetterie
     */
    public function setNbTicketNormal($nbTicketNormal)
    {
        $this->nbTicketNormal = $nbTicketNormal;

        return $this;
    }

    /**
     * Get nbTicketNormal
     *
     * @return int
     */
    public function getNbTicketNormal()
    {
        return $this->nbTicketNormal;
    }

    /**
     * Set nbTicketEnfant
     *
     * @param integer $nbTicketEnfant
     *
     * @return Billetterie
     */
    public function setNbTicketEnfant($nbTicketEnfant)
    {
        $this->nbTicketEnfant = $nbTicketEnfant;

        return $this;
    }

    /**
     * Get nbTicketEnfant
     *
     * @return int
     */
    public function getNbTicketEnfant()
    {
        return $this->nbTicketEnfant;
    }

    /**
     * Set nbTicketSenior
     *
     * @param integer $nbTicketSenior
     *
     * @return Billetterie
     */
    public function setNbTicketSenior($nbTicketSenior)
    {
        $this->nbTicketSenior = $nbTicketSenior;

        return $this;
    }

    /**
     * Get nbTicketSenior
     *
     * @return int
     */
    public function getNbTicketSenior()
    {
        return $this->nbTicketSenior;
    }

    /**
     * Set nbTicketReduit
     *
     * @param integer $nbTicketReduit
     *
     * @return Billetterie
     */
    public function setNbTicketReduit($nbTicketReduit)
    {
        $this->nbTicketReduit = $nbTicketReduit;

        return $this;
    }

    /**
     * Get nbTicketReduit
     *
     * @return int
     */
    public function getNbTicketReduit()
    {
        return $this->nbTicketReduit;
    }

    /**
     * Set tarif
     *
     * @param integer $tarif
     *
     * @return Billetterie
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return int
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set codeReservation
     *
     * @param string $codeReservation
     *
     * @return Billetterie
     */
    public function setCodeReservation($codeReservation)
    {
        $this->codeReservation = $codeReservation;

        return $this;
    }

    /**
     * Get codeReservation
     *
     * @return string
     */
    public function getCodeReservation()
    {
        return $this->codeReservation;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Billetterie
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Billetterie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Billetterie
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Billetterie
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Billetterie
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set demiJournee
     *
     * @param boolean $demiJournee
     *
     * @return Billetterie
     */
    public function setDemiJournee($demiJournee)
    {
        $this->demiJournee = $demiJournee;

        return $this;
    }

    /**
     * Get demiJournee
     *
     * @return boolean
     */
    public function getDemiJournee()
    {
        return $this->demiJournee;
    }
}
