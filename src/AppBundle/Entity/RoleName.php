<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-11-9
 * Time: 17:44
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="role_name")
 */
class RoleName
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
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Client",mappedBy="role_name",cascade={"persist"})
     */
    protected $clients;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Client",mappedBy="role_name",cascade={"persist"})
     */
    protected $users;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $for;

    public function __construct(){
        $this->users = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getClients(){
        return $this->clients;
    }

    public function addClient(Client $client){
        $this->clients[] = $client;
        return $this;
    }

    public function removeClient(Client $client){
        $this->clients->removeElement($client);
        return $this;
    }

    public function getUsers(){
        return $this->users;
    }

    public function addUser(User $user){
        $this->users[] = $user;
        return $this;
    }

    public function removeUser(User $user){
        $this->users->removeElement($user);
        return $this;
    }

    public function getFor(){
        return $this->for;
    }

    public function setFor($for){
        $this->for = $for;
    }

}