<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',null,array('label'=>'用户名'))
            ->add('password',null,array('label'=>'密码'))
            ->add('name',null,array('label'=>'姓名'))
            ->add('email',null,array('label'=>'电子邮箱'))
            ->add('cellphone',null,array('label'=>'手机号码'))
            ->add('imageFile','vich_image',array('label'=>'头像'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'createUser';
    }

}