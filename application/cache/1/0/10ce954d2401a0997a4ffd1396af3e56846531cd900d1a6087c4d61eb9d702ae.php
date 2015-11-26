<?php

/* home/orderservice/engineer_detail_2.twig */
class __TwigTemplate_10ce954d2401a0997a4ffd1396af3e56846531cd900d1a6087c4d61eb9d702ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/engineer_detail_2.twig", 1);
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
    <div class=\"title\">技师-";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "name", array()), "html", null, true);
        echo "</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-detail-box\">
        <div class=\"order-server-option\">
            <div class=\"order-option-img\">
                <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
            </div>
            <div class=\"detail-jishi-inf\">
                <div class=\"detail-jishi-name\">";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "name", array()), "html", null, true);
        echo "</div>
                <div class=\"detail-jishi-zhizhao\"><span>";
        // line 19
        if (($this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "sex", array()) == "1")) {
            echo "男";
        } else {
            echo "女";
        }
        echo "</span><span>职业医师</span></div>
                <div class=\"detail-jishi-code sprits\">
                    <div class=\"detail-code-length sprits\"></div>
                </div>
            </div>
        </div>
        <div class=\"detail-jishi-jianjie\">
            <h4>【简介】</h4>
            <p>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "desc", array()), "html", null, true);
        echo "</p>
            <h4>【擅长】</h4>
            <p>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "skilled", array()), "html", null, true);
        echo "</p>
            <h4>【服务宣言】</h4>
            <p>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "manifesto", array()), "html", null, true);
        echo "</p>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【已预约的项目】</p>
        </div>

        <ul class=\"yueyued-option\">
            <li>
                <div class=\"yuyued-option-name\">
                    ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "name", array()), "html", null, true);
        echo "
                </div>
                <div class=\"yuyued-option-time\">
                    ";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "stime", array()), "html", null, true);
        echo "分钟
                </div>
                <div class=\"yuyued-option-price\">
                    ";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "元
                </div>
            </li>
        </ul>
    </div>
    <a href=\"\" class=\"detail-yuyue-bnt\">立即预约</a>
";
    }

    // line 56
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 58
    public function block_script($context, array $blocks = array())
    {
        // line 59
        echo "    <script>
        \$(function () {
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/engineer_detail_2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 59,  140 => 58,  135 => 56,  124 => 49,  118 => 46,  112 => 43,  97 => 31,  92 => 29,  87 => 27,  72 => 19,  68 => 18,  62 => 15,  57 => 12,  54 => 11,  48 => 9,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
