<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 4:13 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Member;
use AppBundle\Form\Type\MemberType;
use AppBundle\Modal\DBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class MemberController extends  Controller
{


    public function newmemberAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $member = new Member();
        $title= "Student Registration";
        $date=date("Y-m-d") ;
        $member->setRegisterDate($date);
        $form = $this->createForm(MemberType::class, $member);

        /*$form->add('register_date', TextType::class, array(
            'label' => 'no','label_attr'=> array('style'=>'display: none;'),
            'attr'  => array('style'=>'display: none;')
        ));*/



        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $db= new DBAccess($member);

            print_r($member);
            print_r($member->getFacultyname());

            $db->insert();

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false
        ));


    }

}