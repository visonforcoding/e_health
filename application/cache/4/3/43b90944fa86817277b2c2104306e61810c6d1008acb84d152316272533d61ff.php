<?php

/* layout/front.twig */
class __TwigTemplate_43b90944fa86817277b2c2104306e61810c6d1008acb84d152316272533d61ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'static' => array($this, 'block_static'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=750,  user-scalable=no\">
        <meta name=\"format-detection\" content=\"telphone=no, email=no\" />
        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />
        <meta name=\"x5-page-mode\" content=\"app\">
        <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"stylesheet\" href=\"/static/home/css/style.css\">
        <link rel=\"stylesheet\" href=\"/static/home/css/lemon.css\">
        <script type=\"text/javascript\" src=\"/static/home/js/zepto.js\"></script>
        <script type=\"application/javascript\" src=\"/static/home/js/fastclick.js\"></script>
        <script type=\"text/javascript\" src=\"/static/home/js/jssor.js\"></script>
        <script type=\"text/javascript\" src=\"/static/home/js/jssor.slider.js\"></script>
        <script type=\"text/javascript\" src=\"/static/home/js/index_banner.js\"></script>
";
        // line 19
        echo "    ";
        $this->displayBlock('static', $context, $blocks);
        // line 20
        echo "</head>
<body>
    <div class=\"header\">
    ";
        // line 23
        $this->displayBlock('header', $context, $blocks);
        // line 24
        echo "</div>
";
        // line 25
        $this->displayBlock('main', $context, $blocks);
        // line 26
        $this->displayBlock('footer', $context, $blocks);
        // line 54
        $this->displayBlock('script', $context, $blocks);
        // line 63
        echo "</body>
</html>";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "苗苗儿推首页";
    }

    // line 19
    public function block_static($context, array $blocks = array())
    {
    }

    // line 23
    public function block_header($context, array $blocks = array())
    {
    }

    // line 25
    public function block_main($context, array $blocks = array())
    {
    }

    // line 26
    public function block_footer($context, array $blocks = array())
    {
        // line 27
        echo "    <ul class=\"footer-menu\">
        <li>
            <a href=\"/\" ";
        // line 29
        if ( !array_key_exists("page_tag", $context)) {
            echo " class=\"current\" ";
        }
        echo ">
                <i class=\"sprits footer-menu1\"></i>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a ";
        // line 35
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "order")) {
                echo " class=\"current\" ";
            }
            echo " ";
        }
        echo " href=\"/home/order/orderList.html\">
                <i class=\"sprits footer-menu2\"></i>
                <p>订单</p>
            </a>
        </li>
        <li>
            <a ";
        // line 41
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "user")) {
                echo " class=\"current\" ";
            }
            echo " ";
        }
        echo "  href=\"/home/user/userCenter.html\">
                <i class=\"sprits footer-menu3\"></i>
                <p>我的</p>
            </a>
        </li>
        <li>
            <a ";
        // line 47
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "more")) {
                echo " class=\"current\" ";
            }
            echo " ";
        }
        echo "  href=\"/home/user/moreSet.html\">
                <i class=\"sprits footer-menu4\"></i>
                <p>更多</p>
            </a>
        </li>
    </ul>
";
    }

    // line 54
    public function block_script($context, array $blocks = array())
    {
        // line 55
        echo "    <script>
        jssor_slider1_starter('slider1_container');//banner scroll

        \$(function () {
            FastClick.attach(document.body);
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "layout/front.twig";
    }

    public function getDebugInfo()
    {
        return array (  156 => 55,  153 => 54,  137 => 47,  123 => 41,  109 => 35,  98 => 29,  94 => 27,  91 => 26,  86 => 25,  81 => 23,  76 => 19,  70 => 10,  65 => 63,  63 => 54,  61 => 26,  59 => 25,  56 => 24,  54 => 23,  49 => 20,  46 => 19,  35 => 10,  25 => 2,);
    }
}
