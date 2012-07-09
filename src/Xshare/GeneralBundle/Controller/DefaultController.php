<?php

namespace Xshare\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Xshare\ProductBundle\ProductGeneral;


class DefaultController extends Controller
{
   /**
    * render the Home page 
    * @return Response 
    * 
    * @Route("/{_locale}/", defaults={"_locale"="ro"}, requirements = {"_locale" = "ro|en"})
    * @Template()
    */
    public function indexAction()
    {
        
        //breadcrumbs 
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($this->get('translator')->trans('Home'), null);
        
        $em = $this->getDoctrine()->getEntityManager();
        $limit = $this->container->getParameter('max_top_categories');
        $categories = $em->getRepository('XshareProductBundle:Category')->getTopCategories($limit);
        $products = $em->getRepository('XshareProductBundle:Product')->getTopSixProducts();
        $products_availability = array();
        
        //make the array for available in X days, with X values
        if ($products) {
            $products_availability = ProductGeneral::getAvailableInXDays($products);
        }
        
        return $this->render('XshareGeneralBundle:Default:index.html.twig', array(
            'categories' => $categories,
            'products' => $products,
            'helper'=>new ProductGeneral(),
            'prod_available' => $products_availability,
        )) ;
    }
    
   /**
    * redirect to home pege, and set language to default one
    * @return redirect 
    * 
    * @Route("/", name="xshare_general_default_index_1", defaults={"_locale"="ro"})
    * @Template()
    */ 
   public function redirerctToIndexAction(){
      return $this->redirect($this->generateUrl('xshare_general_default_index'));
   }
    
    /**
     * @author vmoroi
     * changes the language
     * @Route("change-language/{new_locale}/", name="change_language")
     * @param type $new_locale 
     */
    function changeLocaleAction($new_locale) {       
       
        $request = $this->get('request');
        $router = $this->get('router');
        $context = $router->getContext();
        $frontControllerName = basename($_SERVER['SCRIPT_FILENAME']);       

        if($request->hasSession())
        {
            $session = $request->getSession();
            $session->setLocale($new_locale);
            $context->setParameter('_locale', $new_locale);

            //reconstructs a routing path and gets a routing array called $route_params
            $url = $request->headers->get('referer');
            $urlElements = parse_url($url);
            $routePath = str_replace('/' . $frontControllerName, '', $urlElements['path']); //eliminates the front controller name from the url path
            $route_params = $router->match($routePath);           

            // Get the route name
            $route = $route_params['_route'];           

            // Some parameters are not required to be used, filter them
            // by using an array of ignored elements.
            $ignore_params = array('_route' => true, '_controller' => true, '_locale' => true);
            $route_params = array_diff_key($route_params, $ignore_params);

            $url = $this->get('router')->generate($route, $route_params);

            return $this->redirect($url);
        }

    }
    
}
