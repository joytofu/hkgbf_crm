<?php
/**
 * Created by PhpStorm.
 * User: kcswag
 * Date: 3/13/16
 * Time: 4:40 PM
 */

namespace AppBundle\Form;

use AppBundle\Entity\Insurance;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientTodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
             ->add('title',null,array('label'=>'标题'))
             ->add('content',null,array('label'=>'内容'))
             ->add('client','entity',array(
                 'label'=>'客户',
                 'class'=>'AppBundle\Entity\Client',
                 'placeholder'=>'请选择待办下发的客户',
                 'required'=>true,
                 'mapped'=>false,
                 'choice_label'=>'name'
                 ))
             ->add('clientTodoFile','vich_file',array('label'=>'缴费通知书'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ClientToDo',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clientTodo';
    }

}