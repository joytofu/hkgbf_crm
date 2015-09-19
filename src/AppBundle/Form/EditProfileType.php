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
            ->add('name',null,array('label'=>'姓名','translation_domain' => 'FOSUserBundle'))
            ->add('cellphone','text',array('label'=>'手机号码'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('company',null,array('label'=>'公司名称','translation_domain' => 'FOSUserBundle'))
            ->add('imageFile','vich_image',array('label'=>'头像','allow_delete'=>'false','required'=>false));
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