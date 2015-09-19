<?php


namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;



class ModifyRoleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('roles','choice',array(
                'choices'=>array('ROLE_REGULAR'=>'普通会员','ROLE_GOLDEN'=>'金卡会员','ROLE_DIAMOND'=>'钻石会员'),
                'required'=>true,
                'placeholder'=>'请选择会员分组'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    public function getName(){
        return 'role';
    }


}