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
            ->add('username',null,array('label'=>'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('password','password',array('label'=>'form.password', 'translation_domain' => 'FOSUserBundle'))
            ->add('name',null,array('label'=>'form.name', 'translation_domain' => 'FOSUserBundle'))
            ->add('email',null,array('label'=>'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('cellphone',null,array('label'=>'form.cellphone', 'translation_domain' => 'FOSUserBundle'))
            ->add('imageFile','vich_image',array('label'=>'form.imageFile', 'required'=>false,'translation_domain' => 'FOSUserBundle'));
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