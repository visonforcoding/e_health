<?php

/* /shop/balance/balanceInfo.twig */
class __TwigTemplate_e3b6f2fd232fbdbc9f0c427527b3445c2fa706ca13b65bc979c184dc7d641a15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/balance/balanceInfo.twig", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_bread_top"] = "资金管理";
        // line 3
        $context["page_bread_sub"] = "资金明细";
        // line 4
        $context["page_header_title"] = "资金明细";
        // line 5
        $context["page_tag"] = "shop_balance_balanceInfo";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"row\" id=\"welcome_box\">
        <div class=\"col-xs-12\">
            <div style=\"padding:20px;\" class=\"alert alert-success with-icon\">
                <i class=\"icon-yen\" ></i>
                <div class=\"content\">
                    <div class=\"col-xs-1\">
                        总金额(元):</br>";
        // line 13
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["store_detail"]) ? $context["store_detail"] : $this->getContext($context, "store_detail")), "balance", array())), "html", null, true);
        echo "</div>
                    <div class=\"col-xs-2\">
                        <a href=\"/shop/balance/withdraw\" class=\"btn btn-primary\">提现</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"list\">
            <header>
                <div class=\"pull-right\">
                    <div class=\"btn-group\" data-toggle=\"buttons-radio\">
                        <button type=\"button\" class=\"btn btn-default active\"><i class=\"icon-th-list\"></i></button>
                        <button type=\"button\" class=\"btn btn-default\"><i class=\"icon-th\"></i></button>
                        <button type=\"button\" class=\"btn btn-default\"><i class=\"icon-th-large\"></i></button>
                    </div>
                </div>
                <h3><i class=\"icon-list-ul icon-border-circle\"></i> 交易明细 &nbsp;<small>";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["total_nums"]) ? $context["total_nums"] : $this->getContext($context, "total_nums")), "html", null, true);
        echo "条记录</small></h3>
            </header>
            <section class=\"items items-hover\">
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["followings"]) ? $context["followings"] : $this->getContext($context, "followings")));
        foreach ($context['_seq'] as $context["_key"] => $context["following"]) {
            // line 35
            echo "                    <div class=\"item row\">
                        <div class=\"col-md-2\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "ctime", array()), "html", null, true);
            echo "</div>
                        <div class=\"col-md-1\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "amount", array()), "html", null, true);
            echo "
                            ";
            // line 38
            if (($this->getAttribute($context["following"], "income", array()) == "1")) {
                // line 39
                echo "                                <i class=\"icon  icon-long-arrow-up\"></i>
                            ";
            } else {
                // line 41
                echo "                                <i class=\"icon  icon-long-arrow-down\"></i>
                            ";
            }
            // line 43
            echo "                        </div>
                        <div class=\"col-md-1\">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "remark", array()), "html", null, true);
            echo "</div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['following'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "            </section>
            <footer>
                <ul class=\"pager\">
                    ";
        // line 50
        echo (isset($context["pageShow"]) ? $context["pageShow"] : $this->getContext($context, "pageShow"));
        echo "
                </ul>
            </footer>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "/shop/balance/balanceInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 50,  112 => 47,  103 => 44,  100 => 43,  96 => 41,  92 => 39,  90 => 38,  86 => 37,  82 => 36,  79 => 35,  75 => 34,  69 => 31,  48 => 13,  40 => 7,  37 => 6,  33 => 1,  31 => 5,  29 => 4,  27 => 3,  25 => 2,  11 => 1,);
    }
}
