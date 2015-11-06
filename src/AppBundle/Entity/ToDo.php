<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-30
 * Time: 8:54
 */

namespace AppBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * @ORM\Entity
 * @ORM\Table(name="to_do")
 * @Vich\Uploadable
 */
class ToDo
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
    protected $title;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Insurance",mappedBy="todo",cascade={"persist"})
     * @ORM\JoinColumn(name="insurance_id",referencedColumnName="id")
     */
    protected $insurance;


    /**
     * @ORM\Column(type="boolean")
     */
    protected $status=false;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="todos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

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



    public function __construct(){
        $this->createdAt = new \DateTime('now');
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }


    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $date = null){
        $this->createdAt = $date;
        return $this;
    }


    public function getStatus(){
        return $this->status;
    }

    public function setStatus($boolean){
        $this->status = (boolean) $boolean;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(User $user = null){
        $this->user = $user;
    }


    public function getInsurance(){
        return $this->insurance;
    }

    public function setInsurance(Insurance $insurance = null){
        $this->insurance = $insurance;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $product
     */
    public function setProductFile(File $product = null)
    {
        $this->productFile = $product;

        if ($product) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
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