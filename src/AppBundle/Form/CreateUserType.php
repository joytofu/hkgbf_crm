<?php


namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
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
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'required'=>false,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('company',null,array('label'=>'公司名称'))
            ->add('name',null,array('label'=>'form.name', 'translation_domain' => 'FOSUserBundle'))
            ->add('email',null,array('label'=>'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('cellphone',null,array('label'=>'form.cellphone', 'translation_domain' => 'FOSUserBundle'))
            /*->add('role_name','entity',array(
                'class'=>'AppBundle\Entity\RoleName',
                'placeholder'=>'请选择会员级别',
                'required'=>true,
                'mapped'=>false,
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('r')
                        ->where('r.for = :for')
                        ->setParameter("for","client")
                        ->orderBy('r.id','ASC');
                },
                'choice_label'=>'name'))*/
            ->add('imageFile','vich_image',array('label'=>'form.imageFile', 'required'=>false,'translation_domain' => 'FOSUserBundle'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return 'createUser';
    }

}