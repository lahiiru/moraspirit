<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/14/16
 * Time: 8:31 PM
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BloodType extends  AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'A+' => 'A+',
                'A-' => 'A-',
                'B+' => 'B+',
                'B-' => 'B-',
                'O+' => 'O+',
                'O-' => 'O-',
                'AB+' => 'AB+',
                'AB-' => 'AB-',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}