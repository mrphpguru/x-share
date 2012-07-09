<?php

/* XshareProductBundle:Product:topSixProducts.html.twig */
class __TwigTemplate_02a097948b2d9d6e81d8afab1793c147 extends Twig_Template
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
        echo "<h2 class=\"top-header\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Top products"), "html", null, true);
        echo "</h2>
<div class=\"products-block\" id=\"home-top-products\">
     ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 4
            echo "     <div class=\"products-block-entity\" >
            <div class=\"products-block-entity-image\">
                ";
            // line 6
            if (($this->getAttribute($this->getContext($context, "product"), "status", array(), "array") == 1)) {
                // line 7
                echo "                    <span class=\"available\">&nbsp;</span>
                ";
            } else {
                // line 9
                echo "                    <span class=\"loaned\">&nbsp;</span>
                ";
            }
            // line 11
            echo "                <img src=\"/uploads/product/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "image", array(), "array"), "html", null, true);
            echo "\" />
            </div>
            <div class=\"products-block-entity-details\">
                <div>
                    <a class=\"liensRouge\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_show_product", array("pid" => $this->getAttribute($this->getContext($context, "product"), "product_id", array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "helper"), "cutLongText", array(0 => $this->getAttribute($this->getContext($context, "product"), "name", array(), "array"), 1 => 50, 2 => "..."), "method"), "html", null, true);
            echo "</a>
                </div>
                <div>
                    ";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category"), "html", null, true);
            echo "&nbsp;-&nbsp;
                    <span class=\"strong-text\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "category_name", array(), "array"), "html", null, true);
            echo "</span>
                </div>
                <div>
                    ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Added by"), "html", null, true);
            echo ":&nbsp;
                    <span class=\"strong-text\">
                        <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_details", array("id" => $this->getAttribute($this->getContext($context, "product"), "user_id", array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "username", array(), "array"), "html", null, true);
            echo "</a>
                    </span>
                </div>
                <div>
                    ";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Added at"), "html", null, true);
            echo ":&nbsp;
                    <span class=\"strong-text\">";
            // line 29
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "created_at", array(), "array"), "d-m-Y"), "html", null, true);
            echo "</span>
                </div>
                <div>
                    ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Popularity"), "html", null, true);
            echo ":&nbsp;
                    <span class=\"strong-text\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "loans", array(), "array"), "html", null, true);
            echo "</span>
                </div>
                ";
            // line 35
            if ((!(null === $this->getAttribute($this->getContext($context, "app"), "user")))) {
                // line 36
                echo "                    ";
                $context["sesuserid"] = $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "getUserId", array(), "method");
                // line 37
                echo "                    ";
                if (($this->getAttribute($this->getContext($context, "product"), "user_id", array(), "array") != $this->getContext($context, "sesuserid"))) {
                    // line 38
                    echo "                        <a class=\"loan-popup-class\" id=\"loan_popup\" data-fancybox-type=\"ajax\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_ajax_loan", array("pid" => $this->getAttribute($this->getContext($context, "product"), "product_id", array(), "array"))), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loan now"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 40
                echo "                ";
            } else {
                // line 41
                echo "                    <a class=\"loan-popup-class\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_registration"), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loan now"), "html", null, true);
                echo "</a>
                ";
            }
            // line 43
            echo "
                ";
            // line 44
            if ((($this->getAttribute($this->getContext($context, "product"), "status", array(), "array") == 0) && ($this->getAttribute($this->getContext($context, "prod_available"), $this->getAttribute($this->getContext($context, "product"), "product_id", array(), "array"), array(), "array") > 0))) {
                // line 45
                echo "                        <div>
                            ";
                // line 46
                $context["count"] = $this->getAttribute($this->getContext($context, "prod_available"), $this->getAttribute($this->getContext($context, "product"), "product_id", array(), "array"), array(), "array");
                // line 47
                echo "                            ";
                echo twig_escape_filter($this->env, ($this->env->getExtension('translator')->trans("Available in") . " "), "html", null, true);
                echo "
                            <span class=\"strong-text\">
                                ";
                // line 49
                echo twig_escape_filter($this->env, $this->getContext($context, "count"), "html", null, true);
                echo "
                                ";
                // line 50
                echo $this->env->getExtension('translator')->getTranslator()->transChoice("{1} day|]2,Inf] days", $this->getContext($context, "count"), array(), "messages");
                // line 53
                echo "                            </span>
                        </div>
                ";
            }
            // line 56
            echo "            </div>
    </div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "    <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("There're no products in DB"), "html", null, true);
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 61
        echo "    <br/>
    <div class=\"all-link\"><a class=\"liensRouge\" href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("top_products"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("view all list"), "html", null, true);
        echo "</a></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "XshareProductBundle:Product:topSixProducts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 61,  83 => 27,  60 => 19,  58 => 18,  28 => 4,  23 => 3,  45 => 10,  25 => 4,  70 => 10,  48 => 11,  19 => 2,  225 => 102,  213 => 93,  159 => 59,  151 => 54,  141 => 49,  125 => 39,  120 => 41,  88 => 16,  29 => 5,  27 => 5,  1395 => 778,  1391 => 776,  1384 => 772,  1380 => 771,  1374 => 768,  1370 => 767,  1366 => 766,  1362 => 764,  1360 => 763,  1336 => 742,  1326 => 735,  1270 => 684,  1267 => 683,  1265 => 682,  1228 => 647,  1226 => 640,  1217 => 634,  1213 => 633,  1208 => 631,  1204 => 630,  1199 => 628,  1195 => 626,  1193 => 625,  1190 => 624,  1173 => 609,  1167 => 605,  1152 => 592,  1150 => 591,  1121 => 564,  1119 => 559,  1113 => 556,  1108 => 554,  1104 => 552,  1102 => 551,  1099 => 550,  1092 => 545,  1085 => 540,  1083 => 539,  1078 => 537,  1073 => 535,  1068 => 532,  1065 => 531,  1062 => 526,  1060 => 525,  1057 => 524,  1054 => 523,  1051 => 518,  1049 => 517,  1046 => 516,  1043 => 515,  1040 => 510,  1038 => 509,  1035 => 508,  1032 => 507,  1029 => 502,  1027 => 501,  1024 => 500,  1021 => 499,  1018 => 494,  1015 => 493,  1013 => 492,  1010 => 491,  1003 => 486,  955 => 441,  901 => 390,  882 => 377,  876 => 373,  874 => 372,  868 => 369,  864 => 368,  858 => 365,  832 => 348,  830 => 347,  825 => 344,  819 => 342,  812 => 339,  801 => 337,  797 => 336,  793 => 334,  791 => 333,  783 => 327,  766 => 314,  764 => 313,  755 => 307,  751 => 306,  747 => 304,  745 => 303,  742 => 302,  717 => 291,  713 => 290,  708 => 288,  704 => 287,  691 => 285,  686 => 283,  681 => 281,  673 => 276,  668 => 274,  652 => 267,  647 => 265,  643 => 264,  638 => 262,  631 => 258,  616 => 252,  606 => 248,  601 => 246,  596 => 244,  591 => 242,  586 => 240,  580 => 237,  575 => 235,  569 => 232,  564 => 230,  558 => 227,  553 => 225,  549 => 224,  544 => 222,  535 => 219,  531 => 218,  522 => 215,  517 => 213,  513 => 212,  510 => 211,  506 => 209,  503 => 208,  497 => 206,  492 => 204,  486 => 200,  480 => 197,  473 => 193,  469 => 192,  465 => 190,  463 => 189,  460 => 188,  449 => 182,  445 => 180,  443 => 179,  440 => 178,  433 => 173,  391 => 144,  387 => 142,  385 => 141,  382 => 140,  373 => 134,  360 => 127,  350 => 123,  324 => 107,  310 => 103,  308 => 102,  293 => 98,  279 => 91,  276 => 90,  273 => 89,  265 => 84,  262 => 83,  255 => 78,  220 => 56,  181 => 43,  128 => 43,  116 => 4,  111 => 3,  34 => 7,  526 => 216,  521 => 182,  518 => 181,  509 => 176,  507 => 175,  505 => 174,  500 => 207,  495 => 170,  481 => 161,  472 => 159,  468 => 158,  464 => 157,  447 => 153,  444 => 152,  441 => 151,  438 => 150,  435 => 149,  426 => 146,  423 => 165,  420 => 144,  418 => 143,  401 => 137,  395 => 135,  393 => 134,  390 => 133,  381 => 128,  377 => 126,  364 => 128,  359 => 122,  356 => 126,  354 => 120,  351 => 119,  336 => 111,  321 => 109,  318 => 108,  316 => 105,  313 => 104,  305 => 101,  299 => 99,  297 => 99,  283 => 91,  275 => 88,  261 => 79,  242 => 71,  240 => 70,  234 => 68,  217 => 55,  215 => 54,  212 => 53,  202 => 53,  199 => 47,  194 => 50,  190 => 45,  177 => 41,  174 => 62,  172 => 39,  169 => 38,  156 => 30,  150 => 53,  145 => 26,  126 => 20,  103 => 36,  101 => 35,  98 => 23,  86 => 29,  81 => 14,  71 => 105,  46 => 1,  35 => 24,  1000 => 291,  995 => 290,  993 => 289,  990 => 288,  974 => 284,  952 => 283,  950 => 282,  947 => 281,  935 => 276,  931 => 275,  926 => 274,  924 => 273,  921 => 272,  912 => 266,  906 => 264,  903 => 263,  898 => 262,  896 => 261,  893 => 385,  886 => 255,  877 => 253,  873 => 252,  870 => 251,  867 => 250,  865 => 249,  862 => 248,  854 => 363,  852 => 362,  849 => 361,  842 => 356,  839 => 236,  831 => 231,  827 => 230,  823 => 229,  820 => 228,  818 => 227,  815 => 226,  807 => 222,  805 => 221,  802 => 220,  794 => 214,  792 => 213,  789 => 212,  781 => 208,  778 => 324,  776 => 206,  773 => 205,  752 => 201,  749 => 200,  746 => 199,  743 => 198,  741 => 197,  738 => 196,  730 => 190,  727 => 296,  725 => 188,  722 => 293,  715 => 184,  712 => 183,  709 => 182,  701 => 178,  698 => 177,  696 => 176,  693 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 270,  658 => 163,  656 => 268,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 256,  624 => 148,  621 => 254,  613 => 143,  611 => 250,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 221,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 177,  502 => 92,  498 => 171,  494 => 205,  490 => 89,  485 => 163,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 155,  450 => 154,  434 => 73,  432 => 148,  429 => 147,  419 => 65,  416 => 64,  413 => 141,  407 => 153,  405 => 152,  400 => 150,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  374 => 51,  366 => 49,  361 => 48,  357 => 47,  349 => 45,  347 => 122,  344 => 43,  335 => 115,  319 => 35,  300 => 32,  295 => 31,  292 => 30,  285 => 92,  282 => 27,  272 => 87,  270 => 126,  267 => 85,  259 => 78,  256 => 77,  253 => 118,  250 => 74,  248 => 73,  245 => 72,  237 => 68,  233 => 6,  228 => 5,  223 => 59,  214 => 281,  211 => 280,  209 => 92,  203 => 269,  196 => 82,  193 => 247,  191 => 242,  185 => 239,  178 => 226,  173 => 220,  170 => 219,  167 => 217,  165 => 212,  162 => 59,  160 => 205,  157 => 204,  155 => 56,  152 => 195,  149 => 193,  147 => 187,  144 => 49,  142 => 182,  139 => 48,  137 => 12,  134 => 11,  132 => 168,  129 => 167,  127 => 161,  124 => 160,  122 => 38,  119 => 153,  117 => 40,  114 => 146,  107 => 134,  104 => 133,  102 => 24,  99 => 623,  97 => 550,  94 => 549,  92 => 32,  89 => 490,  87 => 29,  77 => 12,  67 => 140,  64 => 21,  54 => 82,  49 => 2,  52 => 53,  24 => 8,  20 => 2,  37 => 36,  33 => 13,  26 => 3,  22 => 3,  61 => 86,  51 => 14,  41 => 7,  31 => 6,  21 => 3,  17 => 1,  378 => 53,  375 => 114,  372 => 113,  368 => 124,  365 => 105,  362 => 104,  358 => 99,  355 => 98,  352 => 124,  348 => 94,  345 => 93,  342 => 114,  338 => 116,  334 => 100,  332 => 97,  328 => 110,  326 => 92,  323 => 37,  320 => 106,  317 => 89,  314 => 88,  312 => 87,  309 => 86,  306 => 85,  304 => 33,  301 => 100,  298 => 82,  294 => 97,  291 => 74,  287 => 94,  284 => 93,  281 => 92,  277 => 89,  274 => 48,  271 => 47,  266 => 125,  264 => 83,  260 => 122,  258 => 47,  254 => 45,  252 => 44,  249 => 43,  246 => 114,  239 => 110,  236 => 33,  232 => 106,  229 => 64,  226 => 60,  222 => 62,  219 => 288,  216 => 287,  210 => 14,  206 => 271,  201 => 260,  198 => 259,  192 => 9,  188 => 77,  183 => 43,  180 => 72,  175 => 225,  148 => 50,  146 => 18,  138 => 47,  136 => 46,  133 => 45,  131 => 44,  123 => 76,  121 => 18,  118 => 73,  112 => 141,  109 => 38,  106 => 37,  100 => 65,  96 => 33,  93 => 63,  91 => 180,  84 => 15,  82 => 28,  74 => 26,  72 => 178,  68 => 22,  62 => 19,  57 => 15,  47 => 38,  42 => 11,  38 => 9,  32 => 6,  79 => 13,  76 => 118,  73 => 24,  69 => 177,  66 => 19,  63 => 11,  59 => 121,  56 => 9,  53 => 15,  50 => 15,  44 => 12,  39 => 4,  36 => 7,  30 => 12,);
    }
}
