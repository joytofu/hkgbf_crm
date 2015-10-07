<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-30
 * Time: 8:54
 */

namespace AppBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * @ORM\Entity
 * @ORM\Table(name="to_do")
 * @Vich\Uploadable
 */
class ToDo
{
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
     * @ORM\Column(type="string")
     */
    protected $category;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;


    /**
     * @ORM\Column(type="boolean")
     */
    protected $status=false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="todos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", mappedBy="alltodos",cascade={"persist"})
     */
    protected $admins;




    public function __construct(){
        $this->createdAt = new \DateTime('now');
        $this->admins = new ArrayCollection();
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

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $date = null){
        $this->createdAt = $date;
        return $this;
    }


    public function getStatus(){
        return $this->status;
    }

    public function setStatus($boolean){
        $this->status = (boolean) $boolean;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(User $user = null){
        $this->user = $user;
    }

    public function getAdmins(){
        return $this->admins;
    }


    public function setAdmins(User $admins){
        $this->admins[] = $admins;
        return $this;
    }





}