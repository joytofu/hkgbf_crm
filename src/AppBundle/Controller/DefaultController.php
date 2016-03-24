<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use AppBundle\Entity\Group;
use AppBundle\Entity\Notice;
use AppBundle\Entity\User;
use AppBundle\Form\CreateUserType;
use AppBundle\Form\DataTransformer\NoticeType;
use AppBundle\Form\ModifyRoleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function all_users_profile()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Client');

        //ROLE_REGULAR
        $regular = $data->findBy(array('vip'=>'银卡会员'));

        //ROLE_GOLDEN
        $golden = $data->findBy(array('vip'=>'金卡会员'));

        //ROLE_DIAMOND
        $diamond = $data->findBy(array('vip'=>'钻石会员'));

        return $this->render('FOSUserBundle:Clients:group.html.twig',array('regular'=>$regular,'golden'=>$golden,'diamond'=>$diamond));
    }


    /**
     * @Route("/", name="index")
     */
    public function showIndex(){
        $user = $this->getUser();
        if(!$user){
            return $this->redirectToRoute('fos_user_security_login');
        }
        if($user->getRoleName()->getId()==5 || $user->getRoleName()->getId()==6 || $user->getRoleName()->getId()==7){
            return $this->redirectToRoute('client_index');
        }
        $username = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $client_data = $em->getRepository('AppBundle:Client');
        $lastlogin = $user->getLastLogin();
        $login = get_object_vars($lastlogin);

        //todos
        $unfinished_todos = $em->getRepository('AppBundle:ToDo')->findBy(array('status'=>false));

        //notice
        //$data = $em->getRepository('AppBundle:Notice')->findBy(array('users'=>$user),array('createdAt'=>'DESC'));
        $data = $user->getNotices();
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

        //chart&clients count
        $role = $user->getRoles();
        if($role[0]=='ROLE_AGENT') {
            $normal_clients = $client_data->findBy(array('agent' => $user, 'vip'=>'银卡会员'));
            $normal_clients_num = count($normal_clients);

            $golden_clients = $client_data->findBy(array('agent' => $user, 'vip'=>'金卡会员'));
            $golden_clients_num = count($golden_clients);

            $diamond_clients = $client_data->findBy(array('agent' => $user, 'vip'=>'钻石会员'));
            $diamond_clients_num = count($diamond_clients);
        }elseif($role[0]=='ROLE_AGENT_ADMIN'){
            $pid = $user->getId();
            $agents = $em->getRepository('AppBundle:User')->findBy(array('pid'=>$pid));
            $normal_clients = array();
            $golden_clients = array();
            $diamond_clients = array();
            foreach($agents as $agent){
                $normal_clients = array_merge($normal_clients,$client_data->findBy(array('agent'=>$agent,'vip'=>'银卡会员')));
                $golden_clients = array_merge($golden_clients,$client_data->findBy(array('agent'=>$agent,'vip'=>'金卡会员')));
                $diamond_clients = array_merge($diamond_clients,$client_data->findBy(array('agent'=>$agent,'vip'=>'钻石会员')));
            }
            $normal_clients_num = count($normal_clients);
            $golden_clients_num = count($golden_clients);
            $diamond_clients_num = count($diamond_clients);
        }elseif($this->isGranted('ROLE_ADMIN')){
            $normal_clients = $client_data->findBy(array('vip'=>'银卡会员'));
            $golden_clients = $client_data->findBy(array('vip'=>'金卡会员'));
            $diamond_clients = $client_data->findBy(array('vip'=>'钻石会员'));
            $normal_clients_num = count($normal_clients);
            $golden_clients_num = count($golden_clients);
            $diamond_clients_num = count($diamond_clients);
        }
        $clients_num = $normal_clients_num+ $golden_clients_num+$diamond_clients_num;

        return $this->render('FOSUserBundle::index_admin.html.twig',array(
            'username'=>$username,
            'lastlogin'=>$login['date'],
            'clients_num'=>$clients_num,
            'unfinished_todos'=>$unfinished_todos,
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
     * @Route("/clientindex",name="client_index")
     */
    public function clientIndex(){
        $em = $this->getDoctrine()->getManager();

        //personal information
        $client = $this->getUser()->getSingleClient();

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

        //bill
        $clienttodos = $em->getRepository('AppBundle:ClientToDo')->findBy(['client'=>$client,'if_paid'=>0],['createdAt'=>'DESC']);

        return $this->render('@FOSUser/Clients/client_index.html.twig',array(
            'notice'=>$notice,
            'notice_active'=>$notice_active,
            'client'=>$client,
            'client_todos'=>$clienttodos
            ));
    }

    public function getAgentsCountAction(){
        $em = $this->getDoctrine()->getManager();
        $role_name = $em->getRepository('AppBundle:RoleName')->find(4);
        $agents = $em->getRepository('AppBundle:User')->findBy(array('role_name'=>$role_name));
        return $this->render('@FOSUser/count/agents_count.html.twig',array('agents'=>$agents));
    }



    /**
     * modify role of users
     * @Route("/modifyrole/{id}/{role}", name="modify_role")
     */
    public function modifyRole($id,$role)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('AppBundle:Client')->find($id);
        switch($role){
            case 'ROLE_REGULAR':
                $vip = '普通会员';
                $role_name = $em->getRepository('AppBundle:RoleName')->find(5);
                break;
            case 'ROLE_GOLDEN':
                $vip = '金卡会员';
                $role_name = $em->getRepository('AppBundle:RoleName')->find(6);
                break;
            case 'ROLE_DIAMOND':
                $vip = '钻石会员';
                $role_name = $em->getRepository('AppBundle:RoleName')->find(7);
                break;
        }
        $client->setVip($vip);
        $client->setRoleName($role_name);
        $client->getSingleUser()->setRoleName($role_name);
        $em->flush();
        echo "<script>alert('设置成功！')</script>";
        return $this->redirectToRoute('group');
    }


    /**
     * @Route("/clientslist",name="clientslist")
     * @Security("has_role('ROLE_AGENT')")
     */
    public function showClients(){
        $agent = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($this->isGranted('ROLE_ADMIN')) {
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
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $pid = $user->getId();
        $agents = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array('pid'=>$pid));
        if(count($agents)==0){
            $if_agent = false;
        }else{
            $if_agent = true;
        }
        $clients = array();
        foreach($agents as $agent){
            $clients[] = $em->getRepository('AppBundle:Client')->findBy(array('agent'=>$agent));
        }


        return $this->render('@FOSUser/Clients/clients_of_agents.html.twig',array('agents'=>$agents,'clients'=>$clients,'if_agent'=>$if_agent));
    }


    /**
     * @Route("/agentslist",name="agentslist")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function agentsList(){
        $em = $this->getDoctrine()->getManager();
        $role_name = $em->getRepository('AppBundle:RoleName')->find(3);
        $agent_admins = $em->getRepository('AppBundle:User')->findBy(array('role_name'=>$role_name));
        return $this->render('@FOSUser/Agents/agentsList.html.twig',array('agent_admins'=>$agent_admins));
    }

    /**
     * @Route("/adminslist",name="adminslist")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function adminsList(){
        $em = $this->getDoctrine()->getManager();
        $role_name = $em->getRepository('AppBundle:RoleName')->find(2);
        $admins = $em->getRepository('AppBundle:User')->findBy(array('role_name'=>$role_name));
        return $this->render('@FOSUser/Admins/adminsList.html.twig',array('admins'=>$admins));

    }

    /**
     * @Route("/getagents/{agent_admin_id}", name="get_agents")
     */
    public function getAgentsAction($agent_admin_id,$mark = null){
        $em = $this->getDoctrine()->getManager();
        $agents = $em->getRepository('AppBundle:User')->findBy(array('pid'=>$agent_admin_id));
        if($mark = null){
            return $this->render('@FOSUser/Agents/getAgents.html.twig',array('agents'=>$agents,'agent_admin_id'=>$agent_admin_id));
        }else{
            return $this->render('@FOSUser/Agents/getAgentsForNotice.html.twig',array('agents'=>$agents));
        }
    }

    public function getAgentAdminAction($pid){
        $em = $this->getDoctrine()->getManager();
        $agent_admin = $em->getRepository('AppBundle:User')->find($pid);
        $name = $agent_admin->getName();
        return $this->render('@FOSUser/Agents/getAgentAdmin.html.twig',['name'=>$name]);
    }

    /**
     * @Route("/getclients/{id}",name="getclients")
     * @ParamConverter("user", class="AppBundle:User")
     */
    public function getClientsAction(User $user){
        $clients = $user->getClients();
        return $this->render('@FOSUser/Notice/getclients.html.twig',array('clients'=>$clients));
    }


    /**
     * @Route("/noticelist", name="noticelist")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function noticeList(){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Notice')->findAll();

        return $this->render('FOSUserBundle:Notice:notice_list.html.twig',array('data'=>$data));
    }

    /**
     * @Route("/createnotice", name="createnotice")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createNotice(Request $request){
        $notice = new Notice();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new NoticeType(),$notice);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $users = $form->get('users')->getData();
            foreach($users as $user){
                $notice->addUser($user);
            }
            $em->persist($notice);
            $em->flush();
            $noticelist_url = $this->generateUrl('noticelist');

            return new Response("<script>alert('添加成功!');window.location.href='$noticelist_url';</script>");
        }

        $role_name = $em->getRepository('AppBundle:RoleName')->find(3);
        $agent_admins = $em->getRepository('AppBundle:User')->findBy(['role_name'=>$role_name]);
        return $this->render('FOSUserBundle:Notice:notice.html.twig',array(
            'form'=>$form->createView(),
            'agent_admins'=>$agent_admins
        ));
    }

    /**
     * @Route("/editnotice/{id}", name="editnotice")
     * @ParamConverter("notice", class="AppBundle:Notice")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editNotice(Notice $notice,Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new NoticeType(),$notice);
        $title = $notice->getTitle();
        $content = $notice->getContent();
        $users = $notice->getUsers();

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $form_users = $form->get('users')->getData();
            foreach($users as $user){
                $notice->removeUser($user);
                $em->flush();
            }
            foreach($form_users as $user){
                $notice->addUser($user);
            }
            $em->persist($notice);
            $em->flush();
            $noticelist_url = $this->generateUrl('noticelist');
            return new Response("<script>alert('修改成功！');window.location.href='$noticelist_url'</script>");
        }

        $role_name = $em->getRepository('AppBundle:RoleName')->find(3);
        $agent_admins = $em->getRepository('AppBundle:User')->findBy(['role_name'=>$role_name]);


        return $this->render('@FOSUser/Notice/notice.html.twig',array(
            'form'=>$form->createView(),
            'title'=>$title,
            'content'=>$content,
            'agent_admins'=>$agent_admins,
            'users'=>$users,
            'id'=>$id));
    }

    /**
     * @Route("/deletenotice/{id}", name="deletenotice")
     * @ParamConverter("notice", class="AppBundle:Notice")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteNotice(Notice $notice){
        $em = $this->getDoctrine()->getManager();
        $users = $notice->getUsers();
        foreach($users as $user){
            $notice->removeUser($user);
            $em->flush();

        }
        $em->remove($notice);
        $em->flush();

        return $this->redirectToRoute('noticelist');
    }

    /**
     * @Route("/create/{role}", name="create_user")
     */
    public function creatUser(Request $request,$role){
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CreateUserType(),$user);
        $form->handleRequest($request);
        $role_name_agent_admin = $em->getRepository('AppBundle:RoleName')->find(3);
        $agent_admins = $em->getRepository('AppBundle:User')->findBy(array('role_name'=>$role_name_agent_admin));

        if($form->isSubmitted()){
            if($role=='admin'){
                $user->setRoles(array('ROLE_ADMIN'));
                $role_name=$em->getRepository('AppBundle:RoleName')->find(2);
                $user->setRoleName($role_name);
            }elseif($role=='agent'){
                switch ($_POST['roles']) {
                    case 'ROLE_AGENT':
                        $role_name = $em->getRepository('AppBundle:RoleName')->find(4);
                        $user->setRoles(array('ROLE_AGENT'));
                        $user->setRoleName($role_name);
                        $user->setPid($_POST['role_agent_admin']);
                        break;
                    case 'ROLE_AGENT_ADMIN':
                        $role_name = $em->getRepository('AppBundle:RoleName')->find(3);
                        $user->setRoles(array('ROLE_AGENT_ADMIN'));
                        $user->setRoleName($role_name);
                        break;
                }
                $user->setRoles(array($_POST['roles']));
            }elseif($role=='fucker'){
                $user->setRoles(['ROLE_FUCKER']);
                $role_name = $em->getRepository('AppBundle:RoleName')->find(8);
                $user->setRoleName($role_name);
                $em->persist($user);
                $em->flush();
                return new Response("<script>alert('创建fucker成功!');</script>");
            }
            $em->persist($user);
            $em->flush();
            $redirect_url = $this->generateUrl($role.'slist');
            return new Response("<script>alert('创建成功');window.location.href='$redirect_url';</script>");
        }

        return $this->render('@FOSUser/createUser/create_user.html.twig',array('form'=>$form->createView(),'agent_admins'=>$agent_admins,'role'=>$role));
    }




}
