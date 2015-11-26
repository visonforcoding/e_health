<?php

/* home/orderservice/service_detail.twig */
class __TwigTemplate_a5b0aee37abbfdd40df3cb09cb02558275096c1301d39e7d9196d15c2ae79ff9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/service_detail.twig", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "项目详情";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">项目详情</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-detail-box order-detail\">
        <div class=\"order-server-option\">
            <div class=\"order-option-img\">
                <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
            </div>

            <div class=\"order-detail-inf\">
                <div class=\"order-server-name\">";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "name", array()), "html", null, true);
        echo "</div>
                <div class=\"order-server-time\"><i class=\"sprits\"></i>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "stime", array()), "html", null, true);
        echo "分钟</div>
                <div class=\"order-server-price\">￥";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "</div>
            </div>
            <a href=\"/home/orderservice/choiceStore/service_id/";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id", array()), "html", null, true);
        echo "\" class=\"order-server-xiadan\">预约下单</a>
        </div>
    </div>
    <div class=\"shop-detail-box\">
        <ul class=\"server-inf-option\">
            <li class=\"current\">功能功效</li>
            <li>禁忌症状</li>
        </ul>
        <div class=\"select-tab-option\" style=\"display:block\">
            <ul>
                ";
        // line 33
        echo $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "efficacy", array());
        echo "
            </ul>
        </div>
        <div class=\"select-tab-option\">
            <ul>
                ";
        // line 38
        echo $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "taboo", array());
        echo "
            </ul>
        </div>
    </div>
";
    }

    // line 43
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 45
    public function block_script($context, array $blocks = array())
    {
        // line 46
        echo "    <script>
        \$(function(){
\t     \tFastClick.attach(document.body);
\t     \tvar tabSelect=function(){
\t     \t\tvar _index=\"\";
\t     \t\t\$(\".server-inf-option\").on(\"click\",\"li\",function(){
\t     \t\t\t_index=\$(this).index();
\t     \t\t\t\$(this).addClass(\"current\").siblings().removeClass(\"current\");
\t     \t\t\t\$(\".select-tab-option\").hide();
\t     \t\t\t\$(\".select-tab-option\").eq(_index).show();
\t     \t\t});
\t     \t}()
\t     });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/service_detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 46,  114 => 45,  109 => 43,  100 => 38,  92 => 33,  79 => 23,  74 => 21,  70 => 20,  66 => 19,  59 => 15,  54 => 12,  51 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
