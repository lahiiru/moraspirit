<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 12:12 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ApproveReservationController extends  Controller
{


    public function  approveAction(Request $request)
    {

        $title= "New Event Registration";

        $form = $this->createFormBuilder()
            ->add('task', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));


}}

