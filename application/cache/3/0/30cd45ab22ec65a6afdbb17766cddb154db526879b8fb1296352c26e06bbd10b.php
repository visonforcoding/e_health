<?php

/* layout/back.twig */
class __TwigTemplate_30cd45ab22ec65a6afdbb17766cddb154db526879b8fb1296352c26e06bbd10b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</title>
        <meta charset=\"UTF-8\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/Css/bootstrap.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/Css/bootstrap-responsive.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/Css/style.css\" />
        <script type=\"text/javascript\" src=\"/static/Js/jquery.js\"></script>
        <script type=\"text/javascript\" src=\"/static/Js/jquery.sorted.js\"></script>
        <script type=\"text/javascript\" src=\"/static/Js/bootstrap.js\"></script>
        <script type=\"text/javascript\" src=\"/static/Js/ckform.js\"></script>
        <script type=\"text/javascript\" src=\"/static/Js/common.js\"></script>
        <style type=\"text/css\">
            body {
                padding-bottom: 40px;
            }

            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }


        </style>
    </head>
    <body>
        ";
        // line 37
        $this->displayBlock('main', $context, $blocks);
        // line 39
        echo "    </body>
</html>
<script src=\"/static/Js/artDialog/artDialog.js?skin=default\"></script> 
";
        // line 42
        $this->displayBlock('script', $context, $blocks);
    }

    // line 37
    public function block_main($context, array $blocks = array())
    {
        // line 38
        echo "        ";
    }

    // line 42
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/back.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 42,  75 => 38,  72 => 37,  68 => 42,  63 => 39,  61 => 37,  26 => 5,  21 => 2,);
    }
}
