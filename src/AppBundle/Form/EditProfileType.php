<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-17
 * Time: 15:28
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => '用户名', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'required'=>false,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('name',null,array('label'=>'姓名','translation_domain' => 'FOSUserBundle'))
            ->add('cellphone','text',array('label'=>'手机号码'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('company',null,array('label'=>'公司名称','translation_domain' => 'FOSUserBundle'))
            ->add('imageFile','vich_image',array('label'=>'头像','allow_delete'=>'false','required'=>false))
            ->add('if_stock_purchased','checkbox',array('required'=>false))
            ->add('if_insurance_purchased','checkbox',array('required'=>false))
            ->add('if_fund_purchased','checkbox',array('required'=>false))
            ->add('pid','choice',array('label'=>'form.pid','translation_domain' => 'FOSUserBundle','choices'=>array('59'=>'agent_admin_001','60'=>'agent_admin_002')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'editProfile';
    }

}