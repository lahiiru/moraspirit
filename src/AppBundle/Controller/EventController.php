<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 2:10 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;




class EventController extends  Controller
{

    /**
     * @Route("/register/event", name="event_register")
     */

    public function indexAction(Request $request)
    {
        $event = new Event();
        $title= "New Event Registration";

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));
    }

}