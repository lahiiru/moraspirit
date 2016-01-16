<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 2:55 AM
 */

namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ResourceAllocType  extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resource_id', TextType::class ,['label'=>'Resource ID'])
            ->add('member_id', TextType::class , ['label'=>'Member ID'])
            ->add('comments', TextType::class ,['label'=>'Comment'])
            ->add('issued_date', DateType::class ,['label'=>'Issued Date'])
            ->add('due_date', DateType::class ,['label'=>'Due Date'])
            ->add('save', SubmitType::class, array('label' => 'Submit'));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ResourceAllocation'
        ));
    }

}
