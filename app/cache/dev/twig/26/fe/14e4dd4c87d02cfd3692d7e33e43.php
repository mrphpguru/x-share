<?php

/* XshareUserBundle:User:userListItems.html.twig */
class __TwigTemplate_26fe14e4dd4c87d02cfd3692d7e33e43 extends Twig_Template
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
        echo "<div class=\"entity-block-list list-of-users\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "paginator"), "getResults"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 3
            echo "
        <div class=\"entity\">
            <div class=\"entity-image\">
                <a href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_details", array("id" => $this->getAttribute($this->getContext($context, "user"), "user_id"))), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(twig_join_filter(array(0 => "/uploads/users/", 1 => $this->getAttribute($this->getContext($context, "user"), "photo")))), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "username"), "html", null, true);
            echo "\" />
                </a>
            </div>
            <div class=\"entity-details\">
                <div><a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_details", array("id" => $this->getAttribute($this->getContext($context, "user"), "user_id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastname"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "username"), "html", null, true);
            echo ")</a></div>

                ";
            // line 13
            $context["img_src"] = "user.png";
            // line 14
            echo "
                ";
            // line 15
            if (($this->getAttribute($this->getContext($context, "user"), "sex") == "w")) {
                // line 16
                echo "                    ";
                $context["img_src"] = "user_woman.png";
                // line 17
                echo "                ";
            }
            // line 18
            echo "
                <div>";
            // line 19
            echo twig_escape_filter($this->env, sprintf("%d", $this->getAttribute($this->getContext($context, "user"), "age")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("years"), "html", null, true);
            echo " <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(twig_join_filter(array(0 => "/images/", 1 => $this->getContext($context, "img_src")))), "html", null, true);
            echo "\" alt=\"\" /></div>
                <div>
                    ";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("products"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "products"), "html", null, true);
            echo "
                    (<span class=\"available\">";
            // line 22
            echo twig_escape_filter($this->env, sprintf("%d", $this->getAttribute($this->getContext($context, "user"), "available")), "html", null, true);
            echo "</span>
                        ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("and"), "html", null, true);
            echo "
                    <span class=\"loaned\">";
            // line 24
            echo twig_escape_filter($this->env, sprintf("%d", ($this->getAttribute($this->getContext($context, "user"), "products") - $this->getAttribute($this->getContext($context, "user"), "available"))), "html", null, true);
            echo "</span>)
                </div>
            </div>
        </div>

    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 30
            echo "        <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("There're no users in DB"), "html", null, true);
            echo "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "</div>
<div class=\"clear\"></div>";
    }

    public function getTemplateName()
    {
        return "XshareUserBundle:User:userListItems.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 32,  93 => 24,  89 => 23,  85 => 22,  79 => 21,  70 => 19,  64 => 17,  61 => 16,  56 => 14,  54 => 13,  43 => 11,  30 => 6,  25 => 3,  20 => 2,  17 => 1,  154 => 51,  148 => 49,  145 => 48,  143 => 47,  137 => 43,  129 => 41,  126 => 40,  120 => 37,  115 => 36,  109 => 33,  104 => 30,  101 => 31,  99 => 30,  95 => 28,  87 => 26,  84 => 25,  78 => 22,  73 => 21,  67 => 18,  62 => 17,  59 => 15,  57 => 15,  51 => 11,  48 => 10,  42 => 7,  37 => 6,  34 => 7,  28 => 3,);
    }
}
