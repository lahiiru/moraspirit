<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 6:19 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Resource;
use AppBundle\Form\Type\ResourceType;
use AppBundle\Modal\DBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ResourceController extends  Controller
{

    /**
     * @Route("/register/resource", name="resourceregistration")
     */

    public  function  resourceAction(Request $request){
        $resource =new Resource();
        $resource->setRegDate(date("Y-m-d") );
        $resource->setState('AVL');
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

}