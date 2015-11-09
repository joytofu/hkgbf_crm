<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-11-9
 * Time: 17:44
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity
 * @ORM\Table(name="role_name")
 */
class RoleName
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
    protected $role_name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User",mappedBy="role_name",cascade={"persist"})
     */
    protected $users;

}