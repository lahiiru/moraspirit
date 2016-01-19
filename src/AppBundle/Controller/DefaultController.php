<?php
//nub
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
     * @Route("/resourse_allocation", name="home")
     */
    public function resourceAllocation(Request $request)
    {
        // create a task and give it some dummy data for this example
        $resourceallocation = new DynamicAllocation();
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
       // $user = $this->get('security.token_storage')->getToken()->getUser();


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
