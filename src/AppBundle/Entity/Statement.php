<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-12-2
 * Time: 10:35
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity
 * @ORM\Table(name="statement")
 * @Vich\Uploadable
 */
class Statement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="upload_product", fileNameProperty="statementName")
     *
     * @var File
     */
    private $statementFile;

    /**
     * @ORM\Column(type="string", length=255,name="statement_name",nullable=true)
     *
     * @var string
     */
    private $statementName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client",inversedBy="statements")
     * @ORM\JoinColumn(name="client_id",referencedColumnName="id")
     */
    protected $client;

    /**
     * @ORM\Column(type="date",nullable=true)
     * @var \DateTime
     */
    protected $updated_at;

    public function __construct(){
        $this->updated_at = new \DateTime('now');
    }

    public function getId(){
        return $this->id;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getStatementFile(){
        return $this->statementFile;
    }

    public function setStatementFile(File $statement = null){
        $this->statementFile = $statement;
    }

    public function getStatementName(){
        return $this->statementName;
    }

    public function setStatementName($statementName){
        $this->statementName = $statementName;
    }

    public function getClient(){
        return $this->client;
    }

    public function setClient(Client $client){
        $this->client = $client;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }


}