<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 4:24 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DynamicAllocation;
use AppBundle\Entity\Member;
use AppBundle\Form\Type\DynamicAllocationType;
use AppBundle\Form\Type\EnrollmentType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class EnrollmentContoller extends  Controller
{
    /**
     * @Route("/enrollment", name="enroll")
     */

    public function enrollAction(Request $request){
        $resource = array();
        $formtitle = "Enrollment";

        $form = $this->createForm(EnrollmentType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $result=$form->getData();
            if($result['type']='sport')
            {
                return new RedirectResponse($this->generateUrl('enroll_event'));

            }

            elseif($result['type']='social'){
                return new RedirectResponse($this->generateUrl('enroll_sport'));
            }

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }


    /**
     * @Route("/enrollment/event", name="enroll_event")
     */

    public function eventenrollAction(){

        return $this->render('Profile/profile.html.twig'
        );


    }

    /**
     * @Route("/enrollment/sport", name="enroll_sport")
     */

    public function sportenrollAction(){


    }

    private function  getEvent(){

    }




    public function create1Action(Request $request)
    {
        //This is optional. Do not do this check if you want to call the same action using a regular request.
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }

        $entity = new Member();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('AcmeDemoBundle:Demo:form.html.twig',
                    array(
                        'entity' => $entity,
                        'form' => $form->createView(),
                    ))), 400);

        return $response;
    }



}