<?php

/* home/order/order_list.twig */
class __TwigTemplate_8a1cab16a52aea45695ab8137f6c106b8c7dee33713bb71a0aae1411b802e169 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/order/order_list.twig", 1);
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
                        ";
        // line 18
        echo twig_escape_filter($this->env, ((array_key_exists("isVisitStr", $context)) ? (_twig_default_filter((isset($context["isVisitStr"]) ? $context["isVisitStr"] : $this->getContext($context, "isVisitStr")), "上门")) : ("上门")), "html", null, true);
        echo "
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li ";
        // line 23
        if (((isset($context["ordertype"]) ? $context["ordertype"] : $this->getContext($context, "ordertype")) == "pay")) {
            echo " class=\"current\" ";
        }
        echo " >
                <a href=\"/home/order/orderList/orderType/pay\">
                    <div class=\"all-city\">
                        待支付
                    </div>
                </a>
            </li>
            <li ";
        // line 30
        if (((isset($context["ordertype"]) ? $context["ordertype"] : $this->getContext($context, "ordertype")) == "service")) {
            echo "class=\"current\" ";
        }
        echo ">
                <a href=\"/home/order/orderList/orderType/service\">
                    <div class=\"zhineng\">
                        待服务
                    </div>
                </a>
            </li>
            <li ";
        // line 37
        if (((isset($context["ordertype"]) ? $context["ordertype"] : $this->getContext($context, "ordertype")) == "close")) {
            echo "class=\"current\" ";
        }
        echo ">
                <a href=\"/home/order/orderList/orderType/close\" class=\"nob\">
                    <div class=\"zhineng\">
                        已完成
                    </div>
                </a>
            </li>
        </ul>

        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li data-text=\"上门\" class=\"current\">
                    <a href=\"?isVisit=yes\">上门服务</a>
                </li>
                <li data-text=\"到店\" >
                    <a href=\"?isVisit=no\">到店服务</a>
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
                <a href=\"/home/order/orderDetail/type/";
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
                        <h4>";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "name", array()), "html", null, true);
            echo "(";
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
                    <a href=\"javascript:;\" class=\"order-wait-bnt\">
                        ";
            // line 71
            if ( !twig_test_empty((isset($context["buttonText"]) ? $context["buttonText"] : $this->getContext($context, "buttonText")))) {
                // line 72
                echo "                            ";
                echo twig_escape_filter($this->env, (isset($context["buttonText"]) ? $context["buttonText"] : $this->getContext($context, "buttonText")), "html", null, true);
                echo "
                        ";
            } else {
                // line 74
                echo "                            ";
                if (($this->getAttribute($context["order"], "orderStatus", array()) == "2")) {
                    // line 75
                    echo "                                已取消
                            ";
                } elseif (($this->getAttribute(                // line 76
$context["order"], "orderStatus", array()) == "4")) {
                    // line 77
                    echo "                                退款中
                            ";
                } elseif (($this->getAttribute(                // line 78
$context["order"], "orderStatus", array()) == "41")) {
                    // line 79
                    echo "                                退款完成
                            ";
                } elseif (($this->getAttribute(                // line 80
$context["order"], "orderStatus", array()) == "42")) {
                    // line 81
                    echo "                                退款失败
                            ";
                } elseif (($this->getAttribute(                // line 82
$context["order"], "orderStatus", array()) == "5")) {
                    // line 83
                    echo "                                待评价
                            ";
                } elseif (($this->getAttribute(                // line 84
$context["order"], "orderStatus", array()) == "6")) {
                    // line 85
                    echo "                                完成
                            ";
                } elseif (($this->getAttribute(                // line 86
$context["order"], "orderStatus", array()) == "40")) {
                    // line 87
                    echo "                                退款申请中
                            ";
                }
                // line 89
                echo "                        ";
            }
            // line 90
            echo "                    </a>
                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "    </ul>
";
    }

    // line 96
    public function block_script($context, array $blocks = array())
    {
        // line 97
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
                });
            }();
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/order/order_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 97,  238 => 96,  233 => 94,  224 => 90,  221 => 89,  217 => 87,  215 => 86,  212 => 85,  210 => 84,  207 => 83,  205 => 82,  202 => 81,  200 => 80,  197 => 79,  195 => 78,  192 => 77,  190 => 76,  187 => 75,  184 => 74,  178 => 72,  176 => 71,  170 => 68,  160 => 67,  156 => 66,  146 => 65,  140 => 62,  133 => 60,  130 => 59,  126 => 58,  100 => 37,  88 => 30,  76 => 23,  68 => 18,  60 => 15,  56 => 13,  53 => 12,  43 => 5,  40 => 4,  34 => 3,  30 => 1,  28 => 2,  11 => 1,);
    }
}
