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
            ->add('username',null,array('label'=>'�û���'))
            ->add('password',null,array('label'=>'����'))
            ->add('name',null,array('label'=>'����'))
            ->add('email',null,array('label'=>'��������'))
            ->add('cellphone',null,array('label'=>'�ֻ�����'))
            ->add('imageFile','vich_image',array('label'=>'ͷ��'));
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