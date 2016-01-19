<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/15/16
 * Time: 11:44 AM
 */

namespace AppBundle\Form\Type;


namespace AppBundle\Form\Type;
use AppBundle\Entity\DynamicAllocation;
use AppBundle\Modal\ResourceAccess;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Tests\Formatter\TableCell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Console\Helper\Table;


class DynamicAllocationType  extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('resourcetype', ReserveResourceType::class ,['label'=>'Type'])
            ->add('save', SubmitType::class, ['label' => 'Search'])

        ;
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {

            $form = $event->getForm();

            /*$form->add('resource_id', ChoiceType::class, array(
                'mapped'  => false,
                'choices' => $this->optionBuild(),
                'label'=>'Resource ID'
            ));
            */

            $form->remove('save', SubmitType::class, ['label' => 'Search']);


            $form->add('resourcetype', ReserveResourceType::class ,array('label'=>'Type','attr'  => array("disabled"=>"true")))
                ->add('resource_id',TextType::class,['label'=>'Resource ID'])
                ->add('issued_date',TextType::class,array('label'=>'Reserved Date'  ,'attr'=>array('class'=>'form-control pull-right' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
                ->add('due_date',TextType::class,array('label'=>'Due Date'  ,'attr'=>array('class'=>'form-control' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
               // ->add('issued_date', DateType::class,['label'=>'Reserved Date'])
                // ->add('due_date', DateType::class,['label'=>'Due Date'])
                 ->add('comments',TextType::class, ['label' => 'Comments']);

            $form->add('save', SubmitType::class, ['label' => 'Submit']);



        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DynamicAllocation'
        ));
    }

    private  function optionBuild(){
        $s=ResourceAccess::getResourceAvalability();
        $result=array();
        $result[$s[0]['r_ID']]='a';
        $result[$s[1]['r_ID']]='a';

        return $result;



    }

}
