<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="insurance")
 */
class Insurance {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $insurance_name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $insurance_number;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $type;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $buy_date;

    /**
     * 保费
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $insurance_premium;

    /**
     * 保额
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $sum_insured;

    /**
     * 投保人姓名
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_name;

    protected $ph_name_pinyin;
    protected $ph_id_card;
    protected $ph_id_card_expired_date;
    protected $ph_traffic_permit;
    protected $ph_traffic_permit_expired_date;
    protected $ph_gender;
    protected $ph_marriage;
    protected $ph_is_smoking;
    protected $ph_born_date;
    protected $ph_tel;
    protected 





    /**
     * 受保人姓名
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_name;


    /**
     * 已经缴费年期
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual("0")
     */
    protected $years;

    /**
     * @ORM\Column(type="date")
     */
    protected $born_date;


    /**
     * @ORM\Column(type="date")
     */
    protected $next_pay_date;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $verified = false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="stocks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;



    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getInsuranceName(){
        return $this->insurance_name;
    }

    public function setInsuranceName($insurance_name){
        $this->insurance_name = $insurance_name;
    }

    public function getInsuranceNumber(){
        return $this->insurance_number;
    }

    public function setInsuranceNumber($insurance_number){
        $this->insurance_number = $insurance_number;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getBuyDate(){
        return $this->buy_date;
    }

    public function setBuyDate(\DateTime $date = null){
        $this->buy_date = $date;
        return $this;
    }

    public function getInsurancePremium(){
        return $this->insurance_premium;
    }

    public function setInsurancePremium($insurance_preminum){
        $this->insurance_premium = $insurance_preminum;
    }

    public function getSumInsured(){
        return $this->sum_insured;
    }

    public function setSumInsured($sum_insured){
        $this->sum_insured = $sum_insured;
    }

    public function getPhName(){
        return $this->ph_name;
    }

    public function setPhName($ph_name){
        $this->ph_name = $ph_name;
    }

    public function getRName(){
        return $this->r_name;
    }

    public function setRecognizeeName($r_name){
        $this->r_name = $r_name;
    }


    public function getYears(){
        return $this->years;
    }

    public function setYears($years){
        $this->years = $years;
    }

    public function getBornDate(){
        return $this->born_date;
    }

    public function setBornDate(\DateTime $date = null){
        $this->born_date = $date;
        return $this;
    }


    public function getNextPayDate(){
        return $this->next_pay_date;
    }

    public function setNextPayDate(\DateTime $date = null){
        $this->next_pay_date = $date;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(User $user = null){
        $this->user = $user;
    }

    public function getVerified(){
        return $this->verified;
    }

    public function setVerified($boolean){
        $this->verified = (boolean) $boolean;
        return $this;
    }

    public function __toString(){
        return (string) $this->getUser();
    }

}