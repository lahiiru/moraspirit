<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 2:10 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Event;
use AppBundle\Modal\DBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;




class EventController extends  Controller
{

    /**
     * @Route("/register/event1", name="event_register1")
     */

    public function eventAction(Request $request)
    {
        $event = array();
        $title= "New Event Registration";

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = new Event();
            print_r($form->getData());
            $formData = $form->getData();
            $event->setEventname($formData["eventname"]);
            $event->setTotalparticipant($formData["totalparticipant"]);
            $event->setEventtype($formData["eventtype"]);
            $event->setStartdate($formData["startdate"]);
            $event->setEnddate($formData["enddate"]);
            $event->setStarttime($formData["starttime"]);
            $event->setEndtime($formData["endtime"]);
            $event->setBudget($formData["budget"]);
            $event->setDescription($formData["description"]);
            $event->setLocation($formData["location"]);
            $event->setEventIncharge($formData["eventincharge"]);


            $db= new DBAccess($event);
            $db->insert();
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));
    }

}