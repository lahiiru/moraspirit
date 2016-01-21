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

class PermissionType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Member' => 'ROLE_USER',
                'Officer' => 'ROLE_OFF',
                'Instructor' => 'ROLE_INS',
                'Admin' => 'ROLE_ADMIN',

            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}