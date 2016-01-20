<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 7:49 PM
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class MainEnrollmentType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Sport' => 'sport',
                'Event' => 'event',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }


}