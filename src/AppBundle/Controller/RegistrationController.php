<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/7/16
 * Time: 9:58 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $member = new Member();
        $form = $this->createFormBuilder($member)
            ->add('first_name', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword('$2y$13$vHuOwbQ3EMPnvxbqy/5lS.psOqwWkCvA.fHicfesWdIA7Gpi7vem6');

            // 4) save the User!
            var_dump($user);

            // ... do any other work - like send them an email, etc
            // maybe set a "flash" success message for the user

            //return $this->redirectToRoute('homepage');
        }

        $title= "New User Registration";
        return $this->render('registration/register.html.twig', array(
            'form' => $form->createView(), 'title'=>$title ,'table'=>false
        ));
    }
}