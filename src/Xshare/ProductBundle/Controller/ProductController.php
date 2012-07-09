<?php

namespace Xshare\ProductBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Xshare\UserBundle\Repository\User;
use Xshare\ProductBundle\Entity\Product;
use Xshare\ProductBundle\Form\ProductType;
use Xshare\ProductBundle\ProductGeneral;

use MakerLabs\PagerBundle\Pager;
/**
 * Description of ProductController
 *
 * @author spasat
 */
class ProductController extends Controller {

    /**
     * displays a page with the form of adding a new product and a list with user products
     * @Route("/product/new", name="new_product")
     * @Method({"GET","POST"})
     * @Template()
     * @param $page - the current page number
     */
    public function newProductAction($page=1){
        
        //checks if the user is authenticated
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('New product'), null);
        
        //the object of the current logged in user
        $user   = $this->get('security.context')->getToken()->getUser();
        $userid = $user->getUserId();

        $em = $this->getDoctrine()
                ->getEntityManager();

        $product = new Product();
        $product->setStatus(true);
        $product->setEnable(true);
        $product->setUser($user);
        
        //all the products of the user
        $allproducts = $em->getRepository('XshareProductBundle:Product')
                      ->getUserProducts($userid,0,null,true);
        $products_per_page = $this->container->getParameter('max_user_products_on_new_product_page');
        $pager = new Pager($allproducts, array('page' => $page, 'limit' => $products_per_page));


        $form = $this->createForm(new ProductType(), $product);
        //check if the user has submited the form
        $request = $this->getRequest();

         if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                //if the form is valid the product is saved into the database and a message is displayed to the user
                $this->get('session')->setFlash('rep', 'You have successfully added a new product!');

