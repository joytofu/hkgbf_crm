<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-9-30
 * Time: 9:16
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

class ToDoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category','choice',array('placeholder'=>'请选择分类','choices'=>array('股票'=>'股票','保险'=>'保险','期货'=>'期货','基金'=>'基金')))
            ->add('title','text',array('label'=>'form.title','translation_domain' => 'FOSUserBundle'))
            ->add('content','textarea',array('label'=>'form.content','translation_domain' => 'FOSUserBundle'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ToDo'
        ));
    }

    public function getName(){
        return 'ToDo';
    }

}