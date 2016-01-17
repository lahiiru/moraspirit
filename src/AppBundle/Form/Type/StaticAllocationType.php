<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:18 PM
 */

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


class StaticAllocationType  extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('day', DayType::class, ['label' => 'Day'])
            ->add('slotname' , ChoiceType::class ,array( 'mapped'=>false , 'choices'=>$this->timeslot()))
            ->add('resourcetype' , ReserveResourceType::class ,['label' => 'Resource Type'])
            ->add('save', SubmitType::class, ['label' => 'Search']);

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {

            $form = $event->getForm();
            $form->remove('save', SubmitType::class, ['label' => 'Search']);


            $form->add('day', ReserveResourceType::class, array('label' => 'Day', 'attr' => array("disabled" => "true")))
                ->add('slotname', ReserveResourceType::class, array('label' => 'Slot Name', 'attr' => array("disabled" => "true")))
                ->add('resourcetype', ReserveResourceType::class, array('label' => 'Resource Type', 'attr' => array("disabled" => "true")))
                ->add('resourceid', TextType::class, ['label' => 'Resource ID'])
                ->add('maximumplayers', TextType::class, ['label' => 'Maximum Players'])
                ->add('sportid', TextType::class, ['label' => 'Sport ID'])
                ;

            $form->add('save', SubmitType::class, ['label' => 'Submit']);


        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\StaticAllocation'
        ));
    }

    private function timeslot()
    {

        $result=array();
        $result['08 AM - 10 AM']='A';
        $result['10 AM - 12 AM']='B';
        $result['12 AM - 01 PM']='C';

        return $result;


    }

}