<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-31
 * Time: 15:08
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
class InsuranceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('insurance_name',null,array('label'=>'保险名称'))
            ->add('insurance_number',null,array('label'=>'保单编号'))
            ->add('type',null,array('label'=>'保险类型'))
            ->add('insurance_premium',null,array('label'=>'保费'))
            ->add('sum_insured',null,array('label'=>'投保额'))
            ->add('policy_holder',null,array('label'=>'投保人'))
            ->add('recognizee',null,array('label'=>'受保人'))
            ->add('born_date','date',array('label'=>'出生日期','widget'=>'choice','format'=>'yyyy-MM-dd',
                'years'=>range(1940,1997,1)))
            ->add('buy_date',null,array('label'=>'购买日期','widget'=>'choice','format'=>'yyyy-MM-dd'))
            ->add('years','choice',array('label'=>'已缴费年期','choices'=>range(0,100,1)))
            ->add('next_pay_date',null,array('label'=>'下次续费日期','widget'=>'choice','format'=>'yyyy-MM-dd'))
            ->add('verified',null,array('label'=>'已审核'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Insurance'
        ));
    }

    public function getName(){
        return 'Insurance';
    }


}