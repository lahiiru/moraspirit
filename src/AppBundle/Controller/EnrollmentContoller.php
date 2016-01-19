<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 4:24 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DynamicAllocation;
use AppBundle\Form\Type\DynamicAllocationType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EnrollmentContoller extends  Controller
{
    /**
     * @Route("/enrollment", name="enrool")
     */

    public function enrollAction(){

    }

}