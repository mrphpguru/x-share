<?php

namespace Xshare\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Xshare\UserBundle\Entity\User;
use Xshare\UserBundle\Form\UserType;
use Xshare\SecurityBundle\Entity\UserForgot;
use Xshare\SecurityBundle\Form\UserForgotType;

/**
 * Description of RegistrationController
 *
 * @author cchiu
 */
class RegistrationController extends Controller {

   /**
    * @author cchiu
    * registration form
    * 
    * @Route("/{_locale}/register", name="user_registration", defaults={"_locale"="ro"}, requirements = {"_locale" = "ro|en"})
    * @Method({"GET","POST"})
    */
    public function registerAction()
    {
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Register'), null);
        
        $user = new User();
        $form = $this->createForm(new UserType(), array('user' => $user ,'choiceW' => $this->get('translator')->trans('Female'), 'choiceM' => $this->get('translator')->trans('Male')));
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            
            if ($form->isValid()) {
                // the validation passed, do something with the $user object
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                $this->get('session')->setFlash('registration-notice', $this->get('translator')->trans('The registration was successful') );
                return $this->redirect($this->generateUrl('user_registration'));
            }
        }

        return $this->render('XshareSecurityBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
            'user' => $user
        ));
    }



  /**
   * This is the controller for forgot password functionality
   * @Route("/{_locale}/forgot", name="user_forgot_password", defaults={"_locale"="ro"}, requirements = {"_locale" = "ro|en"})
   * @Method({"GET","POST"})
   */
    public function forgotAction()
    {
        $user = new UserForgot();
        $form = $this->createForm(new UserForgotType(), $user);
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // the validation passed, do something with the $user object
                $em = $this->getDoctrine()->getEntityManager();

                $decriptedPass = $user->getPassword();
                //encoding of password
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);

                //update password and selt fields of table User for this user
                $result = $em->getRepository('XshareUserBundle:User')->updatePassword($user->getPassword(), $user->getSalt(), $user->getUsername());

                if($result){

                    // get user email to send the message
                    $userInfo =  $em->getRepository('XshareUserBundle:User')->findOneByUsername($user->getUsername());//'cchiu@pentalog.fr';
                    //send message to the user with his credentials
                    $to = $userInfo->getEmail();
                    $subject = 'Password modification';
                    $subject = $this->get('translator')->trans($subject);
                    $body = $this->renderView('XshareSecurityBundle:Registration:forgotPasswordEmail.html.twig', array('user' => $user, 'password' => $decriptedPass));
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom('contactbot@xshare.com')
                        ->setTo($to)
                        ->setBody($body,"text/html");

                    //send
                    try{
                        $this->get('mailer')->send($message);
                    }
                    catch(Exception $e){
                        $this->get('session')->setFlash('notice', $this->get('translator')->trans('Send message failed') );
                        return $this->redirect($this->generateUrl('user_forgot_password'));
                    }


                    $this->get('session')->setFlash('notice', $this->get('translator')->trans('The registration of new password was successful') );
                } else {
                    $this->get('session')->setFlash('notice', $this->get('translator')->trans('The registration of new password failed') );
                }

                return $this->redirect($this->generateUrl('user_forgot_password'));
            }
        }

        return $this->render('XshareSecurityBundle:Registration:forgotPassword.html.twig', array(
            'form' => $form->createView(),
            'user' => $user
        ));
    }

}
