<?php

/* XshareUserBundle:User:usersList.html.twig */
class __TwigTemplate_ee5de9835de0bbdf2f1bee37fc39ff47 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Users list"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/xshareuser/css/users.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 10
    public function block_maincontent($context, array $blocks = array())
    {
        // line 11
        echo "    <!-- filters -->
    <div class=\"filters\">
        <ul>
            <li>
            ";
        // line 15
        if (($this->getAttribute($this->getContext($context, "filter"), "sort") == "username")) {
            // line 16
            echo "                    ";
            if (($this->getAttribute($this->getContext($context, "filter"), "order") == "asc")) {
                // line 17
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "username", "order" => "desc")), "html", null, true);
                echo "\">
                    ";
                // line 18
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By username"), "html", null, true);
                echo " <span class=\"arrow asc\"></span>
                </a>
                    ";
            } else {
                // line 21
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "username", "order" => "asc")), "html", null, true);
                echo "\">
                    ";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By username"), "html", null, true);
                echo " <span class=\"arrow desc\"></span>
                </a>
                    ";
            }
            // line 25
            echo "            ";
        } else {
            // line 26
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "username")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By username"), "html", null, true);
            echo " </a>
            ";
        }
        // line 28
        echo "            </li>
            <li>
            ";
        // line 30
        if (($this->getAttribute($this->getContext($context, "filter"), "sort") == "products")) {
            // line 31
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "filter"), "order") == "asc")) {
                // line 32
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "products", "order" => "desc")), "html", null, true);
                echo "\">
                    ";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By products"), "html", null, true);
                echo " <span class=\"arrow asc\"></span>
                </a>
                ";
            } else {
                // line 36
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "products", "order" => "asc")), "html", null, true);
                echo "\">
                    ";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By products"), "html", null, true);
                echo " <span class=\"arrow desc\"></span>
                </a>
                ";
            }
            // line 40
            echo "            ";
        } else {
            // line 41
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("all_users_list", array("page" => $this->getContext($context, "page"), "sort" => "products")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By products"), "html", null, true);
            echo "</a>
            ";
        }
        // line 43
        echo "            </li>
        </ul>
    </div>
    <!-- users list -->
    ";
        // line 47
        $this->env->loadTemplate("XshareUserBundle:User:userListItems.html.twig")->display(array_merge($context, array("paginator" => $this->getContext($context, "paginator"))));
        // line 48
        echo "    ";
        if ($this->getAttribute($this->getContext($context, "paginator"), "isPaginable")) {
            // line 49
            echo "        ";
            echo $this->env->getExtension('pager')->paginate($this->getContext($context, "paginator"), "all_users_list", $this->getContext($context, "usersLimit"), array("page" => $this->getContext($context, "page"), "sort" => $this->getContext($context, "sort"), "order" => $this->getContext($context, "order")));
            echo "
    ";
        }
        // line 51
        echo "
";
    }

    public function getTemplateName()
    {
        return "XshareUserBundle:User:usersList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 51,  148 => 49,  145 => 48,  143 => 47,  137 => 43,  129 => 41,  126 => 40,  120 => 37,  115 => 36,  109 => 33,  104 => 32,  101 => 31,  99 => 30,  95 => 28,  87 => 26,  84 => 25,  78 => 22,  73 => 21,  67 => 18,  62 => 17,  59 => 16,  57 => 15,  51 => 11,  48 => 10,  42 => 7,  37 => 6,  34 => 5,  28 => 3,);
    }
}
