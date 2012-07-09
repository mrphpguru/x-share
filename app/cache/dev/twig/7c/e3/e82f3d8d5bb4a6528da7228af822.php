<?php

/* XshareProductBundle:Category:listCategory.html.twig */
class __TwigTemplate_7ce3e82f3d8d5bb4a6528da7228af822 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'maincontent' => array($this, 'block_maincontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Categories list"), "html", null, true);
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/xshareproduct/css/category.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 10
    public function block_maincontent($context, array $blocks = array())
    {
        // line 11
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "category-deleted"), "method")) {
            // line 12
            echo "    <div class=\"product-result-notice\">
        ";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "category-deleted"), "method")), "html", null, true);
            echo "
    </div>
";
        }
        // line 16
        echo "
<h2 class=\"header\" id=\"categories-list-header\">";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Categories"), "html", null, true);
        echo "</h2>
<div class=\"filters\">
    <ul class=\"filter filter-category fright\">
        <li id=\"filter-date\">
            <a class=\"";
        // line 21
        echo (((($this->getContext($context, "title") != null) || ($this->getContext($context, "unities") != null))) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("data" => "asc")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
        echo "</a>
            <a class=\"";
        // line 22
        echo ((($this->getContext($context, "data") == "asc")) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("data" => "desc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
        echo "\" >
                ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-asc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>
            <a class=\"";
        // line 25
        echo (((($this->getContext($context, "data") == "desc") || ((($this->getContext($context, "data") == null) && ($this->getContext($context, "title") == null)) && ($this->getContext($context, "unities") == null)))) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("data" => "asc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
        echo "\" >
                ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
        echo "<img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-desc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>     
        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        
        <li id=\"filter-title\"> 
            <a class=\"";
        // line 31
        echo ((((($this->getContext($context, "data") != null) || ($this->getContext($context, "unities") != null)) || ($this->getContext($context, "title") == null))) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("title" => "asc")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
        echo "</a>
            <a class=\"";
        // line 32
        echo ((($this->getContext($context, "title") == "asc")) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("title" => "desc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
        echo "\" >
                ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-asc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>
            <a class=\"";
        // line 35
        echo ((($this->getContext($context, "title") == "desc")) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("title" => "asc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
        echo "\" >
                ";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
        echo "<img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-desc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>           
        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        
        <li id=\"filter-unities\">
            <a class=\"";
        // line 41
        echo ((((($this->getContext($context, "data") != null) || ($this->getContext($context, "title") != null)) || ($this->getContext($context, "unities") == null))) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("unities" => "asc")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Units"), "html", null, true);
        echo "</a>
            <a class=\"";
        // line 42
        echo ((($this->getContext($context, "unities") == "asc")) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("unities" => "desc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
        echo "\" >
                ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Units"), "html", null, true);
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-asc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>
            <a class=\"";
        // line 45
        echo ((($this->getContext($context, "unities") == "desc")) ? ("shown") : ("hidden"));
        echo "\"  href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_list", array("unities" => "asc")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
        echo "\" >
                ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Units"), "html", null, true);
        echo "<img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sort-desc.png"), "html", null, true);
        echo "\" class=\"sort-image\"/>
            </a>    
        </li>
    </ul>
    <div class=\"clear\"></div>
</div>
<br/>
<div class=\"category-list\" id=\"categories\"> 

    <ul class=\"entity-items\">
        ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "pager"), "getResults"));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 57
            echo "            <li>
                <div class=\"entity-name\"><a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_category_show", array("id" => $this->getAttribute($this->getContext($context, "category"), "category_id", array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category"), "name"), "html", null, true);
            echo "</a></div>
                <div class=\"entity-added\"> - ";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("added at"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "category"), "created_at", array(), "array"), "d/m/Y"), "html", null, true);
            echo "</div>
                <div class=\"entity-unities\"> - ";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category"), "units", array(), "array"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("units"), "html", null, true);
            echo "</div>
                <div class=\"entity-links\">
                    <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_details", array("id" => $this->getAttribute($this->getContext($context, "category"), "user_id", array(), "array"))), "html", null, true);
            echo "\">
                        ";
            // line 63
            if (($this->getAttribute($this->getContext($context, "category"), "sex", array(), "array") == "m")) {
                // line 64
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/user.png"), "html", null, true);
                echo "\">
                        ";
            } else {
                // line 66
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/user_woman.png"), "html", null, true);
                echo "\">
                        ";
            }
            // line 68
            echo "                    </a>
                    <a href=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_category_show", array("id" => $this->getAttribute($this->getContext($context, "category"), "category_id", array(), "array"))), "html", null, true);
            echo "\">
                        <img src=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/info-icon.png"), "html", null, true);
            echo "\">
                    </a>
                </div>
                <div class=\"clear\"></div>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "    </ul>
    ";
        // line 77
        if ($this->getAttribute($this->getContext($context, "pager"), "isPaginable")) {
            // line 78
            echo "            ";
            echo $this->env->getExtension('pager')->paginate($this->getContext($context, "pager"), "category_list_page", $this->getContext($context, "block_length"), array("data" => $this->getContext($context, "data"), "title" => $this->getContext($context, "title"), "unities" => $this->getContext($context, "unities")));
            echo "           
    ";
        }
        // line 79
        echo "    
</div>

        
";
    }

    public function getTemplateName()
    {
        return "XshareProductBundle:Category:listCategory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 79,  268 => 78,  266 => 77,  263 => 76,  251 => 70,  247 => 69,  244 => 68,  238 => 66,  232 => 64,  230 => 63,  226 => 62,  219 => 60,  213 => 59,  207 => 58,  204 => 57,  200 => 56,  185 => 46,  177 => 45,  170 => 43,  162 => 42,  154 => 41,  144 => 36,  136 => 35,  129 => 33,  121 => 32,  113 => 31,  103 => 26,  95 => 25,  88 => 23,  80 => 22,  72 => 21,  65 => 17,  62 => 16,  56 => 13,  53 => 12,  51 => 11,  48 => 10,  42 => 7,  37 => 6,  34 => 5,  28 => 3,);
    }
}
