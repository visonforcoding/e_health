<?php

/* layout/esui.twig */
class __TwigTemplate_12ad244547e9ad1987987b3136efd90c199d484dfce77bc45479886ab168e1f5 extends Twig_Template
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
        <link href=\"/static/lib/icomoon/style.css\" rel=\"stylesheet\" />
        <link href=\"/static/jeasyui/themes/default/easyui.css\" rel=\"stylesheet\" />
        <link href=\"/static/jeasyui/themes/icon.css\" rel=\"stylesheet\" />
        <link href=\"/static/admin/css/adminbase.css\" rel=\"stylesheet\" />
        <script src=\"/static/jeasyui/jquery.min.js\"></script>
        <script src=\"/static/jeasyui/jquery.easyui.min.js\"></script>
        <script src=\"/static/jeasyui/locale/easyui-lang-zh_CN.js\"></script>
        <script type=\"text/javascript\" src=\"/static/layer/layer.js\"></script>
        <script src=\"/static/admin/js/lib.js\"></script>
        ";
        // line 16
        $this->displayBlock('static', $context, $blocks);
        // line 17
        echo "    </head>
    <body class=\"easyui-layout\">
        ";
        // line 19
        $this->displayBlock('main', $context, $blocks);
        // line 21
        echo "    </body>
";
        // line 22
        $this->displayBlock('script', $context, $blocks);
        // line 23
        echo "</html>";
    }

    // line 16
    public function block_static($context, array $blocks = array())
    {
    }

    // line 19
    public function block_main($context, array $blocks = array())
    {
        // line 20
        echo "        ";
    }

    // line 22
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/esui.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 22,  66 => 20,  63 => 19,  58 => 16,  54 => 23,  52 => 22,  49 => 21,  47 => 19,  43 => 17,  41 => 16,  27 => 5,  22 => 2,);
    }
}
