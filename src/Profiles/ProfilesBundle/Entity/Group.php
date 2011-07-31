<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\GroupRepository")
 * @ORM\Table(name="profiles_groups")
 */
class Group
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
    protected $name;
        
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $privacity;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="groups_created", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * Usuario que ha creado el grupo
     */
    protected $createdBy;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     * 
     * Usuarios que pertenecen al grupo
     */
    protected $users;
    
    /**
     * @ORM\OneToMany(targetEntity="TagGroup", mappedBy="group")
     */
    protected $tags;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;
    
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Set privacity
     *
     * @param boolean $privacity
     */
    public function setPrivacity($privacity)
    {
        $this->privacity = $privacity;
    }

    /**
     * Get privacity
     *
     * @return boolean 
     */
    public function getPrivacity()
    {
        return $this->privacity;
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
     * Add users
     *
     * @param Profiles\ProfilesBundle\Entity\User $users
     */
    public function addUsers(\Profiles\ProfilesBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add tags
     *
     * @param Profiles\ProfilesBundle\Entity\TagGroup $tags
     */
    public function addTags(\Profiles\ProfilesBundle\Entity\TagGroup $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}