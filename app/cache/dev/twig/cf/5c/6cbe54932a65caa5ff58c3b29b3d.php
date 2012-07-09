<?php

/* ::base.html.twig */
class __TwigTemplate_cf5c6cbe54932a65caa5ff58c3b29b3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'navigation' => array($this, 'block_navigation'),
            'search' => array($this, 'block_search'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'leftsidebar' => array($this, 'block_leftsidebar'),
            'topusers' => array($this, 'block_topusers'),
            'topsearch' => array($this, 'block_topsearch'),
            'maincontent' => array($this, 'block_maincontent'),
            'rightsidebar' => array($this, 'block_rightsidebar'),
            'recentrequests' => array($this, 'block_recentrequests'),
            'myrecentrequests' => array($this, 'block_myrecentrequests'),
            'poll' => array($this, 'block_poll'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 16
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <section id=\"wrapper\">
            <header id=\"header\">
                <div class=\"menu\">
                    ";
        // line 22
        $this->displayBlock('navigation', $context, $blocks);
        // line 25
        echo "                        ";
        $this->env->loadTemplate("XshareGeneralBundle:Default:language.html.twig")->display($context);
        // line 26
        echo "                </div>
                <div class=\"search\">
                    ";
        // line 28
        $this->displayBlock('search', $context, $blocks);
        // line 31
        echo "                </div>
                <div class=\"breadcrumbs\">
                    ";
        // line 33
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 36
        echo "                    <div class=\"clear\"></div>
                </div>
            </header>
            <section class=\"main-container\">
                <aside class=\"sidebar sidebar-left\">
                    <div class=\"inner\">
                    ";
        // line 42
        $this->displayBlock('leftsidebar', $context, $blocks);
        // line 57
        echo "                    </div>
                </aside>

                <section id=\"main\">
                    <div class=\"inner\">
                    ";
        // line 62
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "loanMesage"), "method") || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "flashSuccess"), "method"))) {
            // line 63
            echo "                        <div class=\"flash-success\">
                            ";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "loanMesage"), "method")), "html", null, true);
            echo "
                            ";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "flashSuccess"), "method")), "html", null, true);
            echo "    
                        </div>
                    ";
        }
        // line 68
        echo "                    ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "logerr"), "method")) {
            // line 69
            echo "                        <div class=\"flash-error\">
                            ";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "logerr"), "method")), "html", null, true);
            echo "
                        </div>
                    ";
        }
        // line 73
        echo "                    <!-- main container -->
                    ";
        // line 74
        $this->displayBlock('maincontent', $context, $blocks);
        // line 76
        echo "                    <!-- and main container -->
                    </div>
                </section>

                <aside class=\"sidebar sidebar-right\">
                    <div class=\"inner\">
                        ";
        // line 82
        $this->displayBlock('rightsidebar', $context, $blocks);
        // line 103
        echo "                        <div id=\"poll-continer-block\" class=\"poll-continer-block sidebar-block\">
                        ";
        // line 104
        $this->displayBlock('poll', $context, $blocks);
        // line 107
        echo "                        </div>
                    </div>
                </aside>
            </section>

            <footer id=\"footer\">
                ";
        // line 113
        $this->displayBlock('footer', $context, $blocks);
        // line 116
        echo "            </footer>
        </section>
    </body>

    <!-- requests calendar -->
    <script type=\"text/javascript\">
        \$('#loan_popup').fancybox({
            openEffect  : 'fadeIn',
            closeEffect : 'fadeOut',
            type:'ajax',
            maxWidth\t: 700,
            maxHeight\t: 600,
            fitToView\t: false,
            width\t\t: '600',
            height\t\t: '400',
            autoSize\t: false,
            closeClick\t: false,
            helpers: {
                title: false
            }
        });
    </script>

