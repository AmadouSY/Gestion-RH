<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salarie
 *
 * @ORM\Table(name="salarie")
 * @ORM\Entity
 */
class Salarie
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=15, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=false)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1, nullable=false)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEntre", type="date", nullable=false)
     */
    private $dateentre;

    /**
     * @var string
     *
     * @ORM\Column(name="typeContrat", type="string", length=3, nullable=false)
     */
    private $typecontrat;

    /**
     * @var integer
     *
     * @ORM\Column(name="DureeContrat", type="integer", nullable=false)
     */
    private $dureecontrat;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaire", type="integer", nullable=false)
     */
    private $salaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="superieurHierarchique", type="integer", nullable=false)
     */
    private $superieurhierarchique;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Salarie
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
     * @return Salarie
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
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     *
     * @return Salarie
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Salarie
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
     * Set dateentre
     *
     * @param \DateTime $dateentre
     *
     * @return Salarie
     */
    public function setDateentre($dateentre)
    {
        $this->dateentre = $dateentre;

        return $this;
    }

    /**
     * Get dateentre
     *
     * @return \DateTime
     */
    public function getDateentre()
    {
        return $this->dateentre;
    }

    /**
     * Set typecontrat
     *
     * @param string $typecontrat
     *
     * @return Salarie
     */
    public function setTypecontrat($typecontrat)
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }

    /**
     * Get typecontrat
     *
     * @return string
     */
    public function getTypecontrat()
    {
        return $this->typecontrat;
    }

    /**
     * Set dureecontrat
     *
     * @param integer $dureecontrat
     *
     * @return Salarie
     */
    public function setDureecontrat($dureecontrat)
    {
        $this->dureecontrat = $dureecontrat;

        return $this;
    }

    /**
     * Get dureecontrat
     *
     * @return integer
     */
    public function getDureecontrat()
    {
        return $this->dureecontrat;
    }

    /**
     * Set salaire
     *
     * @param integer $salaire
     *
     * @return Salarie
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return integer
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set superieurhierarchique
     *
     * @param integer $superieurhierarchique
     *
     * @return Salarie
     */
    public function setSuperieurhierarchique($superieurhierarchique)
    {
        $this->superieurhierarchique = $superieurhierarchique;

        return $this;
    }

    /**
     * Get superieurhierarchique
     *
     * @return integer
     */
    public function getSuperieurhierarchique()
    {
        return $this->superieurhierarchique;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idFormation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idFormation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idFormation
     *
     * @param \AppBundle\Entity\Formation $idFormation
     *
     * @return Salarie
     */
    public function addIdFormation(\AppBundle\Entity\Formation $idFormation)
    {
        $this->idFormation[] = $idFormation;

        return $this;
    }

    /**
     * Remove idFormation
     *
     * @param \AppBundle\Entity\Formation $idFormation
     */
    public function removeIdFormation(\AppBundle\Entity\Formation $idFormation)
    {
        $this->idFormation->removeElement($idFormation);
    }

    /**
     * Get idFormation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formation;


    /**
     * Add formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Salarie
     */
    public function addFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \AppBundle\Entity\Formation $formation
     */
    public function removeFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
