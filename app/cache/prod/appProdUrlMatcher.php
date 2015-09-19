<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/product_')) {
                // productdetail
                if (0 === strpos($pathinfo, '/admin/product_detail') && preg_match('#^/admin/product_detail/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_productdetail;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'productdetail')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::product_detail',));
                }
                not_productdetail:

                // upload_data
                if (0 === strpos($pathinfo, '/admin/product_upload') && preg_match('#^/admin/product_upload/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_upload_data;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_data')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::uploadProductFile',));
                }
                not_upload_data:

            }

            if (0 === strpos($pathinfo, '/admin/add')) {
                // addstocks
                if (0 === strpos($pathinfo, '/admin/addstocks') && preg_match('#^/admin/addstocks/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'addstocks')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::addStocks',));
                }

                // addinsurance
                if (0 === strpos($pathinfo, '/admin/addinsurance') && preg_match('#^/admin/addinsurance/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'addinsurance')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::addInsurance',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/edit_')) {
                // editstock
                if (0 === strpos($pathinfo, '/admin/edit_stock') && preg_match('#^/admin/edit_stock/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editstock;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editstock')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::editStock',));
                }
                not_editstock:

                // editinsurance
                if (0 === strpos($pathinfo, '/admin/edit_insurance') && preg_match('#^/admin/edit_insurance/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editinsurance;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editinsurance')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::editInsurance',));
                }
                not_editinsurance:

            }

            if (0 === strpos($pathinfo, '/admin/delete_')) {
                // deletestock
                if (0 === strpos($pathinfo, '/admin/delete_stock') && preg_match('#^/admin/delete_stock/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletestock')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::deleteStock',));
                }

                // deleteinsurance
                if (0 === strpos($pathinfo, '/admin/delete_insurance') && preg_match('#^/admin/delete_insurance/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteinsurance')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::deleteInsurance',));
                }

                // deletestock2
                if (0 === strpos($pathinfo, '/admin/delete_stock_2') && preg_match('#^/admin/delete_stock_2/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletestock2')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::delete_stock_2',));
                }

                // deleteinsurance2
                if (0 === strpos($pathinfo, '/admin/delete_insurance_2') && preg_match('#^/admin/delete_insurance_2/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteinsurance2')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::delete_insurance_2',));
                }

                // deleteuser
                if (0 === strpos($pathinfo, '/admin/delete_user') && preg_match('#^/admin/delete_user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteuser')), array (  '_controller' => 'AppBundle\\Controller\\ClientsProductController::deleteUser',));
                }

            }

            // all_users_profile
            if ($pathinfo === '/admin/group') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::all_users_profile',  '_route' => 'all_users_profile',);
            }

            // index
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::showIndex',  '_route' => 'index',);
            }

            // modify_role
            if (0 === strpos($pathinfo, '/admin/modifyrole') && preg_match('#^/admin/modifyrole/(?P<id>[^/]++)/(?P<role>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'modify_role')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::modifyRole',));
            }

            // clientslist
            if ($pathinfo === '/admin/clientslist') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::showClients',  '_route' => 'clientslist',);
            }

            // unverifiedclientslist
            if ($pathinfo === '/admin/unverifiedclientslist') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::showUnverifiedClients',  '_route' => 'unverifiedclientslist',);
            }

            // createnotice
            if ($pathinfo === '/admin/createnotice') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::createNotice',  '_route' => 'createnotice',);
            }

            // noticelist
            if ($pathinfo === '/admin/noticelist') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::noticeList',  '_route' => 'noticelist',);
            }

            // editnotice
            if (0 === strpos($pathinfo, '/admin/editnotice') && preg_match('#^/admin/editnotice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'editnotice')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::editNotice',));
            }

            // deletenotice
            if (0 === strpos($pathinfo, '/admin/deletenotice') && preg_match('#^/admin/deletenotice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletenotice')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::deleteNotice',));
            }

        }

        // redirectAfterLogin
        if ($pathinfo === '/redirect') {
            return array (  '_controller' => 'AppBundle\\Controller\\OtherActionController::redirectAfterLogin',  '_route' => 'redirectAfterLogin',);
        }

        // app_otheraction_generateinvitation
        if ($pathinfo === '/invitation') {
            return array (  '_controller' => 'AppBundle\\Controller\\OtherActionController::generateInvitation',  '_route' => 'app_otheraction_generateinvitation',);
        }

        // userdetail
        if (0 === strpos($pathinfo, '/userdetail') && preg_match('#^/userdetail/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdetail')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::showUserDetail',));
        }

        // editUser
        if (0 === strpos($pathinfo, '/edit') && preg_match('#^/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_editUser;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editUser')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::editUser',));
        }
        not_editUser:

        // app_profile_show
        if (rtrim($pathinfo, '/') === '/profile') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_profile_show');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::showAction',  '_route' => 'app_profile_show',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/edit')) {
                // editprofile
                if ($pathinfo === '/admin/editprofile') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::editProfile',  '_route' => 'editprofile',);
                }

                // edituserprofile
                if (0 === strpos($pathinfo, '/admin/edituserprofile') && preg_match('#^/admin/edituserprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edituserprofile')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::editUserProfile',));
                }

            }

            // setenable
            if (0 === strpos($pathinfo, '/admin/setenabled') && preg_match('#^/admin/setenabled/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_setenable;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'setenable')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::setEnableData',));
            }
            not_setenable:

            // app_profile_generatelatlng
            if ($pathinfo === '/admin/generatelatlng') {
                return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::generateLatLng',  '_route' => 'app_profile_generatelatlng',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

                // fos_user_display_after_registration
                if ($pathinfo === '/register/dar') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_display_after_registration;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::displayAfterRegAction',  '_route' => 'fos_user_display_after_registration',);
                }
                not_fos_user_display_after_registration:

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ($pathinfo === '/group/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ($pathinfo === '/group/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_group_new;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }
            not_fos_user_group_new:

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_group_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }
            not_fos_user_group_edit:

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
