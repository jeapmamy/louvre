<?php

namespace JV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Visiteur
 *
 * @ORM\Table(name="visiteur")
 * @ORM\Entity(repositoryClass="JV\CoreBundle\Repository\VisiteurRepository")
 */
class Visiteur
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
     * @ORM\Column(name="nom", type="string", length=255)
	 * @Assert\NotBlank(message="Le nom est obligatoire")
	 * @Assert\Length(min=2)
	 *
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
	 * @Assert\NotBlank(message="Le prenom est obligatoire")
	 * @Assert\Length(min=2)
	 *
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
	 * @Assert\NotBlank(message="Le pays est obligatoire")
	 * @Assert\Length(min=2)
	 *
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
	 * 
	 *
     */
    private $dateNaissance;
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="JV\CoreBundle\Entity\Billetterie", inversedBy="visiteurs")
	 * @ORM\JoinColumn(nullable=false)
	 *
	 */
	private $billetterie;
	
	/**
     * @var string
     *
     * @ORM\Column(name="ticket", type="string", length=255)
     */
	private $ticket;
	
	/**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
	private $prix;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Visiteur
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
     * @return Visiteur
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
     * @return Visiteur
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
     * @return Visiteur
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
     * Set billetterie
     *
     * @param \JV\CoreBundle\Entity\Billetterie $billetterie
     *
     * @return Visiteur
     */
    public function setBilletterie(\JV\CoreBundle\Entity\Billetterie $billetterie)
    {
        $this->billetterie = $billetterie;

        return $this;
    }

    /**
     * Get billetterie
     *
     * @return \JV\CoreBundle\Entity\Billetterie
     */
    public function getBilletterie()
    {
        return $this->billetterie;
    }

    /**
     * Set ticket
     *
     * @param string $ticket
     *
     * @return Visiteur
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return string
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Visiteur
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
