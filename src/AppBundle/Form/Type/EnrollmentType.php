<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 3:53 PM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;


class EnrollmentType extends  AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('type', MainEventType::class ,array('label'=>'Event'))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr' => array('class' => 'btn btn-block btn-success btn-lg')));

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {

            $form = $event->getForm();

            $d=$form->getData();
            print_r($d);
            $form->remove('save', SubmitType::class, ['label' => 'Search']);


            $form->add('type', MainEventType::class ,array('label'=>'Event','attr'  => array("disabled"=>"true")));

            $form->add('save', SubmitType::class, ['label' => 'Submit']);



        });
    }







}
