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


class EnrollEventType extends  AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('Event', ChoiceType::class, array(
                'mapped' => false,
                'choices' => $this->getEventId(),
                'label' => 'Event'
            ))
            ->add('save', SubmitType::class, array('label' => 'Se', 'attr' => array('class' => 'btn btn-block btn-success btn-lg')));

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {

            $form = $event->getForm();


            $form->remove('save', SubmitType::class, ['label' => 'Search']);


            $form->add('Event', ChoiceType::class ,array('label'=>'Event','attr'  => array("disabled"=>"true")));

            $form->add('save', SubmitType::class, ['label' => 'Submit']);



        });
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array());

    }

    private function getEventId()
    {
        return array('Spitzer' => 1, 'Noeya' => 2, 'Inter University Game' => 3);

    }




}
