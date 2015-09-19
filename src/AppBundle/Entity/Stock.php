<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-27
 * Time: 14:33
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="stock")
 */
class Stock
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
    protected $stock_id;

    /**
     * @ORM\Column(type="string")
     */
    protected $stock_name;

    /**
     * @ORM\Column(type="date")
     */
    protected $buy_date;

    /**
     * 手数
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @ORM\Column(type="float")
     */
    protected $buying_price;

    /**
     * @ORM\Column(type="float")
     */
    protected $current_price;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $note;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="stocks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


    public function getId(){
        return $this->id;
    }

    public function getStockId(){
        return $this->stock_id;
    }

    public function setStockId($stock_id){
        $this->stock_id = $stock_id;
    }

    public function getStockName(){
        return $this->stock_name;
    }

    public function setStockName($stock_name){
        $this->stock_name = $stock_name;
    }

    public function getBuyDate(){
        return $this->buy_date;
    }

    public function setBuyDate(\DateTime $date = null){
        $this->buy_date = $date;
        return $this;

    }

    public function getPosition(){
        return $this->position;
    }

    public function setPosition($position){
        $this->position = $position;
    }

    public function getNote(){
        return $this->note;
    }

    public function setNote($note){
        $this->note = $note;
    }

    public function getBuyingPrice(){
        return $this->buying_price;
    }

    public function setBuyingPrice($buying_price){
        $this->buying_price = $buying_price;
    }

    public function getCurrentPrice(){
        return $this->current_price;
    }

    public function setCurrentPrice($current_price){
        $this->current_price = $current_price;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(User $user = null){
        $this->user = $user;
    }


    /**
     * 计算浮动盈亏
     */
    public function calculateProfitAndLoss(){
      $profit_loss = $this->current_price*$this->position*100-$this->buying_price*$this->position*100;
        return $profit_loss;
    }

    public function __toString(){
        return (string) $this->getUser();
    }




}