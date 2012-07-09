<?php

/* XshareGeneralBundle:Page:contact.html.twig */
class __TwigTemplate_b802f0ac64daa5017d1fdacc3476a77c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Contacts"), "html", null, true);
    }

    // line 5
    public function block_maincontent($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"contact-form\" >
        <h2>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Contact us"), "html", null, true);
        echo "</h2>    
        <br />
        <h1>&nbsp;&nbsp;";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Use this form to send us a question.", array(), "messages");
        echo "</h1>
        <br />
        ";
        // line 11
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "rep"), "method")) {
            // line 12
            echo "                <div class=\"result-notice\">
                    ";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "rep"), "method")), "html", null, true);
            echo "
                </div>
        ";
        }
        // line 16
        echo "
        <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("xshare_contact"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " class=\"contact\">
            <table class=\"contact-table\">
                <tr>
                    <td>
                        ";
        // line 21
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "firstname"), $this->env->getExtension('translator')->trans("First Name:*"));
        echo "<br>
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "firstname"));
        echo "
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "firstname"));
        echo "
                    </td>
                    <td rowspan=\"5\" valign=\"bottom\" align=\"left\" class=\"contact-security\" width=\"300px\" >
                        <p>";
        // line 26
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "securitycod"), $this->env->getExtension('translator')->trans("Security cod:"));
        echo "</p>
                        ";
        // line 27
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "securitycod"));
        echo "
                        <p class=\"contact-captcha\">";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "securitycod"), array("label" => $this->env->getExtension('translator')->trans("Enter security code*:")));
        echo "</p>
                    </td>
                </tr>
                <tr>
                    <td>";
        // line 32
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "lastname"), $this->env->getExtension('translator')->trans("Last Name*:"));
        echo "<br>
                        ";
        // line 33
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "lastname"));
        echo "
                        ";
        // line 34
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "lastname"));
        echo "
                    </td>

                </tr>
                <tr>
                    <td>
                        <p>";
        // line 40
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "email"), $this->env->getExtension('translator')->trans("Email*:"));
        echo "</p>
                        <p>";
        // line 41
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "</p>
                        <p>";
        // line 42
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "</p>
                    </td>

                </tr>
                <tr>
                    <td>
                        <p>";
        // line 48
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "phone"), $this->env->getExtension('translator')->trans("Phone:"));
        echo "</p>
                        <p>";
        // line 49
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "phone"));
        echo "</p>
                        <p>";
        // line 50
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "phone"));
        echo "</p>
                    </td>

                </tr>
                <tr>
                    <td>
                        <p>";
        // line 56
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "subject"), $this->env->getExtension('translator')->trans("Subject*:"));
        echo "</p>
                        <p>";
        // line 57
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "subject"));
        echo "</p>
                        <p>";
        // line 58
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "subject"));
        echo "</p>  
                    </td>

                </tr>
                <tr>
                    <td colspan=\"2\">
                        <p>";
        // line 64
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "body"), $this->env->getExtension('translator')->trans("Message*:"));
        echo "</p>
                        <p>";
        // line 65
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "body"));
        echo "</p>
                        <p>";
        // line 66
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "body"));
        echo "</p>
                    </td>
                </tr>
            </table>
            ";
        // line 70
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
            <br />
            <div class=\"contact-button-continer\">
                <input class=\"contact-button\" type=\"submit\" value=\"";
        // line 73
        echo $this->env->getExtension('translator')->getTranslator()->trans("Send Message", array(), "messages");
        echo "\" />
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "XshareGeneralBundle:Page:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 73,  184 => 70,  177 => 66,  173 => 65,  169 => 64,  160 => 58,  156 => 57,  152 => 56,  143 => 50,  139 => 49,  135 => 48,  126 => 42,  122 => 41,  118 => 40,  109 => 34,  105 => 33,  101 => 32,  94 => 28,  90 => 27,  86 => 26,  80 => 23,  76 => 22,  72 => 21,  63 => 17,  60 => 16,  54 => 13,  51 => 12,  49 => 11,  44 => 9,  39 => 7,  36 => 6,  33 => 5,  27 => 3,);
    }
}
