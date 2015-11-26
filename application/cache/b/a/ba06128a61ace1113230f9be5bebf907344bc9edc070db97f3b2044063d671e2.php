<?php

/* home/order/order_detail.twig */
class __TwigTemplate_ba06128a61ace1113230f9be5bebf907344bc9edc070db97f3b2044063d671e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/order/order_detail.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'static' => array($this, 'block_static'),
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
        $context["page_tag"] = "order";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "项目详情";
    }

    // line 4
    public function block_static($context, array $blocks = array())
    {
        // line 5
        echo "    <style>
        .submit-link {
            background-color: #666666;
            color: #fff;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .wait-comment-order{
            background-color: #E74D41;
        }
    </style>
";
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        // line 18
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">订单详情</div>
";
    }

    // line 25
    public function block_main($context, array $blocks = array())
    {
        // line 26
        echo "    <div class=\"wait-order-head\">
        <div class=\"wait-order-jishi\">
            <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
        </div>
        <div class=\"wait-order-inf\">
            <div class=\"wait-jishi-name\">";
        // line 31
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "type", array()) == "1")) {
            echo "店铺：";
        } else {
            echo "技师：";
        }
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "provider", array()), "html", null, true);
        echo "</div>
            <div class=\"wait-order-server\">服务项目：";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "name", array()), "html", null, true);
        echo "</div>
            <div class=\"wait-order-price\">￥";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "price", array()), "html", null, true);
        echo "</div>
        </div>
    </div>
    <ul class=\"wait-order-ul\">
        <li>
            <div class=\"wait-order-left\">
                <h4>订单详情</h4>
            </div>
            <div class=\"wait-order-right\">
                <span>订单号：";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "orderNo", array()), "html", null, true);
        echo "</span>
            </div>
        </li>
        <li>
            <div class=\"wait-order-left\">
                服务时间
            </div>
            <div class=\"wait-order-right\">
                ";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "serviceTime", array()), "html", null, true);
        echo "
            </div>
        </li>
        <li>
            <div class=\"wait-order-left\">
                服务地址
            </div>
            <div class=\"wait-order-right\">
                ";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "address", array()), "html", null, true);
        echo "
            </div>
        </li>
        <li>
            <div class=\"wait-order-left\">
                使用抵扣
            </div>
            <div class=\"wait-order-right\">
                50元优惠券
            </div>
        </li>
        <li>
            <div class=\"wait-order-left\">
                下单时间
            </div>
            <div class=\"wait-order-right\">
                ";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ctime", array()), "html", null, true);
        echo "
            </div>
        </li>
        ";
        // line 77
        if (((isset($context["orderType"]) ? $context["orderType"] : $this->getContext($context, "orderType")) == "cancel")) {
            // line 78
            echo "            <li>
                <div class=\"wait-order-left\">
                    订单状态
                </div>
                <div class=\"wait-order-right\">
                    <font style=\"color: #ff9999\"> 已取消</font>
                </div>
            </li>
        ";
        }
        // line 87
        echo "    </ul>
    ";
        // line 88
        if (((isset($context["orderType"]) ? $context["orderType"] : $this->getContext($context, "orderType")) == "waitPay")) {
            // line 89
            echo "        <a href=\"/home/order/orderPay?id=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo ".html\" class=\"wait-order-bnt wait-comment-order\">去支付</a>
        <a data-id=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo "\" data-url=\"/home/order/cancelOrder\" class=\"wait-order-bnt submit-link\">取消订单</a>
    ";
        } elseif ((        // line 91
(isset($context["orderType"]) ? $context["orderType"] : $this->getContext($context, "orderType")) == "waitService")) {
            // line 92
            echo "        <a data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo "\" data-url=\"/home/order/confirmService\" class=\"wait-order-bnt submit-link-2 wait-comment-order\">完成服务</a>
        <a data-id=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo "\" data-url=\"/home/order/refund\" class=\"wait-order-bnt submit-link\">申请退款</a>
    ";
        }
    }

    // line 96
    public function block_script($context, array $blocks = array())
    {
        // line 97
        echo "    <script>
        \$(function () {
            \$('.submit-link,.submit-link-2').click(function () {
                var id = \$(this).data('id');
                var url = \$(this).data('url');
                \$.ajax({
                    url: url,
                    data: {'id': id},
                    type: 'post',
                    dataType: 'json',
                    success: function (res) {
                        alert(res.msg);
                        if (res.status === true) {
                            window.location.href = res.url;
                        }
                    }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/order/order_detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 97,  198 => 96,  191 => 93,  186 => 92,  184 => 91,  180 => 90,  175 => 89,  173 => 88,  170 => 87,  159 => 78,  157 => 77,  151 => 74,  132 => 58,  121 => 50,  110 => 42,  98 => 33,  94 => 32,  85 => 31,  79 => 28,  75 => 26,  72 => 25,  62 => 18,  59 => 17,  44 => 5,  41 => 4,  35 => 3,  31 => 1,  29 => 2,  11 => 1,);
    }
}
