<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/7/16
 * Time: 9:58 AM
 */

namespace AppBundle\Controller;
use AppBundle\Modal\DBAccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $db=new DBAccess($user);
            $db->resetPassword($password);

            // 4) save the User!

            // ... do any other work - like send them an email, etc
            // maybe set a "flash" success message for the user
            return $this->redirectToRoute('homepage');
        }
        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView(),'table'=>false,'title'=>"nuwan" , 'profile'=>false)
        );
    }
}