<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 4:13 PM
 */

namespace AppBundle\Controller;
// "ALTER TABLE `app_user` ADD UNIQUE(`email`);"

use AppBundle\Entity\Member;
use AppBundle\Form\Type\MemberType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class MemberController extends  Controller
{
    /**
     * @Route("/register/member/check", name="student_check")
     */
    public function checkMemberAction(Request $request){
        $data = array();
        $err = $request->query->get('error_description');
        $form = $this->createFormBuilder($data)
            ->add('email_check', EmailType::class, ['label' => "Enter the email first"])
            ->add('Check',SubmitType::class, ['label' => "Check"])
            ->getForm();

        $form->handleRequest($request);
        $params = array(
                    'form' => $form->createView() ,
                    'title'=>"Member registration" ,
                    'table'=>false,
                    'profile'=>false
                 );
        if($err!=null){
            $params=array_merge($params,['error_description'=>$err]);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $r=new Modal\DBQuery();
            $t=$r->isEmailPresent($form->getData()['email_check']);
            if(!$t){
                return $this->redirect($this->generateUrl('student_nregistration', array('email' => $form->getData()['email_check'])));
            }else{
                $params=array_merge($params,['error_description'=>'Email is not available']);
            }

        }
        return $this->render('default/index.html.twig', $params);
    }
    /**
     * @Route("/register/member/{email}", name="student_nregistration")
     */
    public function newmemberAction(Request $request,$email)
    {
        $member = new Member();
        $member ->setEmail($email);
        $title= "Student Registration";
        $date=date("Y-m-d") ;
        $member->setRegisterDate($date);
        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $db= new DBAccess($member);
            $id=$db->insert();
            if(!$id){
                return $this->redirect($this->generateUrl('student_check', array('error_description'=>'Email is not available')));
            }else{
                return $this->redirect($this->generateUrl('student_check', array('error_description'=>'New member added with DI '.$id)));
            }
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() , 'title'=>$title ,'table'=>false , 'profile'=>false
        ));


    }


}