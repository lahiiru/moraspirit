<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:30 PM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DayType extends  AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Monday' => 'MON',
                'Thursday' => 'THE',
                'Wednesday' => 'WED',
                'Thursday' => 'THU',
                'Friday' => 'FRI',
                'Saturday' => 'SAT',
                'Sunday' => 'SUN',

            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

}