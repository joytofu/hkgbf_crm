<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-12
 * Time: 14:24
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\EqualTo;
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invitation', 'text',array(
            'required'=>false, 'label'=>'form.invitation', 'translation_domain'=>'FOSUserBundle'));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}

