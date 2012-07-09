<?php

/* XshareProductBundle:Product:listOfAllProducts.html.twig */
class __TwigTemplate_47ee58b510f661b925f5805aa65ef1bc extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Products list"), "html", null, true);
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
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/xshareproduct/css/product.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 11
    public function block_maincontent($context, array $blocks = array())
    {
        // line 12
        echo "<h2 class=\"header\" id=\"products-list-header\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Products list"), "html", null, true);
        echo "</h2>
<div class=\"filters\">
    <ul class=\"filter filter-category fright\">
        <li id=\"filter-date\">
            ";
        // line 16
        if (($this->getContext($context, "orderby") == 0)) {
            // line 17
            echo "                <a class=\"desc\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 1, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
            echo "</a>
            ";
        } elseif (($this->getContext($context, "orderby") == 1)) {
            // line 19
            echo "                <a class=\"asc\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list", array("orderby" => 0, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 21
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list", array("orderby" => 0, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
            echo "</a>
            ";
        }
        // line 23
        echo "                        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        <li id=\"filter-title\">
            ";
        // line 25
        if (($this->getContext($context, "orderby") == 21)) {
            // line 26
            echo "                <a class=\"desc\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 22, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
            echo "</a>
            ";
        } elseif (($this->getContext($context, "orderby") == 22)) {
            // line 28
            echo "                <a class=\"asc\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 21, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 30
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 21, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Title"), "html", null, true);
            echo "</a>
            ";
        }
        // line 32
        echo "                        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        <li id=\"filter-category\">
            ";
        // line 34
        if (($this->getContext($context, "orderby") == 31)) {
            // line 35
            echo "                <a class=\"desc\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 32, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category"), "html", null, true);
            echo "</a>
            ";
        } elseif (($this->getContext($context, "orderby") == 32)) {
            // line 37
            echo "                <a class=\"asc\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 31, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 39
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 31, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category"), "html", null, true);
            echo "</a>
            ";
        }
        // line 41
        echo "        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        <li id=\"filter-username\">
            ";
        // line 43
        if (($this->getContext($context, "orderby") == 41)) {
            // line 44
            echo "                <a class=\"desc\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 42, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User"), "html", null, true);
            echo "</a>
            ";
        } elseif (($this->getContext($context, "orderby") == 42)) {
            // line 46
            echo "                <a class=\"asc\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 41, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 48
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 41, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User"), "html", null, true);
            echo "</a>
            ";
        }
        // line 50
        echo "        </li>
        </li><span class=\"delimiter\">&nbsp;|&nbsp;</span>
        <li id=\"filter-loanded\">
            ";
        // line 53
        if (($this->getContext($context, "orderby") == 51)) {
            // line 54
            echo "                <a class=\"desc\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 52, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
            echo "</a>
            ";
        } elseif (($this->getContext($context, "orderby") == 52)) {
            // line 56
            echo "                <a class=\"asc\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 51, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ascending sort"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 58
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_products_list_page", array("orderby" => 51, "page" => $this->getContext($context, "page"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descending sort"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
            echo "</a>
            ";
        }
        // line 60
        echo "        </li>
    </ul>
    <div class=\"clear\"></div>