                //TO DO
                //check if exist a product with the same name
                //if exist increase product number;

                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl('xshare_edit_product', array('pid' => $product->getProductId())));
            }
        }

        $data = array(
            'nume'=>"nume",
            'form'=>$form->createView(),
            'userid'=>$userid,
            'pager'=>$pager,
            'block_length' => $this->container->getParameter('pager_block'),
            'page'=>$page,
            'fromPage'=>0,
            'title' => $this->get('translator')->trans('New product'),
            'pagetitle' => $this->get('translator')->trans('Add a new product'),
            'menu'=>array("products"=>true),
          );
        return $this->render("XshareProductBundle:Product:productNew.html.twig",$data);
    }

   /**
    * returns the products of an user filtered and paginated
    * @Route("/ajax/products/{page}/{userid}/{filter}/{fromPage}", name="xshare_ajax_user_porudcts" , requirements={"page" = "\d+", "userid" = "\d+", "filter" = "\d+"})
    * @Route("/ajax/products/{page}", name="xshare_ajax_user_porudcts_page" , requirements={"page" = "\d+"})
    * @Template()
    *
    * @param type $page
    * @param type $userid
    * @param type $filter
    * @return string
    */
    public function userProductsAjaxAction($page=1, $userid, $filter=0,$fromPage = 0){
        //filter
        //0---no filter
        //11--by Date asc
        //12--by Date desc
        //21--by Title asc
        //22--by Title desc
        //31--by Category asc
        //32--by Cagetory desc
        //fromPage is the parameter send from user_details page
        
        $isMyProducts = false;
        if($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            //the object of the current logged in user
            $user   = $this->get('security.context')->getToken()->getUser();
            $sesuserid = $user->getUserId();
            
           //check if is session user product 
            if($sesuserid==$userid){
                $isMyProducts = true;
            }
        }

        
        
        //$fromPage = $this->getRequest()->get('from');
        $em = $this->getDoctrine()
                ->getEntityManager();
        $products_per_page = $this->container->getParameter('max_user_products_on_new_product_page');
        
        $allproducts = $em->getRepository('XshareProductBundle:Product')
                            ->getUserProducts($userid,$filter,$fromPage,$isMyProducts);
        
        $pager = new Pager($allproducts, array('page' => $page, 'limit' => $products_per_page));
        return $this->render('XshareProductBundle:Product:productListAjax.html.twig', array(            'pager' => $pager,
            'block_length' => $this->container->getParameter('pager_block'),
            'fromPage' => $fromPage
        ));

    }

   /**
    * displays tha page of a product
    * @Route("/product/{pid}", name="xshare_show_product" , requirements={"pid" = "\d+"})
    * @Template()
    * @param $pid - the id of the product
    */
    public function showProductAction($pid){
        
        if($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            //the object of the current logged in user
            $user   = $this->get('security.context')->getToken()->getUser();
            $sesuserid = $user->getUserId();
        }
        
        $em = $this->getDoctrine()
                ->getEntityManager();
        
        $em->getRepository('XshareProductBundle:Product')->addViewer($pid);
        
        $product = $em->getRepository('XshareProductBundle:Product')
                ->getProductById($pid);
        
        
        if(!empty($product))
            if($product->getEnable()==0){
                if(isset($sesuserid))  
                if( $product->getUser()->getUserId() != $sesuserid ){
                    $product = null;
                }
            }
            
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));
        if(!empty($product))
            $breadcrumbs->addItem($product->getName(), null);
        else
            $breadcrumbs->addItem($this->get('translator')->trans('No Product Found'), null);
        
        $m = date('m');
        $y = date('Y');
        $monthDate = $y . '-' . $m . '-' . '01 00:00:00'; //the first day of the month

        $wD = date('N');
        $monthDateInt = mktime(0, 0, 0, (int) $m, (int) date('d'), (int) $y) - ($wD - 1) * (60*60*24); //the first day of the week
        $weekDate = date('Y-m-d H:i:s', $monthDateInt);

        //the number of products loaned form the beginning of the week and the month
        
        $thisWeek = $em->getRepository('XshareProductBundle:Requests')
                ->getRequestsByProductSinceDate($pid,$weekDate);
        $thisMonth = $em->getRepository('XshareProductBundle:Requests')
                ->getRequestsByProductSinceDate($pid,$monthDate);
        

        return $this->render('XshareProductBundle:Product:productShow.html.twig',array(
            'product'=>$product,
            'thisMonth'=>$thisMonth,
            'thisWeek'=>$thisWeek,
            'menu'=>array("products"=>true),
            ));
    }

   /**
    * the page for editing a product
    * @Route("product/edit/{pid}", name="xshare_edit_product" , requirements={"pid" = "\d+"})
    * @Method({"GET","POST"})
    * @Template()
    * @param $pid - the id of the product
    */
    public function editProductAction($pid){
        $page = 1;
        //check if the user is logged in
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
         $em = $this->getDoctrine()
                ->getEntityManager();
         $product = $em->getRepository('XshareProductBundle:Product')->find($pid);
         $status = $product->getStatus();
         
         //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));
        $breadcrumbs->addItem($product->getName(), $this->get("router")->generate("xshare_show_product", array('pid' => $pid)));
        $breadcrumbs->addItem($this->get('translator')->trans('Edit'), null);
         
        if (!$product) {
            $this->get('session')->setFlash('logerr', $this->get('translator')->trans('Product not found'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
         //the object of the current logged in user
        $user   = $this->get('security.context')->getToken()->getUser();
        $userid = $user->getUserId();

        if ($product->getUser()->getUserId() == $userid) { //if the user is the author of the product

            //all the products of the user
            $allproducts = $em->getRepository('XshareProductBundle:Product')
                        ->getUserProducts($userid,0,null,true);
            $products_per_page = $this->container->getParameter('max_user_products_on_new_product_page');
            $pager = new Pager($allproducts, array('page' => $page, 'limit' => $products_per_page));


            $form = $this->createForm(new ProductType(), $product);
            //check if the user has submited the form
            $request = $this->getRequest();

            if ($request->getMethod() == 'POST') {
                $form->bindRequest($request);

                if ($form->isValid()) {
                    
                    if ((!$status) && ($product->getStatus())) {//if the product was loaned and the owner changed to available
                        //check if there is an active loan that contain in its period the current day and mark it as ended
                        $em->getRepository('XshareProductBundle:Loans')->setEndedLoan($product->getProductId());
                    }
                    
                    //if the form is valid the product is saved into the database and a message is displayed to the user
                    $this->get('session')->setFlash('rep', 'You have successfully updated the product!');

                    if ($product->file != null) {
                        $product->setImage(uniqid().'.'.$product->file->guessExtension());
                        $product->file->move($product->getUploadRootDir(), $product->getImage());
                    }
                    $em->persist($product);
                    $em->flush();

                    return $this->redirect($this->generateUrl('xshare_edit_product', array('pid' => $pid)));
                }
            }

            $data = array(
                'nume'=>"nume",
                'form'=>$form->createView(),
                'userid'=>$userid,
                'pager'=>$pager,
                'block_length' => $this->container->getParameter('pager_block'),
                'page'=>$page,
                'title' => $this->get('translator')->trans('Edit product'),
                'fromPage'=>0,
                'product' => $product,
                'pagetitle' => $this->get('translator')->trans('Edit product'),
                'menu'=>array("products"=>true),
            );
            return $this->render("XshareProductBundle:Product:productNew.html.twig",$data);
        } else {
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }

    }


   /**
    * delete a product
    * @Route("/product/delete/{pid}", name="xshare_delete_product" , requirements={"pid" = "\d+"})
    * @Template()
    * @param $pid - the product id
    */
    public function deleteProductAction($pid){
        //check if the user is logged in
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
         $em = $this->getDoctrine()->getEntityManager();
         $em->getRepository('XshareProductBundle:Product')->deleteProductById($pid);
         $this->get('session')->setFlash('flashSuccess', $this->container->getParameter('product_delete_msg'));
         return $this->redirect($this->generateUrl("personal_products"));
    }

    /**
     * author vmoroi
     * returns the list of users that have requested the product and the request details
     * @param type $product_id
     * @param $page - the current page
     * @return string
     */
    public function requestsAction($product_id, $page) {
        $em = $this->getDoctrine()
                ->getEntityManager();
        $users = $em->getRepository('XshareProductBundle:Requests')
                    ->loadUsersByProductRequests($product_id);
        $req_per_page = $this->container->getParameter('max_requests_on_page');
        $pager = new Pager($users, array('page' => $page, 'limit' => $req_per_page));
        //print_r(count($users));die;
        return $this->render(
            'XshareProductBundle:Product:requests.html.twig',
            array(
                'pager' => $pager,
                'block_length' => $this->container->getParameter('pager_block')
            )
        );
    }
    
    /**
     * ajax filters the list of loan requests
     * @Route("{product_id}/requests/filter/{criteria}/{order}/{page}", name="loans_filter_ajax")
     * @Method({"GET"})
     *
     * @param type $product_id - the id of the product
     * @param type $criteria - the filter criteria : date, title
     * @param type $order - order of sorting
     * @param type $page - the nb of the page
     * @return string
     */
    public function loansFilterAction($product_id, $criteria, $order, $page) {

        $em = $this->getDoctrine()
                    ->getEntityManager();

        $req_per_page = $this->container->getParameter('max_requests_on_page');

        $adapter = $em->getRepository('XshareProductBundle:Requests')
            ->loadUsersByProductRequests($product_id, $criteria, $order);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $req_per_page));

        return $this->render('XshareProductBundle:Product:requestsItems.html.twig', array(
            'pager' => $pager,
            'block_length' => $this->container->getParameter('pager_block')
        ));
    }

    /**
     * returns the products of the current logged in user
     * @Route("/personal/products", name="personal_products")
     * @Method({"GET","POST"})
     * @Template()
     *
     * @param type $page - the current page
     * @return type
     */
    public function personalProductsAction($page=1){
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('Personal products'), null);

        //the user object
        $user = null;
        $userid = null;
        
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->get('security.context')->getToken()->getUser();
            $userid = $user->getUserId();
        } else {          
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }

        $products_per_page = $this->container->getParameter('max_user_products_on_new_product_page');
        $em = $this->getDoctrine()
                ->getEntityManager();
        $allproducts = $em->getRepository('XshareProductBundle:Product')
                      ->getUserProducts($userid,0,null,true);
        $pager = new Pager($allproducts, array('page' => $page, 'limit' => $products_per_page));
        $data = array(
            'userid'=>$userid,
            'pager'=>$pager,
            'page'=>$page,
            'fromPage' => 0,
            'menu'=>array("products"=>true),
            );
        return $this->render("XshareProductBundle:Product:personalProducts.html.twig",$data);
    }

    /**
     * @author cchiu
     * displays all the products by page and filter
     *
     * @Route("products/list", name="all_products_list", defaults={"orderby"=0, "page" = 1})
     * @Route("products/list/{orderby}/{page}", name="all_products_list_page", requirements={"orderby" = "\d+", "page" = "\d+"} )
     * @Method({"GET"})
     *
     * @param type $page - the current page
     * @param string $date - the name of filter by data
     * @param string $title - the name of the filter by name
     * @param string $category - the name of the filter by category name
     * @param string $username - the name of the filter by username
     * @param string $loaned - the name of the filter by loan status
     * @return Response
     */
    public function listProductAction($orderby = 0, $page = 1)
    {
        
        /** orded by
         * 0---by Date asc
         * 1---by Date desc
         * 21--by Name asc
         * 22--by Name desc
         * 31--by Category name asc
         * 32--by Category name desc
         * 41--by User username asc
         * 42--by User username desc
         * 51--by Loans status asc
         * 52--by Loans status desc
         */
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));        
        $em = $this->getDoctrine()->getEntityManager();
        $number_of_products_per_page = $this->container->getParameter('max_products_on_list_all_products_page');
        $block_length = $this->container->getParameter('pager_block');

        $adapter = $em->getRepository('XshareProductBundle:Product')
                      ->getAllProductsList($orderby);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $number_of_products_per_page));
        return $this->render('XshareProductBundle:Product:listOfAllProducts.html.twig', array(
            'pager' => $pager,
            'page' =>$page,
            'orderby'=>$orderby,
            'block_length' => $block_length,
            'menu'=>array('products'=>1),
        ));
    }


    /**
     * @Route("top-products", name="top_products", defaults={"page" = 1, "filter" = "date", "order"="DESC"})
     * @Route("top-products/", name="top_products_filter", defaults={"page" = 1})
     * @Route("top-products/{page}", name="top_products_filter_page")
     * @Method({"GET"})
     * @param type $page
     * @param type $filter
     * @param type $order
     * @return string
     */
    public function topProductsAction($page = 1) {
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Products'), $this->get("router")->generate("all_products_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('Top Products'), null);
        $products_availability = array();
        $em = $this->getDoctrine()->getEntityManager();
        

        $products = $em->getRepository('XshareProductBundle:Product')
                      ->getMostLoanedProducts(/*$filter, $order*/);
        if ($products) {
            $products_availability = ProductGeneral::getAvailableInXDays($products);
        }
        
        $products_per_page = $this->container->getParameter('max_top_products');
        $pager = new Pager($products, array('page' => $page, 'limit' => $products_per_page));

        return $this->render("XshareProductBundle:Product:topProducts.html.twig", array(
            'pager' => $pager,
            'page' => $page,
            'block_length' => $this->container->getParameter('pager_block'),
            'prod_available' => $products_availability,
            'helper'=>new ProductGeneral(),
            'menu'=>array("products"=>true),
        ));

    }
    
    /**
     * @author vmoroi
     * creates the block with the last added 30 products with scrolling 5 by 5 
     */
    public function recentProductsBlockAction() {
        $em = $this->getDoctrine()->getEntityManager();
        
        $products = $em->getRepository('XshareProductBundle:product')->getRecentProducts(30);
        
        return $this->render('XshareProductBundle:Product:recentProductsBlock.html.twig', array(
            'products' => $products
        ));
    }
    
}