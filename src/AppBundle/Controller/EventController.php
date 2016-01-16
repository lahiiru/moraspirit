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


class EventController extends  Controller
{

    /**
     * @Route("/register/event", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $event = new Event();
        $title= "New Event Registration";
        $date=date("Y-m-d") ;

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));
    }

}