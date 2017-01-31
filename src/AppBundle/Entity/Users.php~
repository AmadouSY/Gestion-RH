<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="id_salaire", columns={"id_salaire"})})
 * @ORM\Entity
 */
class Users implements AdvancedUserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=40, nullable=false)
     */
    private $pass;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Salarie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salarie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salaire", referencedColumnName="id")
     * })
     */
    private $idSalaire;

    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Users
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
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
     * Set idSalaire
     *
     * @param \AppBundle\Entity\Salarie $idSalaire
     *
     * @return Users
     */
    public function setIdSalaire(\AppBundle\Entity\Salarie $idSalaire = null)
    {
        $this->idSalaire = $idSalaire;

        return $this;
    }

    /**
     * Get idSalaire
     *
     * @return \AppBundle\Entity\Salarie
     */
    public function getIdSalaire()
    {
        return $this->idSalaire;
    }

        public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->pass,
            $this->isActive
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->pass,
            $this->isActive
        ) = unserialize($serialized);
    }

     public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }


    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Users
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idFormation;


    /**
     * Add idFormation
     *
     * @param \AppBundle\Entity\Formation $idFormation
     *
     * @return Users
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
}
