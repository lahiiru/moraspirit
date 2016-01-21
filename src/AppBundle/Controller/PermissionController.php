<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 12:00 PM
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\MemberRoleType;
use AppBundle\Form\Type\SetPermissionType;
use AppBundle\Form\Type\SetPermisssionType;
use AppBundle\Modal\ResourceAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class PermissionController extends  Controller
{

    /**
     * @Route("/permission", name="permission")
     *
     */

    public  function  setPermissionAction(Request $request){

        $data=array();
        $title= "Set Permission";
        $form = $this->createForm(SetPermissionType::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newdata=$form->getData();
            if(!($newdata["o_id"]==null)&&$newdata["type"]==null){

                return $this->render('default/index.html.twig', array(
                    'form' => $form->createView() , 'title'=>$title ,'table'=>false ,'profile'=>true
                ));
            }
           elseif(!($newdata["type"]==null))
           {
               ResourceAccess::updateRole($newdata["o_id"],$newdata["type"]);
               return new RedirectResponse($this->generateUrl('permission'));

           }



        }





        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false ,'profile'=>false
        ));


    }





}