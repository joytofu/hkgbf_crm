<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-13
 * Time: 10:34
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Entity\LatLng;
use AppBundle\Form\EditProfileType;
use FOS\UserBundle\Form\Type\ProfileFormType;
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
     * edit user profile. only admin is granted.
     * @Route("/admin/edituserprofile/{id}", name="edituserprofile")
     * @ParamConverter("user", class="AppBundle:User")
     */
    public function editUserProfile(Request $request, User $user,$id){
        $form = $this->createForm(new EditProfileType(),$user);
        $em = $this->getDoctrine()->getManager();
        $username = $user->getUsername();
        $direct_cities = array('北京市', '上海市', '天津市', '重庆市','香港特别行政区','澳门特别行政区','台湾');
        $hkmt = array('香港特别行政区','澳门特别行政区','台湾');
        $address = $this->getCurrentAddress($user,$direct_cities);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){


            //将地址写入数组
            $this->setAddress($em,$direct_cities,$user,$hkmt);

            $em->flush();
            $group_url = $this->generateUrl('group');
            return new Response("<script>alert('修改成功');window.location.href='$group_url';</script>");
        }

        return $this->render('FOSUserBundle:Profile:edit_user_profile.html.twig',array(
            'username'=>$username,
            'user'=>$user,
            'address'=>$address,
            'form'=>$form->createView(),
            'id'=>$id));

    }

    protected function setAddress($em,$direct_cities,User $user,$hkmt){
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
                $user->setProvince($add[0]);
                $user->setCity($add[0]);
                if(!in_array($add[0],$hkmt)) {
                    $user->setDistrict($add[1]);
                    $user->setTown($add[2]);
                }else{
                    $user->setDistrict($add[2]);
                }
                $user->setAddressDetail($add[3]);
                $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                    'province' => $user->getProvince(),
                    'district' => $user->getDistrict()));
                $this->setLatLng($latlng_data, $user);
            } else {  //非直辖市
                $user->setProvince($add[0]);
                $user->setCity($add[1]);
                if ($add[1] != "中山市") {  //非中山市
                    $user->setDistrict($add[2]);
                    $user->setTown($add[3]);
                    if(!empty($add[4])) {
                        $user->setAddressDetail($add[4]);
                    }
                    $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                        'province' => $user->getProvince(),
                        'city' => $user->getCity(),
                        'district' => $user->getDistrict()));
                } else {  //是中山市
                    $user->setTown($add[2]);
                    $user->setAddressDetail($add[3]);
                    $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array(
                        'province' => $user->getProvince(),
                        'city' => $user->getCity(),
                        'district' => $user->getDistrict()));
                }
                $this->setLatLng($latlng_data, $user);
            }
        }
    }

    protected function getCurrentAddress(User $user,$direct_cities){
        $address = array();
        if($user->getProvince()&&!in_array($user->getProvince(),$direct_cities)){
            $address[] = $user->getProvince();
            $address[] = $user->getCity();
            $address[] = $user->getDistrict();
            $address[] = $user->getTown();
            $address[] = $user->getAddressDetail();
            $address = implode("",$address);
        }elseif($user->getProvince()&&in_array($user->getProvince(),$direct_cities)){
            $address[] = $user->getProvince();
            $address[] = $user->getDistrict();
            $address[] = $user->getTown();
            $address[] = $user->getAddressDetail();
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