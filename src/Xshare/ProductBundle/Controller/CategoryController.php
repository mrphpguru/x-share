<?php

namespace Xshare\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Xshare\ProductBundle\Entity\Category;
use Xshare\ProductBundle\Form\CategoryType;
use Xshare\ProductBundle\Form\CategoriesList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use MakerLabs\PagerBundle\Pager;
use Xshare\ProductBundle\ProductGeneral;

/**
 * Description of CategoryController
 *
 * @author vmoroi
 */
class CategoryController extends Controller {

    /**
     * shows the form and creats a new category
     * @Route("category/create", name="product_category_create")
     * @Method({"GET", "POST"})
     */
    public function createAction() {

        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('New category'), null);
        
        //cheks if the user is authenticated
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        //create a new category object
        $category = new Category();
        //get the object of the user that is logged in the system now
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            $category->setUser($user);
        }
        $category->setStatus("1");
        $form = $this->createForm(new CategoryType(), $category);

        //check if the category form was submitted
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            //validate the form
            if ($form->isValid()) {
                //if form is valid the category is saved into the database
                $em = $this->getDoctrine()
                    ->getEntityManager();
                $em->persist($category);
                $em->flush();
                
                //display a message to the user and redirect
                $this->get('session')->setFlash('category-add-notice', 'The category has been successfully added');
                return $this->redirect($this->generateUrl('product_category_edit', array('id' => $category->getCategoryId())));
            }
        }
        //if the form wasn't submitted or it is not valid the form is displayed
        return $this->render('XshareProductBundle:Category:categoryForm.html.twig', array(
            'form'   => $form->createView(),
            'title' => $this->get('translator')->trans('New category'),
            'menu'=>array('categories'=>1),
            'pagetitle' => 'Add a new category'
        ));
    }

    /**
     * creates the form for editing a category
     * @Route("category/{id}/edit", name="product_category_edit", requirements={"id" = "\d+"})
     * @Method({"GET"})
     * 
     * @param $id - the id of the category
     * return string
     */
    public function editAction($id) {
        
        //cheks if the user is authenticated
        if(!$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        $category = $this->getCategory($id);
        
        if (!$category) {            
            $this->get('session')->setFlash('logerr', $this->get('translator')->trans('Category not found'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //the object of the current logged in user
        $user   = $this->get('security.context')->getToken()->getUser();
        $userid = $user->getUserId();
        
        if ($category->getUser()->getUserId() == $userid) {
            //breadcrumbs 
            $breadcrumbs = $this->get("white_october_breadcrumbs");
            $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
            $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
            $breadcrumbs->addItem($category->getName(), $this->get("router")->generate("product_category_show", array('id' => $id)));
            $breadcrumbs->addItem($this->get('translator')->trans('Edit'), null);

            $category = $this->getCategory($id);
            $form   = $this->createForm(new CategoryType(), $category);
            return $this->render('XshareProductBundle:Category:categoryForm.html.twig', array(
                'category' => $category,
                'form'   => $form->createView(),
                'title' => $this->get('translator')->trans('Edit category'),
                'menu'=>array('categories'=>1),
                'pagetitle' => 'Edit category'
            ));
        } else {
            $this->get('session')->setFlash('logerr', $this->container->getParameter('no_access_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
    }

    /**
     * updates a category
     * @Route("category/update/{id}", name="product_category_update", requirements={"id" = "\d+"})
     * @Method({"POST"})
     * @param $id - the id of the category
     */
    public function updateAction($id) {
        
        $category = $this->getCategory($id);        
        $form = $this->createForm(new CategoryType(), $category);
        
        //checks if the update form was sumbitted
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                //if the form is valid the category is saved into the database
                $em = $this->getDoctrine()
                    ->getEntityManager();
                
                if ($category->file != null) {
                    $category->setImage(uniqid().'.'.$category->file->guessExtension());
                    $category->file->move($category->getUploadRootDir(), $category->getImage());
                }
                $em->persist($category);
                $em->flush();

                //a message is displayed to the user and a redirect is performed
                $this->get('session')->setFlash('category-add-notice', 'The category has been successfully updated');
                return $this->redirect($this->generateUrl('product_category_edit', array('id' => $category->getCategoryId())));
            }
        }

        //display the edit form
        return $this->render('XshareProductBundle:Category:categoryForm.html.twig', array(
            'category' => $category,
            'form'   => $form->createView(),
            'title' => $this->get('translator')->trans('Edit category'),
            'pagetitle' => 'Edit category'
        ));
    }

    /**
     * displays the categories of the user
     * @param type $category - the category object
     * @return type 
     */
    public function userCategoriesAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $user_id = $user->getUserId();
        $em = $this->getDoctrine()
                ->getEntityManager();

        $categories_per_page = $this->container->getParameter('max_categories_on_new_category_page');

        $adapter = $em->getRepository('XshareProductBundle:Category')
                ->getUserCategories($user_id);

        $pager = new Pager($adapter, array('page' => 1, 'limit' => $categories_per_page));

        return $this->render('XshareProductBundle:Category:categoryList.html.twig', array(
            'pager' => $pager,
            'block_length' => $this->container->getParameter('pager_block')
        ));
    }

    /**
     * returns the category by id
     * @param type $id - the id of the category
     * @return object
     * @throws type 
     */
    protected function getCategory($id)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $category = $em->getRepository('XshareProductBundle:Category')->find($id);        

        return $category;
    }

    /**
     * displays the page with the details of a category
     * @Route("category/{id}", name="product_category_show", requirements={"id" = "\d+"})
     * @Method({"GET"})
     * @param $id - the id of the category
     * @return string
     */
    public function showAction($id) {
        
        $em = $this->getDoctrine()
                    ->getEntityManager();
        $em->getRepository('XshareProductBundle:Category')->addViewer($id);
        
        $category = $this->getCategory($id);
        
        if (!$category) {            
            $this->get('session')->setFlash('logerr', $this->get('translator')->trans('Category not found'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
        $breadcrumbs->addItem($category->getName(), null);

        //current month
        $m = date('m');
        $y = date('Y');
        $monthDate = $y . '-' . $m . '-' . '01 00:00:00'; //creates a date equal to the fist day of the current month

        $wD = date('N');
        $monthDateInt = mktime(0, 0, 0, (int) $m, (int) date('d'), (int) $y) - ($wD - 1) * (60*60*24); //creates the time equal to the first day of the current week
        $weekDate = date('Y-m-d H:i:s', $monthDateInt);

        $thisWeek = $em->getRepository('XshareProductBundle:Product')->getCategoryProdsSinceDate($id, $weekDate);
        $thisMonth = $em->getRepository('XshareProductBundle:Product')->getCategoryProdsSinceDate($id, $monthDate);

        //the first 4 products of the category ordered by date descending
        $products = $em->getRepository('XshareProductBundle:Product')->getCategoryProducts($id, 4);
        $products_availability = array();
        
        //get the number of rested days after that product will be available
        if ($products) {
            $products_availability = ProductGeneral::getAvailableInXDays($products);
        }
        
        return $this->render('XshareProductBundle:Category:categoryShow.html.twig', array(
            'category' => $category,
            'products' => $products,
            'thisWeek' => $thisWeek,
            'thisMonth' => $thisMonth,
            'prod_available' => $products_availability,
            'helper'=>new ProductGeneral(),
            'menu'=>array('categories'=>1),
        ));
    }

    /**
     * deletes a category
     * @Route("category/delete/{id}", name="product_category_delete", requirements={"id" = "\d+"})
     * @Method({"GET"})
     * @param $id - the id of the category
     * @return string
     */
    public function deleteAction($id) {
        //delete functionality
        $category = $this->getCategory($id);
        $em = $this->getDoctrine()
            ->getEntityManager();
        $em->remove($category);
        $em->flush();
        //display a message to the user
        $this->get('session')->setFlash('category-deleted', 'The category has been successfully deleted');
        return $this->redirect($this->generateUrl('category_list'));
    }


    /**
     * returns a category by id
     * @Route("category/ajax/{id}", name="product_category_ajax", requirements={"id" = "\d+"})
     * @Method({"GET"})
     * @param $id
     * @return string
     */
    public function getCategoryAjax($id){

        $em = $this->getDoctrine()
                    ->getEntityManager();

        $category = $em->getRepository('XshareProductBundle:Category')->find($id);

        if (!$category) {
            return new Response("");
        }


        return $this->render('XshareProductBundle:Category:categoryDetailsAjax.html.twig', array(
            'category' => $category
        ));
    }

    /**
     * displays all the categories by page and filter
     * @Route("category/list", name="category_list", defaults={"page" = 1})
     * @Route("category/list/{page}", name="category_list_page", requirements={"page" = "\d+"} )
     * @Method({"GET"})
     * 
     * @param type $page - the current page
     * @param type $data
     * @param type $title
     * @param type $unities
     * @return type 
     */
    public function listAction($page, $data = null, $title = null, $unities = null)
    {
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
        
        $data = $this->getRequest()->get('data');
        $title = $this->getRequest()->get('title');
        $unities = $this->getRequest()->get('unities');
       
        $em = $this->getDoctrine()->getEntityManager();
        $number_of_categories_per_page = $this->container->getParameter('max_categories_on_category_list_page');
        $block_length = $this->container->getParameter('pager_block');

        $adapter = $em->getRepository('XshareProductBundle:Category')
                      ->getCategoryList($data, $title, $unities);
        $pager = new Pager($adapter, array('page' => $page, 'limit' => $number_of_categories_per_page));

        return $this->render('XshareProductBundle:Category:listCategory.html.twig', array(
            'pager' => $pager,
            'data' => $data,
            'title' => $title,
            'unities' => $unities,
            'block_length' => $block_length,
            'menu'=>array('categories'=>1),
        ));
    }

    /**
     * filters the categories of the user by an ajax request
     * @Route("category/filter/{criteria}/{order}/{page}", name="category_filter_ajax")
     * @Method({"GET"})
     * 
     * @param type $criteria - the criteria to filter after: date, title, nb of products
     * @param type $order - the order
     * @param type $page - the number of the current page
     * @return string 
     */
    public function filterAction($criteria, $order, $page) {
        //the object of the user that is authenticated now
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            $user_id = $user->getUserId();
        } else {
            $user_id = false;
        }

        $em = $this->getDoctrine()
                    ->getEntityManager();

        $categories_per_page = $this->container->getParameter('max_categories_on_new_category_page');

        switch ($criteria) {
            case 'unities':
                $adapter = $em->getRepository('XshareProductBundle:Category')
                    ->getSortedByNbProdsCategories($user_id, $order);
                $pager = new Pager($adapter, array('page' => $page, 'limit' => $categories_per_page));

                return $this->render('XshareProductBundle:Category:categoryListItemsArray.html.twig', array(
                    'pager' => $pager,
                    'block_length' => $this->container->getParameter('pager_block')
                ));
            case 'date':
            case 'title':
                $adapter = $em->getRepository('XshareProductBundle:Category')
                    ->getSortedCategories($user_id, $criteria, $order);

                $pager = new Pager($adapter, array('page' => $page, 'limit' => $categories_per_page));

                return $this->render('XshareProductBundle:Category:categoryListItems.html.twig', array(
                    'pager' => $pager,
                    'block_length' => $this->container->getParameter('pager_block')
                ));
        }
    }

    /**
     * returns a list of categories of the user for a specifica page
     * @Route("category/paginate/{page}", name="category_paginate_ajax")
     * @Method({"GET"})
     * @param type $page - the current page
     * @return type 
     */
    public function paginateAjaxAction($page) {
        //the object of the current logged in user
        $user = $this->get('security.context')->getToken()->getUser();
        $user_id = $user->getUserId();
        $em = $this->getDoctrine()
                ->getEntityManager();

        $categories_per_page = $this->container->getParameter('max_categories_on_new_category_page');

        $adapter = $em->getRepository('XshareProductBundle:Category')
                ->getUserCategories($user_id);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $categories_per_page));

        return $this->render('XshareProductBundle:Category:categoryListItems.html.twig', array(
            'pager' => $pager,
            'block_length' => $this->container->getParameter('pager_block')
        ));
    }

    /**
     * Action for displaying the drop down list of categories
     * @Route("category/redirect/", name="category_redirect")
     * @Method({"GET"})
     */
    public function categoriesListAction(Request $request) {

        $formModel = new CategoriesList();

        $data = $request->query->get($formModel->getName());

        if ((int)$data['category']) {
            return $this->redirect(
                $this->generateUrl('product_category_show', array('id' => $data['category']))
            );
        }

        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository('XshareProductBundle:Category')->getAllCagetories(1);

        //select options
        $choices = array(0 => $this->get('translator')->trans('Select'));

        foreach ($categories as $category)
            $choices[$category['category_id']] = $category['name'];

        $form = $this->createForm($formModel, $choices);

        return $this->render(
            'XshareProductBundle:Category:categoryListDropBox.html.twig',
            array( 'categories' => $categories, 'form' => $form->createView())
        );

    }

    /**
     * displays the page with a list of all the user categories
     * @Route("personal/categories", name="personal_categories", defaults={"page" = 1})
     * @Route("personal/categories/{page}", requirements={"page" = "\d+"})
     * @Method({"GET", "POST"})
     * @param $page - the current page
     */
    public function personalCategoriesAction($page) {
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('Personal Categories'), null);
        
        $category = new Category();
        //the object of the current user
        $user = null;
        
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->get('security.context')->getToken()->getUser();
        } else {          
            $this->get('session')->setFlash('logerr', $this->container->getParameter('not_login_error'));
            return $this->redirect($this->generateUrl("xshare_general_default_index"));
        }
        
        if (is_object($user)) {
            $category->setUser($user);
        }
        return $this->render('XshareProductBundle:Category:personalCategories.html.twig', array(
            'category' => $category,
            'page'   => $page,
            'menu'=>array('categories'=>1),
        ));
    }

    /**
     * displaying a list of all items for the given category id
     *
     * @Route("category/{id}/items/{page}", name="category_all_products_list", requirements={"id" = "\d+"}, defaults={"page" = 1})
     * @Method({"GET"})
     * @param $id - the id of the category
     * @param $page - the current page
     */
    public function showItemsAction($id, $page=1) {

        $category = $this->getCategory($id);
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Categories'), $this->get("router")->generate("category_list"));
        $breadcrumbs->addItem($category->getName(), $this->get("router")->generate("product_category_show", array('id' => $id)));
        $breadcrumbs->addItem($this->get('translator')->trans('Products in category'), null);
        
        $products = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository("XshareProductBundle:Product")
            ->getProductsByCategory($id);

        $products_availability = array();
        
        //get the number of rested days after that product will be available
        if ($products) {
            $products_availability = ProductGeneral::getAvailableInXDays($products);
        }
        
        $itemsLimit = $this->container->getParameter('max_products_on_category_items_page');

        $pager = new Pager($products, array('page' => $page, 'limit' => $itemsLimit));

        return $this->render('XshareProductBundle:Category:categoryItems.html.twig', array(
            'page'        => $page,
            'category'    => $id,
            'pager'       => $pager,
            'products'       => $products,
            'items_limit' => $itemsLimit,
            'prod_available' => $products_availability,
            'helper'=>new ProductGeneral(),
            'menu'=>array('categories'=>1),
        ));
    }
    
    /**
     * @author
     * render the template to view the top categories page
     * 
     * @param int $page - number of the page
     * @param int $date - filter by date
     * @param int $title - filter by title value
     * @param int $unities - filter by number of units/products value
     * 
     * @return Response
     *
     * @Route("top-categories", name="top_categories", defaults={"page" = 1})
     * @Route("top-categories/{page}", name="top_categories_page", requirements={"page" = "\d+"} ) 
     * @Method({"GET"})
     */
    public function topCategoriesAction($page, $date = null, $title = null, $unities = null)
    {
        $date = $this->getRequest()->get('date');
        $title = $this->getRequest()->get('title');
        $unities = $this->getRequest()->get('unities');
        
        $categories_per_page = $this->container->getParameter('max_top_categories_on_top_categories_page');

        $em = $this->getDoctrine()->getEntityManager();
       
        $block_length = $this->container->getParameter('pager_block');

        $adapter = $em->getRepository('XshareProductBundle:Category')
                      ->getTopCategories(null, $date, $title, $unities);
        $pager = new Pager($adapter, array('page' => $page, 'limit' => $categories_per_page));

        return $this->render('XshareProductBundle:Category:topCategories.html.twig', array(
            'pager' => $pager,
            'date' => $date,
            'title' => $title,
            'unities' => $unities,
            'block_length' => $block_length,
            'menu'=>array('categories'=>1),
        ));
        
    }  
    
}