</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/ui-lightness/jquery-ui-1.8.21.custom.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/fancyBox/jquery.fancybox.css"), "html", null, true);
        echo "\" />
        ";
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        // line 12
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.7.2.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.21.custom.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/fancyBox/jquery.fancybox.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    // line 22
    public function block_navigation($context, array $blocks = array())
    {
        // line 23
        echo "                        ";
        $this->env->loadTemplate("XshareGeneralBundle::menu.html.twig")->display($context);
        // line 24
        echo "                    ";
    }

    // line 28
    public function block_search($context, array $blocks = array())
    {
        // line 29
        echo "                        ";
        $this->env->loadTemplate("XshareProductBundle::search.html.twig")->display($context);
        // line 30
        echo "                    ";
    }

    // line 33
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 34
        echo "                        ";
        echo $this->env->getExtension('breadcrumbs')->renderBreadcrumbs();
        echo "
                    ";
    }

    // line 42
    public function block_leftsidebar($context, array $blocks = array())
    {
        // line 43
        echo "                        <div class=\"recent-products\">
                            ";
        // line 44
        echo $this->env->getExtension('actions')->renderAction("XshareProductBundle:Product:recentProductsBlock", array(), array());
        // line 45
        echo "                        </div>
                        <div class=\"sidebar-block top-users\">
                            ";
        // line 47
        $this->displayBlock('topusers', $context, $blocks);
        // line 50
        echo "                        </div>
                        <div class=\"sidebar-block top-search\">
                            ";
        // line 52
        $this->displayBlock('topsearch', $context, $blocks);
        // line 55
        echo "                        </div>
                    ";
    }

    // line 47
    public function block_topusers($context, array $blocks = array())
    {
        // line 48
        echo "                                ";
        echo $this->env->getExtension('actions')->renderAction("XshareUserBundle:User:topUsersList", array(), array());
        // line 49
        echo "                            ";
    }

    // line 52
    public function block_topsearch($context, array $blocks = array())
    {
        // line 53
        echo "                                ";
        echo $this->env->getExtension('actions')->renderAction("XshareProductBundle:Search:topSearchList", array(), array());
        // line 54
        echo "                            ";
    }

    // line 74
    public function block_maincontent($context, array $blocks = array())
    {
        // line 75
        echo "                    ";
    }

    // line 82
    public function block_rightsidebar($context, array $blocks = array())
    {
        // line 83
        echo "                            ";
        if ($this->getAttribute($this->getContext($context, "app"), "user")) {
            // line 84
            echo "                                ";
            // line 85
            echo "                                ";
            echo $this->env->getExtension('actions')->renderAction("XshareSecurityBundle:Security:welcome", array(), array());
            // line 86
            echo "                            ";
        } else {
            // line 87
            echo "                                ";
            // line 88
            echo "                                ";
            echo $this->env->getExtension('actions')->renderAction("XshareSecurityBundle:Security:login", array(), array());
            // line 89
            echo "                            ";
        }
        // line 90
        echo "                        ";
        if (($this->getAttribute($this->getContext($context, "app"), "user") != null)) {
            // line 91
            echo "                        <div class=\"sidebar-block user-product-recent-requests\">
                            ";
            // line 92
            $this->displayBlock('recentrequests', $context, $blocks);
            // line 95
            echo "                        </div>
                        <div class=\"sidebar-block user-recent-requests\">
                            ";
            // line 97
            $this->displayBlock('myrecentrequests', $context, $blocks);
            // line 100
            echo "                        </div>
                        ";
        }
        // line 102
        echo "                        ";
    }

    // line 92
    public function block_recentrequests($context, array $blocks = array())
    {
        // line 93
        echo "                                ";
        echo $this->env->getExtension('actions')->renderAction("XshareProductBundle:Requests:recentRequestedUsersProducts", array(), array());
        // line 94
        echo "                            ";
    }

    // line 97
    public function block_myrecentrequests($context, array $blocks = array())
    {
        // line 98
        echo "                                ";
        echo $this->env->getExtension('actions')->renderAction("XshareProductBundle:Requests:recentUserRequests", array(), array());
        // line 99
        echo "                            ";
    }

    // line 104
    public function block_poll($context, array $blocks = array())
    {
        // line 105
        echo "                            ";
        echo $this->env->getExtension('actions')->renderAction("XsharePollBundle:Poll:show", array(), array());
        // line 106
        echo "                        ";
    }

    // line 113
    public function block_footer($context, array $blocks = array())
    {
        // line 114
        echo "                    ";
        $this->env->loadTemplate("XshareGeneralBundle::menu.html.twig")->display($context);
        // line 115
        echo "                ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 115,  375 => 114,  372 => 113,  368 => 106,  365 => 105,  362 => 104,  358 => 99,  355 => 98,  352 => 97,  348 => 94,  345 => 93,  342 => 92,  338 => 102,  334 => 100,  332 => 97,  328 => 95,  326 => 92,  323 => 91,  320 => 90,  317 => 89,  314 => 88,  312 => 87,  309 => 86,  306 => 85,  304 => 84,  301 => 83,  298 => 82,  294 => 75,  291 => 74,  287 => 54,  284 => 53,  281 => 52,  277 => 49,  274 => 48,  271 => 47,  266 => 55,  264 => 52,  260 => 50,  258 => 47,  254 => 45,  252 => 44,  249 => 43,  246 => 42,  239 => 34,  236 => 33,  232 => 30,  229 => 29,  226 => 28,  222 => 24,  219 => 23,  216 => 22,  210 => 14,  206 => 13,  201 => 12,  198 => 11,  192 => 9,  188 => 8,  183 => 7,  180 => 6,  175 => 5,  148 => 116,  146 => 113,  138 => 107,  136 => 104,  133 => 103,  131 => 82,  123 => 76,  121 => 74,  118 => 73,  112 => 70,  109 => 69,  106 => 68,  100 => 65,  96 => 64,  93 => 63,  91 => 62,  84 => 57,  82 => 42,  74 => 36,  72 => 33,  68 => 31,  62 => 26,  57 => 22,  47 => 16,  42 => 6,  38 => 5,  32 => 1,  79 => 17,  76 => 16,  73 => 15,  69 => 13,  66 => 28,  63 => 11,  59 => 25,  56 => 14,  53 => 11,  50 => 10,  44 => 11,  39 => 6,  36 => 5,  30 => 3,);
    }
}
