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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle ,'table'=>false
        ));


    }

    /**
     * @Route("/register/newresourcetype", name="new_esource_type_registration")
     */

    public  function  newresourcetypeAction(Request $request){
        $resource =array();

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
            var_dump($form->getData());

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),'title'=>$formtitle ,'table'=>false
        ));


    }

    private  function  getOfficername(){
        return array('Saman'=>1, 'Nimal'=>4 );
    }


}