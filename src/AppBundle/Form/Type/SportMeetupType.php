<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/15/16
 * Time: 12:43 PM
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SportMeetupType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sport', EntityType::class, array(
                'class'       => 'AppBundle:Sport',
                'placeholder' => '',
            ))
        ;

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $sport = $data->getSport();
                $positions = null === $sport ? array() : $sport->getAvailablePositions();

                $form->add('position', EntityType::class, array(
                    'class'       => 'AppBundle:Position',
                    'placeholder' => '',
                    'choices'     => $positions,
                ));
            }
        );
    }


}