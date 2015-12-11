<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-30
 * Time: 8:54
 */

namespace AppBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Insurance",mappedBy="todo",cascade={"persist"})
     * @ORM\JoinColumn(name="insurance_id",referencedColumnName="id")
     */
    protected $insurance;


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
     * @Vich\UploadableField(mapping="todo", fileNameProperty="todoName")
     * 
     * @var File
     */
    protected $todoFile;

    /**
     * @ORM\Column(type="string", length=255,name="todo_name",nullable=true)
     */
    protected $todoName;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;




    public function __construct(){
        $this->createdAt = new \DateTime('now');
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


    public function getInsurance(){
        return $this->insurance;
    }

    public function setInsurance(Insurance $insurance = null){
        $this->insurance = $insurance;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $product
     */
    public function setTodoFile(File $product = null)
    {
        $this->todoFile = $product;

        if ($product) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getTodoFile()
    {
        return $this->todoFile;
    }

    /**
     * @param string $todoName
     */
    public function setTodoName($todoName)
    {
        $this->todoName = $todoName;
    }

    /**
     * @return string
     */
    public function getTodoName()
    {
        return $this->todoName;
    }

}