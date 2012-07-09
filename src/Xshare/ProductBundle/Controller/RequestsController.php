<?php

namespace Xshare\ProductBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Xshare\ProductBundle\Entity\Booking;
//use Xshare\ProductBundle\Repository\Booking;
use Xshare\ProductBundle\Repository\Product;
use MakerLabs\PagerBundle\Pager;


/**
 * Description of RequestsController
 *
 * @author spasat
 */
class RequestsController extends Controller {


    /**
     * accepts or declines a loan request
     * @Route("/request/{product_id}/{request_id}/{action}", name="loan_decline_accept_ajax1")
     * @Method({"GET"})
     *
     * @param type $product_id - teh id of the product
     * @param type $loan_id - the id of the loan request
     * @param type $action - the action user does: accept or decline
     * @return string
     */
    public function requestsDeclineAcceptAction($product_id, $request_id, $action) {

        $em = $this->getDoctrine()->getEntityManager();
        //load the loan request
        $request = $em->getRepository('XshareProductBundle:Requests')->find($request_id);
        $refresh = null;
        switch($action) {
            case 'decline':  //if the owner refuses to loan
                $em->remove($request); //remove the loan request from the DB
                $em->flush();
                //send message to the user that has made the loan request
                $to = $request->getUser()->getEmail();
                $subject = 'Loan request decline';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:declineRequest.html.twig', array('request' => $request, 'cancel' => false));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");

                //send
                $this->get('mailer')->send($mail_message);

                $message = "The request has been succesfully removed and the user has been notified about your decline";
                break;
            case 'accept':

                $booking = new Booking();
                $booking->setRequest($request);
                $booking->setProductId($request->getProductId());
                $booking->setUser($request->getUser());
                $booking->setBorrowDate($request->getBorrowDate());
                $booking->setReturnDate($request->getReturnDate());
                $em->persist($booking);
                $request->setBooking($booking);
                $em->persist($request);
                $em->flush();

                //send message to the user that has made the loan request
                $to = $request->getUser()->getEmail();
                $subject = 'Loan request accept';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:acceptRequest.html.twig', array('request' => $request));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");

                //send
                $this->get('mailer')->send($mail_message);
                //get the loans that intersect with the period the product has been loaned ande remove them notifing the requesters
                $requests = $em->getRepository('XshareProductBundle:Requests')->getIntersectedByDateRequests($product_id, $request_id, $request->getBorrowDate(), $request->getReturnDate());
                if($requests) {
                    $subject1 = 'Loan request cancel';
                    $subject1 = $this->get('translator')->trans($subject1);
                    $body1 = $this->renderView('XshareProductBundle:Requests:declineRequest.html.twig', array('request' => $request, 'cancel' => true));
                    $mail_message1 = \Swift_Message::newInstance()
                        ->setSubject($subject1)
                        ->setFrom('contactbot@xshare.com')
                        ->setBody($body1,"text/html");
                    foreach ($requests as $req) {
                        //send notification of cancel
                        $mail_message1->setCc($req->getUser()->getEmail());
                        $em->remove($req);
                        $em->flush();
                    }
                    $this->get('mailer')->send($mail_message1);
                    $refresh = 'refresh';
                }

                $message = "The request has been accepted and the user has been notified";
                break;
        }

        return $this->render('XshareProductBundle:Requests:requestsResult.html.twig', array('message' => $message, 'refresh' => $refresh));
    }

    /**
     * @author cchiu
     * displays all the requests on products of the connected user
     *
     * @Route("products-requests", name="users_products_requests", defaults={"orderby"=1})
     * @Route("products-requests/{orderby}", name="users_products_requests_order", requirements={"orderby" = "\d+"})
     * @Method({"GET"})
     * @return Response
     */
    public function requestsOnUsersProductsAction($orderby = 1)
    {

        /** orded by
         * 0---by Date desc
         * 1---by Date asc
         */
        /** action
         * 1---accept
         * 2---refuse
         */
        $action = $this->getRequest()->get('action');
        if( $action ){
           //accept or refuse the request
           $rid = $this->getRequest()->get('rid');
           $pid = $this->getRequest()->get('pid');
           $this->acceptOrRefuseRequest($action, $pid, $rid);  
           return $this->redirect($this->generateUrl("users_products_requests"));
        }

        //the user object
        $user = null;
        $user_id = null;

        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->get('security.context')->getToken()->getUser();
            $user_id = $user->getUserId();
        } else {
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }

