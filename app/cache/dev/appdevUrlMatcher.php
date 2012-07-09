<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // xshare_general_default_index
        if (preg_match('#^/(?P<_locale>ro|en)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xshare_general_default_index');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'xshare_general_default_index'));
        }

        // xshare_general_default_index_1
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xshare_general_default_index_1');
            }
            return array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::redirerctToIndexAction',  '_route' => 'xshare_general_default_index_1',);
        }

        // change_language
        if (0 === strpos($pathinfo, '/change-language') && preg_match('#^/change\\-language/(?P<new_locale>[^/]+?)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'change_language');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\GeneralBundle\\Controller\\DefaultController::changeLocaleAction',)), array('_route' => 'change_language'));
        }

        // xshare_contact
        if (preg_match('#^/(?P<_locale>ro|en)/contact/?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_contact;
            }
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xshare_contact');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_locale' => 'ro',  '_controller' => 'Xshare\\GeneralBundle\\Controller\\PageController::contactAction',)), array('_route' => 'xshare_contact'));
        }
        not_xshare_contact:

        // xshare_poll_default_index
        if (preg_match('#^/(?P<_locale>[^/]+?)/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'xshare_poll_default_index'));
        }

        // xshare_new_poll
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/new$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_new_poll;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::createAction',)), array('_route' => 'xshare_new_poll'));
        }
        not_xshare_new_poll:

        // xshare_poll_list
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/list/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::listAction',)), array('_route' => 'xshare_poll_list'));
        }

        // xshare_poll_list_first
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/list/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xshare_poll_list_first');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::listAction',)), array('_route' => 'xshare_poll_list_first'));
        }

        // xshare_edit_poll
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_edit_poll;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::editAction',)), array('_route' => 'xshare_edit_poll'));
        }
        not_xshare_edit_poll:

        // xshare_poll_show_details
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::showDetailsAction',)), array('_route' => 'xshare_poll_show_details'));
        }

        // xshare_delete_poll
        if (preg_match('#^/(?P<_locale>[^/]+?)/poll/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollController::deleteAction',)), array('_route' => 'xshare_delete_poll'));
        }

        // xshare_new_pollresult
        if (preg_match('#^/(?P<_locale>[^/]+?)/pollresult/new/(?P<pollid>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_new_pollresult;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\PollBundle\\Controller\\PollResultController::createAction',)), array('_route' => 'xshare_new_pollresult'));
        }
        not_xshare_new_pollresult:

        // xshare_ajax_loan
        if (preg_match('#^/(?P<_locale>[^/]+?)/ajax/request/(?P<pid>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\BookingController::loanAjaxAction',)), array('_route' => 'xshare_ajax_loan'));
        }

        // xshare_ajax_loan_verify
        if (preg_match('#^/(?P<_locale>[^/]+?)/ajax/request/verify/(?P<pid>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_ajax_loan_verify;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\BookingController::loanAjaxPeriodVerifyAction',)), array('_route' => 'xshare_ajax_loan_verify'));
        }
        not_xshare_ajax_loan_verify:

        // product_category_create
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/create$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_product_category_create;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::createAction',)), array('_route' => 'product_category_create'));
        }
        not_product_category_create:

        // product_category_edit
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_product_category_edit;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::editAction',)), array('_route' => 'product_category_edit'));
        }
        not_product_category_edit:

        // product_category_update
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_product_category_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::updateAction',)), array('_route' => 'product_category_update'));
        }
        not_product_category_update:

        // product_category_show
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_product_category_show;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::showAction',)), array('_route' => 'product_category_show'));
        }
        not_product_category_show:

        // product_category_delete
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_product_category_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::deleteAction',)), array('_route' => 'product_category_delete'));
        }
        not_product_category_delete:

        // product_category_ajax
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/ajax/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_product_category_ajax;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::getCategoryAjax',)), array('_route' => 'product_category_ajax'));
        }
        not_product_category_ajax:

        // category_list
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/list$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_list;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::listAction',)), array('_route' => 'category_list'));
        }
        not_category_list:

        // category_list_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/list/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_list_page;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::listAction',)), array('_route' => 'category_list_page'));
        }
        not_category_list_page:

        // category_filter_ajax
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/filter/(?P<criteria>[^/]+?)/(?P<order>[^/]+?)/(?P<page>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_filter_ajax;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::filterAction',)), array('_route' => 'category_filter_ajax'));
        }
        not_category_filter_ajax:

        // category_paginate_ajax
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/paginate/(?P<page>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_paginate_ajax;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::paginateAjaxAction',)), array('_route' => 'category_paginate_ajax'));
        }
        not_category_paginate_ajax:

        // category_redirect
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/redirect/?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_redirect;
            }
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'category_redirect');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::categoriesListAction',)), array('_route' => 'category_redirect'));
        }
        not_category_redirect:

        // personal_categories
        if (preg_match('#^/(?P<_locale>[^/]+?)/personal/categories$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_personal_categories;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::personalCategoriesAction',)), array('_route' => 'personal_categories'));
        }
        not_personal_categories:

        // xshare_product_category_personalcategories
        if (preg_match('#^/(?P<_locale>[^/]+?)/personal/categories/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_product_category_personalcategories;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::personalCategoriesAction',)), array('_route' => 'xshare_product_category_personalcategories'));
        }
        not_xshare_product_category_personalcategories:

        // category_all_products_list
        if (preg_match('#^/(?P<_locale>[^/]+?)/category/(?P<id>\\d+)/items(?:/(?P<page>[^/]+?))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_category_all_products_list;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::showItemsAction',)), array('_route' => 'category_all_products_list'));
        }
        not_category_all_products_list:

        // top_categories
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-categories$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_top_categories;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::topCategoriesAction',)), array('_route' => 'top_categories'));
        }
        not_top_categories:

        // top_categories_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-categories/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_top_categories_page;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\CategoryController::topCategoriesAction',)), array('_route' => 'top_categories_page'));
        }
        not_top_categories_page:

        // new_product
        if (preg_match('#^/(?P<_locale>[^/]+?)/product/new$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_new_product;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::newProductAction',)), array('_route' => 'new_product'));
        }
        not_new_product:

        // xshare_ajax_user_porudcts
        if (preg_match('#^/(?P<_locale>[^/]+?)/ajax/products/(?P<page>\\d+)/(?P<userid>\\d+)/(?P<filter>\\d+)/(?P<fromPage>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::userProductsAjaxAction',)), array('_route' => 'xshare_ajax_user_porudcts'));
        }

        // xshare_ajax_user_porudcts_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/ajax/products/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::userProductsAjaxAction',)), array('_route' => 'xshare_ajax_user_porudcts_page'));
        }

        // xshare_show_product
        if (preg_match('#^/(?P<_locale>[^/]+?)/product/(?P<pid>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::showProductAction',)), array('_route' => 'xshare_show_product'));
        }

        // xshare_edit_product
        if (preg_match('#^/(?P<_locale>[^/]+?)/product/edit/(?P<pid>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_xshare_edit_product;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::editProductAction',)), array('_route' => 'xshare_edit_product'));
        }
        not_xshare_edit_product:

        // xshare_delete_product
        if (preg_match('#^/(?P<_locale>[^/]+?)/product/delete/(?P<pid>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::deleteProductAction',)), array('_route' => 'xshare_delete_product'));
        }

        // loans_filter_ajax
        if (preg_match('#^/(?P<_locale>[^/]+?)/(?P<product_id>[^/]+?)/requests/filter/(?P<criteria>[^/]+?)/(?P<order>[^/]+?)/(?P<page>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_loans_filter_ajax;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::loansFilterAction',)), array('_route' => 'loans_filter_ajax'));
        }
        not_loans_filter_ajax:

        // personal_products
        if (preg_match('#^/(?P<_locale>[^/]+?)/personal/products$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_personal_products;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::personalProductsAction',)), array('_route' => 'personal_products'));
        }
        not_personal_products:

        // all_products_list
        if (preg_match('#^/(?P<_locale>[^/]+?)/products/list$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_all_products_list;
            }
            return array_merge($this->mergeDefaults($matches, array (  'orderby' => 0,  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::listProductAction',)), array('_route' => 'all_products_list'));
        }
        not_all_products_list:

        // all_products_list_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/products/list/(?P<orderby>\\d+)/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_all_products_list_page;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::listProductAction',)), array('_route' => 'all_products_list_page'));
        }
        not_all_products_list_page:

        // top_products
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-products$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_top_products;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  'filter' => 'date',  'order' => 'DESC',  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',)), array('_route' => 'top_products'));
        }
        not_top_products:

        // top_products_filter
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-products/?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_top_products_filter;
            }
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'top_products_filter');
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',)), array('_route' => 'top_products_filter'));
        }
        not_top_products_filter:

        // top_products_filter_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-products/(?P<page>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_top_products_filter_page;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\ProductController::topProductsAction',)), array('_route' => 'top_products_filter_page'));
        }
        not_top_products_filter_page:

        // loan_decline_accept_ajax1
        if (preg_match('#^/(?P<_locale>[^/]+?)/request/(?P<product_id>[^/]+?)/(?P<request_id>[^/]+?)/(?P<action>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_loan_decline_accept_ajax1;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsDeclineAcceptAction',)), array('_route' => 'loan_decline_accept_ajax1'));
        }
        not_loan_decline_accept_ajax1:

        // users_products_requests
        if (preg_match('#^/(?P<_locale>[^/]+?)/products\\-requests$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_users_products_requests;
            }
            return array_merge($this->mergeDefaults($matches, array (  'orderby' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsOnUsersProductsAction',)), array('_route' => 'users_products_requests'));
        }
        not_users_products_requests:

        // users_products_requests_order
        if (preg_match('#^/(?P<_locale>[^/]+?)/products\\-requests/(?P<orderby>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_users_products_requests_order;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::requestsOnUsersProductsAction',)), array('_route' => 'users_products_requests_order'));
        }
        not_users_products_requests_order:

        // xshare_users_requests
        if (preg_match('#^/(?P<_locale>[^/]+?)/user/requests/?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_xshare_users_requests;
            }
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xshare_users_requests');
            }
            return array_merge($this->mergeDefaults($matches, array (  'orderby' => 0,  'page' => 1,  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::showMyRequestsAction',)), array('_route' => 'xshare_users_requests'));
        }
        not_xshare_users_requests:

        // xshare_users_requests_page
        if (preg_match('#^/(?P<_locale>[^/]+?)/user/requests/(?P<orderby>\\d+)/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_xshare_users_requests_page;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\ProductBundle\\Controller\\RequestsController::showMyRequestsAction',)), array('_route' => 'xshare_users_requests_page'));
        }
        not_xshare_users_requests_page:

        // search_autocomplete
        if (preg_match('#^/(?P<_locale>[^/]+?)/search\\-autocomplete$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_search_autocomplete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_locale' => 'ro',  '_controller' => 'Xshare\\ProductBundle\\Controller\\SearchController::autocompleteAction',)), array('_route' => 'search_autocomplete'));
        }
        not_search_autocomplete:

        // general_search
        if (preg_match('#^/(?P<_locale>[^/]+?)/search(?:/(?P<searchWord>[^/]+?))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_general_search;
            }
            return array_merge($this->mergeDefaults($matches, array (  'searchWord' => '',  '_controller' => 'Xshare\\ProductBundle\\Controller\\SearchController::searchAction',)), array('_route' => 'general_search'));
        }
        not_general_search:

        // xshare_user_default_index
        if (preg_match('#^/(?P<_locale>[^/]+?)/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\UserBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'xshare_user_default_index'));
        }

        // user_details
        if (preg_match('#^/(?P<_locale>[^/]+?)/user/details/(?P<id>[^/]+?)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_user_details;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::detailsAction',)), array('_route' => 'user_details'));
        }
        not_user_details:

        // all_users_list
        if (preg_match('#^/(?P<_locale>[^/]+?)/users(?:/(?P<page>\\d+)(?:/(?P<sort>username|products)(?:/(?P<order>asc|desc))?)?)?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_all_users_list;
            }
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  'sort' => 'username',  'order' => 'asc',  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::usersListAction',)), array('_route' => 'all_users_list'));
        }
        not_all_users_list:

        // top_users
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-users$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'page' => 1,  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::topUsersAction',)), array('_route' => 'top_users'));
        }

        // top_users_paged
        if (preg_match('#^/(?P<_locale>[^/]+?)/top\\-users/(?P<page>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Xshare\\UserBundle\\Controller\\UserController::topUsersAction',)), array('_route' => 'top_users_paged'));
        }

        // user_registration
        if (preg_match('#^/(?P<_locale>ro|en)/register$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_user_registration;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_locale' => 'ro',  '_controller' => 'Xshare\\SecurityBundle\\Controller\\RegistrationController::registerAction',)), array('_route' => 'user_registration'));
        }
        not_user_registration:

        // user_forgot_password
        if (preg_match('#^/(?P<_locale>ro|en)/forgot$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_user_forgot_password;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_locale' => 'ro',  '_controller' => 'Xshare\\SecurityBundle\\Controller\\RegistrationController::forgotAction',)), array('_route' => 'user_forgot_password'));
        }
        not_user_forgot_password:

        // _login
        if ($pathinfo === '/private/login') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not__login;
            }
            return array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::loginAction',  '_route' => '_login',);
        }
        not__login:

        // _security_check
        if ($pathinfo === '/private/login_check') {
            return array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _logout
        if ($pathinfo === '/private/logout') {
            return array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::logoutAction',  '_route' => '_logout',);
        }

        // welcome
        if ($pathinfo === '/private/welcome') {
            return array (  '_controller' => 'Xshare\\SecurityBundle\\Controller\\SecurityController::welcomeAction',  '_route' => 'welcome',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
