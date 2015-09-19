<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-26
 * Time: 11:30
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="area")
 */
class Area {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pid;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    public function getId(){
        return $this->id;
    }

    public function getPid(){
        return $this->pid;
    }

    public function getName(){
        return $this->name;
    }

}