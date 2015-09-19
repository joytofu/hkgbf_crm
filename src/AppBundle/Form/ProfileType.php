<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-14
 * Time: 9:35
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('group_id','entity',array(
            'label'=>'Group',
            'translation_domain'=>'FOSUserBundle',
            'choices'=>array('1'=>'普通会员','2'=>'金卡会员','3'=>'钻石会员')));
    }



    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'app_user_profile';
    }

}