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
use AppBundle\Modal\ResourceAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $formtitle = "New Resource  Registration";

        $form = $this->createForm(DynamicAllocationType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            print_r($data);


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


                return $this->render('Profile/profile.html.twig', array(
                    'form' => $form->createView(), 'title' => $formtitle, 'table' => false
                ));


            }


        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }

}
