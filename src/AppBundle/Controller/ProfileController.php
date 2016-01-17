<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:57 PM
 */

namespace AppBundle\Controller;


class ProfileController
{


    public  function  profileAction(){


        return $this->render('Profile/profile.html.twig'
        );
    }

}