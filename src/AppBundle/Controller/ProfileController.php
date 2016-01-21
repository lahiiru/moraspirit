<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:57 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


class ProfileController
{


    /**
     * @Route("/user_profile1", name="user_profile")
     *
     */

    public  function  profileAction(){


        return $this->render('Profile/profile.html.twig'
        );
    }

}