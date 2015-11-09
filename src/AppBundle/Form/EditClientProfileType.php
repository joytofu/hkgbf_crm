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

class EditClientProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('label'=>'姓名'))
            ->add('cellphone','text',array('label'=>'手机号码'))
            ->add('email', 'email', array('label' => 'form.email'))
            ->add('company',null,array('label'=>'公司名称'))
            ->add('imageFile','vich_image',array('label'=>'头像','allow_delete'=>'false','required'=>false))
            ->add('if_stock_purchased','checkbox',array('required'=>false))
            ->add('if_insurance_purchased','checkbox',array('required'=>false))
            ->add('if_fund_purchased','checkbox',array('required'=>false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client',
        ));
    }

    public function getName()
    {
        return 'editClientProfile';
    }

}