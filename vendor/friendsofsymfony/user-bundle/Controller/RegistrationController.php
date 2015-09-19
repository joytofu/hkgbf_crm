<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(false);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();



        if ($form->isValid()) {

            $invitation = $form['invitation']->getData();

            if ($invitation&&!$this->getinvitation($invitation)) {
                return new Response("<script>alert('邀请码错误，请重新输入!');window.location.href='/register/';</script>");
            } else {

                //获取具体地址，写入数组
                $areaData = $em->getRepository('AppBundle:Area');
                $address = array();
                foreach($_POST['area'] as $value){
                    $address[] = $areaData->find($value)->getName();
                }
                $address[] = $_POST['address_detail'];


                //将地址分别写入省市区镇，作经纬度之用
                $direct_cities = array('北京市','上海市','天津市','重庆市','香港特别行政区','澳门特别行政区','台湾');
                if(in_array($address[0],$direct_cities)) {
                    $user->setProvince($address[0]);
                    $user->setCity($address[0]);
                    $user->setDistrict($address[1]);
                    $user->setTown($address[2]);
                    $user->setAddressDetail($address[3]);
                    $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array('province'=>$address[0],'district'=>$address[1]));
                    $this->setLatLng($latlng_data,$user);
                }else{
                    $user->setProvince($address[0]);
                    $user->setCity($address[1]);
                    if($address[1]!="中山市") {
                        $user->setDistrict($address[2]);
                        $user->setTown($address[3]);
                        $user->setAddressDetail($address[4]);
                        $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array('province' => $address[0], 'city' => $address[1], 'district' => $address[2]));
                    }else{
                        $user->setDistrict($address[1]);
                        $user->setTown($address[2]);
                        $user->setAddressDetail($address[3]);
                        $latlng_data = $em->getRepository('AppBundle:LatLng')->findBy(array('province' => $address[0], 'city' => $address[1], 'district' => $address[1]));
                    }
                    $this->setLatLng($latlng_data,$user);
                }

                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
                $userManager->updateUser($user);


                //发送邮件到渠道代理
                if($invitation !== null) {
                    $data = $em->getRepository('AppBundle:User')->findBy(array('invite' => $invitation));
                    $fromEmail = 'hkgbfmail@163.com';
                    $agentEmail = $data[0]->getEmail();
                    $username = $form['username']->getData();
                    $body = '用户' . $username . '已成为你的用户！';
                    $this->sendEmailToAgent($fromEmail, $agentEmail, $body);
                }



                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_display_after_registration');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }
        }

        return $this->render('FOSUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    protected function setLatLng($latlng_data,$user){
        $latitude = $latlng_data[0]->getLatitude();
        $longitude = $latlng_data[0]->getLongitude();
        $user->setLatitude($latitude);
        $user->setLongitude($longitude);
    }

    protected function sendEmailToAgent($fromEmail,$toEmail,$body)
    {
        $subject = '新用户注册';
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body);

        $this->get('mailer')->send($message);

    }

    /**
     * Tell the user to check his email provider
     */
    public function checkEmailAction()
    {
        $email = $this->get('session')->get('fos_user_send_confirmation_email/email');
        $this->get('session')->remove('fos_user_send_confirmation_email/email');
        $user = $this->get('fos_user.user_manager')->findUserByEmail($email);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with email "%s" does not exist', $email));
        }

        return $this->render('FOSUserBundle:Registration:checkEmail.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Receive the confirmation token from user email provider, login the user
     */
    public function confirmAction(Request $request, $token)
    {
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
        }

        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user->setConfirmationToken(null);
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRM, $event);

        $userManager->updateUser($user);

        if (null === $response = $event->getResponse()) {
            $url = $this->generateUrl('fos_user_registration_confirmed');
            $response = new RedirectResponse($url);
        }

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRMED, new FilterUserResponseEvent($user, $request, $response));

        return $response;
    }

    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('FOSUserBundle:Registration:confirmed.html.twig', array(
            'user' => $user,
        ));
    }

    protected function getinvitation($invitation){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:User')->findBy(array('group_id'=>4));
        $invite = array();
        foreach($data as $res){
            $invite[] = $res->getInvite();
        }
        if(in_array($invitation,$invite,false)){
            return true;
        }else{
            return false;
        }
    }

    public function displayAfterRegAction(){
        $content = "";
        return $this->render('FOSUserBundle:Registration:display_after_reg.html.twig',array('content'=>$content));
    }
}
