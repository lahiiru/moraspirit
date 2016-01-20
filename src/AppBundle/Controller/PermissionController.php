<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 12:00 PM
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\MemberRoleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('member_id', TextType::class ,array('label'=>'Sport ID' , 'label_attr'=>array( 'for'=>'inputEmail3' ,'class'=>'col-sm-2 control-label'), 'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter First Name')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success btn-lg')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



        }


        $title= "Set Permission";


        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));


    }

    /**
     * Creates a new Demo entity.
     *
     * @Route("/getdata", name="getdata")
     * @Method("POST")
     *
     */

    public  function  getAction(){

        return new JsonResponse(array('message' => 'Success!'), 200);
    }




}