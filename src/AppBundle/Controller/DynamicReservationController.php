<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 10:46 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DynamicAllocation;
use AppBundle\Form\Type\DynamicAllocationType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DynamicReservationController extends  Controller
{
    /**
     * @Route("/d", name="d")
     */

    public function dynamicAction(Request $request)
    {
        $resource = new DynamicAllocation();
        $formtitle = " Resource  Reservation";

        $form = $this->createForm(DynamicAllocationType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if ($data->getResourcetype() == 'NON') {
                return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(), 'title' => $formtitle, 'table' => false
                ));

            }
            else if (!($data->getResourcetype() == 'NON')&&($data->getResourceId()==null)) {

                if ($data->getResourcetype() == 'EQP') {
                    $row = ResourceAccess::getResourceAvalability('EQP');
                    $col = array_keys($row[0]);

                } elseif ($data->getResourcetype() == 'ROOM') {
                    $row = ResourceAccess::getResourceAvalability('ROOM');
                    $col = array_keys($row[0]);
                }
                return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(), 'title' => $formtitle, 'row' => $row, 'col' => $col, 'table' => true
                ));


            }
            else if (!($data->getResourcetype() == 'NON')&& !($data->getResourceId()==null)) {

                $data->setMemberId(1);
                print_r($data);
                $db = new DBAccess($data);

                $db->insert();

                //return $this->render('Profile/profile.html.twig', array(
                //    'form' => $form->createView(), 'title' => $formtitle, 'table' => false
                //));


            }






        }




        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }

    /**
     * @Route("/reserve", name="reserve")
     */

    public  function  reserve(Request $request){

        $resource = new DynamicAllocation();
        $formtitle = " Resource  Reservation";

        $form = $this->createForm(DynamicAllocationType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $result=$form->getData();

            if($result->getCatogory()=='SEQP'){
                return new RedirectResponse($this->generateUrl('reserve_sport'));

            }

            elseif ($result->getCatogory()=='OTHER')
            {
               return new RedirectResponse($this->generateUrl('reserve_other'));
            }



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }



    /**
     * @Route("/reserve/sport", name="reserve_sport")
     */

    public  function reserveSportAction(Request $request){

        $task = new DynamicAllocation();
        $formtitle = " Resource  Reservation";



        $form = $this->createFormBuilder($task)
            ->add('type_id', ChoiceType::class, array(
                'mapped'  => false,
                'choices' => $this->optionBuild(),
                'label'=>'Type'
            ))
                ->add('quntity',TextType::class, ['label' => 'Quntity'])
                ->add('comments',TextType::class, ['label' => 'Comments'])
                ->add('save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));

    }



    /**
     * @Route("/reserve/other", name="reserve_other")
     */

    public  function reserveOtherAction(Request $request){

        return $this->render('Profile/profile.html.twig'
        );
    }


    private function optionBuild($type){

        $r=ResourceAccess::getResourceAvalability($type);
        print_r($r);

        $r_id=array_keys($r);


    }





}
