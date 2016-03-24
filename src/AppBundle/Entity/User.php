<?php
namespace AppBundle\Entity;

use AppBundle\Controller\DefaultController;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @Vich\Uploadable
 * @UniqueEntity(
 *     fields={"username"},
 *     message="用户名已存在,请重新输入!"
 * )
 * @UniqueEntity(
 *     fields={"email"},
 *     message="邮箱已存在,请重新输入!"
 * )
 *
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
     * @ORM\Column(type="string",nullable=true)
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ToDo",mappedBy="user",cascade={"persist"})
     */
    protected $todos;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Client",mappedBy="agent",cascade={"persist"})
     */
    protected $clients;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Client",mappedBy="single_user",cascade={"persist"})
     */
    protected $single_client;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoleName", inversedBy="users",cascade={"persist"})
     * @ORM\JoinColumn(name="role_name_id", referencedColumnName="id")
     */
    protected $role_name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $property;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $region;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Notice", cascade={"persist"})
     * @ORM\OrderBy({"createdAt"="DESC"})
     */
    protected $notices;




    public function __construct()
    {
        parent::__construct();
        $this->todos = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->updatedAt = new \DateTime('now');
        $this->notices = new ArrayCollection();
        $this->imageName = 'jntz.png';

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


    public function getClients(){
        return $this->clients;
    }

    public function addClient(Client $client){
        $this->clients[] = $client;
        return $this;
    }

    public function removeClient(Client $client){
        $this->clients->remove($client);
    }

    public function getRoleName(){
        return $this->role_name;
    }

    public function setRoleName(RoleName $roleName=null){
        $this->role_name = $roleName;
    }

    public function getSingleClient(){
        return $this->single_client;
    }

    public function setSingleClient(Client $client){
        $this->single_client = $client;
        return $this;
    }

    public function getProperty(){
        return $this->property;
    }

    public function setProperty($property){
        $this->property = $property;
    }

    public function getRegion(){
        return $this->region;
    }

    public function setRegion($region){
        $this->region = $region;
    }

    public function getAgentAdmin(){
        if($this->pid){
            $controller = new DefaultController();
            $agent_admin = $controller->getDoctrine()->getManager()->getRepository('AppBundle:User')->find($this->pid);
            return $agent_admin;
        }
    }

    public function getNotices(){
        return $this->notices;
    }

    public function addNotice(Notice $notice){
        if(!$this->notices->contains($notice)){
            $this->notices->add($notice);
        }
    }

    public function removeNotice(Notice $notice){
        $this->notices->removeElement($notice);
    }

    public function getAgents(){
        if($this->role_name->name='渠道管理'){

        }
    }

}




