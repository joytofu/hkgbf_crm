<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-13
 * Time: 10:34
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Entity\User;
use AppBundle\Entity\LatLng;
use AppBundle\Form\CreateClientType;
use AppBundle\Form\EditAgentProfileType;
use FOS\UserBundle\Form\Type\ProfileFormType;
use AppBundle\Form\EditClientProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\UserBundle\Controller\ProfileController as BaseProfileController;
use AppBundle\Form\EditUsersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class ProfileController extends BaseProfileController
{
    /**
     * Show the user information
     * @Route("/userdetail/{id}", name="userdetail")
     */
    public function showUserDetail($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $user
        ));
    }


    /**
     * @Route("/edit/{id}",name="editUser")
     * @Method({"GET","POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editUser(User $user, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm(new EditUsersType(),$user);

        $editForm->handleRequest($request);

        if($editForm->isSubmitted()&&$editForm->isValid()){
            $em->flush();
            return $this->redirectToRoute('userdetail',array('id'=>$user->getId()));
        }

        return $this->render('FOSUserBundle:Profile:edit_users.html.twig',array('form'=>$editForm->createView()));
    }

    /**
     * @Route("/profile/")
     */
    public function showAction(){
        $user = $this->getUser();

        if(!$this->isGranted('ROLE_AGENT')){
            return $this->render('FOSUserBundle:Profile:show.html.twig', array(
                'user' => $user
            ));
        }else{
            $em = $this->getDoctrine()->getManager();
            $clients = array();
            $data = $em->getRepository('AppBundle:User')->findBy(array('invitation'=>$user->getInvite()));
            foreach($data as $value){
                $clients[] = $value->getUsername();
            }
            return $this->render('FOSUserBundle:Profile:show.html.twig', array(
                'user' => $user,
                'clients'=>$clients
            ));
        }
    }

    /**
     * create client. only admin is granted.
     * @Route("/admin/createclient", name="createclient")
     */
    public function createClient(Request $request){
        $em = $this->getDoctrine()->getManager();
        $client = new Client();
        $role_name = $em->getRepository('AppBundle:RoleName')->find(4);
        $form = $this->createForm(new CreateClientType($role_name),$client);
        $direct_cities = array('北京市', '上海市', '天津市', '重庆市','香港特别行政区','澳门特别行政区','台湾');
        $hkmt = array('香港特别行政区','澳门特别行政区','台湾');

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){

            //将地址写入数组
            $this->setAddress($em,$direct_cities,$client,$hkmt);

            if(isset($_POST['createClient']['if_stock_purchased'])){
                $client->setIfStockPurchased($_POST['createClient']['if_stock_purchased']);
            }
            if(isset($_POST['createClient']['if_insurance_purchased'])){
                $client->setIfInsurancePurchased($_POST['createClient']['if_insurance_purchased']);
            }
            if(isset($_POST['createClient']['if_fund_purchased'])){
                $client->setIfFundPurchased($_POST['createClient']['if_fund_purchased']);
            }
            $em->persist($client);
            $em->flush();
            $redirect_url = $this->generateUrl('clientslist');
            return new Response("<script>alert('添加成功');window.location.href='$redirect_url';</script>");
        }

        return $this->render('@FOSUser/Clients/create_client.html.twig',array(
            'client'=>$client,
            'form'=>$form->createView()));
    }


    /**
     * edit user profile. only admin is granted.
     * @Route("/admin/editclientprofile/{id}", name="editclientprofile")
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function editClientProfile(Request $request, Client $client,$id){
        $form = $this->createForm(new EditClientProfileType(),$client);
        $em = $this->getDoctrine()->getManager();
        $clientname = $client->getName();
        $direct_cities = array('北京市', '上海市', '天津市', '重庆市','香港特别行政区','澳门特别行政区','台湾');
        $hkmt = array('香港特别行政区','澳门特别行政区','台湾');
        $address = $this->getCurrentAddress($client,$direct_cities);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){

            //将地址写入数组
            $this->setAddress($em,$direct_cities,$client,$hkmt);
            if(isset($_POST['editProfile']['if_stock_purchased'])){
                $client->setIfStockPurchased($_POST['editProfile']['if_stock_purchased']);
            }
            if(isset($_POST['editProfile']['if_insurance_purchased'])){
                $client->setIfInsurancePurchased($_POST['editProfile']['if_insurance_purchased']);
            }
            if(isset($_POST['editProfile']['if_fund_purchased'])){
                $client->setIfFundPurchased($_POST['editProfile']['if_fund_purchased']);
            }

            $em->flush();
            $group_url = $this->generateUrl('group');
            return new Response("<script>alert('修改成功');window.location.href='$group_url';</script>");
        }

        return $this->render('FOSUserBundle:Profile:edit_client_profile.html.twig',array(
            'clientname'=>$clientname,
            'client'=>$client,
            'address'=>$address,
            'form'=>$form->createView(),
            'id'=>$id));
    }

    /**
     * @Route("/admin/deleteclient/{id}",name="deleteclient")
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function deleteClient(Client $client){
        $em = $this->getDoctrine()->getManager();
        $em->remove($client);
        $em->flush();
        return $this->redirectToRoute('clientslist');
    }

    /**
     * edit private profile of your own
     * @Route("/admin/editprofile", name="editprofile")
     */
    public function editProfile(Request $request){
        $user = $this->getUser();
        $username = $user->getUsername();
        $form = $this->createForm(new EditProfileType(),$user);
        $em = $this->getDoctrine()->getManager();

        $direct_cities = array('北京市', '上海市', '天津市', '重庆市','香港特别行政区','澳门特别行政区','台湾');
        $hkmt = array('香港特别行政区','澳门特别行政区','台湾');
        $address = $this->getCurrentAddress($user,$direct_cities);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){

            //将地址写入数组
            $this->setAddress($em,$direct_cities,$user,$hkmt);
            $em->flush();
            $editprofile_url = $this->generateUrl('editprofile');
            return new Response("<script>alert('修改成功');window.location.href='$editprofile_url';</script>");
        }

        return $this->render('FOSUserBundle:Profile:edit_profile.html.twig',array(
            'user'=>$user,
            'form'=>$form->createView(),
            'address'=>$address,
            'username'=>$username));
    }



    /**
     * @Route("/admin/editagentprofile/{id}",name="editagentprofile")
     * @ParamConverter("agent", class="AppBundle:Agent")
     */
    public function editAgentProfile(User $agent, Request $request){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new EditAgentProfileType(),$agent);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            $redirect_url = $this->generateUrl('');
            return new Response("<script>alert('修改成功！');window.location.href='$redirect_url'</script>");
        }
        return $this->render('@FOSUser/Profile/edit_agent_profile.html.twig',array('form'=>$form));
    }

    protected function setAddress($em,$direct_cities,Client $client,$hkmt){
        //将地址写入数组
        if($_POST['area']&&$_POST['area'][0]!=-1) {
            $areaData = $em->getRepository('AppBundle:Area');
            $add = array(); //储存省市区地址名称
            foreach ($_POST['area'] as $value) {
                $add[] = $areaData->find($value)->getName();
            }
            $add[] = $_POST['address_detail'];

            //再将地址写入省市区镇，作经纬度之用
            if (in_array($add[0], $direct_cities)) {   //4个直辖市、2个特别行政区和台湾
                $client->setProvince($add[0]);
                $client->setCity($add[0]);
                if(!in_array($add[0],$hkmt)) {
                    $client->setDistrict($add[1]);
                    $client->setTown($add[2]);
                }else{
                    $client->setDistrict($add[2]);
                }
                $client->setAddressDetail($add[3]);
                $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                    'province' => $client->getProvince(),
                    'district' => $client->getDistrict()));
                $this->setLatLng($latlng_data, $client);
            } else {  //非直辖市
                $client->setProvince($add[0]);
                $client->setCity($add[1]);
                if ($add[1] != "中山市") {  //非中山市
                    $client->setDistrict($add[2]);
                    $client->setTown($add[3]);
                    if(!empty($add[4])) {
                        $client->setAddressDetail($add[4]);
                    }
                    $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                        'province' => $client->getProvince(),
                        'city' => $client->getCity(),
                        'district' => $client->getDistrict()));
                } else {  //是中山市
                    $client->setTown($add[2]);
                    $client->setAddressDetail($add[3]);
                    $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                        'province' => $client->getProvince(),
                        'city' => $client->getCity(),
                        'district' => $client->getDistrict()));
                }
                $this->setLatLng($latlng_data, $client);
            }
        }
    }

    protected function getCurrentAddress(Client $client,$direct_cities){
        $address = array();
        if($client->getProvince()&&!in_array($client->getProvince(),$direct_cities)){
            $address[] = $client->getProvince();
            $address[] = $client->getCity();
            $address[] = $client->getDistrict();
            $address[] = $client->getTown();
            $address[] = $client->getAddressDetail();
            $address = implode("",$address);
        }elseif($client->getProvince()&&in_array($client->getProvince(),$direct_cities)){
            $address[] = $client->getProvince();
            $address[] = $client->getDistrict();
            $address[] = $client->getTown();
            $address[] = $client->getAddressDetail();
            $address = implode("",$address);
        }else{
            $address = null;
        }
        return $address;
    }

    protected function setLatLng($latlng_data,$user){
        if(!empty($latlng_data[0])) {
            $latitude = $latlng_data[0]->getLatitude();
            $longitude = $latlng_data[0]->getLongitude();
            $user->setLatitude($latitude);
            $user->setLongitude($longitude);
        }
    }

    /**
     * @Route("/admin/setenabled/{id}",name="setenable")
     * @Method({"POST"})
     */
    public function setEnableData($id){
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));
        $user->setEnabled(true);
        $em = $this->getDoctrine()->getManager();
        $em->flush();


        return $this->redirectToRoute('clientslist');
    }

    /**
     * @Route("/admin/generatelatlng")
     */
    public function generateLatLng(){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:User')->findBy(array('invitation'=>'24bb2a5a71'));
        $clients = array();
        foreach($data as $client){
            if($client->getProvince()&&!$client->getLatitude()){
                $clients[] = $client;
            }
        }


        foreach($clients as $client_obj){
            $province = $client_obj->getProvince();
            $district = $client_obj->getDistrict();
          $latlng_data =  $em->getRepository('AppBundle:LatLng')->findBy(array(
                'province'=>$province,
                'district'=>$district));

            if(!empty($latlng_data[0])) {
                $latitude = $latlng_data[0]->getLatitude();
                $longitude = $latlng_data[0]->getLongitude();
                $client_obj->setLatitude($latitude);
                $client_obj->setLongitude($longitude);
            }

            $em->flush();
        }

        return new Response("<script>alert('经纬度设置成功!')</script>");
    }




}