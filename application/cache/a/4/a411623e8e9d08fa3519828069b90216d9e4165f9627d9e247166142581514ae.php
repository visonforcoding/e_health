<?php

/* home/user/more_set.twig */
class __TwigTemplate_a411623e8e9d08fa3519828069b90216d9e4165f9627d9e247166142581514ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/more_set.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/front.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_tag"] = "more";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "更多";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">更多</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <ul class=\"more-set-ul\">
        <li>
            <div class=\"more-set-left\">消息提醒</div>
            <div class=\"more-set-right\">
                <div class=\"accept-bnt\">
                    <i class=\"sprits\"></i>
                </div>
            </div>
        </li>
        <li>
            <a href=\"#\">
                意见反馈
            </a>
        </li>
        <li>
            <div class=\"more-set-left\">检测更新</div>
            <div class=\"more-set-right\">当前版本V4.2.1</div>
        </li>
        <li>
            <a href=\"#\">关于苗苗推</a>
        </li>
    </ul>
";
    }

    // line 36
    public function block_script($context, array $blocks = array())
    {
        // line 37
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);

            var setAccept = function () {

                \$(\".accept-bnt\").on(\"click\", function () {

                    if (\$(this).hasClass(\"accepted\")) {
                        \$(this).removeClass(\"accepted\")
                    } else {
                        \$(this).addClass(\"accepted\")
                    }
                })
            }();
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/more_set.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 37,  82 => 36,  56 => 13,  53 => 12,  43 => 5,  40 => 4,  34 => 3,  30 => 1,  28 => 2,  11 => 1,);
    }
}
