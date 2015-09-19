<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-17
 * Time: 16:17
 */

namespace AppBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    public function logoutAction(){
        echo "<script>alert('注销成功！')</script>";
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');

    }

}