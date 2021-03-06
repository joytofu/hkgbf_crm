<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsuranceType extends AbstractType
{
    private $user_obj;
    public function __construct(User $user=null){   //传入agent对象
        $this->user_obj = $user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('insurance_company')
            ->add('insurance_name')
            ->add('insurance_number')
            ->add('currency','choice',array('choices'=>['$美元'=>'$美元','¥人民币'=>'¥人民币','HK$港元'=>'HK$港元','€欧元'=>'€欧元'],'expanded'=>true))
            ->add('buy_date')
            ->add('insurance_premium')
            ->add('sum_insured')
            ->add('ph_name')
            ->add('ph_name_pinyin')
            ->add('ph_id_card')
            ->add('ph_id_card_expired_date','date',array('empty_value'=>'','widget'=>'choice','format'=>'yyyy-MM-dd','years'=>range(2016,2036,1)))
            ->add('ph_traffic_permit')
            ->add('ph_traffic_permit_expired_date','date',array('empty_value'=>'','required'=>false,'widget'=>'choice','format'=>'yyyy-MM-dd','years'=>range(2016,2036,1)))
            ->add('ph_address')
            ->add('ph_id_address')
            ->add('ph_tel')
            ->add('ph_email')
            ->add('ph_gender','choice',array('choices'=>array('男'=>'男','女'=>'女'),'expanded'=>true))
            ->add('ph_marriage','choice',array('expanded'=>true,'choices'=>array('未婚'=>'未婚','已婚'=>'已婚','离异'=>'离异','丧偶'=>'丧偶')))
            ->add('ph_is_smoking','choice',array('choices'=>array('1'=>'是','0'=>'否'),'expanded'=>true))
            ->add('ph_born_date','date',array('empty_value'=>'','widget'=>'choice','format'=>'yyyy-MM-dd','years'=>range(1932,1997,1)))
            ->add('ph_height')
            ->add('ph_weight')
            ->add('ph_employer')
            ->add('ph_position')
            ->add('ph_profession')
            ->add('ph_company_address')
            ->add('ph_company_tel')
            ->add('r_name')
            ->add('r_name_pinyin')
            ->add('r_id_card')
            ->add('r_id_card_expired_date','date',array('required'=>false))
            ->add('r_traffic_permit')
            ->add('r_traffic_permit_expired_date')
            ->add('r_gender','choice',array('choices'=>array('男'=>'男','女'=>'女'),'required'=>false,'empty_data'=>null))
            ->add('r_marriage','choice',array('required'=>false,'empty_data'=>null,'choices'=>array('未婚'=>'未婚','已婚'=>'已婚','离异'=>'离异','丧偶'=>'丧偶')))
            ->add('r_is_smoking','choice',array('choices'=>array('1'=>'是','0'=>'否'),'required'=>false,'empty_data'=>null))
            ->add('r_born_date','date',array('empty_value'=>'','widget'=>'choice','format'=>'yyyy-MM-dd','required'=>false,'years'=>range(1932,1997,1)))
            ->add('r_tel')
            ->add('r_email')
            ->add('r_address')
            ->add('r_id_address')
            ->add('r_height')
            ->add('r_weight')
            ->add('relationship_with_ph')
            ->add('r_employer')
            ->add('r_position')
            ->add('r_profession')
            ->add('r_company_address')
            ->add('r_company_tel')
            ->add('paid_years')
            ->add('next_pay_date')
            ->add('payment_method','choice',array('choices'=>array('年缴'=>'年缴','半年缴'=>'半年缴','月缴'=>'月缴')))
            ->add('automatic_payment','choice',array('choices'=>array('1'=>'是','0'=>'否')))
            ->add('remark','textarea',array('required'=>false,'attr'=>['rows'=>7,'style'=>'display:block;width:100%']))
            ->add('verified')
            ->add('clientDataFile','vich_file',array('label'=>'客户详细资料表','required'=>false))
            ->add('insurancePlan','vich_file',array('label'=>'保险建议书','required'=>false))
            ->add('client','entity',array(
                'class'=>'AppBundle\Entity\Client',
                'placeholder'=>'请选择所属客户，如新客户请留空',
                'required'=>false,
                'mapped'=>false,
                'choice_label'=>'name',
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('c')
                        ->where('c.agent = :agent')
                        ->setParameters(array('agent'=>$this->user_obj))
                        ->orderBy('c.id','ASC');
                }));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Insurance',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'insurance';
    }
}
