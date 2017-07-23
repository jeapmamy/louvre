<?php

namespace JV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
	 * @Assert\NotBlank(message="Vous devez sélectionner une date !")
	 * @Assert\Date()
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
	 *
	 * @Assert\Range(min=0, max=100)
     */
    private $nbTicketNormal;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketEnfant", type="integer")
	 *
	 * @Assert\Range(min=0, max=100)
     */
    private $nbTicketEnfant;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketSenior", type="integer")
	 *
	 * @Assert\Range(min=0, max=100)
     */
    private $nbTicketSenior;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTicketReduit", type="integer")
	 *
	 * @Assert\Range(min=0, max=100)
     */
    private $nbTicketReduit;
	
	/**
     * @var int
     *
     * @ORM\Column(name="nbTickets", type="integer")
     */
	private $nbTickets;
	
	/**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
	private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
	 * @Assert\Email(
     *     message = "L'adresse email n'est pas valide.",
     *     checkMX = true
     * )
     */
    private $email;
	
	/**
     * @var string
     *
     * @ORM\Column(name="codeReservation", type="string", length=255)
	 */
	private $codeReservation;
	
	/**
     *
     * @ORM\OneToMany(targetEntity="JV\CoreBundle\Entity\Visiteur", mappedBy="billetterie", cascade={"persist","remove"})
	 *
	 * @Assert\Valid()
	 * 
	 *
     */
	private $visiteurs;
	
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visiteurs = new \Doctrine\Common\Collections\ArrayCollection();
		$this->codeReservation = $this->creationCodeReservation();
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
     * Add visiteur
     *
     * @param \JV\CoreBundle\Entity\Visiteur $visiteur
     *
     * @return Billetterie
     */
    public function addVisiteur(\JV\CoreBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteurs[] = $visiteur;
		
		// On lie la billetterie au visiteur
		$visiteur->setBilletterie($this);

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \JV\CoreBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\JV\CoreBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteurs->removeElement($visiteur);
    }

    /**
     * Get visiteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisiteurs()
    {
        return $this->visiteurs;
    }

    /**
     * Set nbTickets
     *
     * @param integer $nbTickets
     *
     * @return Billetterie
     */
    public function setNbTickets($nbTickets)
    {
        $this->nbTickets = $nbTickets;

        return $this;
    }

    /**
     * Get nbTickets
     *
     * @return integer
     */
    public function getNbTickets()
    {
        return $this->nbTickets;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Billetterie
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
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
     * * @return string
     *
     */
    public function creationCodeReservation()
    {
		$codeReservation = "";
		$chaine = "abcdefghijklmnopqrstuvwxyz123456789AZERTYUIOPQSDFGHJKLMWXCVBN123456789";
		for ($i = 0; $i < 10; $i++) {
			$codeReservation .= $chaine[rand() % strlen($chaine)];
		}
		
		return $codeReservation;
    }
	
}
