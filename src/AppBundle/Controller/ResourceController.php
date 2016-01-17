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
        $resource->setState('PND');

        $formtitle="New Resource  Registration";

        $form = $this->createForm(ResourceType::class, $resource);

        $form->add('officer_id',\Symfony\Component\Form\Extension\Core\Type\IntegerType::class ,array('label'=>'Officer ID' , 'label_attr'=>array( 'for'=>"inputEmail3" ,'class'=>"col-sm-2 control-label"),'attr'=>array('class'=>'form-control' , 'placeholder'=>'Enter Mobile Number')))
            ->add('save', SubmitType::class, array('label' => 'Submit', 'attr'  => array('class' => 'btn btn-block btn-success btn-lg')));
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