</div>
<br/>
<div class=\"category-list\" id=\"allproducts\">
    <div class=\"product-items-continer\" >
            <div class=\"clear\"></div>

                    ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "pager"), "getResults"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 70
            echo "                    <div class=\"product-item\">
                        <table cellspacing=\"0\" cellpadding=\"0\" >
                            <tr>
                                <td>
                                    <div class=\"product-info fleft\">
                                    <img src=\"/uploads/categories/";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "product"), "category", array(), "array"), "image", array(), "array"), "html", null, true);
            echo "\" width=\"20px\" height=\"20px\" >
                                    <a class=\"category-link\" href=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_category_show", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "product"), "category", array(), "array"), "category_id", array(), "array"))), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "product"), "category", array(), "array"), "name", array(), "array"), "html", null, true);
            echo "</a>
                                    - <a class=\"product-link\" href=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_show_product", array("pid" => $this->getAttribute($this->getContext($context, "product"), "product_id", array(), "array"))), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "name", array(), "array"), "html", null, true);
            echo "</a> ,
                                    </div>
                                    <div class=\"entity-added\">
                                        ";
            // line 80
            echo $this->env->getExtension('translator')->getTranslator()->trans("added by", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "product"), "user", array(), "array"), "username", array(), "array"), "html", null, true);
            echo "
                                        <a href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_details", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "product"), "user", array(), "array"), "user_id", array(), "array"))), "html", null, true);
            echo "\" class=\"user-image\">
                                            ";
            // line 82
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "user", array(), "array"), "sex", array(), "array") == "m")) {
                // line 83
                echo "                                                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/user.png"), "html", null, true);
                echo "\" />
                                            ";
            } else {
                // line 85
                echo "                                                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/user_woman.png"), "html", null, true);
                echo "\" />
                                            ";
            }
            // line 87
            echo "                                        </a>
                                        ";
            // line 88
            echo $this->env->getExtension('translator')->getTranslator()->trans("at", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "created_at", array(), "array"), "d-m-Y"), "html", null, true);
            echo "
                                    </div>
                                        &nbsp;
                                    <td width=\"3%\"  align=\"right\" valign=\"middle\" >
                          ";
            // line 92
            if ((!(null === $this->getAttribute($this->getContext($context, "app"), "user")))) {
                // line 93
                echo "
                            ";
                // line 94
                $context["sesuserid"] = $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "getUserId", array(), "method");
                // line 95
                echo "                            ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "user", array(), "array"), "user_id", array(), "array") != $this->getContext($context, "sesuserid"))) {
                    // line 96
                    echo "                                <a class=\"loan-popup-class\" id=\"loan_popup\" data-fancybox-type=\"ajax\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_ajax_loan", array("pid" => $this->getAttribute($this->getContext($context, "product"), "product_id"))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loan now"), "html", null, true);
                    echo "\" >
                                    <img src=\"";
                    // line 97
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/request.png"), "html", null, true);
                    echo "\" /></a>
                            ";
                }
                // line 99
                echo "                          ";
            } else {
                // line 100
                echo "                                <a class=\"loan-popup-class\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_registration"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loan now"), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/request.png"), "html", null, true);
                echo "\" /></a>
                          ";
            }
            // line 102
            echo "                                </td>
                                <td width=\"3%\" align=\"right\" valign=\"middle\" >
                                    ";
            // line 104
            $context["status"] = (($this->getAttribute($this->getContext($context, "product"), "status", array(), "array")) ? ("available") : ("loaned"));
            // line 105
            echo "                                    <span class=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "status"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "status")), "html", null, true);
            echo "\" >&nbsp;</span>
                            </tr>
                        </table>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 110
        echo "
                    ";
        // line 111
        if ($this->getAttribute($this->getContext($context, "pager"), "isPaginable")) {
            // line 112
            echo "                        ";
            echo $this->env->getExtension('pager')->paginate($this->getContext($context, "pager"), "all_products_list_page", $this->getContext($context, "block_length"), array("orderby" => $this->getContext($context, "orderby")));
            echo "
                    ";
        }
        // line 114
        echo "            </div>
    </div>
</div>


";
    }

    public function getTemplateName()
    {
        return "XshareProductBundle:Product:listOfAllProducts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 114,  376 => 112,  374 => 111,  371 => 110,  357 => 105,  355 => 104,  351 => 102,  341 => 100,  338 => 99,  333 => 97,  326 => 96,  323 => 95,  321 => 94,  318 => 93,  316 => 92,  307 => 88,  304 => 87,  298 => 85,  292 => 83,  290 => 82,  286 => 81,  280 => 80,  272 => 77,  266 => 76,  262 => 75,  255 => 70,  251 => 69,  240 => 60,  230 => 58,  220 => 56,  210 => 54,  208 => 53,  203 => 50,  193 => 48,  183 => 46,  173 => 44,  171 => 43,  167 => 41,  157 => 39,  147 => 37,  137 => 35,  135 => 34,  131 => 32,  121 => 30,  111 => 28,  101 => 26,  99 => 25,  95 => 23,  85 => 21,  75 => 19,  65 => 17,  63 => 16,  55 => 12,  52 => 11,  46 => 8,  42 => 7,  37 => 6,  34 => 5,  28 => 3,);
    }
}
