<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/6/16
 * Time: 11:18 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\SecurityContextInterface;



class SecurityController extends Controller
{



    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'Security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     *  @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction()
    {
        return $this->redirectToRoute('homepage');
    }




    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        return $this->redirectToRoute('login_route');
    }



}