<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-8
 * Time: 17:24
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * @ORM\Entity
 * @ORM\Table(name="notice")
 */
class Notice {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User",cascade={"persist"})
     */
    protected $users;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    public function __construct(){
        $this->createdAt = new \DateTime('now');
        $this->users = new ArrayCollection();
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $date = null){
        $this->createdAt = $date;
        return $this;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getUsers(){
        return $this->users;
    }

    public function addUser(User $user){
        $user->addNotice($this);
        $this->users->add($user);
    }

    public function removeUser(User $user){
        $user->removeNotice($this);
        $this->users->removeElement($user);
    }

}