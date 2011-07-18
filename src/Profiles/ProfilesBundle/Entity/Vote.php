<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\TagRepository")
 * @ORM\Table(name="vote")
 */
class Vote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="votes", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * Usuario que vota
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="votes", cascade={"remove"})
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     * 
     * Perfil que es votado
     */
    protected $profile;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $points;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

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
     * Set points
     *
     * @param integer $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
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
     * Set profile
     *
     * @param Profiles\ProfilesBundle\Entity\Profile $profile
     */
    public function setProfile(\Profiles\ProfilesBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get profile
     *
     * @return Profiles\ProfilesBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }
}