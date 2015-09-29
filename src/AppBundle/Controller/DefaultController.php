<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Notice;
use AppBundle\Entity\User;
use AppBundle\Form\CreateUserType;
use AppBundle\Form\DataTransformer\NoticeType;
use AppBundle\Form\ModifyRoleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Controller\ProductFileUploadController;
use Symfony\Component\Validator\Constraints\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin")
 */
class DefaultController extends Controller
{

    /**
     * load users who are grouped by ROLES
     * @Route("/group", name="group")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function all_users_profile()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:User');

        //ROLE_REGULAR
        $regular = $data->findBy(array('group_id'=>1));

        //ROLE_GOLDEN
        $golden = $data->findBy(array('group_id'=>2));

        //ROLE_DIAMOND
        $diamond = $data->findBy(array('group_id'=>3));

        //ROLE_AGENT
        $agent = $data->findBy(array('group_id'=>4));


        return $this->render('FOSUserBundle:Clients:group.html.twig',array('regular'=>$regular,'golden'=>$golden,'diamond'=>$diamond,'agent'=>$agent));
    }


    /**
     * @Route("/", name="index")
     */
    public function showIndex(){
        $user = $this->getUser();
        $username = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $user_data = $em->getRepository('AppBundle:User');
        $lastlogin = $user->getLastLogin();
        $login = get_object_vars($lastlogin);
        if($this->isGranted('ROLE_SUPER_ADMIN')) {
            $clients = $user_data->findAll();
            $clients_num = count($clients);
            $unverified_clients = $user_data->findBy(array('enabled'=>false));
            $unverified_num = count($unverified_clients);
        }else{
            $invitation = $user->getInvite();
            $clients = $user_data->findBy(array('invitation' => $invitation));
            $clients_num = count($clients);
            $unverified_clients = $user_data->findBy(array('invitation'=>$invitation,'enabled'=>false));
            $unverified_num = count($unverified_clients);
        }

        //notice
        $data = $em->getRepository('AppBundle:Notice')->findBy(array(),array('createdAt'=>'DESC'));
        if($data) {
            $notice_active = $data[0];
            $notice = array();
            $j = count($data) < 5 ? count($data) : 5 ;
                for ($i = 1; $i < $j; $i++) {
                    $notice[] = $data[$i];
                }
        }else{
            $notice = null;
            $notice_active = null;
        }

        //chart
        $invitation = $user->getInvite();
        $normal_clients = $user_data->findBy(array('invitation'=>$invitation,'group_id'=>1));
        $normal_clients_num = count($normal_clients);

        $golden_clients = $user_data->findBy(array('invitation'=>$invitation,'group_id'=>2));
        $golden_clients_num = count($golden_clients);

        $diamond_clients = $user_data->findBy(array('invitation'=>$invitation,'group_id'=>3));
        $diamond_clients_num = count($diamond_clients);




        return $this->render('FOSUserBundle::index_admin.html.twig',array(
            'username'=>$username,
            'lastlogin'=>$login['date'],
            'clients_num'=>$clients_num,
            'unverified_num'=>$unverified_num,
            'notice'=>$notice,
            'notice_active'=>$notice_active,
            'normal_clients'=>$normal_clients,
            'golden_clients'=>$golden_clients,
            'diamond_clients'=>$diamond_clients,
            'normal_clients_num'=>$normal_clients_num,
            'golden_clients_num'=>$golden_clients_num,
            'diamond_clients_num'=>$diamond_clients_num));
    }



