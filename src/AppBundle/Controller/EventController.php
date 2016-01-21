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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;




class EventController extends  Controller
{

    /**
     * @Route("/register/event1", name="event_register1S")
     */

    public function eventAction(Request $request)
    {
        $event = new Event();
        $title= "New Event Registration";

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $date=explode( '-', $event->getDaterange());

            $event->setStartdate((date('Y-m-d', strtotime($date[0]))));
            $event->setEnddate(date('Y-m-d', strtotime($date[0])));
            $event->setStarttime($event->getStarttime()->getTimestamp());
            $event->setEndtime( $event->getEndtime()->getTimestamp());

            var_dump($event);

            $db= new DBAccess($event);
            $db->insert();
            return new RedirectResponse($this->generateUrl('event_register1S'), array('error_description'=>'you are successfully completed your action'));
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false ,'profile'=>false
        ));
    }

}