<?php

/* home/order/order_pay.twig */
class __TwigTemplate_ca4a457adacc672aab04267f97f4d9a7f12ab199b551d3d48f7f41136ae6ce6f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/order/order_pay.twig", 1);
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
    <div class=\"title\">订单支付</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-detail-box\" style=\"margin-top:20px;\">
        <ul class=\"payfor-order\">
            <li>
                <div class=\"payfor-order-left\">
                    订单名称：
                </div>
                <div class=\"payfor-order-text\">
                    ";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["order_name"]) ? $context["order_name"] : $this->getContext($context, "order_name")), "html", null, true);
        echo "
                </div>
            </li>
            <li>
                <div class=\"payfor-order-left\">
                    订单金额：
                </div>
                <div class=\"payfor-order-text\">
                    <span class=\"orange\">￥";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
        echo "元</span>
                </div>
            </li>
            <li>
                <div class=\"payfor-order-left\">
                    优惠券：
                </div>
                <div class=\"payfor-order-text\">
                    <span class=\"orange\">
                    <select name=\"coupon\">
                        ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")));
        foreach ($context['_seq'] as $context["_key"] => $context["coupon"]) {
            // line 38
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "amount2", array()), "html", null, true);
            echo "元优惠券</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coupon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </select>
                    </span>
                </div>
            </li>
        </ul>
    </div>
    <div class=\"shop-detail-box\">
        <ul class=\"payfor-order payfor-order-way\">
            <li>
                <div class=\"payfor-order-left\">
                    <i class=\"sprits pay-way zhifubao\"></i>
                </div>
                <div class=\"payfor-order-text\">
                    <p class=\"big-p\">支付宝支付</p>
                    <p class=\"small-p\">推荐有支付宝账号的用户使用</p>
                </div>
                <div class=\"payfor-way-selected sprits select\"></div>
            </li>
            <li>
                <div class=\"payfor-order-left\">
                    <i class=\"sprits pay-way yinhangka\"></i>
                </div>
                <div class=\"payfor-order-text\">
                    <p class=\"big-p\">银行卡支付</p>
                    <p class=\"small-p\">支持储蓄卡信用卡，无需开通网银</p>
                </div>
                <div class=\"payfor-way-selected sprits\"></div>
            </li>
            <li>
                <div class=\"payfor-order-left\">
                    <i class=\"sprits pay-way zhifubao\"></i>
                </div>
                <div class=\"payfor-order-text\">
                    <p class=\"big-p\">微信支付</p>
                    <p class=\"small-p\">推荐安装微信5.0及以上版本的使用</p>
                </div>
                <div class=\"payfor-way-selected sprits\"></div>
            </li>
        </ul>
    </div>
    <a href=\"online-yuyue.html\" class=\"detail-yuyue-bnt\">去支付</a>
";
    }

    // line 82
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 84
    public function block_script($context, array $blocks = array())
    {
        // line 85
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var tabSelect = function () {
                var _index = \"\";
                \$(\".server-inf-option\").on(\"click\", \"li\", function () {
                    _index = \$(this).index();
                    \$(this).addClass(\"current\").siblings().removeClass(\"current\");
                    \$(\".select-tab-option\").hide();
                    \$(\".select-tab-option\").eq(_index).show();
                });
            }();
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/order/order_pay.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 85,  152 => 84,  147 => 82,  102 => 40,  91 => 38,  87 => 37,  74 => 27,  63 => 19,  54 => 12,  51 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
