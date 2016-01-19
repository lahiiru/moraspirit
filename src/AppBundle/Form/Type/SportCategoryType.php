<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 7:25 PM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SportCategoryType extends  AbstractType
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

    /*
     *  Athletics
        Badminton
        Baseball
        Basketball
        Carrom
        Chess
        Cricket
        Elle
        Hockey
        Karate
        Netball
        Road Run
        Rowing
        Rugby
        Soccer
        Swimming
        Table Tennis
        Taekwondo
        Tennis
        Voleyball
        Weightlifting
        Wrestling
     */


}