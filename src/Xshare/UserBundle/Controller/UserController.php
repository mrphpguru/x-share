<?php

namespace Xshare\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Xshare\UserBundle\Entity\User;
use Xshare\ProductBundle\Entity\Product;
use Xshare\ProductBundle\Repository\ProductRepository;
use Xshare\UserBundle\Form\UserDetailsOwnerType;
use Xshare\UserBundle\Form\UserDetailsType;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Pager;

/**
 * Description of UserController
 *
 * @author cchiu
 */
class UserController extends Controller
{

    /**
     * @author cchiu
     *
     * this action is used to render the template for User Details Page
     *
     * @param int $id, int $page
     * @return Response
     * 
     * @Route("/user/details/{id}", name="user_details")
     * @Method({"GET", "POST"})
     */
    public function detailsAction($id, $page=1)
    {        
        //verify if the user is owner or visitor
        $user = null;
        $user_id = null;
        $is_owner = false;
        
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->get('security.context')->getToken()->getUser();
            $user_id = $user->getUserId();
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        if($user_id!=$id)
            $em->getRepository('XshareUserBundle:User')->addViewer($id);
        
        //get data for user by user_id
        $userData = new User();
        $userData = $this->getUser($id);
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Users'), $this->get("router")->generate("all_users_list"));
        $breadcrumbs->addItem($userData->getUsername(), null);

        //create a form for user which isn't owner
        $form = null;

        //if user is owner of products
        if($user_id == $id ){
            $form = $this->createForm(new UserDetailsOwnerType(), $userData);
            $is_owner = true;
            
        }

        //get all products for this user
        $em = $this->getDoctrine()->getEntityManager();
        $products_per_page = $this->container->getParameter('max_user_products_on_new_product_page');
        $allproducts = $em->getRepository('XshareProductBundle:Product')
                          ->getUserProducts($id,null,'userdetails',$is_owner);
        $pager = new Pager($allproducts, array('page' => $page, 'limit' => $products_per_page));

        //get the number of lent products by this user for statistic bar
        $lentProducts = $em->getRepository('XshareProductBundle:Product')->getLentProductsByUserId($id);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // the validation passed, do something with the $user object
                //upload the user's photo
                if($userData->file != null){
                    $userData->setPhoto(uniqid().'.'.$userData->file->guessExtension());
                    $userData->file->move($userData->getUploadRootDir(), $user->getPhoto());
                }

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($userData);
                $em->flush();
                $this->get('session')->setFlash('notice', $this->get('translator')->trans('The modifications were saved') );
                return $this->redirect($this->generateUrl('user_details', array('id' => $userData->getUserId() )));
            }
        }

        if($is_owner){
            return $this->render('XshareUserBundle:User:userDetailsOwner.html.twig', array(
                'id' => $id,
                'form' => $form->createView(),
                'user' => $userData,
                'lentProducts' => $lentProducts,
                'page' => $page,
                'pager'=>$pager,
                'block_length' => $this->container->getParameter('pager_block'),
                'fromPage' => 'userdetails',
                'menu'=>array('users'=>1),
            ));
        } else {
             return $this->render('XshareUserBundle:User:userDetails.html.twig', array(
                'id' => $id,
                'user' => $userData,
                'lentProducts' => $lentProducts,
                'page' => $page,
                'pager'=>$pager,
                'block_length' => $this->container->getParameter('pager_block'),
                'fromPage' => 'userdetails',
                'menu'=>array('users'=>1),
            ));
        }

    }

    /**
     * User data for User details page
     * @param type $id
     * @return type
     * @throws type
     */
    protected function getUser($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $user = $em->getRepository('XshareUserBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find User.');
        }

        return $user;
    }

    /**
     * list of all users
     *
     * @author Dercaci Iuli
     * @Route("users/{page}/{sort}/{order}",
     *  name="all_users_list",
     *  requirements={"page" = "\d+", "sort" = "username|products", "order" = "asc|desc"},
     *  defaults={"page" = 1, "sort" = "username", "order" = "asc"})
     * @Method({"GET"})
     */
    public function usersListAction($page = 1, $sort = 'products', $order = 'asc') {

        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Users'), $this->get("router")->generate("all_users_list"));
        
        $modifiedSort = ($sort == 'username') ? 'u.username' : $sort;

        //getting users from DB
        $usersData = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository("XshareUserBundle:User")
            ->getUsersList($modifiedSort, $order, true);

        //paginator initialization
        $usersLimit = $this->container->getParameter('max_users_on_users_list_page');
        $params = array('page' => $page, 'limit' => $usersLimit);
        $paginator  = new Pager($usersData, $params);

        //responce
        return $this->render('XshareUserBundle:User:usersList.html.twig',
            array(
                'page'       => $page,
                'sort'       => $sort,
                'order'      => $order,
                'paginator'  => $paginator,
                'users'      => $usersData,
                'usersLimit' => $usersLimit,
                'filter'     => array('sort' => $sort, 'order' => $order),
                'menu'=>array('users'=>1),
            )
        );
    }
    
    /**
     * @author vmoroi
     * affiche la liste des utilisateurs qui ont distribué plus des produits
     * @Route("top-users", name="top_users", defaults = {"page" = 1})
     * @Route("top-users/{page}", name="top_users_paged")
     */
    public function topUsersAction($page) {
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), $this->get("router")->generate("xshare_general_default_index"));
        $breadcrumbs->addItem($this->get('translator')->trans('Users'), $this->get("router")->generate("all_users_list"));
        $breadcrumbs->addItem($this->get('translator')->trans('Top Users'), null);
        
        $em = $this->getDoctrine()->getEntityManager();
        $usersLimit = $this->container->getParameter('max_top_users');
        
        $users = $em->getRepository('XshareUserBundle:User')->topDistributers();
        
        $pager = new Pager($users, array('page' => $page, 'limit' => $usersLimit));
        
        return $this->render('XshareUserBundle:User:topUsers.html.twig', array(
            'block_length' => $this->container->getParameter('pager_block'),
            'paginator' => $pager,
            'page' => $page,
        ));
    }

    /**
     * list of all users
     *
     * @author Dercaci Iuli
     * @Method({"GET"})
     */
    public function topUsersListAction() {

        //getting users from DB
        $usersData = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository("XshareUserBundle:User")
            ->topDistributers(5);
        
        //responce
        return $this->render('XshareUserBundle:User:usersTopDistributorsList.html.twig',
            array('users' => $usersData)
        );
    }

}
