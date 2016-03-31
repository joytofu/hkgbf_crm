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
class StockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stock_id',null,array('label'=>'基金代码'))
            ->add('stock_name',null,array('label'=>'基金名称'))
            ->add('buy_date',null,array('label'=>'认购日期','widget'=>'choice','format'=>'yyyy-MM-dd'))
            ->add('value',null,array('label'=>'本月净值'))
            ->add('position',null,array('label'=>'认购份额'))
            ->add('buying_price',null,array('label'=>'认购金额'))
            ->add('current_price',null,array('label'=>'当前价格'))
            ->add('remark',null,array('label'=>'备注'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stock',
            'csrf_protection' => false
        ));
    }

    public function getName(){
        return 'Stock';
    }


}