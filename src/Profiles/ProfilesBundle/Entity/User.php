<?php

namespace Profiles\ProfilesBundle\Entity;

use FOS\UserBundle\Entity\User As BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\UserRepository")
 * @ORM\Table(name="profiles_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     * @ORM\JoinTable(name="profiles_users_groups")
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
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="profiles_friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;
    
    
    public function __construct()
    {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups_created = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profiles_created = new \Doctrine\Common\Collections\ArrayCollection();
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
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
     * Add groups
     *
     * @param Profiles\ProfilesBundle\Entity\Group $groups
     */
    public function addGroups(\Profiles\ProfilesBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;
    }

    /**
     * Get groups
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add groups_created
     *
     * @param Profiles\ProfilesBundle\Entity\Group $groupsCreated
     */
    public function addGroupsCreated(\Profiles\ProfilesBundle\Entity\Group $groupsCreated)
    {
        $this->groups_created[] = $groupsCreated;
    }

    /**
     * Get groups_created
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGroupsCreated()
    {
        return $this->groups_created;
    }

    /**
     * Add profiles_created
     *
     * @param Profiles\ProfilesBundle\Entity\Profile $profilesCreated
     */
    public function addProfilesCreated(\Profiles\ProfilesBundle\Entity\Profile $profilesCreated)
    {
        $this->profiles_created[] = $profilesCreated;
    }

    /**
     * Get profiles_created
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProfilesCreated()
    {
        return $this->profiles_created;
    }

    /**
     * Add profiles
     *
     * @param Profiles\ProfilesBundle\Entity\Profile $profiles
     */
    public function addProfiles(\Profiles\ProfilesBundle\Entity\Profile $profiles)
    {
        $this->profiles[] = $profiles;
    }

    /**
     * Get profiles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProfiles()
    {
        return $this->profiles;
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

    /**
     * Add friendsWithMe
     *
     * @param Profiles\ProfilesBundle\Entity\User $friendsWithMe
     */
    public function addFriendsWithMe(\Profiles\ProfilesBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;
    }

    /**
     * Get friendsWithMe
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriends
     *
     * @param Profiles\ProfilesBundle\Entity\User $myFriends
     */
    public function addMyFriends(\Profiles\ProfilesBundle\Entity\User $myFriends)
    {
        $this->myFriends[] = $myFriends;
    }

    /**
     * Get myFriends
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }
}