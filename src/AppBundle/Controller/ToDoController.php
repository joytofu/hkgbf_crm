<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-30
 * Time: 8:53
 */

namespace AppBundle\Controller;


use AppBundle\Entity\ToDo;
use AppBundle\Form\ToDoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
/**
 * @Route("/admin")
 */
class ToDoController extends Controller
{
    /**
     * @Route("/createtodo", name="createtodo")
     */
    public function createToDo(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $admins = $em->getRepository('AppBundle:User')->findBy(array('group_id'=>6));
        $todo = new ToDo();

        $form = $this->createForm(new ToDoType(),$todo);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $todo->setUser($user);
            foreach($admins as $admin){
                $admin->setAllToDos($todo);
            }

            $em->persist($todo);
            $em->flush();
            return new Response("<script>alert('添加待办事项成功！');window.location.href='/admin/';</script>");
        }

        return $this->render('FOSUserBundle:ToDo:createToDo.html.twig',array('form'=>$form->createView()));

    }

    /**
     * @Route("/todolist", name="todolist")
     */
    public function ToDoListOfUser(){
        $user = $this->getUser();
        $todos = $this->getDoctrine()->getRepository('AppBundle:ToDo')->findBy(array('user'=>$user),array('createdAt'=>'DESC'));
        return $this->render('FOSUserBundle:ToDo:todo_list.html.twig',array('todos'=>$todos));
    }


    /**
     * @Route("/alltodolist", name="alltodolist")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function allToDoList(){
        $todos = $this->getDoctrine()->getRepository('AppBundle:ToDo')->findBy(array('status'=>false),array('createdAt'=>'DESC'));
        $finished_todos = $this->getDoctrine()->getRepository('AppBundle:ToDo')->findBy(array('status'=>true),array('createdAt'=>'DESC'));

        return $this->render('@FOSUser/ToDo/all_todo_list.html.twig',array('todos'=>$todos,'finished_todos'=>$finished_todos));
    }

    /**
     * @Route("/setfinish/{id}", name="setfinish")
     * @Security("has_role('ROLE_ADMIN')")
     * @ParamConverter("todo", class="AppBundle:ToDo")
     */
    public function setFinish(ToDo $toDo){
        $em = $this->getDoctrine()->getManager();
        $toDo->setStatus(true);
        $em->flush();

        return $this->redirectToRoute('alltodolist');
    }

    /**
     * @Route("/undofinish/{id}", name="undofinish")
     * @Security("has_role('ROLE_ADMIN')")
     * @ParamConverter("todo", class="AppBundle:ToDo")
     */
    public function undoFinish(ToDo $toDo){
        $toDo->setStatus(false);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('alltodolist');
    }

    /**
     * @Route("/edittodo/{id}", name="edittodo")
     * @ParamConverter("todo", class="AppBundle:ToDo")
     */
    public function editToDo(ToDo $todo, Request $request){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ToDoType(),$todo);

        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
        }

        return $this->render('@FOSUser/ToDo/createToDo.html.twig',array('form'=>$form->createView()));
    }

    /**
     * @Route("/deletetodo/{id}", name="deletetodo")
     * @ParamConverter("todo", class="AppBundle:ToDo")
     */
    public function deleteToDo(ToDo $todo){
        $em = $this->getDoctrine()->getManager();
        $em->remove($todo);
        $em->flush();
        return $this->redirectToRoute('todolist');
    }


}