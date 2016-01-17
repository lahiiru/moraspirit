<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 12:12 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ApproveReservationController extends  Controller
{

    /**
     * @Route("/approve/reservation", name="approve_reservation")
     *
     */

    public function contactAction(Request $request)
    {
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('sportid', TextType::class ,array('label'=>'Sport ID' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'), 'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter First Name')))
            ->add('title', TextType::class , array('label'=>'Title' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Last Name')))
            ->add('type', TextType::class ,array('label'=>'Type' , 'label_attr'=>array( 'for'=>"inputEmail3", 'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Student id ( eg . 140678N )')))
            ->add('totalplayers', TextType::class ,array('label'=>'Total Players' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Mobile Number')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success btn-lg')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }


        $title= "New Event Registration";
        return $this->render('UserInterface/approve.html.twig', array(
            'form' => $form->createView(), 'title'=>$title ,'table'=>false
        ));


        // ... render the form
    }

    public function  approveAction(Request $request)
    {









}}

