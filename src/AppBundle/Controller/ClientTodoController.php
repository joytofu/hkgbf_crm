<?php
/**
 * Created by PhpStorm.
 * User: kcswag
 * Date: 3/13/16
 * Time: 4:32 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Entity\ClientToDo;
use AppBundle\Form\ClientTodoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * @Route("/admin")
 */
class ClientTodoController extends Controller
{
    /**
     * @Route("/createclienttodo",name="createclienttodo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createClientTodo(Request $request){
        $em = $this->getDoctrine()->getManager();
        $clientTodo = new ClientToDo();

        $form = $this->createForm(new ClientTodoType(),$clientTodo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(isset($_POST['clientTodo']['client'])){
                $client_id = $_POST['clientTodo']['client'];
                $client = $em->getRepository('AppBundle:Client')->find($client_id);
                $clientTodo->setClient($client);
                $em->persist($clientTodo);
                $em->flush();
                $baseurl = $this->getRequest()->getBaseUrl();
                $redirect_url = $baseurl."/admin/allclienttodolist";
                return new Response("<script>alert('添加缴费待办信息成功!');window.location.href='$redirect_url';</script>");
            }

        }

        return $this->render("FOSUserBundle:Clients:create_clienttodo.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/allclienttodolist",name="all_client_todo_list")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function allClientTodoList(){
        $em = $this->getDoctrine()->getManager();
        $clientTodos = $em->getRepository("AppBundle:ClientToDo")->findBy([],['createdAt'=>'DESC']);
        return $this->render("@FOSUser/Clients/client_todo_list.html.twig",array('clienttodos'=>$clientTodos));
    }

    /**
     * @Route("/clienttodolist",name="personal_client_todo_list")
     */
    public function personalClientTodoList(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $client = $user->getSingleClient();
        $clientTodos = $em->getRepository('AppBundle:ClientToDo')->findBy(['client'=>$client],['createdAt'=>'DESC']);
        return $this->render("@FOSUser/Clients/client_todo_list.html.twig",['client'=>$client,'clienttodos'=>$clientTodos]);
    }

    /**
     * @Route("/setifpaid/{id}/{boolean}",name="setifpaid")
     * @ParamConverter("clienttodo",class="AppBundle:ClientToDo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function setIfPaid(ClientToDo $clientToDo,$boolean){
        $clientToDo->setIfPaid((boolean)$boolean);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('all_client_todo_list');
    }

}