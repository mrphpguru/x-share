<?php

namespace Xshare\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Xshare\GeneralBundle\Entity\Contact;
use Xshare\GeneralBundle\Form\ContactType;

class PageController extends Controller {

    /**
     * render the Contacts page
     * @return Response
     *
     * @Route("/{_locale}/contact/", name="xshare_contact" ,defaults={"_locale"="ro"}, requirements = {"_locale" = "ro|en"})
     * @Method({"GET","POST"})
     * @Template()
     */
    public function contactAction(){
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index_1"));
        $breadcrumbs->addItem($this->get('translator')->trans('Contacts'), $this->get("router")->generate("xshare_contact"));

        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        $request = $this->getRequest();

         if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $subject = 'Message from www.x-share.com';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareGeneralBundle:Page:contactEmail.html.twig', array('enquiry' => $contact));
                $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo("spasat@pentalog.fr")
                    ->setBody($body,"text/html");

                $this->get('mailer')->send($message);

                $this->get('session')->setFlash('rep', 'Data was sent successfully!');

                $em = $this->getDoctrine()
                       ->getEntityManager();
                $em->persist($contact);
                $em->flush();

                return $this->redirect($this->generateUrl('xshare_contact'));
            }
        }

        return $this->render("XshareGeneralBundle:Page:contact.html.twig",array(
            'form'=>$form->createView(),
            'menu'=>array("contact"=>true),
            'pagetitle'=>"Contact"
        ));
    }
    
}