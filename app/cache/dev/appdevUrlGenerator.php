<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_demo_login' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'xshare_general_default_index' => true,
       'xshare_general_default_index_1' => true,
       'change_language' => true,
       'xshare_contact' => true,
       'xshare_poll_default_index' => true,
       'xshare_new_poll' => true,
       'xshare_poll_list' => true,
       'xshare_poll_list_first' => true,
       'xshare_edit_poll' => true,
       'xshare_poll_show_details' => true,
       'xshare_delete_poll' => true,
       'xshare_new_pollresult' => true,
       'xshare_ajax_loan' => true,
       'xshare_ajax_loan_verify' => true,
       'product_category_create' => true,
       'product_category_edit' => true,
       'product_category_update' => true,
       'product_category_show' => true,
       'product_category_delete' => true,
       'product_category_ajax' => true,
       'category_list' => true,
       'category_list_page' => true,
       'category_filter_ajax' => true,
       'category_paginate_ajax' => true,
       'category_redirect' => true,
       'personal_categories' => true,
       'xshare_product_category_personalcategories' => true,
       'category_all_products_list' => true,
       'top_categories' => true,
       'top_categories_page' => true,
       'new_product' => true,
       'xshare_ajax_user_porudcts' => true,
       'xshare_ajax_user_porudcts_page' => true,
       'xshare_show_product' => true,
       'xshare_edit_product' => true,
       'xshare_delete_product' => true,
       'loans_filter_ajax' => true,
       'personal_products' => true,
       'all_products_list' => true,
       'all_products_list_page' => true,
       'top_products' => true,
       'top_products_filter' => true,
       'top_products_filter_page' => true,
       'loan_decline_accept_ajax1' => true,
       'users_products_requests' => true,
       'users_products_requests_order' => true,
       'xshare_users_requests' => true,
       'xshare_users_requests_page' => true,
       'search_autocomplete' => true,
       'general_search' => true,
       'xshare_user_default_index' => true,
       'user_details' => true,
       'all_users_list' => true,
       'top_users' => true,
       'top_users_paged' => true,
       'user_registration' => true,
       'user_forgot_password' => true,
       '_login' => true,
       '_security_check' => true,
       '_logout' => true,
       'welcome' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getxshare_general_default_indexRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::indexAction',), array (  '_locale' => 'ro|en',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'ro|en',    3 => '_locale',  ),));
    }

    private function getxshare_general_default_index_1RouteInfo()
    {
        return array(array (), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::redirerctToIndexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getchange_languageRouteInfo()
    {
        return array(array (  0 => 'new_locale',), array (  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::changeLocaleAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'new_locale',  ),  2 =>   array (    0 => 'text',    1 => '/change-language',  ),));
    }

    private function getxshare_contactRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\PageController::contactAction',), array (  '_locale' => 'ro|en',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/contact/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'ro|en',    3 => '_locale',  ),));
    }

    private function getxshare_poll_default_indexRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'name',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_new_pollRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::createAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/poll/new',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_poll_listRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::listAction',), array (  'page' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/poll/list',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_poll_list_firstRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/poll/list/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_edit_pollRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::editAction',), array (  'id' => '\\d+',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/poll/edit',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_poll_show_detailsRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::showDetailsAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/poll/details',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_delete_pollRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::deleteAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/poll/delete',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_new_pollresultRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pollid',), array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollResultController::createAction',), array (  'pollid' => '\\d+',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pollid',  ),  1 =>   array (    0 => 'text',    1 => '/pollresult/new',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_ajax_loanRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pid',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\BookingController::loanAjaxAction',), array (  'pid' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pid',  ),  1 =>   array (    0 => 'text',    1 => '/ajax/request',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_ajax_loan_verifyRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pid',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\BookingController::loanAjaxPeriodVerifyAction',), array (  'pid' => '\\d+',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pid',  ),  1 =>   array (    0 => 'text',    1 => '/ajax/request/verify',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_createRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::createAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/category/create',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_editRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::editAction',), array (  'id' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/category',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_updateRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::updateAction',), array (  'id' => '\\d+',  '_method' => 'POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/category/update',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_showRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::showAction',), array (  'id' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/category',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_deleteRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::deleteAction',), array (  'id' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/category/delete',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getproduct_category_ajaxRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::getCategoryAjax',), array (  'id' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/category/ajax',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_listRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::listAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/category/list',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_list_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::listAction',), array (  'page' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/category/list',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_filter_ajaxRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'criteria',  2 => 'order',  3 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::filterAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'order',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'criteria',  ),  3 =>   array (    0 => 'text',    1 => '/category/filter',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_paginate_ajaxRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::paginateAjaxAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/category/paginate',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_redirectRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::categoriesListAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/category/redirect/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getpersonal_categoriesRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::personalCategoriesAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/personal/categories',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_product_category_personalcategoriesRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::personalCategoriesAction',), array (  'page' => '\\d+',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/personal/categories',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getcategory_all_products_listRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',  2 => 'page',), array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::showItemsAction',), array (  'id' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/items',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/category',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_categoriesRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::topCategoriesAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/top-categories',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_categories_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::topCategoriesAction',), array (  'page' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/top-categories',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getnew_productRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::newProductAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/product/new',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_ajax_user_porudctsRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',  2 => 'userid',  3 => 'filter',  4 => 'fromPage',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::userProductsAjaxAction',), array (  'page' => '\\d+',  'userid' => '\\d+',  'filter' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'fromPage',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'filter',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userid',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  4 =>   array (    0 => 'text',    1 => '/ajax/products',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_ajax_user_porudcts_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::userProductsAjaxAction',), array (  'page' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/ajax/products',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_show_productRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pid',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::showProductAction',), array (  'pid' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pid',  ),  1 =>   array (    0 => 'text',    1 => '/product',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_edit_productRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pid',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::editProductAction',), array (  'pid' => '\\d+',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pid',  ),  1 =>   array (    0 => 'text',    1 => '/product/edit',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_delete_productRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'pid',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::deleteProductAction',), array (  'pid' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'pid',  ),  1 =>   array (    0 => 'text',    1 => '/product/delete',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getloans_filter_ajaxRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'product_id',  2 => 'criteria',  3 => 'order',  4 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::loansFilterAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'order',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'criteria',  ),  3 =>   array (    0 => 'text',    1 => '/requests/filter',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'product_id',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getpersonal_productsRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::personalProductsAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/personal/products',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getall_products_listRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'orderby' => 0,  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::listProductAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/products/list',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getall_products_list_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'orderby',  2 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::listProductAction',), array (  'orderby' => '\\d+',  'page' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'orderby',  ),  2 =>   array (    0 => 'text',    1 => '/products/list',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_productsRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  'filter' => 'date',  'order' => 'DESC',  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/top-products',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_products_filterRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/top-products/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_products_filter_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/top-products',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getloan_decline_accept_ajax1RouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'product_id',  2 => 'request_id',  3 => 'action',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsDeclineAcceptAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'action',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'request_id',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'product_id',  ),  3 =>   array (    0 => 'text',    1 => '/request',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getusers_products_requestsRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'orderby' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsOnUsersProductsAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/products-requests',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getusers_products_requests_orderRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'orderby',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsOnUsersProductsAction',), array (  'orderby' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'orderby',  ),  1 =>   array (    0 => 'text',    1 => '/products-requests',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_users_requestsRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'orderby' => 0,  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::showMyRequestsAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/requests/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_users_requests_pageRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'orderby',  2 => 'page',), array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::showMyRequestsAction',), array (  'orderby' => '\\d+',  'page' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'orderby',  ),  2 =>   array (    0 => 'text',    1 => '/user/requests',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getsearch_autocompleteRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\ProductBundle\\Controller\\SearchController::autocompleteAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/search-autocomplete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getgeneral_searchRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'searchWord',), array (  'searchWord' => '',  '_controller' => 'Xshare\\ProductBundle\\Controller\\SearchController::searchAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'searchWord',  ),  1 =>   array (    0 => 'text',    1 => '/search',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getxshare_user_default_indexRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'name',), array (  '_controller' => 'Xshare\\UserBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getuser_detailsRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'id',), array (  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::detailsAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/user/details',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getall_users_listRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',  2 => 'sort',  3 => 'order',), array (  'page' => 1,  'sort' => 'username',  'order' => 'asc',  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::usersListAction',), array (  'page' => '\\d+',  'sort' => 'username|products',  'order' => 'asc|desc',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => 'asc|desc',    3 => 'order',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'username|products',    3 => 'sort',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  3 =>   array (    0 => 'text',    1 => '/users',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_usersRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  'page' => 1,  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::topUsersAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/top-users',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function gettop_users_pagedRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'page',), array (  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::topUsersAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/top-users',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getuser_registrationRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\SecurityBundle\\Controller\\RegistrationController::registerAction',), array (  '_locale' => 'ro|en',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/register',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'ro|en',    3 => '_locale',  ),));
    }

    private function getuser_forgot_passwordRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_locale' => 'ro',  '_controller' => 'Xshare\\SecurityBundle\\Controller\\RegistrationController::forgotAction',), array (  '_locale' => 'ro|en',  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/forgot',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'ro|en',    3 => '_locale',  ),));
    }

    private function get_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::loginAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/private/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::securityCheckAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/private/login_check',  ),));
    }

    private function get_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/private/logout',  ),));
    }

    private function getwelcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::welcomeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/private/welcome',  ),));
    }
}
