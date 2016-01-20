<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/14/16
 * Time: 1:37 AM
 */

namespace AppBundle\Form\Type;


use AppBundle\Modal\ResourceAccess;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;


class ResourceType extends  AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('category', ReserveResourceType::class ,array('label'=>'category' ))
            ->add('type_id', ChoiceType::class, array(
                'mapped'  => true,
                'choices' => $this->getType(),
                'label'=>'Type'
            ))
            ->add('value', MoneyType::class , array('label'=>'Value' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Last Name')))

            ->add('description', TextType::class ,array('label'=>'Description' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Student id ( eg . 140678N )')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success btn-lg')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Resource'
        ));

    }

    private function getType(){
        $type=ResourceAccess::getResourceType();
        $result=array();

        foreach($type as  $item){

            $result[$item['name']]=$item['type_id'];

        }


        return $result;

    }

}