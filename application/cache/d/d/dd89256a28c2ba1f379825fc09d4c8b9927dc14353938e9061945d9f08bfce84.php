<?php

/* home/orderservice/use_favorable.twig */
class __TwigTemplate_dd89256a28c2ba1f379825fc09d4c8b9927dc14353938e9061945d9f08bfce84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/use_favorable.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/front.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["page_tag"] = "user";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "我的";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">优惠劵</div>
";
    }

    // line 13
    public function block_main($context, array $blocks = array())
    {
        // line 14
        echo "    <ul class=\"youhuijuan-kind\">
        <li class=\"current\">
            <a href=\"#\">未使用</a>
        </li>
        <li>
            <a href=\"#\">已使用</a>
        </li>
        <li>
            <a href=\"#\">已过期</a>
        </li>
    </ul>
    <div class=\"nothing-youhuijuan\">
        <i class=\"sprits\"></i>
        <h4>您还没有优惠券哦~</h4>
    </div>
";
    }

    // line 30
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 31
    public function block_script($context, array $blocks = array())
    {
        // line 32
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);

            var share = function () {
                \$(\".invite-ul\").on(\"click\", function (event) {
                    event.stopPropagation();
                    \$(\".zhezhao, .share-group-layer\").show();
                })
            }();


            \$(\".zhezhao, .cancle-share\").on(\"click\", function () {
                \$(\".zhezhao, .share-group-layer\").hide();
            });

        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/use_favorable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 32,  81 => 31,  76 => 30,  57 => 14,  54 => 13,  44 => 6,  41 => 5,  35 => 4,  31 => 2,  29 => 3,  11 => 2,);
    }
}
