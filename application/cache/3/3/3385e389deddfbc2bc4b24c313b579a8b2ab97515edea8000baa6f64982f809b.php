<?php

/* layout/bsui.twig */
class __TwigTemplate_3385e389deddfbc2bc4b24c313b579a8b2ab97515edea8000baa6f64982f809b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 5
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "苗苗儿推后台管理系统")) : ("苗苗儿推后台管理系统")), "html", null, true);
        echo "</title>
        <meta charset=\"UTF-8\">
        <link href=\"/static/admin/css/bootstrap.min.css\" rel=\"stylesheet\" />
        <link href=\"/static/admin/css/adminbase.css\" rel=\"stylesheet\" />
        ";
        // line 9
        $this->displayBlock('static', $context, $blocks);
        // line 10
        echo "    </head>
    <body class=\"easyui-layout\">
        ";
        // line 12
        $this->displayBlock('main', $context, $blocks);
        // line 14
        echo "    </body>
";
        // line 15
        $this->displayBlock('script', $context, $blocks);
        // line 16
        echo "</html>";
    }

    // line 9
    public function block_static($context, array $blocks = array())
    {
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "        ";
    }

    // line 15
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/bsui.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 15,  59 => 13,  56 => 12,  51 => 9,  47 => 16,  45 => 15,  42 => 14,  40 => 12,  36 => 10,  34 => 9,  27 => 5,  22 => 2,);
    }
}
