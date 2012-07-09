<?php

/* XshareProductBundle::search.html.twig */
class __TwigTemplate_bb89a2ba9ba37ec41440cd77b34792c4 extends Twig_Template
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
        echo "<div class=\"ui-widget search-box\">
<form action=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("general_search"), "html", null, true);
        echo "\" method=\"get\" id=\"search-form\" >
    <input type=\"text\" id=\"search-input\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search"), "html", null, true);
        echo "...\" name=\"search-keyword\" />
    <input class=\"search-button\" type=\"submit\" value=\"\" />
</form>
</div>
";
        // line 7
        echo $this->env->getExtension('actions')->renderAction("XshareProductBundle:Category:categoriesList", array(), array());
        // line 8
        echo "
<script type=\"text/javascript\">

    \$(function(){

        //remove default value
        \$('#search-input').focus(function(evt){
            if(\$(this).val() == '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search"), "html", null, true);
        echo "...')
                \$(this).val('');
        });

        //add default value
        \$('#search-input').blur(function(evt){
            if(\$(this).val() == '')
                \$(this).val('";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search"), "html", null, true);
        echo "...');
        });

        //form submit functionality
        \$('#search-form').submit(
            function(evt){
                evt.preventDefault();
                var searchVal = \$.trim(\$('input[type=\"text\"]', \$(this)).val());
                if(searchVal.length > 1) {
                    window.location = \$(this).attr('action') + '/' + searchVal;
                }
            }
        );

        //autcomplit
        var cache = {}, lastXhr;

        \$( '#search-input' ).autocomplete({
            minLength: 3,
            source: function( request, response ) {
                var term = request.term;
                console.log(term);
                if ( term in cache ) {
                    response( cache[ term ] );
                    return;
                }

                lastXhr = \$.getJSON( \"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("search_autocomplete"), "html", null, true);
        echo "\", request, function( data, status, xhr ) {
                    cache[ term ] = data;
                    if ( xhr === lastXhr ) {
                        response( data );
                    }
                });
            }
        });

    });

</script>";
    }

    public function getTemplateName()
    {
        return "XshareProductBundle::search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 22,  24 => 3,  20 => 2,  37 => 10,  33 => 8,  26 => 5,  22 => 4,  61 => 7,  51 => 6,  41 => 5,  31 => 7,  21 => 3,  17 => 1,  378 => 115,  375 => 114,  372 => 113,  368 => 106,  365 => 105,  362 => 104,  358 => 99,  355 => 98,  352 => 97,  348 => 94,  345 => 93,  342 => 92,  338 => 102,  334 => 100,  332 => 97,  328 => 95,  326 => 92,  323 => 91,  320 => 90,  317 => 89,  314 => 88,  312 => 87,  309 => 86,  306 => 85,  304 => 84,  301 => 83,  298 => 82,  294 => 75,  291 => 74,  287 => 54,  284 => 53,  281 => 52,  277 => 49,  274 => 48,  271 => 47,  266 => 55,  264 => 52,  260 => 50,  258 => 47,  254 => 45,  252 => 44,  249 => 43,  246 => 42,  239 => 34,  236 => 33,  232 => 30,  229 => 29,  226 => 28,  222 => 24,  219 => 23,  216 => 22,  210 => 14,  206 => 13,  201 => 12,  198 => 11,  192 => 9,  188 => 8,  183 => 7,  180 => 6,  175 => 5,  148 => 116,  146 => 113,  138 => 107,  136 => 104,  133 => 103,  131 => 82,  123 => 76,  121 => 74,  118 => 73,  112 => 70,  109 => 69,  106 => 68,  100 => 65,  96 => 64,  93 => 63,  91 => 62,  84 => 57,  82 => 49,  74 => 36,  72 => 33,  68 => 31,  62 => 26,  57 => 22,  47 => 16,  42 => 15,  38 => 5,  32 => 1,  79 => 17,  76 => 16,  73 => 15,  69 => 13,  66 => 28,  63 => 11,  59 => 25,  56 => 14,  53 => 11,  50 => 10,  44 => 11,  39 => 6,  36 => 5,  30 => 3,);
    }
}
