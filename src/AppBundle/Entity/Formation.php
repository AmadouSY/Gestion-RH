<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation", indexes={@ORM\Index(name="préRequis", columns={"pre_requis"}), @ORM\Index(name="préRequis_2", columns={"pre_requis"}), @ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="cout", type="integer", nullable=false)
     */
    private $cout;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="pre_requis", type="string", length=300, nullable=false)
     */
    private $preRequis;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Salarie", inversedBy="idFormation")
     * @ORM\JoinTable(name="participer_formation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_formation", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_users", referencedColumnName="id")
     *   }
     * )
     */
    private $idUsers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUsers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Formation
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set cout
     *
     * @param integer $cout
     *
     * @return Formation
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return integer
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Formation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Formation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set preRequis
     *
     * @param string $preRequis
     *
     * @return Formation
     */
    public function setPreRequis($preRequis)
    {
        $this->preRequis = $preRequis;

        return $this;
    }

    /**
     * Get preRequis
     *
     * @return string
     */
    public function getPreRequis()
    {
        return $this->preRequis;
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
     * Add idUser
     *
     * @param \AppBundle\Entity\Salarie $idUser
     *
     * @return Formation
     */
    public function addIdUser(\AppBundle\Entity\Salarie $idUser)
    {
        $this->idUsers[] = $idUser;

        return $this;
    }

    /**
     * Remove idUser
     *
     * @param \AppBundle\Entity\Salarie $idUser
     */
    public function removeIdUser(\AppBundle\Entity\Salarie $idUser)
    {
        $this->idUsers->removeElement($idUser);
    }

    /**
     * Get idUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $salarie;


    /**
     * Add salarie
     *
     * @param \AppBundle\Entity\Salarie $salarie
     *
     * @return Formation
     */
    public function addSalarie(\AppBundle\Entity\Salarie $salarie)
    {
        $this->salarie[] = $salarie;

        return $this;
    }

    /**
     * Remove salarie
     *
     * @param \AppBundle\Entity\Salarie $salarie
     */
    public function removeSalarie(\AppBundle\Entity\Salarie $salarie)
    {
        $this->salarie->removeElement($salarie);
    }

    /**
     * Get salarie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSalarie()
    {
        return $this->salarie;
    }
}
