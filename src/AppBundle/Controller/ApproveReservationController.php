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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ApproveReservationController extends  Controller
{

    /**
     * @Route("/approve", name="approve")
     *
     */

    public function contactAction(Request $request)
    {
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('query', 'text')
            ->add('category', 'choice',
                array('choices' => array(
                    'judges'   => 'Judges',
                    'interpreters' => 'Interpreters',
                    'attorneys'   => 'Attorneys',
                )))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }


        $title= "New Event Registration";
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(), 'title'=>$title ,'table'=>false
        ));


        // ... render the form
    }

    public function  approveAction(Request $request)
    {









}}

