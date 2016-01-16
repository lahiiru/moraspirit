<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 2:17 AM
 */

namespace AppBundle\Form\Type;


use Doctrine\DBAL\Types\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;



class EventType extends  AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventname', TextType::class ,array('label'=>'Event Name' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'), 'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter First Name')))
            ->add('eventtype', TextType::class , array('label'=>'Event Type' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Last Name')))
            ->add('description', TextType::class ,array('label'=>'Description' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Student id ( eg . 140678N )')))
            ->add('location', TextType::class ,array('label'=>'Location' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Mobile Number')))
            ->add('startdate', DateType::class ,array('label'=>'Start Date'))
            ->add('enddate', DateType::class ,array('label'=>'End Date'))
            ->add('starttime', TimeType::class ,array('label'=>'Start Time'))
            ->add('endtime', TimeType::class ,array('label'=>'End Time'))
            ->add('totalparticipant', TextType::class ,array('label'=>'Toatal Partticipant'))
            ->add('budget', TextType::class ,array('label'=>'Budget'))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success btn-lg')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Resource'
        ));

    }

}