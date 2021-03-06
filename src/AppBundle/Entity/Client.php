<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 * @Vich\Uploadable
 * @UniqueEntity(
 *     fields={"email"},
 *     message="邮箱已存在,请重新输入!")
 */
class Client
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
    protected $name;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @Assert\Length(max="11",maxMessage="手机号码过长，请重新输入！")
     * @Assert\Length(min="11",minMessage="手机号码过短，请重新输入！")
     * @Assert\Regex(pattern="/^(13[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/", message="手机号码不正确，请重新输入!")
     */
    protected $cellphone;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $idCard;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $company;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected  $company_tel;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255,name="image_name",nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    protected $createdAt;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="upload_product", fileNameProperty="productName")
     *
     * @var File
     */
    private $productFile;

    /**
     * @ORM\Column(type="string", length=255,name="product_name",nullable=true)
     *
     * @var string
     */
    private $productName;



    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stock",mappedBy="client",cascade={"persist"})
     */
    protected $stocks;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Insurance",mappedBy="client",cascade={"persist"})
     */
    protected $insurances;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Fund",mappedBy="client",cascade={"persist"})
     */
    protected $global_funds;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $province;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $district;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $town;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $address_detail;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    protected $longitude;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $if_stock_purchased;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $if_insurance_purchased;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $if_fund_purchased;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $if_future_purchased;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $vip;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="clients")
     * @ORM\JoinColumn(name="agent_id", referencedColumnName="id")
     */
    protected $agent;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoleName", inversedBy="users")
     * @ORM\JoinColumn(name="role_name_id", referencedColumnName="id")
     */
    protected $role_name;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",inversedBy="single_client",cascade={"persist"})
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    protected $single_user;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $kill;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Statement",mappedBy="client")
     */
    protected $statements;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ClientToDo",mappedBy="client")
     */
    protected $clientTodos;


    public function __construct()
    {
        $this->stocks = new ArrayCollection();
        $this->insurances = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
        $this->vip = "银卡会员";
        $this->kill = "kill";
        $this->imageName = "jntz.png";
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }

    public function getIdCard(){
        return $this->idCard;
    }

    public function setIdCard($idCard){
        $this->idCard = $idCard;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getCompanyTel(){
        return $this->company_tel;
    }

    public function setCompanyTel($company_tel){
        $this->company_tel = $company_tel;
    }



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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }


    public function setProductFile(File $product = null)
    {
        $this->productFile = $product;

    }

    /**
     * @return File
     */
    public function getProductFile()
    {
        return $this->productFile;
    }

    /**
     * @param string $imageName
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



    public function addStock(\AppBundle\Entity\Stock $stocks){
        $this->stocks[] = $stocks;
        return $this;
    }

    public function removeStock(\AppBundle\Entity\Stock $stocks){
        $this->stocks->removeElement($stocks);
    }

    public function getStocks()
    {
        return $this->stocks;
        }

    public function getProvince(){
        return $this->province;
    }

    public function setProvince($province){
        $this->province = $province;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getDistrict(){
        return $this->district;
    }

    public function setDistrict($district){
        $this->district = $district;
    }

    public function getTown(){
        return $this->town;
    }

    public function setTown($town){
        $this->town = $town;
    }

    public function getAddressDetail(){
        return $this->address_detail;
    }

    public function setAddressDetail($address_detail){
        $this->address_detail = $address_detail;
    }

    public function getLatitude(){
        return $this->latitude;
    }

    public function setLatitude($latitude){
        $this->latitude = $latitude;
    }

    public function getLongitude(){
        return $this->longitude;
    }

    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }

    public function getIfStockPurchased(){
        return $this->if_stock_purchased;
    }

    public function setIfStockPurchased($boolean){
        $this->if_stock_purchased = (boolean) $boolean;
        return $this;
    }

    public function getIfInsurancePurchased(){
        return $this->if_insurance_purchased;
    }

    public function setIfInsurancePurchased($boolean){
        $this->if_insurance_purchased = (boolean) $boolean;
        return $this;
    }

    public function getIfFundPurchased(){
        return $this->if_fund_purchased;
    }

    public function setIfFundPurchased($boolean){
        $this->if_fund_purchased = (boolean) $boolean;
        return $this;
    }

    public function getIfFuturePurchased(){
        return $this->if_future_purchased;
    }

    public function setIfFuturePurchased($boolean){
        $this->if_future_purchased = (boolean) $boolean;
        return $this;
    }

    public function getVip(){
        return $this->vip;
    }

    public function setVip($vip){
        $this->vip = $vip;
    }

    public function getInsurances(){
        return $this->insurances;
    }

    public function addInsurance(Insurance $insurance){
        $this->insurances[] = $insurance;
        return $this;
    }

    public function removeInsurance(Insurance $insurance){
        $this->insurances->removeElement($insurance);
        return $this;
    }

    public function getGlobalFunds(){
        return $this->global_funds;
    }

    public function addGlobalFunds(Fund $fund){
        $this->global_funds[] = $fund;
        return $this;
    }

    public function removeGlobalFund(Fund $fund){
        $this->global_funds->removeElement($fund);
        return $this;
    }

    public function getAgent(){
        return $this->agent;
    }

    public function setAgent(User $agent){
        $this->agent = $agent;
        return $this;
    }

    public function getRoleName(){
        return $this->role_name;
    }

    public function setRoleName(RoleName $roleName){
        $this->role_name = $roleName;
        return $this;
    }

    public function getKill(){
        return $this->kill;
    }

    public function setKill($kill){
        $this->kill = $kill;
    }

    public function getSingleUser(){
        return $this->single_user;
    }

    public function setSingleUser(User $user){
        $this->single_user = $user;
        return $this;
    }

    public function getStatements(){
        return $this->statements;
    }

    public function addStatement(Statement $statement){
        $this->statements[] = $statement;
        return $this;
    }

    public function removeStatement(Statement $statement){
        $this->statements->removeElement($statement);
        return $this;
    }

    public function getClientTodos(){
        return $this->clientTodos;
    }

    public function addClientTodo(ClientToDo $clientToDo){
        $this->clientTodos[] = $clientToDo;
    }

    public function removeClientTodo(ClientToDo $clientToDo){
        $this->clientTodos->removeElement($clientToDo);
        return $this;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

}




