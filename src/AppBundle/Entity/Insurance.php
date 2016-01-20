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
 * @ORM\Table(name="insurance")
 * @Vich\Uploadable
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
    protected $insurance_company;

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

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_name_pinyin;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_id_card;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $ph_id_card_expired_date;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_traffic_permit;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $ph_traffic_permit_expired_date;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_address;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_id_address;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_tel;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_email;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_gender;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_marriage;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $ph_is_smoking;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $ph_born_date;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $ph_height;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $ph_weight;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_employer;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_position;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_profession;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_company_address;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $ph_company_tel;


    /**
     * 受保人姓名
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_name_pinyin;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_id_card;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $r_id_card_expired_date;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_traffic_permit;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $r_traffic_permit_expired_date;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_gender;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_marriage;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $r_is_smoking;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $r_born_date;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_tel;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_email;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_address;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_id_address;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $r_height;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $r_weight;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $relationship_with_ph;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_employer;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_position;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_profession;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_company_address;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $r_company_tel;



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
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $verified = false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="insurances",cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ToDo",inversedBy="insurance",cascade={"persist"})
     */
    protected $todo;

    /**
     * @Vich\UploadableField(mapping="upload_product", fileNameProperty="productName")
     */
    protected $productFile;

    /**
     * @ORM\Column(type="string", length=255,name="product_name",nullable=true)
     */
    protected $productName;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;


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

    public function getInsuranceCompany(){
        return $this->insurance_company;
    }

    public function setInsuranceCompany($insurance_company){
        $this->insurance_company = $insurance_company;
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


    public function getPaidYears(){
        return $this->paid_years;
    }

    public function setPaidYears($paid_years){
        $this->paid_years = $paid_years;
    }

    public function getRBornDate(){
        return $this->r_born_date;
    }

    public function setRBornDate(\DateTime $date = null){
        $this->r_born_date = $date;
        return $this;
    }


    public function getNextPayDate(){
        return $this->next_pay_date;
    }

    public function setNextPayDate(\DateTime $date = null){
        $this->next_pay_date = $date;
        return $this;
    }


    public function getVerified(){
        return $this->verified;
    }

    public function setVerified($boolean){
        $this->verified = (boolean) $boolean;
        return $this;
    }

    public function getClient(){
        return $this->client;
    }

    public function setClient(Client $client = null){
        $this->client = $client;
    }



    /**
     * Set ph_name_pinyin
     *
     * @param string $phNamePinyin
     * @return Insurance
     */
    public function setPhNamePinyin($phNamePinyin)
    {
        $this->ph_name_pinyin = $phNamePinyin;
    
        return $this;
    }

    /**
     * Get ph_name_pinyin
     *
     * @return string 
     */
    public function getPhNamePinyin()
    {
        return $this->ph_name_pinyin;
    }

    /**
     * Set ph_id_card
     *
     * @param integer $phIdCard
     * @return Insurance
     */
    public function setPhIdCard($phIdCard)
    {
        $this->ph_id_card = $phIdCard;
    
        return $this;
    }

    /**
     * Get ph_id_card
     *
     * @return integer 
     */
    public function getPhIdCard()
    {
        return $this->ph_id_card;
    }

    /**
     * Set ph_id_card_expired_date
     *
     * @param \DateTime $phIdCardExpiredDate
     * @return Insurance
     */
    public function setPhIdCardExpiredDate($phIdCardExpiredDate)
    {
        $this->ph_id_card_expired_date = $phIdCardExpiredDate;
    
        return $this;
    }

    /**
     * Get ph_id_card_expired_date
     *
     * @return \DateTime 
     */
    public function getPhIdCardExpiredDate()
    {
        return $this->ph_id_card_expired_date;
    }

    /**
     * Set ph_traffic_permit
     *
     * @param integer $phTrafficPermit
     * @return Insurance
     */
    public function setPhTrafficPermit($phTrafficPermit)
    {
        $this->ph_traffic_permit = $phTrafficPermit;
    
        return $this;
    }

    /**
     * Get ph_traffic_permit
     *
     * @return integer 
     */
    public function getPhTrafficPermit()
    {
        return $this->ph_traffic_permit;
    }

    /**
     * Set ph_traffic_permit_expired_date
     *
     * @param \DateTime $phTrafficPermitExpiredDate
     * @return Insurance
     */
    public function setPhTrafficPermitExpiredDate($phTrafficPermitExpiredDate)
    {
        $this->ph_traffic_permit_expired_date = $phTrafficPermitExpiredDate;
    
        return $this;
    }

    /**
     * Get ph_traffic_permit_expired_date
     *
     * @return \DateTime 
     */
    public function getPhTrafficPermitExpiredDate()
    {
        return $this->ph_traffic_permit_expired_date;
    }

    public function setPhAddress($ph_address)
    {
        $this->ph_address = $ph_address;

    }

    /**
     * Get r_address
     *
     * @return string
     */
    public function getPhAddress()
    {
        return $this->ph_address;
    }

    /**
     * Set ph_id_address
     *
     * @param string $phIdAddress
     * @return Insurance
     */
    public function setPhIdAddress($phIdAddress)
    {
        $this->ph_id_address = $phIdAddress;
    
        return $this;
    }

    /**
     * Get ph_id_address
     *
     * @return string 
     */
    public function getPhIdAddress()
    {
        return $this->ph_id_address;
    }

    /**
     * Set ph_tel
     *
     * @param integer $phTel
     * @return Insurance
     */
    public function setPhTel($phTel)
    {
        $this->ph_tel = $phTel;
    
        return $this;
    }

    /**
     * Get ph_tel
     *
     * @return integer 
     */
    public function getPhTel()
    {
        return $this->ph_tel;
    }

    /**
     * Set ph_email
     *
     * @param string $phEmail
     * @return Insurance
     */
    public function setPhEmail($phEmail)
    {
        $this->ph_email = $phEmail;
    
        return $this;
    }

    /**
     * Get ph_email
     *
     * @return string 
     */
    public function getPhEmail()
    {
        return $this->ph_email;
    }

    /**
     * Set ph_gender
     *
     * @param string $phGender
     * @return Insurance
     */
    public function setPhGender($phGender)
    {
        $this->ph_gender = $phGender;
    
        return $this;
    }

    /**
     * Get ph_gender
     *
     * @return string 
     */
    public function getPhGender()
    {
        return $this->ph_gender;
    }

    /**
     * Set ph_marriage
     *
     * @param string $phMarriage
     * @return Insurance
     */
    public function setPhMarriage($phMarriage)
    {
        $this->ph_marriage = $phMarriage;
    
        return $this;
    }

    /**
     * Get ph_marriage
     *
     * @return string 
     */
    public function getPhMarriage()
    {
        return $this->ph_marriage;
    }

    /**
     * Set ph_is_smoking
     *
     * @param boolean $phIsSmoking
     * @return Insurance
     */
    public function setPhIsSmoking($phIsSmoking)
    {
        $this->ph_is_smoking = $phIsSmoking;
    
        return $this;
    }

    /**
     * Get ph_is_smoking
     *
     * @return boolean 
     */
    public function getPhIsSmoking()
    {
        return $this->ph_is_smoking;
    }

    /**
     * Set ph_born_date
     *
     * @param \DateTime $phBornDate
     * @return Insurance
     */
    public function setPhBornDate($phBornDate)
    {
        $this->ph_born_date = $phBornDate;
    
        return $this;
    }

    /**
     * Get ph_born_date
     *
     * @return \DateTime 
     */
    public function getPhBornDate()
    {
        return $this->ph_born_date;
    }

    /**
     * Set ph_height
     *
     * @param float $phHeight
     * @return Insurance
     */
    public function setPhHeight($phHeight)
    {
        $this->ph_height = $phHeight;
    
        return $this;
    }

    /**
     * Get ph_height
     *
     * @return float 
     */
    public function getPhHeight()
    {
        return $this->ph_height;
    }

    /**
     * Set ph_weight
     *
     * @param float $phWeight
     * @return Insurance
     */
    public function setPhWeight($phWeight)
    {
        $this->ph_weight = $phWeight;
    
        return $this;
    }

    /**
     * Get ph_weight
     *
     * @return float 
     */
    public function getPhWeight()
    {
        return $this->ph_weight;
    }

    /**
     * Set ph_employer
     *
     * @param string $phEmployer
     * @return Insurance
     */
    public function setPhEmployer($phEmployer)
    {
        $this->ph_employer = $phEmployer;
    
        return $this;
    }

    /**
     * Get ph_employer
     *
     * @return string 
     */
    public function getPhEmployer()
    {
        return $this->ph_employer;
    }

    /**
     * Set ph_position
     *
     * @param string $phPosition
     * @return Insurance
     */
    public function setPhPosition($phPosition)
    {
        $this->ph_position = $phPosition;
    
        return $this;
    }

    /**
     * Get ph_position
     *
     * @return string 
     */
    public function getPhPosition()
    {
        return $this->ph_position;
    }

    /**
     * Set ph_profession
     *
     * @param string $phProfession
     * @return Insurance
     */
    public function setPhProfession($phProfession)
    {
        $this->ph_profession = $phProfession;
    
        return $this;
    }

    /**
     * Get ph_profession
     *
     * @return string 
     */
    public function getPhProfession()
    {
        return $this->ph_profession;
    }

    /**
     * Set ph_company_address
     *
     * @param string $phCompanyAddress
     * @return Insurance
     */
    public function setPhCompanyAddress($phCompanyAddress)
    {
        $this->ph_company_address = $phCompanyAddress;
    
        return $this;
    }

    /**
     * Get ph_company_address
     *
     * @return string 
     */
    public function getPhCompanyAddress()
    {
        return $this->ph_company_address;
    }

    /**
     * Set ph_company_tel
     *
     * @param integer $phCompanyTel
     * @return Insurance
     */
    public function setPhCompanyTel($phCompanyTel)
    {
        $this->ph_company_tel = $phCompanyTel;
    
        return $this;
    }

    /**
     * Get ph_company_tel
     *
     * @return integer 
     */
    public function getPhCompanyTel()
    {
        return $this->ph_company_tel;
    }

    /**
     * Set r_name
     *
     * @param string $rName
     * @return Insurance
     */
    public function setRName($rName)
    {
        $this->r_name = $rName;
    
        return $this;
    }

    /**
     * Set r_name_pinyin
     *
     * @param string $rNamePinyin
     * @return Insurance
     */
    public function setRNamePinyin($rNamePinyin)
    {
        $this->r_name_pinyin = $rNamePinyin;
    
        return $this;
    }

    /**
     * Get r_name_pinyin
     *
     * @return string 
     */
    public function getRNamePinyin()
    {
        return $this->r_name_pinyin;
    }

    /**
     * Set r_id_card
     *
     * @param integer $rIdCard
     * @return Insurance
     */
    public function setRIdCard($rIdCard)
    {
        $this->r_id_card = $rIdCard;
    
        return $this;
    }

    /**
     * Get r_id_card
     *
     * @return integer 
     */
    public function getRIdCard()
    {
        return $this->r_id_card;
    }

    /**
     * Set r_id_card_expired_date
     *
     * @param \DateTime $rIdCardExpiredDate
     * @return Insurance
     */
    public function setRIdCardExpiredDate($rIdCardExpiredDate)
    {
        $this->r_id_card_expired_date = $rIdCardExpiredDate;
    
        return $this;
    }

    /**
     * Get r_id_card_expired_date
     *
     * @return \DateTime 
     */
    public function getRIdCardExpiredDate()
    {
        return $this->r_id_card_expired_date;
    }

    /**
     * Set r_traffic_permit
     *
     * @param integer $rTrafficPermit
     * @return Insurance
     */
    public function setRTrafficPermit($rTrafficPermit)
    {
        $this->r_traffic_permit = $rTrafficPermit;
    
        return $this;
    }

    /**
     * Get r_traffic_permit
     *
     * @return integer 
     */
    public function getRTrafficPermit()
    {
        return $this->r_traffic_permit;
    }

    /**
     * Set r_traffic_permit_expired_date
     *
     * @param \DateTime $rTrafficPermitExpiredDate
     * @return Insurance
     */
    public function setRTrafficPermitExpiredDate($rTrafficPermitExpiredDate)
    {
        $this->r_traffic_permit_expired_date = $rTrafficPermitExpiredDate;
    
        return $this;
    }

    /**
     * Get r_traffic_permit_expired_date
     *
     * @return \DateTime 
     */
    public function getRTrafficPermitExpiredDate()
    {
        return $this->r_traffic_permit_expired_date;
    }

    /**
     * Set r_gender
     *
     * @param string $rGender
     * @return Insurance
     */
    public function setRGender($rGender)
    {
        $this->r_gender = $rGender;
    
        return $this;
    }

    /**
     * Get r_gender
     *
     * @return string 
     */
    public function getRGender()
    {
        return $this->r_gender;
    }

    /**
     * Set r_marriage
     *
     * @param string $rMarriage
     * @return Insurance
     */
    public function setRMarriage($rMarriage)
    {
        $this->r_marriage = $rMarriage;
    
        return $this;
    }

    /**
     * Get r_marriage
     *
     * @return string 
     */
    public function getRMarriage()
    {
        return $this->r_marriage;
    }

    /**
     * Set r_is_smoking
     *
     * @param boolean $rIsSmoking
     * @return Insurance
     */
    public function setRIsSmoking($rIsSmoking)
    {
        $this->r_is_smoking = $rIsSmoking;
    
        return $this;
    }

    /**
     * Get r_is_smoking
     *
     * @return boolean 
     */
    public function getRIsSmoking()
    {
        return $this->r_is_smoking;
    }

    /**
     * Set r_tel
     *
     * @param integer $rTel
     * @return Insurance
     */
    public function setRTel($rTel)
    {
        $this->r_tel = $rTel;
    
        return $this;
    }

    /**
     * Get r_tel
     *
     * @return integer 
     */
    public function getRTel()
    {
        return $this->r_tel;
    }

    /**
     * Set r_email
     *
     * @param string $rEmail
     * @return Insurance
     */
    public function setREmail($rEmail)
    {
        $this->r_email = $rEmail;
    
        return $this;
    }

    /**
     * Get r_email
     *
     * @return string 
     */
    public function getREmail()
    {
        return $this->r_email;
    }

    /**
     * Set r_address
     *
     * @param string $rAddress
     * @return Insurance
     */
    public function setRAddress($rAddress)
    {
        $this->r_address = $rAddress;
    
        return $this;
    }

    /**
     * Get r_address
     *
     * @return string 
     */
    public function getRAddress()
    {
        return $this->r_address;
    }

    /**
     * Set r_id_address
     *
     * @param string $rIdAddress
     * @return Insurance
     */
    public function setRIdAddress($rIdAddress)
    {
        $this->r_id_address = $rIdAddress;
    
        return $this;
    }

    /**
     * Get r_id_address
     *
     * @return string 
     */
    public function getRIdAddress()
    {
        return $this->r_id_address;
    }

    /**
     * Set r_height
     *
     * @param float $rHeight
     * @return Insurance
     */
    public function setRHeight($rHeight)
    {
        $this->r_height = $rHeight;
    
        return $this;
    }

    /**
     * Get r_height
     *
     * @return float 
     */
    public function getRHeight()
    {
        return $this->r_height;
    }

    /**
     * Set r_weight
     *
     * @param float $rWeight
     * @return Insurance
     */
    public function setRWeight($rWeight)
    {
        $this->r_weight = $rWeight;
    
        return $this;
    }

    /**
     * Get r_weight
     *
     * @return float 
     */
    public function getRWeight()
    {
        return $this->r_weight;
    }

    /**
     * Set relationship_with_ph
     *
     * @param string $relationshipWithPh
     * @return Insurance
     */
    public function setRelationshipWithPh($relationshipWithPh)
    {
        $this->relationship_with_ph = $relationshipWithPh;

    }

    /**
     * Get relationship_with_ph
     *
     * @return string 
     */
    public function getRelationshipWithPh()
    {
        return $this->relationship_with_ph;
    }

    /**
     * Set r_employer
     *
     * @param string $rEmployer
     * @return Insurance
     */
    public function setREmployer($rEmployer)
    {
        $this->r_employer = $rEmployer;
    
        return $this;
    }

    /**
     * Get r_employer
     *
     * @return string 
     */
    public function getREmployer()
    {
        return $this->r_employer;
    }

    /**
     * Set r_position
     *
     * @param string $rPosition
     * @return Insurance
     */
    public function setRPosition($rPosition)
    {
        $this->r_position = $rPosition;
    
        return $this;
    }

    /**
     * Get r_position
     *
     * @return string 
     */
    public function getRPosition()
    {
        return $this->r_position;
    }

    /**
     * Set r_profession
     *
     * @param string $rProfession
     * @return Insurance
     */
    public function setRProfession($rProfession)
    {
        $this->r_profession = $rProfession;
    
        return $this;
    }

    /**
     * Get r_profession
     *
     * @return string 
     */
    public function getRProfession()
    {
        return $this->r_profession;
    }

    /**
     * Set r_company_address
     *
     * @param string $rCompanyAddress
     * @return Insurance
     */
    public function setRCompanyAddress($rCompanyAddress)
    {
        $this->r_company_address = $rCompanyAddress;
    
        return $this;
    }

    /**
     * Get r_company_address
     *
     * @return string 
     */
    public function getRCompanyAddress()
    {
        return $this->r_company_address;
    }

    /**
     * Set r_company_tel
     *
     * @param integer $rCompanyTel
     * @return Insurance
     */
    public function setRCompanyTel($rCompanyTel)
    {
        $this->r_company_tel = $rCompanyTel;
    
        return $this;
    }

    /**
     * Get r_company_tel
     *
     * @return integer 
     */
    public function getRCompanyTel()
    {
        return $this->r_company_tel;
    }

    public function getTodo(){
        return $this->todo;
    }

    public function setTodo(ToDo $todo=null){
        $this->todo = $todo;
    }


    public function setProductFile(File $product = null)
    {
        $this->productFile = $product;

        if ($product) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }


    public function getProductFile()
    {
        return $this->productFile;
    }

    /**
     * @param string $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }
}
