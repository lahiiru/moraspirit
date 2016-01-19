<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 6:25 PM
 */

namespace AppBundle\Controller;


class DynamicAllocationController
{
    public  function  dynamicallocationAction(Request $request){
        $resource =new DynamicAllocation();
        $formtitle="New Resource  Registration";

        $form = $this->createForm(DynamicAllocationType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();


            if($data->getResourcetype()=='NON'){
                return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(),'title'=>$formtitle, 'table'=>false
                ));

            }

            else if (!($data->getResourcetype()=='NON') ){

                if($data->getResourcetype()=='EQP' ){
                    $row=ResourceAccess::getResourceAvalability('EQP');
                    $col=array_keys($row[0]);

                }
                elseif($data->getResourcetype()=='ROOM'){
                    $row=ResourceAccess::getResourceAvalability('ROOM');
                    $col=array_keys($row[0]);
                }
                return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(),'title'=>$formtitle, 'row'=>$row,'col'=>$col ,'table'=>true
                ));
            }
        }


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle,'table'=>false
        ));



    }

}