<?php

namespace Xshare\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Route("/private")
 */
class SecurityController extends Controller {

  /**
   * checks the result of login attempt
   * @Route("/login", name="_login")
   * @Method({"GET","POST"})
   * @Template()
   */
  public function loginAction() {
    if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
      $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
          
      $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
    }
    return array(
      'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
      'error' => $error,
      'referer' => $this->getRequest()->getRequestUri(),  
    );
  }

  /**
   * @Route("/login_check", name="_security_check")
   */
  public function securityCheckAction() {
    // The security layer will intercept this request
  }

  /**
   * @Route("/logout", name="_logout")
   */
  public function logoutAction() {
    // The security layer will intercept this request
  }


  /**
   * renders the wellcome layout
   * @Route("/welcome", name="welcome")
   * @Template()
   */
  public function welcomeAction() {
    //remove request garbage for logged user 
    $isverified = $this->get('request')->getSession()->get("garbageRequestsVerified");
    if($isverified){
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user    = $this->get('security.context')->getToken()->getUser();
        }
        $em = $this->getDoctrine()->getEntityManager();
        foreach ($user->getRequests() as $req){
            //check if is not expired and is not accepted
            if($req->getBorrowDate() < new \DateTime("midnight") AND $req->getBookingId() == NULL){
                $to = $user->getEmail();
                $subject = 'Loan request expired';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:expiredRequestsMail.html.twig', array('request' => $req));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");

                //send
                $this->get('mailer')->send($mail_message);
                //remove request
                $em->remove($req);
                $em->flush();
            }
        }
        unset($req);
        foreach($user->getProducts() as $product){
            foreach($product->getRequests() as $req){
                //check if is not expired and is not accepted
                if($req->getBorrowDate() < new \DateTime("midnight") AND $req->getBookingId() == NULL){
                $to = $req->getUser()->getEmail();
                $subject = 'Loan request expired';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:expiredRequestsMail.html.twig', array('request' => $req));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");
                //send
                $this->get('mailer')->send($mail_message);
                //remove request
                $em->remove($req);
                $em->flush();
            }
            }
        }
        $this->get('request')->getSession()->set("garbageRequestsVerified","1");
    }
    
    return $this->render('XshareSecurityBundle:Security:welcome.html.twig');
  }

}
