<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DynamicAllocation;
use AppBundle\Entity\Instructor;
use AppBundle\Entity\Member;
use AppBundle\Entity\Resource;
use AppBundle\Entity\ResourceAllocation;
use AppBundle\Form\Type\DynamicAllocationType;
use AppBundle\Form\Type\InstructorType;
use AppBundle\Form\Type\MemberType;
use AppBundle\Form\Type\ResourceAllocType;
use AppBundle\Form\Type\ResourceType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Student;
use Symfony\Component\Validator\Constraints\Date;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('base.html.twig');
    }


    /**
     * @Route("/home", name="userhome", defaults={"username" = 1})
     *
     */
    public function homeAction($username)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Post')->queryLatest();

        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate($query, $username, Post::NUM_ITEMS);
        $posts->setUsedRoute('blog_index_paginated');

        return $this->render('blog/index.html.twig', array('posts' => $posts));
    }



    /**
     * @Route("/student_registration", name="student_registration")
     */
    public function memberAction(Request $request)
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



    /**
     * @Route("/resourse_allocation", name="home")
     */
    public function resourceAllocation(Request $request)
    {
        // create a task and give it some dummy data for this example
        $resourceallocation = new ResourceAllocation();
        $title= "Resource Allocation";
        $form = $this->createForm(ResourceAllocType::class, $resourceallocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $db= new DBAccess($resourceallocation);
            $db->insert();

        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView() , 'title'=>$title
        ));

    }



    /**
     * @Route("/instructor_registration", name="instructor_registration")
     */

    public  function  instructorAction(Request $request){
        $instuctor =new Instructor();
        $formtitle="Instructor Registration";

        $form = $this->createForm(InstructorType::class, $instuctor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $db= new DBAccess($instuctor);
            $db->insert();

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle , 'table'=>false
        ));


    }

    /**
     * @Route("/resource_registration", name="resource_registration")
     */

    public  function  resourceAction(Request $request){
        $resource =new Resource();
        $formtitle="New Resource  Registration";

        $form = $this->createForm(ResourceType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $db= new DBAccess($resource);
            $db->insert();

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle ,'table'=>false
        ));


    }

    /**
     * @Route("/reservation", name="reservation")
     */

    public  function  dlAction(Request $request){
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


    /**
     * @Route("/testreg", name="home2")
     */

    public  function  testRegAction(Request $request){

        return $this->render('default/test.html.twig');

    }

    /**
     * @Route("/p", name="homeddf")
     */


    public  function  profileAction(){

        return $this->render('Profile/profile.html.twig'
         );
    }


    /**
     * @Route("/calender", name="user_profile")
     *
     */


    public  function  calenderAction(){

        return $this->render('Calender/calender.html.twig'
        );
    }



}
