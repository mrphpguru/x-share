<?php

namespace Xshare\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Xshare\UserBundle\Repository\User;
use Xshare\PollBundle\Entity\Poll;
use Xshare\PollBundle\Form\PollType;
use Xshare\PollBundle\Entity\PollResult;

use MakerLabs\PagerBundle\Pager;

/**
 * Description of PollController
 *
 * @author s.pasat
 */
class PollController extends Controller {
    
   /**
    * @Route("/poll/new", name="xshare_new_poll")
    * @Method({"GET","POST"})
    * @Template()
    * 
    * create new poll
    * access only Administrator
    */
    public function createAction(){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $user   = $this->get('security.context')->getToken()->getUser();
        if($user->getTypeAccess()!='admin'){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
       
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Polls'), $this->get("router")->generate("xshare_poll_list_first"));
        $breadcrumbs->addItem($this->get('translator')->trans('New Poll'), null);
        
        $poll = new Poll();
        $poll->setStatus(true);
        //create form
        $pollForm = $this->createForm(new PollType(), $poll);
        
        $request = $this->getRequest();      
        //check if the user has submited the form
         if ($request->getMethod() == 'POST') {
            $pollForm->bindRequest($request);
            if ($pollForm->isValid()) {
              
              $em = $this->getDoctrine()->getEntityManager();
              $em->persist($poll);
              $em->flush();
              
              $this->get('session')->setFlash('rep', 'You have successfully added a new poll!');
              return $this->redirect($this->generateUrl('xshare_new_poll'));
            }
         }
        $data=array(
            'user'=>$user,
            'form'=>$pollForm->createView(),
            'pagetitle' => $this->get('translator')->trans('Add a new Poll')
        );
        
        return $this->render("XsharePollBundle:Poll:createPoll.html.twig",$data);
    }
    
   /**
    * @Route("/poll/list/{page}", name="xshare_poll_list", requirements = {"page" = "\d+"})
    * @Route("/poll/list/", name="xshare_poll_list_first" )
    * @Template()
    * 
    * list of all polls
    * access only Administrator
    */
    
    public function listAction($page=1){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $user   = $this->get('security.context')->getToken()->getUser();
        if($user->getTypeAccess()!='admin'){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Polls'), null);
        
        
        $em   = $this->getDoctrine()->getEntityManager();
        $polls = $em->getRepository("XsharePollBundle:Poll")->getAllPolls();
        $polls_per_page = $this->container->getParameter('max_polls_per_page');
        $pager = new Pager($polls, array('page' => $page, 'limit' => $polls_per_page));
        $data=array(
            'user'=>$user,
            'polls'=>$pager,
            'block_length' => $this->container->getParameter('pager_block'),
            'page'=>$page,
            'pagetitle' => $this->get('translator')->trans('List of Polls')
        );
        
        return $this->render("XsharePollBundle:Poll:listPoll.html.twig",$data);
    }
    
    /**
    * @Route("/poll/edit/{id}", name="xshare_edit_poll", requirements = {"id" = "\d+"})
    * @Method({"GET","POST"})
    * @Template()
    * 
    * edit poll
    * access only Administrator
    */
    public function editAction($id){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $user   = $this->get('security.context')->getToken()->getUser();
        if($user->getTypeAccess()!='admin'){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Polls'), $this->get("router")->generate("xshare_poll_list_first"));
        $breadcrumbs->addItem($this->get('translator')->trans('Edit Poll'), null);
        
        
        $em   = $this->getDoctrine()->getEntityManager();
        $poll = $em->getRepository("XsharePollBundle:Poll")->find($id);
        $pollForm = $this->createForm(new PollType(), $poll);
        
        $request = $this->getRequest();      
        //check if the user has submited the form
         if ($request->getMethod() == 'POST') {
            $pollForm->bindRequest($request);
            if ($pollForm->isValid()) {
              $em = $this->getDoctrine()->getEntityManager();
              $em->persist($poll);
              $em->flush();
              $this->get('session')->setFlash('rep', 'You have successfully update poll!');
              return $this->redirect($this->generateUrl("xshare_edit_poll", array('id'=>$id)));
            }
         }
        $data=array(
            'user'=>$user,
            'poolId'=>$id,
            'form'=>$pollForm->createView(),
            'pagetitle' => $this->get('translator')->trans('Edit Poll')
        );
        
        return $this->render("XsharePollBundle:Poll:editPoll.html.twig",$data);
    }
    
    /**
     * @author s.pasat
     * render a right side poll bloc
     * called by ::base.twig
     * @return type view
     */
    public function showAction(){
        
        $em   = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $uip  = $request->getClientIp();
        $poll = $em->getRepository("XsharePollBundle:Poll")->selectUnvotedPolls($uip);

        $data = array(
            'poll'=>$poll,
        );
        
        return $this->render("XsharePollBundle:Poll:showPoll.html.twig",$data);
    }
    
   /**
    * @Route("/poll/details/{id}", name="xshare_poll_show_details", requirements = {"id" = "\d+"})
    * @Template()
    * 
    * Show poll details
    * access only Administrator
    */
    public function showDetailsAction($id){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $user   = $this->get('security.context')->getToken()->getUser();
        if($user->getTypeAccess()!='admin'){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //bredcrumbs
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Polls'), $this->get("router")->generate("xshare_poll_list_first"));
        $breadcrumbs->addItem($this->get('translator')->trans('Poll Details'), null);
        
        $em   = $this->getDoctrine()->getEntityManager();
        $poll = $em->getRepository("XsharePollBundle:Poll")->find($id);
        $data = array(
            'poll'=>$poll,
            'pagetitle' => $this->get('translator')->trans('Show Poll Details')
            
        );
        
        return $this->render("XsharePollBundle:Poll:showPollDetails.html.twig",$data);
    }
    
    /**
    * @Route("/poll/delete/{id}", name="xshare_delete_poll", requirements = {"id" = "\d+"})
    * @Template()
    * 
    * delete poll
    * access only Administrator
    */
    public function deleteAction($id){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $user   = $this->get('security.context')->getToken()->getUser();
        if($user->getTypeAccess()!='admin'){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $em   = $this->getDoctrine()->getEntityManager();
        $res = $em->getRepository("XsharePollBundle:Poll")->deletePoll($id);
        if($res==1)
            return $this->redirect($this->generateUrl('xshare_poll_list'));
        else 
            return $this->redirect($this->generateUrl('xshare_poll_show_details',array('id'=>$id))); 
    }
}