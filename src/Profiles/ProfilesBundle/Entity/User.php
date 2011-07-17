<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="100")
     */
    protected $username;
    
    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length="20")
     */
    protected $password;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;
    
    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     * 
     * Grupos a los que el usuario pertenece
     */     
    protected $groups;
    
    /**
     * @ORM\OneToMany(targetEntity="Group", mappedBy="createdBy")
     * 
     * Grupos que ha creado el usuario
     */
    protected $groups_created;
    
    /**
     * @ORM\OneToMany(targetEntity="Profile", mappedBy="createdBy")
     * 
     * Perfiles que ha creado el usuario
     */
    protected $profiles_created;
    
    /**
     * @ORM\OneToMany(targetEntity="Profile", mappedBy="user")
     * 
     * Perfiles que le han asignado al usuario
     */
    protected $profiles;
    
    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="user")
     * 
     * Votos que ha realizado el usuario
     */
    protected $votes;
    
    /**
     * @ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @JoinTable(name="friends",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;
    
    
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups_created = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profiles_created = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}

?>
