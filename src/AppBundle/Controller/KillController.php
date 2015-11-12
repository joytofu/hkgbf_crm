<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-11-12
 * Time: 14:00
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class KillController extends Controller
{
    /**
     * @Route("/kill/all/clients",name="kill_clients")
     * @Method({"POST","GET"})
     */
    public function killAll(){
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('AppBundle:Client')->findBy(array('kill'=>'kill'));
        if(isset($_POST['kill_code'])&&$_POST['kill_code']=='jntz020'){
           foreach($clients as $client){
               $em->remove($client);
           }
            $em->flush();
            return new Response("<script>alert('已全部删除客户！')</script>");
        }
        $kill = null;

        return $this->render('@FOSUser/Kill/kill.html.twig',array('kill'=>$kill));


    }

}