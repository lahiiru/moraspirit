<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 6:19 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\NewResourceType;
use AppBundle\Entity\Resource;
use AppBundle\Form\Type\ResourceType;
use AppBundle\Modal\DBAccess;
use AppBundle\Modal\ResourceAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ResourceController extends  Controller
{

    /**
     * @Route("/register/resource", name="resourceregistration")
     */

    public  function  resourceAction(Request $request){
        $resource =new Resource();

        $formtitle="New Resource  Registration";
        $form = $this->createForm(ResourceType::class, $resource);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $db= new DBAccess($resource);
            $resource->setRegDate(date("Y-m-d") );

            $db->insert();
            return new RedirectResponse($this->generateUrl('resourceregistration'), array('error_description'=>'you are successfully completed your action'));

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle ,'table'=>false
,  'profile'=>false        ));


    }

    /**
     * @Route("/register/newresourcetype", name="new_esource_type_registration")
     */

    public  function  newresourcetypeAction(Request $request){
        $resource =new NewResourceType();

        $formtitle="New Resource Type";
        $form = $this->createFormBuilder($resource)
            ->add('name',\Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label' => 'Resource Name'])
            ->add('o_id', ChoiceType::class, array(
            'mapped'  => true,
            'choices' => $this->getOfficername(),
            'label'=>'Officer Name'
        ))


            ->add('save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $db= new DBAccess($resource);
            $db->insert();
            return new RedirectResponse($this->generateUrl('new_esource_type_registration'), array('error_description'=>'you are successfully completed your action'));



        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle ,'table'=>false , 'profile'=>false
        ));


    }

    private  function  getOfficername(){
        return ResourceAccess::getOfficer();
    }


}