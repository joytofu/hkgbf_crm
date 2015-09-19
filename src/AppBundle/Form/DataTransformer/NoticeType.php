<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-9
 * Time: 10:59
 */

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

class NoticeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('title',null,array('label'=>'标题'))
            ->add('content',null,array('label'=>'内容'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Notice'
        ));
    }

    public function getName(){
        return 'Notice';
    }

}