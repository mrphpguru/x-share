<?php

namespace Xshare\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Xshare\ProductBundle\Entity\Requests;
/**
 * Description of BookingController
 *
 * @author spasat
 */
class BookingController extends Controller {

    
    /**
    * the user makes a request of loaning a product
    * @Route("/ajax/request/{pid}", name="xshare_ajax_loan" , requirements={"pid" = "\d+"})
    * @Template()
    *
    * @author spasat
    * @param $pid type int product id
    * get content of popup calendar 
    * @param type $pid
    * @return \Symfony\Component\HttpFoundation\Response 
    */ 
    public function loanAjaxAction($pid){
        //check if the user is authenticated
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return new Response('<script type="text/javascript">window.location.href +=""</script>');
        }else{
            $user      = $this->get('security.context')->getToken()->getUser();
            $sesuserid = $user->getUserId();
        }
        $em = $this->getDoctrine()->getEntityManager();
        
        $bookings = $em->getRepository('XshareProductBundle:Booking')->getBookingByProduct($pid);
//put all restricted dates in one array 
        $productLoansDates = array();
        foreach($bookings as $booking ){
            $current = strtotime( $booking['borrow_date']->format("Y-m-d") );
            $last = strtotime( $booking['return_date']->format("Y-m-d") );
            $step = '+1 day';
            $format = 'm/d/Y';
            while( $current <= $last ) {

                $productLoansDates[] = date( $format, $current );
                $current = strtotime( $step, $current );
            }
        }
        $product = $em->getRepository('XshareProductBundle:Product')->getProductById($pid);
        
        if(!empty($product))
            if($product->getEnable() == 0){
                if(isset($sesuserid))  
                if( $product->getUser()->getUserId() != $sesuserid ){
                    $product = null;
                }
            }
        
        return $this->render('XshareProductBundle:Loans:loansPopUpAjax.html.twig',array(
            'productLoansDates'=>$productLoansDates,
            'product'=>$product,
            'pid'=>$pid
            ));
        
    }
    
    /**
    * checks if the product is available for the requested period of time
    * @Route("/ajax/request/verify/{pid}", name="xshare_ajax_loan_verify" , requirements={"pid" = "\d+"})
    * @Method({"GET","POST"})
    * @Template()
    *     * verify if selected dates are valid for borrow product
    * @param $pid type int product id
    * @param type $pid - the id of the product
    * @return \Symfony\Component\HttpFoundation\Response 
    */    
    public function loanAjaxPeriodVerifyAction($pid){
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return new Response('<script type="text/javascript">window.location.href +=""</script>');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $req = $this->getRequest();//get post data;
        //string dates
        $data1 = $req->get('data1');
        $data2 = $req->get('data2');
        //convert to time dates
        $dt1 = strtotime( $data1 );
        $dt2 = strtotime( $data2 );
        
        //format date
        $d1  = date( 'Y-m-d', $dt1 );
        $d2  = date( 'Y-m-d', $dt2 );
       
        $notValid = $em->getRepository('XshareProductBundle:Booking')
                       ->checkIfValidPeriod($pid,$d1,$d2);
        //crate a loan
        $msg = 0;
        if($notValid==0){
           $user  = $this->get('security.context')->getToken()->getUser();
           $request  = new Requests();
           $request->setUserId($user->getUserId());
           $request->setProductId($pid);
           $request->setBorrowDate(new \DateTime($data1));
           $request->setReturnDate(new \DateTime($data2));
           $em->persist($request);  
           $em->flush();
           $msg = 1;
           $this->get('session')->setFlash('loanMesage', "Your request was sent successfully!");
        }
        
        $result = array(
            'message'=>$msg,
            'data'=>$data1.",".$data1
        );
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}

?>