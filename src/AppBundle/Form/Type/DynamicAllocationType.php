<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/15/16
 * Time: 11:44 AM
 */

namespace AppBundle\Form\Type;


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


class DynamicAllocationType  extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('catogory', ReserveResourceType::class ,['label'=>'Type'])
            ->add('issued_date',TextType::class,array('label'=>'Reservation period'  ,'attr'=>array('class'=>'form-control pull-right' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
            ->add('due_date',TextType::class,array('label'=>'Due Date'  ,'attr'=>array('class'=>'form-control' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
            ->add('save', SubmitType::class, ['label' => 'Search'])

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DynamicAllocation'
        ));
    }

    private  function optionBuild(){

        $result=array('Ball'=>1,'NetBall'=>2,'Fool'=>3);


        return $result;



    }

}
