<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-26
 * Time: 13:41
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OtherActionController extends Controller
{
    /**
     * to see which page to redirect to based on the ROLE of user who is logined
     * @Route("/redirect", name="redirectAfterLogin")
     */
    public function redirectAfterLogin()
    {
        if($this->isGranted('ROLE_REGULAR')||$this->isGranted('ROLE_GOLDEN')||$this->isGranted('ROLE_DIAMOND')){
            return $this->redirect('http://www.hkgbf.com/');
        }else{
            return $this->redirectToRoute('index');
        }
    }

    /**
     * generate invitation code
     * @Route("/invitation")
     */
    public function generateInvitation(){
        $code = substr(md5(uniqid(rand(), true)), 0, 10);
        echo $code;
        exit;
    }

}