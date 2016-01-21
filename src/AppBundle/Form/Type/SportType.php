<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 9:39 AM
 */

namespace AppBundle\Form\Type;



use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;

class SportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', TextType::class , array('label'=>'Title' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Last Name')))
            ->add('type', TextType::class ,array('label'=>'Type' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Student id ( eg . 140678N )')))
            ->add('totalplayers', TextType::class ,array('label'=>'Total Players' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Mobile Number')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('style'=>"height:50px;width:100px",'class' => 'btn btn-block btn-success btn-lg')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sport'
        ));

    }

}