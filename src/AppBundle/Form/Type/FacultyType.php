<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 4:06 AM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FacultyType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Faculty of Engineering' => 'efac',
                'Faculty of Archichture' => 'arfac',
                'Faculty of Information Technology' => 'fit',
                'Institute of Technology'=>'ndt'
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}