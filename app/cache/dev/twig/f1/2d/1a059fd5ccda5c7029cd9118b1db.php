<?php

/* XshareGeneralBundle::menu.html.twig */
class __TwigTemplate_f12d1a059fd5ccda5c7029cd9118b1db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav>
    <ul class=\"navigation\">
        <li class=\"menu-item ";
        // line 3
        if ((!array_key_exists("menu", $context))) {
            echo "active";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_general_default_index"), "html", null, true);
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Home", array(), "messages");
        echo "</a></li>
        <li class=\"menu-item ";
        // line 4
        if ($this->getAttribute($this->getContext($context, "menu", true), "users", array(), "any", true, true)) {
            echo "active";
        }
        echo " \"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list"), "html", null, true);
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Users", array(), "messages");
        echo "</a></li>
        <li class=\"menu-item ";
        // line 5
        if ($this->getAttribute($this->getContext($context, "menu", true), "categories", array(), "any", true, true)) {
            echo "active";
        }
        echo " \"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list"), "html", null, true);
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Categories", array(), "messages");
        echo "</a></li>
        <li class=\"menu-item ";
        // line 6
        if ($this->getAttribute($this->getContext($context, "menu", true), "products", array(), "any", true, true)) {
            echo "active";
        }
        echo " \"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list"), "html", null, true);
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Products", array(), "messages");
        echo "</a></li>        
        <li class=\"menu-item last ";
        // line 7
        if ($this->getAttribute($this->getContext($context, "menu", true), "contact", array(), "any", true, true)) {
            echo "active";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_contact"), "html", null, true);
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contacts", array(), "messages");
        echo "</a></li>
    </ul>
    <div class=\"clear\"></div>
</nav>
<script type=\"text/javascript\">
    \$(document).ready(function() {
        \$centralBlock = \$('#main').height();
        \$sideBarLeft = \$('.sidebar-left').height();
        \$sideBarRight = \$('.sidebar-right').height();
        if(\$sideBarLeft>\$sideBarRight){
            \$height = \$sideBarLeft;
        }else{
             \$height = \$sideBarRight;
        }
        if(\$centralBlock>\$height){
            \$('.sidebar').height(\$('#main').height());
        }else{
            \$('#main').height(\$height);
        }
    });
</script>    


";
    }

    public function getTemplateName()
    {
        return "XshareGeneralBundle::menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 7,  51 => 6,  41 => 5,  31 => 4,  21 => 3,  17 => 1,  378 => 115,  375 => 114,  372 => 113,  368 => 106,  365 => 105,  362 => 104,  358 => 99,  355 => 98,  352 => 97,  348 => 94,  345 => 93,  342 => 92,  338 => 102,  334 => 100,  332 => 97,  328 => 95,  326 => 92,  323 => 91,  320 => 90,  317 => 89,  314 => 88,  312 => 87,  309 => 86,  306 => 85,  304 => 84,  301 => 83,  298 => 82,  294 => 75,  291 => 74,  287 => 54,  284 => 53,  281 => 52,  277 => 49,  274 => 48,  271 => 47,  266 => 55,  264 => 52,  260 => 50,  258 => 47,  254 => 45,  252 => 44,  249 => 43,  246 => 42,  239 => 34,  236 => 33,  232 => 30,  229 => 29,  226 => 28,  222 => 24,  219 => 23,  216 => 22,  210 => 14,  206 => 13,  201 => 12,  198 => 11,  192 => 9,  188 => 8,  183 => 7,  180 => 6,  175 => 5,  148 => 116,  146 => 113,  138 => 107,  136 => 104,  133 => 103,  131 => 82,  123 => 76,  121 => 74,  118 => 73,  112 => 70,  109 => 69,  106 => 68,  100 => 65,  96 => 64,  93 => 63,  91 => 62,  84 => 57,  82 => 42,  74 => 36,  72 => 33,  68 => 31,  62 => 26,  57 => 22,  47 => 16,  42 => 6,  38 => 5,  32 => 1,  79 => 17,  76 => 16,  73 => 15,  69 => 13,  66 => 28,  63 => 11,  59 => 25,  56 => 14,  53 => 11,  50 => 10,  44 => 11,  39 => 6,  36 => 5,  30 => 3,);
    }
}
