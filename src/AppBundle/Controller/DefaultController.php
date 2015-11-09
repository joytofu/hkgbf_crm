<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
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
        $regular = $data->findBy(array('roles'=>array('ROLE_REGULAR')));

        //ROLE_GOLDEN
        $golden = $data->findBy(array('roles'=>array('ROLE_GOLDEN')));

        //ROLE_DIAMOND
        $diamond = $data->findBy(array('roles'=>array('ROLE_DIAMOND')));

        //ROLE_AGENT
        $agent = $data->findBy(array('roles'=>array('ROLE_AGENT')));


        return $this->render('FOSUserBundle:Clients:group.html.twig',array('regular'=>$regular,'golden'=>$golden,'diamond'=>$diamond,'agent'=>$agent));
    }


    /**
     * @Route("/", name="index")
     */
    public function showIndex(){
        $user = $this->getUser();
        if(!$user){
            return $this->redirectToRoute('fos_user_security_login');
        }
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
        $role = $user->getRoles();
        if($role[0]=='ROLE_AGENT') {
            $invitation = $user->getInvite();
            $normal_clients = $user_data->findBy(array('invitation' => $invitation, 'roles' => array('ROLE_REGULAR')));
            $normal_clients_num = count($normal_clients);

            $golden_clients = $user_data->findBy(array('invitation' => $invitation, 'roles' => array('ROLE_GOLDEN')));
            $golden_clients_num = count($golden_clients);

            $diamond_clients = $user_data->findBy(array('invitation' => $invitation, 'roles' => array('ROLE_DIAMOND')));
            $diamond_clients_num = count($diamond_clients);
        }elseif($role[0]=='ROLE_AGENT_ADMIN'){
            $pid = $user->getId();
            $agents = $user_data->findBy(array('pid'=>$pid));
            $normal_clients = array();
            $golden_clients = array();
            $diamond_clients = array();
            foreach($agents as $agent){
                $normal_clients = array_merge($normal_clients,$user_data->findBy(array('invitation'=>$agent->getInvite(),'roles'=>array('ROLE_REGULAR'))));
                $golden_clients = array_merge($golden_clients,$user_data->findBy(array('invitation'=>$agent->getInvite(),'roles'=>array('ROLE_GOLDEN'))));
                $diamond_clients = array_merge($diamond_clients,$user_data->findBy(array('invitation'=>$agent->getInvite(),'roles'=>array('ROLE_DIAMOND'))));
            }
            $normal_clients_num = count($normal_clients);
            $golden_clients_num = count($golden_clients);
            $diamond_clients_num = count($diamond_clients);
        }elseif($this->isGranted('ROLE_ADMIN')){
            $normal_clients = $user_data->findBy(array('roles'=>array('ROLE_REGULAR')));
            $golden_clients = $user_data->findBy(array('roles'=>array('ROLE_GOLDEN')));
            $diamond_clients = $user_data->findBy(array('roles'=>array('ROLE_DIAMOND')));
            $normal_clients_num = count($normal_clients);
            $golden_clients_num = count($golden_clients);
            $diamond_clients_num = count($diamond_clients);
        }




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
                $data->setRoles(array('ROLE_REGULAR'));
                break;
            case 'ROLE_GOLDEN':
                $data->setRoles(array('ROLE_GOLDEN'));
                break;
            case 'ROLE_DIAMOND':
                $data->setRoles(array('ROLE_DIAMOND'));
                break;
            case 'ROLE_AGENT':
                $data->setRoles(array('ROLE_AGENT'));
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
        $agent = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($this->isGranted('ROLE_SUPER_ADMIN')) {
            $clients = $em->getRepository('AppBundle:Client')->findAll();
        }else{
            $clients = $em->getRepository('AppBundle:Client')->findBy(array('agent'=>$agent));
        }

        return $this->render('FOSUserBundle:Clients:clientsList.html.twig',array(
           'clients'=>$clients));
    }


    /**
     * @Route("/unverifiedclientslist", name="unverifiedclientslist")
     */
    public function showUnverifiedClients(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($this->isGranted('ROLE_SUPER_ADMIN')){
            $users = $em->getRepository('AppBundle:User')->findBy(array('enabled'=>false));
        }else{
            $invitation = $user->getInvite();
            $users = $em->getRepository('AppBundle:User')->findBy(array('invitation'=>$invitation,'enabled'=>false));
        }

        return $this->render('FOSUserBundle:Clients:clientsList.html.twig',array(
            'users'=>$users));

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
     * @Route("/agentslist",name="agentslist")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function AgentsList(){
        $em = $this->getDoctrine()->getManager();
        return $this->render('@FOSUser/Agents/agentsList.html.twig',array('agents'=>$agents));
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
                    $user->setRoles(array('ROLE_REGULAR'));
                    break;
                case 'ROLE_GOLDEN':
                    $user->setRoles(array('ROLE_GOLDEN'));
                    break;
                case 'ROLE_DIAMOND':
                    $user->setRoles(array('ROLE_DIAMOND'));
                    break;
                case 'ROLE_AGENT':
                    $user->setRoles(array('ROLE_AGENT'));
                    break;
                case 'ROLE_AGENT_ADMIN':
                    $user->setRoles(array('ROLE_AGENT_ADMIN'));
                    break;
                case 'ROLE_ADMIN':
                    $user->setRoles(array('ROLE_ADMIN'));
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
