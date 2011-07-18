<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\ProfileRepository")
 * @ORM\Table(name="profile")
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="profile")
     */
    protected $images;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="profiles_created", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * Usuario que ha creado el perfil
     */
    protected $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="profiles", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * Usuario al que describe este perfil.
     */
    protected $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="profile")
     * 
     * Votos que ha realizado el usuario
     */
    protected $votes;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;
    
    
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created_at
     *
     * @param date $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add images
     *
     * @param Profiles\ProfilesBundle\Entity\Image $images
     */
    public function addImages(\Profiles\ProfilesBundle\Entity\Image $images)
    {
        $this->images[] = $images;
    }

    /**
     * Get images
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set createdBy
     *
     * @param Profiles\ProfilesBundle\Entity\User $createdBy
     */
    public function setCreatedBy(\Profiles\ProfilesBundle\Entity\User $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Profiles\ProfilesBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set user
     *
     * @param Profiles\ProfilesBundle\Entity\User $user
     */
    public function setUser(\Profiles\ProfilesBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Profiles\ProfilesBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add votes
     *
     * @param Profiles\ProfilesBundle\Entity\Vote $votes
     */
    public function addVotes(\Profiles\ProfilesBundle\Entity\Vote $votes)
    {
        $this->votes[] = $votes;
    }

    /**
     * Get votes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }
}