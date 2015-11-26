<?php

/* /home/user/my_favorable.twig */
class __TwigTemplate_fc956d557270a08a73b502603392239558d49434dcce78476a965df39db8ec77 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "/home/user/my_favorable.twig", 2);
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
        <a href=\"javascript:history.go(-1);\">
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
    <ul class=\"youhuijuan-list\">
        ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mycoupons"]) ? $context["mycoupons"] : $this->getContext($context, "mycoupons")));
        foreach ($context['_seq'] as $context["_key"] => $context["mycoupon"]) {
            // line 27
            echo "            <li class=\"sprits ";
            if ((twig_date_converter($this->env, $this->getAttribute($context["mycoupon"], "endTime", array())) < twig_date_converter($this->env))) {
                echo " yiguoqi ";
            } else {
                echo " weishiyong ";
            }
            echo "\">
                <div class=\"youhuijuan-money\">
                    <span>￥</span>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["mycoupon"], "amount2", array()), "html", null, true);
            echo "
                </div>
                <ul class=\"youhuijuan-inf\">
                    <li>
                        满<span>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["mycoupon"], "amount1", array()), "html", null, true);
            echo "</span>元可使用
                    </li>
                    <li>
                        限尾号<span>";
            // line 36
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["mycoupon"], "tel", array()),  -4, 4), "html", null, true);
            echo "</span>的手机使用
                    </li>
                    <li>
                        ";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["mycoupon"], "beginTime", array()), "html", null, true);
            echo " 至 ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mycoupon"], "endTime", array()), "html", null, true);
            echo "
                    </li>
                </ul>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mycoupon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "    </ul>
";
    }

    // line 46
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 47
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/home/user/my_favorable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 47,  122 => 46,  117 => 44,  104 => 39,  98 => 36,  92 => 33,  85 => 29,  75 => 27,  71 => 26,  57 => 14,  54 => 13,  44 => 6,  41 => 5,  35 => 4,  31 => 2,  29 => 3,  11 => 2,);
    }
}
