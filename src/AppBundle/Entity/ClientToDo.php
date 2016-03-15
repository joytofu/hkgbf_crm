<?php
/**
 * Created by PhpStorm.
 * User: kcswag
 * Date: 3/12/16
 * Time: 5:24 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="client_todo")
 * @Vich\Uploadable
 */
class ClientToDo
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
     * @Vich\UploadableField(mapping="client_todo", fileNameProperty="clientTodoName")
     *
     * @var File
     */
    protected $clientTodoFile;

    /**
     * @ORM\Column(type="string")
     */
    protected $clientTodoName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client",inversedBy="clientTodos")
     * @ORM\JoinColumn(name="client_id",referencedColumnName="id")
     */
    protected $client;

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

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $if_paid = false;

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

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getClientTodoFile(){
        return $this->clientTodoFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $clientTodo
     */
    public function setClientTodoFile(File $clientTodo = null){
        $this->clientTodoFile = $clientTodo;

        if($clientTodo){
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getClientTodoName(){
        return $this->clientTodoName;
    }

    public function setClientTodoName($clientTodoName){
        $this->clientTodoName = $clientTodoName;
    }

    public function getClient(){
        return $this->client;
    }

    public function setClient(Client $client){
        $this->client = $client;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getIfPaid(){
        return $this->if_paid;
    }

    public function setIfPaid($boolean){
        $this->if_paid = (boolean) $boolean;
        return $this;
    }



}