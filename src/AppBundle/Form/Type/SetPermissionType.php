<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/15/16
 * Time: 11:44 AM
 */



namespace AppBundle\Form\Type;
use AppBundle\Entity\DynamicAllocation;
use AppBundle\Modal\ResourceAccess;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Tests\Formatter\TableCell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Console\Helper\Table;


class SetPermissionType  extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('o_id', ChoiceType::class, array(
                'mapped'  => true,
                'choices' =>  ResourceAccess::getMembers(),
                'label'=>'Officer Name'
            ))
            ->add('save', SubmitType::class, ['label' => 'Search']);
            $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                $form=$event->getForm();
                $form->remove('save', SubmitType::class, ['label' => 'Search']);
                $form->add('type',PermissionType::class,['label' => 'Permission'])
                ->add('save', SubmitType::class, ['label' => 'Apply']);

            });

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }



    private  function optionBuild(){

        $result=array();

        return $result;

    }

}
