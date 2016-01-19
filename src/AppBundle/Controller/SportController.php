<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 9:03 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Sport;
use AppBundle\Form\Type\SportType;
use AppBundle\Modal\DBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SportController extends  Controller
{
    /**
     * @Route("/register/sport", name="sport_register")
     */

    public function sportAction(Request $request)
    {
        $sport = new Sport();
        $title= "New Sport Registration";

        $form = $this->CreateForm(SportType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $db= new DBAccess($sport);
            print_r($sport);
            $db->insert();


        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));
    }

}