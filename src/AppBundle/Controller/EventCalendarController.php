<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2016-01-20
 * Time: 10:02 PM
 */
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


class EventCalendarController extends Controller{

    /**
     * @Route("/calendar", name="user_profile")
     *
     */
    public  function  calenderAction(){
        return $this->render('Calender/calendar.html.twig',["v1"=>"test"]
        );
    }
}