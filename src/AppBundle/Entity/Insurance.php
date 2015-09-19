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
     * @ORM\Column(type="string")
     */
    protected $insurance_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\Column(type="date")
     */
    protected $buy_date;

    /**
     * 保费
     * @ORM\Column(type="integer")
     */
    protected $insurance_premium;

    /**
     * 保额
     * @ORM\Column(type="integer")
     */
    protected $sum_insured;

    /**
     * 投保人
     * @ORM\Column(type="string")
     */
    protected $policy_holder;

    /**
     * 受保人
     * @ORM\Column(type="string")
     */
    protected $recognizee;

    /**
     * 投保年龄
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual("18")
     */
    protected $age_at_issue;

    /**
     * 投保年限
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual("10")
     */
    protected $years;

    /**
     * @ORM\Column(type="date")
     */
    protected $born_date;

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices={"男","女"})
     */
    protected $gender;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_smoking;

    /**
     * @ORM\Column(type="date")
     */
    protected $next_pay_date;

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

    public function getPolicyHolder(){
        return $this->policy_holder;
    }

    public function setPolicyHolder($policy_holder){
        $this->policy_holder = $policy_holder;
    }

    public function getRecognizee(){
        return $this->recognizee;
    }

    public function setRecognizee($recognizee){
        $this->recognizee = $recognizee;
    }

    public function getAgeAtIssue(){
        return $this->age_at_issue;
    }

    public function setAgeAtIssue($age_at_issue){
        $this->age_at_issue = $age_at_issue;
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

    public function getGender(){
        return $this->gender;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }

    public function IsSmoking(){
        if($this->is_smoking==true){
            return true;
        }else{
            return false;
        }
    }

    public function setIsSmoking($is_smoking = false){
        $this->is_smoking = $is_smoking;
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

    public function __toString(){
        return (string) $this->getUser();
    }

}