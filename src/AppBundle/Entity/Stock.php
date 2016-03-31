<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-27
 * Time: 14:33
 */

namespace AppBundle\Entity;

use Doctrine\DBAL\Types\FloatType;
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
     * @ORM\Column(type="string",nullable=true)
     */
    protected $stock_id;

    /**
     * @ORM\Column(type="string")
     */
    protected $stock_name;

    /**
     * 认购日期
     * @ORM\Column(type="date",nullable=true)
     */
    protected $buy_date;

    /**
     * 认购份额
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $position;

    /**
     * 认购金额
     * @ORM\Column(type="float",nullable=true)
     */
    protected $buying_price;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $current_price;

    /**
     * 净值
     * @ORM\Column(type="float",nullable=true)
     */
    protected $value;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $note;

    /**
     * 备注
     * @ORM\Column(type="text",nullable=true)
     */
    protected $remark;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="stocks")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;


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

    public function getClient(){
        return $this->client;
    }

    public function setClient(Client $client = null){
        $this->client = $client;
    }

    public function getValue(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = (float)$value;
    }

    public function getRemark(){
        return $this->remark;
    }

    public function setRemark($remark){
        $this->remark = $remark;
    }


    /**
     * 计算浮动盈亏
     */
    public function calculateProfitAndLoss(){
      $profit_loss = $this->current_price*$this->position*100-$this->buying_price*$this->position*100;
        return $profit_loss;
    }

    public function __toString(){
        return (string) $this->getClient();
    }




}