<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:45 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Entity\StaticAllocation;
use AppBundle\Form\Type\StaticAllocationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;




class StaticAllocationContoller extends  Controller
{

    /**
     * @Route("/reserve/static", name="event_register")
     */

    public function staticAction(Request $request)
    {
        $staticResAlloc = new StaticAllocation();
        $title= "New Event Registration";

        $form = $this->createForm(StaticAllocationType::class, $staticResAlloc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false , 'profile'=>false
        ));
    }

}