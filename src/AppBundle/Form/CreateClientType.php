<?php


namespace AppBundle\Form;

use AppBundle\Entity\RoleName;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class CreateClientType extends AbstractType
{
    protected $role_name;
    public function __construct(RoleName $roleName){
        $this->role_name = $roleName;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('label'=>'客户姓名','required'=>true))
            ->add('email',null,array('label'=>'电子邮箱'))
            ->add('cellphone',null,array('label'=>'手机号码','required'=>true))
            ->add('imageFile','vich_image',array('label'=>'头像', 'required'=>false))
            ->add('company',null,array('label'=>'单位名称'))
            ->add('agent','entity',array(
                'class'=>'AppBundle\Entity\User',
                'placeholder'=>'请选择所属代理',
                'required'=>true,
                'mapped'=>false,
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->where('u.role_name = :role_name')
                        ->setParameters(array('role_name'=>$this->role_name))
                        ->orderBy('u.id','ASC');
                },
                'choice_label'=>'name'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client',
        ));
    }

    public function getName()
    {
        return 'createClient';
    }

}