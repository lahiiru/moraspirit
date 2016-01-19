<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 11:49 AM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MainEventType extends  AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Sport Event' => 'sport',
                'Social Event' => 'social',

            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}