<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
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
    protected $group_id = 1;

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
     * @ORM\Column(type="string")
     */
    protected $province;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $district;

    /**
     * @ORM\Column(type="string")
     */
    protected $town;

    /**
     * @ORM\Column(type="string")
     */
    protected $address_detail;

    /**
     * @ORM\Column(type="float")
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float")
     */
    protected $longitude;


    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_REGULAR');
        $this->stocks = new ArrayCollection();
        $this->updatedAt = new \DateTime('now');

        // your own logic
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

    /*public function __toString(){
        return (string) $this->getStocks();
    }*/
}




