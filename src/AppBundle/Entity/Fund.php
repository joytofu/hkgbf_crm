<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity
 * @ORM\Table(name="global_fund")
 * @Vich\Uploadable
 */
class Fund {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $insurance_company;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $insurance_name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $insurance_number;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $buy_date;

    /**
     * 投保人
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_name;

    /**
     * 被保人
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $currency;

    /**
     * 保费
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $insurance_premium;

    /**
     * 已经缴费年期
     * @ORM\Column(type="integer",nullable=true)
     * @Assert\GreaterThanOrEqual("0")
     */
    protected $paid_years;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $next_pay_date;

    /**
     * @Vich\UploadableField(mapping="fund_client_data", fileNameProperty="clientDataName")
     */
    protected $clientDataFile;

    /**
     * @ORM\Column(type="string", length=255,name="client_data_name",nullable=true)
     */
    protected $clientDataName;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $payment_method;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $automatic_payment = false;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected $remark;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="global_funds",cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;

    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set insurance_company
     *
     * @param string $insuranceCompany
     * @return Fund
     */
    public function setInsuranceCompany($insuranceCompany)
    {
        $this->insurance_company = $insuranceCompany;
    
        return $this;
    }

    /**
     * Get insurance_company
     *
     * @return string 
     */
    public function getInsuranceCompany()
    {
        return $this->insurance_company;
    }

    /**
     * Set insurance_name
     *
     * @param string $insuranceName
     * @return Fund
     */
    public function setInsuranceName($insuranceName)
    {
        $this->insurance_name = $insuranceName;
    
        return $this;
    }

    /**
     * Get insurance_name
     *
     * @return string 
     */
    public function getInsuranceName()
    {
        return $this->insurance_name;
    }

    /**
     * Set insurance_number
     *
     * @param string $insuranceNumber
     * @return Fund
     */
    public function setInsuranceNumber($insuranceNumber)
    {
        $this->insurance_number = $insuranceNumber;
    
        return $this;
    }

    /**
     * Get insurance_number
     *
     * @return string 
     */
    public function getInsuranceNumber()
    {
        return $this->insurance_number;
    }

    /**
     * Set buy_date
     *
     * @param \DateTime $buyDate
     * @return Fund
     */
    public function setBuyDate($buyDate)
    {
        $this->buy_date = $buyDate;
    
        return $this;
    }

    /**
     * Get buy_date
     *
     * @return \DateTime 
     */
    public function getBuyDate()
    {
        return $this->buy_date;
    }

    /**
     * Set ph_name
     *
     * @param string $phName
     * @return Fund
     */
    public function setPhName($phName)
    {
        $this->ph_name = $phName;
    
        return $this;
    }

    /**
     * Get ph_name
     *
     * @return string 
     */
    public function getPhName()
    {
        return $this->ph_name;
    }

    /**
     * Set r_name
     *
     * @param string $rName
     * @return Fund
     */
    public function setRName($rName)
    {
        $this->r_name = $rName;
    
        return $this;
    }

    /**
     * Get r_name
     *
     * @return string 
     */
    public function getRName()
    {
        return $this->r_name;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Fund
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set insurance_premium
     *
     * @param integer $insurancePremium
     * @return Fund
     */
    public function setInsurancePremium($insurancePremium)
    {
        $this->insurance_premium = $insurancePremium;
    
        return $this;
    }

    /**
     * Get insurance_premium
     *
     * @return integer 
     */
    public function getInsurancePremium()
    {
        return $this->insurance_premium;
    }

    /**
     * Set paid_years
     *
     * @param integer $paidYears
     * @return Fund
     */
    public function setPaidYears($paidYears)
    {
        $this->paid_years = $paidYears;
    
        return $this;
    }

    /**
     * Get paid_years
     *
     * @return integer 
     */
    public function getPaidYears()
    {
        return $this->paid_years;
    }

    /**
     * Set next_pay_date
     *
     * @param \DateTime $nextPayDate
     * @return Fund
     */
    public function setNextPayDate($nextPayDate)
    {
        $this->next_pay_date = $nextPayDate;
    
        return $this;
    }

    /**
     * Get next_pay_date
     *
     * @return \DateTime 
     */
    public function getNextPayDate()
    {
        return $this->next_pay_date;
    }

    /**
     * Set clientDataName
     *
     * @param string $clientDataName
     * @return Fund
     */
    public function setClientDataName($clientDataName)
    {
        $this->clientDataName = $clientDataName;
    
        return $this;
    }

    /**
     * Get clientDataName
     *
     * @return string 
     */
    public function getClientDataName()
    {
        return $this->clientDataName;
    }

    /**
     * Set payment_method
     *
     * @param string $paymentMethod
     * @return Fund
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;
    
        return $this;
    }

    /**
     * Get payment_method
     *
     * @return string 
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Set automatic_payment
     *
     * @param boolean $automaticPayment
     * @return Fund
     */
    public function setAutomaticPayment($automaticPayment)
    {
        $this->automatic_payment = $automaticPayment;
    
        return $this;
    }

    /**
     * Get automatic_payment
     *
     * @return boolean 
     */
    public function getAutomaticPayment()
    {
        return $this->automatic_payment;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Fund
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    
        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    public function setClientDataFile(File $clientData = null)
    {
        $this->clientDataFile = $clientData;

        if ($clientData) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }


    public function getClientDataFile()
    {
        return $this->clientDataFile;
    }

    public function getClient(){
        return $this->client;
    }

    public function setClient(Client $client = null){
        $this->client = $client;
    }


}
