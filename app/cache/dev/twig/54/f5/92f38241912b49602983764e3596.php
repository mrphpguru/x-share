<?php

/* XshareGeneralBundle:Default:index.html.twig */
class __TwigTemplate_54f592f38241912b49602983764e3596 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'maincontent' => array($this, 'block_maincontent'),
            'top3categories' => array($this, 'block_top3categories'),
            'top6products' => array($this, 'block_top6products'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Home"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/xsharegeneral/css/top-categories.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 10
    public function block_maincontent($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->displayBlock('top3categories', $context, $blocks);
        // line 14
        echo "
    ";
        // line 15
        $this->displayBlock('top6products', $context, $blocks);
    }

    // line 11
    public function block_top3categories($context, array $blocks = array())
    {
        // line 12
        echo "        ";
        $this->env->loadTemplate("XshareProductBundle:Category:topThreeCategories.html.twig")->display(array_merge($context, array("categories" => $this->getContext($context, "categories"))));
        // line 13
        echo "    ";
    }

    // line 15
    public function block_top6products($context, array $blocks = array())
    {
        // line 16
        echo "        ";
        $this->env->loadTemplate("XshareProductBundle:Product:topSixProducts.html.twig")->display(array_merge($context, array("products" => $this->getContext($context, "products"), "prod_available" => $this->getContext($context, "prod_available"))));
        // line 17
        echo "    ";
    }

    public function getTemplateName()
    {
        return "XshareGeneralBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 17,  76 => 16,  73 => 15,  69 => 13,  66 => 12,  63 => 11,  59 => 15,  56 => 14,  53 => 11,  50 => 10,  44 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}
