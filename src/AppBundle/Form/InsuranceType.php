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
            ->add('type',null,array('label'=>'保险类型'))
            ->add('insurance_premium',null,array('label'=>'保费'))
            ->add('sum_insured',null,array('label'=>'投保额'))
            ->add('policy_holder',null,array('label'=>'投保人'))
            ->add('recognizee',null,array('label'=>'受保人'))
            ->add('age_at_issue',null,array('label'=>'投保年龄'))
            ->add('years',null,array('label'=>'投保年限'))
            ->add('born_date','date',array('label'=>'出生日期','widget'=>'choice','format'=>'yyyy-MM-dd',
                'years'=>array(
                    1940,1941,1942,1943,1944,1945,1946,1947,1948,1949,
                    1950,1951,1952,1953,1954,1955,1956,1957,1958,1959,
                    1960,1961,1962,1963,1964,1965,1966,1967,1968,1969,
                    1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,
                    1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,
                    1990,1991,1992,1993,1994,1995,1996,1997)))
            ->add('gender','choice',array('label'=>'性别','choices'=>array('男'=>'男','女'=>'女')))
            ->add('is_smoking','choice',array('label'=>'是否吸烟','choices'=>array('否','是'),'placeholder'=>'请选择是否吸烟'))
            ->add('buy_date',null,array('label'=>'购买日期','widget'=>'choice','format'=>'yyyy-MM-dd'))
            ->add('next_pay_date',null,array('label'=>'下次续费日期','widget'=>'choice','format'=>'yyyy-MM-dd'));
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