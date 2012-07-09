<?php

/* GenemuFormBundle:Form:div_layout.html.twig */
class __TwigTemplate_6feea6afee439a620052d5c0ab722319 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'genemu_captcha_widget' => array($this, 'block_genemu_captcha_widget'),
            'genemu_recaptcha_widget' => array($this, 'block_genemu_recaptcha_widget'),
            'genemu_jquerydate_widget' => array($this, 'block_genemu_jquerydate_widget'),
            'genemu_jqueryslider_widget' => array($this, 'block_genemu_jqueryslider_widget'),
            'genemu_jqueryautocompleter_widget' => array($this, 'block_genemu_jqueryautocompleter_widget'),
            'genemu_jquerychosen_widget' => array($this, 'block_genemu_jquerychosen_widget'),
            'genemu_jquerygeolocation_widget' => array($this, 'block_genemu_jquerygeolocation_widget'),
            'genemu_jqueryfile_widget' => array($this, 'block_genemu_jqueryfile_widget'),
            'genemu_jquerycolor_widget' => array($this, 'block_genemu_jquerycolor_widget'),
            'genemu_jqueryrating_widget' => array($this, 'block_genemu_jqueryrating_widget'),
            'genemu_jqueryimage_widget' => array($this, 'block_genemu_jqueryimage_widget'),
            'genemu_jquerytokeninput_widget' => array($this, 'block_genemu_jquerytokeninput_widget'),
            'genemu_plain_widget' => array($this, 'block_genemu_plain_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 12
        echo "      
";
        // line 13
        $this->displayBlock('genemu_captcha_widget', $context, $blocks);
        // line 24
        echo "        

";
        // line 26
        $this->displayBlock('genemu_recaptcha_widget', $context, $blocks);
        // line 37
        echo "
";
        // line 38
        $this->displayBlock('genemu_jquerydate_widget', $context, $blocks);
        // line 58
        echo "
";
        // line 59
        $this->displayBlock('genemu_jqueryslider_widget', $context, $blocks);
        // line 65
        echo "
";
        // line 66
        $this->displayBlock('genemu_jqueryautocompleter_widget', $context, $blocks);
        // line 76
        echo "
";
        // line 77
        $this->displayBlock('genemu_jquerychosen_widget', $context, $blocks);
        // line 86
        echo "
";
        // line 87
        $this->displayBlock('genemu_jquerygeolocation_widget', $context, $blocks);
        // line 96
        echo "
";
        // line 97
        $this->displayBlock('genemu_jqueryfile_widget', $context, $blocks);
        // line 105
        echo "
";
        // line 106
        $this->displayBlock('genemu_jquerycolor_widget', $context, $blocks);
        // line 118
        echo "
";
        // line 119
        $this->displayBlock('genemu_jqueryrating_widget', $context, $blocks);
        // line 132
        echo "
";
        // line 133
        $this->displayBlock('genemu_jqueryimage_widget', $context, $blocks);
        // line 169
        echo "
";
        // line 170
        $this->displayBlock('genemu_jquerytokeninput_widget', $context, $blocks);
        // line 180
        echo "
";
        // line 181
        $this->displayBlock('genemu_plain_widget', $context, $blocks);
    }

    // line 13
    public function block_genemu_captcha_widget($context, array $blocks = array())
    {
        // line 14
        ob_start();
        // line 15
        echo "    ";
        if (($this->getContext($context, "position") == "left")) {
            // line 16
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "src"), "html", null, true);
            echo "\" width=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "width"), "html", null, true);
            echo "\" height=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "height"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "name")), "html", null, true);
            echo "\" />
        <p>";
            // line 17
            $this->displayBlock("field_label", $context, $blocks);
            echo "</p>
        ";
            // line 18
            $this->displayBlock("field_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 20
            echo "        ";
            $this->displayBlock("field_widget", $context, $blocks);
            echo "
        <img src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getContext($context, "src"), "html", null, true);
            echo "\" width=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "width"), "html", null, true);
            echo "\" height=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "height"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "name")), "html", null, true);
            echo "\" />
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 26
    public function block_genemu_recaptcha_widget($context, array $blocks = array())
    {
        // line 27
        ob_start();
        // line 28
        echo "    <div id=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_div\" style=\"display: none;\"></div>
    <noscript>
        <iframe src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "server"), "html", null, true);
        echo "/noscript?k=";
        echo twig_escape_filter($this->env, $this->getContext($context, "public_key"), "html", null, true);
        echo "\" width=\"500\" height=\"300\" frameborder=\"0\"></iframe>
        <br />
        <textarea name=\"recaptcha_challenge_field\" rows=\"3\" cols=\"40\"></textarea>
        <input type=\"hidden\" name=\"recaptcha_response_field\" value=\"manual_challenge\" />
    </noscript>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 38
    public function block_genemu_jquerydate_widget($context, array $blocks = array())
    {
        // line 39
        ob_start();
        // line 40
        echo "    ";
        if (($this->getContext($context, "widget") == "single_text")) {
            // line 41
            echo "        ";
            $this->displayBlock("field_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 43
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 44
            echo strtr($this->getContext($context, "date_pattern"), array("{{ year }}" => $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "year")), "{{ month }}" => $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "month")), "{{ day }}" => $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "day"))));
            // line 48
            echo "

            ";
            // line 50
            $context["attr"] = twig_array_merge($this->getContext($context, "attr"), array("size" => 10));
            // line 51
            echo "            ";
            $context["id"] = ("datepicker_" . $this->getContext($context, "id"));
            // line 52
            echo "            ";
            $context["full_name"] = ("datepicker_" . $this->getContext($context, "full_name"));
            // line 53
            echo "            ";
            $this->displayBlock("hidden_widget", $context, $blocks);
            echo "
        </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_genemu_jqueryslider_widget($context, array $blocks = array())
    {
        // line 60
        ob_start();
        // line 61
        echo "    ";
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "
    <div id=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_slider\"></div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 66
    public function block_genemu_jqueryautocompleter_widget($context, array $blocks = array())
    {
        // line 67
        ob_start();
        // line 68
        echo "    ";
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "

    ";
        // line 70
        $context["id"] = ("autocompleter_" . $this->getContext($context, "id"));
        // line 71
        echo "    ";
        $context["full_name"] = ("autocompleter_" . $this->getContext($context, "full_name"));
        // line 72
        echo "    ";
        $context["value"] = $this->getContext($context, "autocompleter_value");
        // line 73
        echo "    ";
        $this->displayBlock("field_widget", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 77
    public function block_genemu_jquerychosen_widget($context, array $blocks = array())
    {
        // line 78
        ob_start();
        // line 79
        echo "    ";
        $context["attr"] = twig_array_merge($this->getContext($context, "attr"), array("data-placeholder" => (($this->getAttribute($this->getContext($context, "attr", true), "placeholder", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "attr", true), "placeholder"), $this->getContext($context, "empty_value"))) : ($this->getContext($context, "empty_value"))), "class" => ((($this->getAttribute($this->getContext($context, "attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "attr", true), "class"), "")) : ("")) . " chzn-select")));
        // line 83
        echo "    ";
        $this->displayBlock("choice_widget", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 87
    public function block_genemu_jquerygeolocation_widget($context, array $blocks = array())
    {
        // line 88
        ob_start();
        // line 89
        echo "    ";
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "

    ";
        // line 91
        if (($this->getContext($context, "map") === true)) {
            // line 92
            echo "        <div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "_map\">&nbsp;</div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 97
    public function block_genemu_jqueryfile_widget($context, array $blocks = array())
    {
        // line 98
        ob_start();
        // line 99
        echo "    ";
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "
    <div class=\"queue\">
        <div id=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_queue\"></div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 106
    public function block_genemu_jquerycolor_widget($context, array $blocks = array())
    {
        // line 107
        ob_start();
        // line 108
        echo "    ";
        if (($this->getContext($context, "widget") == "image")) {
            // line 109
            echo "        <div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "_color\" ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            <div";
            // line 110
            if ($this->getContext($context, "value")) {
                echo " style=\"background-color: #";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo ";\"";
            }
            echo ">&nbsp;</div>
            ";
            // line 111
            $this->displayBlock("hidden_widget", $context, $blocks);
            echo "
        </div>
    ";
        } else {
            // line 114
            echo "        ";
            $this->displayBlock("field_widget", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 119
    public function block_genemu_jqueryrating_widget($context, array $blocks = array())
    {
        // line 120
        ob_start();
        // line 121
        echo "    ";
        if ($this->getContext($context, "expanded")) {
            // line 122
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
        ";
            // line 123
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "form"));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 124
                echo "            ";
                echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "child"));
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 126
            echo "        </div>
    ";
        } else {
            // line 128
            echo "        ";
            $this->displayBlock("choice_widget", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 133
    public function block_genemu_jqueryimage_widget($context, array $blocks = array())
    {
        // line 134
        ob_start();
        // line 135
        echo "    <div id=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_container\">
        <div class=\"left\">
            <div id=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_preview\">
                ";
        // line 138
        $context["type"] = "hidden";
        // line 139
        echo "                ";
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "

                <a id=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_overlay\" href=\"#\">&nbsp;</a>

                ";
        // line 143
        if ($this->getContext($context, "value")) {
            // line 144
            echo "                    ";
            $context["widthMax"] = ((array_key_exists("thumbnail", $context)) ? ($this->getAttribute($this->getContext($context, "thumbnail"), "width")) : (500));
            // line 145
            echo "                    ";
            $context["ratio"] = ((($this->getContext($context, "width") > $this->getContext($context, "widthMax"))) ? (($this->getContext($context, "width") / $this->getContext($context, "widthMax"))) : (1));
            // line 146
            echo "                    ";
            $context["asset"] = $this->env->getExtension('assets')->getAssetUrl(((array_key_exists("thumbnail", $context)) ? ($this->getAttribute($this->getContext($context, "thumbnail"), "file")) : ($this->getContext($context, "value"))));
            // line 147
            echo "                    ";
            $context["width"] = ($this->getContext($context, "width") / $this->getContext($context, "ratio"));
            // line 148
            echo "                    ";
            $context["height"] = ($this->getContext($context, "height") / $this->getContext($context, "ratio"));
            // line 149
            echo "                ";
        } else {
            // line 150
            echo "                    ";
            $context["asset"] = $this->env->getExtension('assets')->getAssetUrl("bundles/genemuform/images/default.png");
            // line 151
            echo "                    ";
            $context["width"] = 96;
            // line 152
            echo "                    ";
            $context["height"] = 96;
            // line 153
            echo "                ";
        }
        // line 154
        echo "
                <img id=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_img_preview\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "asset"), "html", null, true);
        echo "\" width=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "width"), "html", null, true);
        echo "\" height=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "height"), "html", null, true);
        echo "\" />
            </div>
            <ul id=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_options\" class=\"options\">
                ";
        // line 158
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "filters"));
        foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
            // line 159
            echo "                    <li class=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "filter"), "html", null, true);
            echo " change\"></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 161
        echo "            </ul>
            <div class=\"queue\">
                <div id=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "_queue\"></div>
            </div>
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 170
    public function block_genemu_jquerytokeninput_widget($context, array $blocks = array())
    {
        // line 171
        ob_start();
        // line 172
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "

";
        // line 174
        $context["id"] = ("tokeninput_" . $this->getContext($context, "id"));
        // line 175
        $context["full_name"] = ("tokeninput_" . $this->getContext($context, "full_name"));
        // line 176
        $context["value"] = $this->getContext($context, "tokeninput_value");
        // line 177
        $this->displayBlock("field_widget", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 181
    public function block_genemu_plain_widget($context, array $blocks = array())
    {
        // line 182
        echo "    <div ";
        $this->displayBlock("container_attributes", $context, $blocks);
        echo ">
        <p ";
        // line 183
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"));
        echo "</p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GenemuFormBundle:Form:div_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  526 => 183,  521 => 182,  518 => 181,  509 => 176,  507 => 175,  505 => 174,  500 => 172,  495 => 170,  481 => 161,  472 => 159,  468 => 158,  464 => 157,  447 => 153,  444 => 152,  441 => 151,  438 => 150,  435 => 149,  426 => 146,  423 => 145,  420 => 144,  418 => 143,  401 => 137,  395 => 135,  393 => 134,  390 => 133,  381 => 128,  377 => 126,  364 => 123,  359 => 122,  356 => 121,  354 => 120,  351 => 119,  336 => 111,  321 => 109,  318 => 108,  316 => 107,  313 => 106,  305 => 101,  299 => 99,  297 => 98,  283 => 91,  275 => 88,  261 => 79,  242 => 71,  240 => 70,  234 => 68,  217 => 61,  215 => 60,  212 => 59,  202 => 53,  199 => 52,  194 => 50,  190 => 48,  177 => 41,  174 => 40,  172 => 39,  169 => 38,  156 => 30,  150 => 28,  145 => 26,  126 => 20,  103 => 15,  101 => 14,  98 => 13,  86 => 169,  81 => 132,  71 => 105,  46 => 58,  35 => 24,  1000 => 291,  995 => 290,  993 => 289,  990 => 288,  974 => 284,  952 => 283,  950 => 282,  947 => 281,  935 => 276,  931 => 275,  926 => 274,  924 => 273,  921 => 272,  912 => 266,  906 => 264,  903 => 263,  898 => 262,  896 => 261,  893 => 260,  886 => 255,  877 => 253,  873 => 252,  870 => 251,  867 => 250,  865 => 249,  862 => 248,  854 => 244,  852 => 243,  849 => 242,  842 => 237,  839 => 236,  831 => 231,  827 => 230,  823 => 229,  820 => 228,  818 => 227,  815 => 226,  807 => 222,  805 => 221,  802 => 220,  794 => 214,  792 => 213,  789 => 212,  781 => 208,  778 => 207,  776 => 206,  773 => 205,  752 => 201,  749 => 200,  746 => 199,  743 => 198,  741 => 197,  738 => 196,  730 => 190,  727 => 189,  725 => 188,  722 => 187,  715 => 184,  712 => 183,  709 => 182,  701 => 178,  698 => 177,  696 => 176,  693 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 177,  502 => 92,  498 => 171,  494 => 90,  490 => 89,  485 => 163,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 155,  450 => 154,  434 => 73,  432 => 148,  429 => 147,  419 => 65,  416 => 64,  413 => 141,  407 => 139,  405 => 138,  400 => 59,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  374 => 51,  366 => 49,  361 => 48,  357 => 47,  349 => 45,  347 => 44,  344 => 43,  335 => 39,  319 => 35,  300 => 32,  295 => 31,  292 => 30,  285 => 92,  282 => 27,  272 => 87,  270 => 22,  267 => 21,  259 => 78,  256 => 77,  253 => 15,  250 => 14,  248 => 73,  245 => 72,  237 => 7,  233 => 6,  228 => 5,  223 => 3,  214 => 281,  211 => 280,  209 => 272,  203 => 269,  196 => 51,  193 => 247,  191 => 242,  185 => 239,  178 => 226,  173 => 220,  170 => 219,  167 => 217,  165 => 212,  162 => 211,  160 => 205,  157 => 204,  155 => 196,  152 => 195,  149 => 193,  147 => 187,  144 => 186,  142 => 182,  139 => 181,  137 => 175,  134 => 174,  132 => 168,  129 => 167,  127 => 161,  124 => 160,  122 => 154,  119 => 153,  117 => 17,  114 => 146,  107 => 134,  104 => 133,  102 => 126,  99 => 125,  97 => 114,  94 => 181,  92 => 98,  89 => 170,  87 => 83,  77 => 71,  67 => 27,  64 => 87,  54 => 66,  49 => 59,  52 => 3,  24 => 3,  20 => 2,  37 => 10,  33 => 13,  26 => 3,  22 => 4,  61 => 86,  51 => 65,  41 => 37,  31 => 7,  21 => 3,  17 => 1,  378 => 53,  375 => 114,  372 => 113,  368 => 124,  365 => 105,  362 => 104,  358 => 99,  355 => 98,  352 => 46,  348 => 94,  345 => 93,  342 => 114,  338 => 102,  334 => 100,  332 => 97,  328 => 110,  326 => 92,  323 => 37,  320 => 90,  317 => 89,  314 => 88,  312 => 87,  309 => 86,  306 => 85,  304 => 33,  301 => 83,  298 => 82,  294 => 97,  291 => 74,  287 => 29,  284 => 53,  281 => 52,  277 => 89,  274 => 48,  271 => 47,  266 => 55,  264 => 83,  260 => 50,  258 => 47,  254 => 45,  252 => 44,  249 => 43,  246 => 42,  239 => 34,  236 => 33,  232 => 67,  229 => 66,  226 => 4,  222 => 62,  219 => 288,  216 => 287,  210 => 14,  206 => 271,  201 => 260,  198 => 259,  192 => 9,  188 => 44,  183 => 43,  180 => 235,  175 => 225,  148 => 27,  146 => 113,  138 => 107,  136 => 104,  133 => 103,  131 => 21,  123 => 76,  121 => 18,  118 => 73,  112 => 141,  109 => 140,  106 => 16,  100 => 65,  96 => 64,  93 => 63,  91 => 180,  84 => 133,  82 => 77,  74 => 106,  72 => 43,  68 => 31,  62 => 21,  57 => 12,  47 => 16,  42 => 15,  38 => 5,  32 => 1,  79 => 119,  76 => 118,  73 => 15,  69 => 97,  66 => 96,  63 => 11,  59 => 77,  56 => 76,  53 => 11,  50 => 10,  44 => 38,  39 => 26,  36 => 5,  30 => 12,);
    }
}