    /**
     * modify role of users
     * @Route("/modifyrole/{id}/{role}", name="modify_role")
     */
    public function modifyRole(Request $request,$id,$role)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:User')->find($id);
        $data->setRoles(array($role));
        switch($role){
            case 'ROLE_REGULAR':
                $data->setGroupId('1');
                break;
            case 'ROLE_GOLDEN':
                $data->setGroupId('2');
                break;
            case 'ROLE_DIAMOND':
                $data->setGroupId('3');
                break;
            case 'ROLE_AGENT':
                $data->setGroupId('4');
                break;
        }
        $em->flush();
        echo "<script>alert('设置成功！')</script>";
        return $this->redirectToRoute('all_users_profile');
    }


    /**
     * @Route("/clientslist",name="clientslist")
     * @Security("has_role('ROLE_AGENT')")
     */
    public function showClients(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($this->isGranted('ROLE_SUPER_ADMIN')) {
            $users = $em->getRepository('AppBundle:User')->findAll();
        }else{
            $invitation = $user->getInvite();
            $users = $em->getRepository('AppBundle:User')->findBy(array('invitation' => $invitation));
        }



        return $this->render('FOSUserBundle:Clients:clientsList.html.twig',array(
           'users'=>$users));
    }


    /**
     * @Route("/unverifiedclientslist", name="unverifiedclientslist")
     */
    public function showUnverifiedClients(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($this->isGranted('ROLE_SUPER_ADMIN')){
            $data = $em->getRepository('AppBundle:User')->findBy(array('enabled'=>false));
        }else{
            $invitation = $user->getInvite();
            $data = $em->getRepository('AppBundle:User')->findBy(array('invitation'=>$invitation,'enabled'=>false));
        }

        return $this->render('FOSUserBundle:Clients:clientsList.html.twig',array(
            'data'=>$data));

    }

    /**
     * @Route("/clientsofagents", name="clientsofagents")
     */
    public function clientsOfAgents(){
        $user = $this->getUser();
        $pid = $user->getId();
        $agents = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array('pid'=>$pid));
        if(count($agents)==0){
            $if_agent = false;
        }else{
            $if_agent = true;
        }
        $invitations = array();
        foreach($agents as $agent){
            $invitations[] = $agent->getInvite();
        }
        $users_of_all_agents = array();
        foreach($invitations as $invitation){
            $users_of_all_agents[] = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array('invitation'=>$invitation));
        }

        return $this->render('@FOSUser/Clients/clients_of_agents.html.twig',array('agents'=>$agents,'users_of_all_agents'=>$users_of_all_agents,'if_agent'=>$if_agent));

    }

    /**
     * @Route("/createnotice", name="createnotice")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function createNotice(Request $request){
        $notice = new Notice();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new NoticeType(),$notice);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($notice);
            $em->flush();
            $noticelist_url = $this->generateUrl('noticelist');

            return new Response("<script>alert('添加成功!');window.location.href='$noticelist_url';</script>");
        }
        return $this->render('FOSUserBundle:Notice:notice.html.twig',array('form'=>$form->createView()));
    }

    /**
     * @Route("/noticelist", name="noticelist")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function noticeList(){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Notice')->findAll();

        return $this->render('FOSUserBundle:Notice:notice_list.html.twig',array('data'=>$data));
    }

    /**
     * @Route("/editnotice/{id}", name="editnotice")
     * @ParamConverter("notice", class="AppBundle:Notice")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editNotice(Notice $notice,Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new NoticeType(),$notice);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            $noticelist_url = $this->generateUrl('noticelist');
            return new Response("<script>alert('修改成功！');window.location.href=$noticelist_url</script>");
        }

        return $this->render('@FOSUser/Notice/editnotice.html.twig',array(
            'form'=>$form->createView(),
            'id'=>$id));
    }

    /**
     * @Route("/deletenotice/{id}", name="deletenotice")
     * @ParamConverter("notice", class="AppBundle:Notice")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteNotice(Notice $notice){
        $em = $this->getDoctrine()->getManager();
        $em->remove($notice);
        $em->flush();

        return $this->redirectToRoute('noticelist');
    }

    /**
     * @Route("/createuser", name="create_user")
     */
    public function creatUser(Request $request){
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CreateUserType(),$user);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            switch($_POST['roles']){
                case 'ROLE_REGULAR':
                    $user->setGroupId(1);
                    break;
                case 'ROLE_GOLDEN':
                    $user->setGroupId(2);
                    break;
                case 'ROLE_DIAMOND':
                    $user->setGroupId(3);
                    break;
                case 'ROLE_AGENT':
                    $user->setGroupId(4);
                    break;
                case 'ROLE_AGENT_ADMIN':
                    $user->setGroupId(5);
                    break;
                case 'ROLE_ADMIN':
                    $user->setGroupId(6);
                    break;
            }
            $user->setRoles(array($_POST['roles']));
            $em->persist($user);
            $em->flush();
            return new Response("<script>alert('创建用户成功');window.location.href='/admin/clientslist';</script>");
        }

        return $this->render('@FOSUser/createUser/create_user.html.twig',array('form'=>$form->createView()));
    }



}
