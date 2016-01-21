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
     * @Route("/testreg", name="home2")
     */

    public  function  testRegAction(Request $request){

        return $this->render('default/test.html.twig');

    }

    /**
     * @Route("/p", name="p")
     */


    public  function  profileAction(){

        return $this->render('Profile/profile.html.twig'
         );
    }
}
