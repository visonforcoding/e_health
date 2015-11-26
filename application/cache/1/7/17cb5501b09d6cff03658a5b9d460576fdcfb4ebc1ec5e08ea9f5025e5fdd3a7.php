<?php

/* home/order/order_list_pay.twig */
class __TwigTemplate_17cb5501b09d6cff03658a5b9d460576fdcfb4ebc1ec5e08ea9f5025e5fdd3a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/order/order_list_pay.twig", 1);
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
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">订单</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"goods-kinds order\">
        <ul class=\"goods-kinds-ul shangmen\">
            <li ";
        // line 15
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "visit")) {
            echo "class=\"current\" ";
        }
        echo " data-kinds=\"all-kinds\">
                <a href=\"javascript:;\">
                    <div class=\"all-kinds\">
                        上门
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li class=\"current\" >
                <a href=\"/home/order/orderListPay\">
                    <div class=\"all-city\">
                        待支付
                    </div>
                </a>
            </li>
            <li ";
        // line 30
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "service")) {
            echo "class=\"current\" ";
        }
        echo ">
                <a href=\"/home/order/orderList/type/service\">
                    <div class=\"zhineng\">
                        待服务
                    </div>
                </a>
            </li>
            <li>
                <a href=\"order-close.html\" class=\"nob\">
                    <div class=\"zhineng\">
                        已完成
                    </div>
                </a>
            </li>
        </ul>

        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"/home/order/orderList\">上门服务</a>
                </li>
                <li >
                    <a href=\"/home/order/orderList/type/visit\">到店服务</a>
                </li>
            </ol>
        </div>
    </div>
    <ul class=\"order-wait-server\">
        ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) ? $context["orders"] : $this->getContext($context, "orders")));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 59
            echo "            <li>
                <a href=\"/home/order/orderDetailPay/type/";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "type", array()), "html", null, true);
            echo "/oid/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "id", array()), "html", null, true);
            echo ".html\">
                <div class=\"goods-img-box\">
                    <img src=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                </div>
                <div class=\"order-wait-text\">
                    <h4>轻松头面肩(";
            // line 65
            if (($this->getAttribute($context["order"], "isVisit", array()) == "1")) {
                echo "上门服务";
            } else {
                echo "预约到店";
            }
            echo ")</h4>
                    <p>预约时间：";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "serviceTime", array()), "html", null, true);
            echo "</p>
                    <p>";
            // line 67
            if (($this->getAttribute($context["order"], "type", array()) == "1")) {
                echo "服务店铺";
            } else {
                echo "服务技师";
            }
            echo "：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "provider", array()), "html", null, true);
            echo "</p>
                    <p>服务地址：";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "address", array()), "html", null, true);
            echo "</p>
                </div>
                <a href=\"javascript:;\" class=\"order-wait-bnt\">待支付</a>
                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "    </ul>
";
    }

    // line 76
    public function block_script($context, array $blocks = array())
    {
        // line 77
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var selectKinds = function () {
                var \$selectHandle = \$(\".goods-kinds-ul li\"),
                        _target = \"\",
                        \$showOption = \$(\".select-kinds-layer\");
                \$selectHandle.on(\"click\", function () {
                    if (!\$(this).hasClass(\"current\") && \$(this).index() == 0) {
                        \$(this).addClass(\"current\");
                        _target = \$(this).data(\"kinds\");
                        for (var i = 0; i < \$showOption.length; i++) {
                            var _point = \$showOption.eq(i).data(\"kinds\");
                            if (_point == _target) {
                                \$showOption.hide();
                                \$showOption.eq(i).show();
                                \$showOption.eq(i).height(\$(\"body\").height() - 170);
                            }
                        }
                    } else {
                        \$(this).removeClass(\"current\");
                        \$showOption.hide();
                    }

                });
                \$showOption.on(\"click\", \"li\", function () {
                    \$showOption.hide();
                    \$selectHandle.removeClass(\"current\")
                })
            }()
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/order/order_list_pay.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 77,  172 => 76,  167 => 74,  155 => 68,  145 => 67,  141 => 66,  133 => 65,  127 => 62,  120 => 60,  117 => 59,  113 => 58,  80 => 30,  60 => 15,  56 => 13,  53 => 12,  43 => 5,  40 => 4,  34 => 3,  30 => 1,  28 => 2,  11 => 1,);
    }
}
