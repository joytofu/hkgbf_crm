<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $pid;


    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="bigint",nullable=true)
     * @Assert\Length(max="11",maxMessage="手机号码过长，请重新输入！")
     * @Assert\Length(min="11",minMessage="手机号码过短，请重新输入！")
     * @Assert\Regex(pattern="/^(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/", message="手机号码不正确，请重新输入!")
     */
    protected $cellphone;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $company;



    /**
     * this is invitation code corresponding to invite property, which users register account with.
     * @ORM\Column(type="string",nullable=true)
     */
    protected $invitation;

    /**
     * generated once. Its an identifier that agent send to their users they invite.
     * @ORM\Column(type="string",nullable=true)
     */
    protected $invite;


    /**
     * @ORM\Column(type="integer",nullable=true)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Group",inversedBy="id")
     */
    protected $group_id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="imageName")
     *
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stock",mappedBy="user",cascade={"persist"})
     */
    protected $stocks;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Insurance",mappedBy="user",cascade={"persist"})
     */
    protected $insurance;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ToDo",mappedBy="user",cascade={"persist"})
     */
    protected $todos;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ToDo",inversedBy="admins",cascade={"persist"})
     */
    protected $alltodos;

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


    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_REGULAR');
        $this->stocks = new ArrayCollection();
        $this->todos = new ArrayCollection();
        $this->alltodos = new ArrayCollection();
        $this->updatedAt = new \DateTime('now');

        // your own logic
    }

    public function getPid(){
        return $this->pid;
    }

    public function setPid($pid){
        $this->pid = $pid;
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

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }


    public function setInvitation($invitation)
    {
        $this->invitation = $invitation;
    }

    public function getInvitation()
    {
        return $this->invitation;
    }

    public function getInvite()
    {
        return $this->invite;
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
     * Set group_id
     *
     * @param integer $groupId
     * @return User
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get group_id
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
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

    public function addToDo(\AppBundle\Entity\ToDo $todos){
        $this->todos[] = $todos;
        return $this;
    }

    public function removeToDo(\AppBundle\Entity\ToDo $todos){
        $this->todos->removeElement($todos);
    }

    public function getToDos()
    {
        return $this->todos;
    }


    public function getAllToDos(){
        return $this->alltodos;
    }

    public function setAllToDos($alltodos){
        $this->alltodos[] = $alltodos;
        return $this;
    }

    /**
     * This is for admin
     */
    public function getUnfinishedToDos(){
        $unfinishedToDos = array();
        foreach($this->getAllToDos() as $alltodo){
            if($alltodo->getStatus()==false){
                $unfinishedToDos[] = $alltodo;
            }
        }
        return $unfinishedToDos;
    }

    public function getOngoingToDos(){
        $ongoingToDos = array();
        foreach($this->getToDos() as $todo){
            if($todo->getStatus()==false){
                $ongoingToDos[] = $todo;
            }
        }
        return $ongoingToDos;
    }



    /*public function __toString(){
        return (string) $this->getStocks();
    }*/
}




