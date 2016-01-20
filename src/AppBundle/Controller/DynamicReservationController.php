<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 10:46 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DynamicAllocation;
use AppBundle\Form\Type\DynamicAllocationType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DynamicReservationController extends  Controller
{



    /**
     * @Route("/reserve", name="reserve")
     */

    public  function  reserve(Request $request){

        $resource = new DynamicAllocation();
        $formtitle = " Resource  Reservation";

        $form = $this->createForm(DynamicAllocationType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $result=$form->getData();
            $date = date('Y-m-d', strtotime('01/13/2016'));

            if($result->getCatogory()=='SEQP'){
                return new RedirectResponse($this->generateUrl('reserve_sport'));

            }

            elseif ($result->getCatogory()=='OTHER')
            {
               return new RedirectResponse($this->generateUrl('reserve_other'));
            }



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }



    /**
     * @Route("/reserve/{slug}")
     * @Route("/reserve/sport", name="reserve_sport")
     * @Route("/reserve/other", name="reserve_other")
     *
     *
     */

    public  function reserveSportAction(Request $request, $slug){

        $task = new DynamicAllocation();
        $formtitle = " Resource  Reservation";


        if($slug=='sport'){
            $row = ResourceAccess::getResourceAvalability('SEQP');
        }
        else{
            $row = ResourceAccess::getResourceAvalability('OTHER');
        }

        $col = array_keys($row[0]);

        $form = $this->createFormBuilder($task)
            ->add('type_id', ChoiceType::class, array(
                'mapped'  => false,
                'choices' => $this->optionBuild("SEQP"),
                'label'=>'Type'
            ))
                ->add('quntity',IntegerType::class, ['label' => 'Quntity'])
                ->add('due_date',TextType::class,array('label'=>'Reservation period'  ,'attr'=>array('class'=>'form-control pull-right' , 'data-inputmask'=>"'alias': 'yyyy-mm-dd'" ,'data-mask' )))
                ->add('comments',TextType::class, ['label' => 'Comments'])
                ->add('save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            print_r($form->getData());

        }


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>true ,'row' => $row, 'col' => $col
        ));

    }




    /**
     * @Route("/blog/{slug}")
     */

    public  function reserveOtherAction(Request $request,$slug){
        print_r($slug);

        return $this->render('Profile/profile.html.twig'
        );
    }




    private function optionBuild($type){

        $result=ResourceAccess::getResourceAvalability($type);
        $option=array();

        foreach ($result as $item) {

            $option[$item['Name']]=$item['ID'];

        }


        return $option;


    }







}