        //breadcrumbs
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));

        $em = $this->getDoctrine()
                   ->getEntityManager();

        $products = $em->getRepository('XshareProductBundle:Product')
                      ->getRequestedProducts($user_id);

        //form the array with requests on each product from requested products
        $requests_products = array();
        if(count($products) > 0){
            foreach ($products as $product ){
                $requests_products[$product['product_id']] = $em->getRepository('XshareProductBundle:Requests')->getRequestsByProductId($product['product_id'], $orderby);
            }
        }
        
        return $this->render('XshareProductBundle:Requests:requestsOnUsersProducts.html.twig', array(
            'id' => $user_id,
            'products' => $products,
            'requests' => $requests_products,
            'orderby'=>$orderby,
            'menu'=>array('products'=>1),
        ));
    }


    /**
     * @author cchiu
     * get recent 5 requested products
     *
     * @return response
     */
    public function recentRequestedUsersProductsAction()
    {

        $user = $this->get('security.context')->getToken()->getUser();
        $user_id = $user->getUserId();

        $em = $this->getDoctrine()
                   ->getEntityManager();

        $recentRequestedProducts = $em->getRepository('XshareProductBundle:Product')
                                      ->getRecentUsersRequestedProducts($user_id, 5);

        return $this->render('XshareProductBundle:Requests:recentRequestedUsersProducts.html.twig', array(
            'requests' => $recentRequestedProducts,
        ));
    }

    /**
     * @author spasat
     * get recent n requested products
     *
     * @return response
     */
    public function recentUserRequestsAction()
    {

        $user = $this->get('security.context')->getToken()->getUser();
        $user_id = $user->getUserId();

        $em = $this->getDoctrine()->getEntityManager();

        $requests = $em->getRepository('XshareProductBundle:Requests')->getUserRequests($user_id, 0, 5);

        return $this->render('XshareProductBundle:Requests:recentUsersRequests.html.twig', array(
            'requests' => $requests,
        ));
    }

    /**
     * @author cchiu
     * accept or refuse a request and send mails
     *
     * @param int $action - the action value
     * @param int $pid - the product_id value
     * @param int $rid - the request_id value
     */
    protected function acceptOrRefuseRequest($action, $pid, $rid)
    {
        $em = $this->getDoctrine()->getEntityManager();

        //load the loan request
        $request = $em->getRepository('XshareProductBundle:Requests')->find($rid);

        switch($action) {
            case 2:  //if the owner refuses to loan
                $em->remove($request); //remove the loan request from the DB
                $em->flush();
                //send message to the user that has made the loan request
                $to = $request->getUser()->getEmail();
                $subject = 'Loan request decline';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:declineRequest.html.twig', array('request' => $request, 'cancel' => false));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");

                //send
                $this->get('mailer')->send($mail_message);
                break;

            case 1: //if the owner accept the request
                $booking = new Booking();
                $booking->setRequest($request);
                $booking->setProductId($request->getProductId());
                $booking->setUser($request->getUser());
                $booking->setBorrowDate($request->getBorrowDate());
                $booking->setReturnDate($request->getReturnDate());
                $em->persist($booking);
                $request->setBooking($booking);
                $em->persist($request);
                $em->flush();

                //send message to the user that has made the loan request
                $to = $request->getUser()->getEmail();
                $subject = 'Loan request accept';
                $subject = $this->get('translator')->trans($subject);
                $body = $this->renderView('XshareProductBundle:Requests:acceptRequest.html.twig', array('request' => $request));
                $mail_message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom('contactbot@xshare.com')
                    ->setTo($to)
                    ->setBody($body,"text/html");

                //send
                $this->get('mailer')->send($mail_message);
                //get the loans that intersect with the period the product has been loaned ande remove them notifing the requesters
                $requests = $em->getRepository('XshareProductBundle:Requests')->getIntersectedByDateRequests($pid, $rid, $request->getBorrowDate(), $request->getReturnDate());
                if($requests) {
                    $subject1 = 'Loan request cancel';
                    $subject1 = $this->get('translator')->trans($subject1);
                    $body1 = $this->renderView('XshareProductBundle:Requests:declineRequest.html.twig', array('request' => $request, 'cancel' => true));
                    $mail_message1 = \Swift_Message::newInstance()
                        ->setSubject($subject1)
                        ->setFrom('contactbot@xshare.com')
                        ->setBody($body1,"text/html");
                    foreach ($requests as $req) {
                        //send notification of cancel
                        $mail_message1->setCc($req->getUser()->getEmail());
                        $em->remove($req);
                        $em->flush();
                    }
                    $this->get('mailer')->send($mail_message1);
                    $refresh = 'refresh';
                }
                break;
        }

    }

    /**
     *
     * displays all the requests on products of the connected user
     *
     * @Route("/user/requests/", name="xshare_users_requests", defaults={"orderby"=0, "page" = 1})
     * @Route("/user/requests/{orderby}/{page}", name="xshare_users_requests_page", requirements={"orderby" = "\d+", "page" = "\d+"})
     * @Method({"GET"})
     *
     * @param type $page - the current page
     * @return Response
     */
    public function showMyRequestsAction($orderby = 0,$page = 1){

        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->get('security.context')->getToken()->getUser();
            $user_id = $user->getUserId();
        } else {
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }

        //breadcrumbs
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Users'), $this->get("router")->generate("all_users_list"));
        $breadcrumbs->addItem(ucfirst($user->getUserName()), $this->get("router")->generate("user_details",array('id'=>$user->getUserId())));
        $breadcrumbs->addItem($this->get('translator')->trans("My Requests"),"");

        $em = $this->getDoctrine()->getEntityManager();

        //load the loan request
        $adapter = $em->getRepository('XshareProductBundle:Requests')->getUserRequests($user_id, $orderby);

        $max_user_requests_per_page = $this->container->getParameter('max_user_requests_per_page');
        $block_length = $this->container->getParameter('pager_block');

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $max_user_requests_per_page));

        $data = array(
            'pager'=>$pager,
            'user'=>$user,
            'orderby'=>$orderby,
            'page'=>$page,
            'block_length'=>$block_length,
            'menu'=>array("users"=>1)
        );
        return $this->render("XshareProductBundle:Requests:userRequests.html.twig",$data);

    }

}