<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\ImageRepository")
 * @ORM\Table(name="profiles_image")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $path;
    
    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="image", cascade={"remove"})
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile;
    
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
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
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