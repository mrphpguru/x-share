<?php

namespace Xshare\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Xshare\PollBundle\Entity\PollResult;
use Xshare\PollBundle\Form\PollResultType;

/**
 * Description of PollResultController
 *
 * @author s.pasat
 */
class PollResultController extends Controller {

    public function indexAction() {
        return new Response('Hello world!');
    }

    /**
    * @Route("/pollresult/new/{pollid}", name="xshare_new_pollresult", requirements={"pollid" = "\d+"})
    * @Method({"GET","POST"})
    * @Template()
    * 
    * @author s.pasat
    * create new pollresult
    */
    public function createAction($pollid){
       
        $em = $this->getDoctrine()->getEntityManager();
        //geting request
        $request = $this->getRequest();
        
        $pollResult = new PollResult();
        $pollResult->setPollId($pollid);
        $uip =$request->getClientIp();
        $pollResult->setUserIp($uip);
        $pollResult->setPollValue($request->get('pollresult'));
        //check if the user has submited the form
        
        $em->persist($pollResult);
        $em->flush();
        
        $poll = $em->getRepository("XsharePollBundle:Poll")->selectUnvotedPolls($uip);

        $data = array(
            'poll'=>$poll,
        );
        
        return $this->render("XsharePollBundle:Poll:showPoll.html.twig",$data);
    }
}

?>