<?php

/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/9/16
 * Time: 10:21 AM
 */
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class GenderType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Male' => 'Male',
                'Female' => 'Female',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}