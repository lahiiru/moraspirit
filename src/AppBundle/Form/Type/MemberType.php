<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 2:30 AM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



use Symfony\Component\Form\AbstractType;

class MemberType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('first_name', TextType::class ,array('label'=>'First Name' , 'label_attr'=>array( 'for'=>'inputEmail3' ), 'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter First Name')))
            ->add('last_name', TextType::class , array('label'=>'Last Name' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Last Name')))
            ->add('gender', GenderType::class , array('label'=>'Gender' , 'attr'=>array('class'=>"form-control select2" )))
            ->add('birthday',TextType::class,array('label'=>'Birth Day'  ,'attr'=>array('class'=>'form-control' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
            ->add('bloodgroup', BloodType::class , array('label'=>'Blood Group' ,'attr'=>array('class'=>'select2-selection__rendered', 'style'=>'width: 100%;' )))
            ->add('index_nu', TextType::class ,array('label'=>'Student ID','attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Student id ( eg . 140678N )')))
            ->add('facultyname', FacultyType::class , array('label'=>'Faculty','attr'=>array('class'=>'form-control' ,)))
          /*  ->add('dept_name', ChoiceType::class, array(
                'mapped'  => false,
                'choices' => array('NON'=>'NON'),
                'label'=>'Department Name'
            ))*/
            ->add('dept_name', TextType::class , array('label'=>'Department Name','attr'=>array('class'=>'form-control' ,)))
            ->add('nic', TextType::class ,array('label'=>'NIC Number' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter NIC')))
            ->add('mobile', TextType::class ,array('label'=>'Mobile Number' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control','data-inputmask'=>'&quot;mask&quot;: &quot;(999) 999-9999&quot;' ,'data-mask'=>'')))
            ->add('email', EmailType::class ,array('label'=>'Email' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control','placeholder'=>'Enter Email')))
            ->add('address', TextType::class ,array('label'=>'Address' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Addressr')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success' ,'style'=>"height:50px;width:100px")));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Member'
        ));
    }



}