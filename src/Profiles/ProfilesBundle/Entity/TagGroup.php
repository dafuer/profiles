<?php

namespace Profiles\ProfilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Profiles\ProfilesBundle\Repository\TagRepository")
 * @ORM\Table(name="taggroup")
 * 
 */
class TagGroup
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
    protected $tag;
    
    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="tags", cascade={"remove"})
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $group;

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
     * Set tag
     *
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set group
     *
     * @param Profiles\ProfilesBundle\Entity\Group $group
     */
    public function setGroup(\Profiles\ProfilesBundle\Entity\Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get group
     *
     * @return Profiles\ProfilesBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}