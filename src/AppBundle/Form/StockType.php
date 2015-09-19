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
            ->add('stock_id',null,array('label'=>'股票代码'))
            ->add('stock_name',null,array('label'=>'股票名称'))
            ->add('buy_date',null,array('label'=>'买入日期','widget'=>'choice','format'=>'yyyy-MM-dd'))
            ->add('position',null,array('label'=>'购买手数'))
            ->add('buying_price',null,array('label'=>'购买价格'))
            ->add('current_price',null,array('label'=>'当前价格'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stock'
        ));
    }

    public function getName(){
        return 'Stock';
    }


}