<?php

/* /shop/layout/layout.twig */
class __TwigTemplate_ffe2529165f6a2eb448c5c16984f94f7702b0ec01587384d7c0c1c4036117998 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'page_header' => array($this, 'block_page_header'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"zh-cn\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("page_title", $context)) ? (_twig_default_filter((isset($context["page_title"]) ? $context["page_title"] : $this->getContext($context, "page_title")), "灸疗管理后台")) : ("灸疗管理后台")), "html", null, true);
        echo "</title>
        <!-- zui -->
        <link href=\"/static/zui/css/zui.min.css\" rel=\"stylesheet\">
        <link href=\"/static/zui/lib/datetimepicker/datetimepicker.min.css\" rel=\"stylesheet\">
        <link href=\"/static/shop/css/base.css\" rel=\"stylesheet\">
        ";
        // line 12
        $this->displayBlock('static', $context, $blocks);
        // line 14
        echo "    </head>
    <body>
        <!-- header -->
        <header>
            <nav class=\"navbar navbar-inverse \" role=\"navigation\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"#\">灸疗店铺管理系统</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class=\"collapse navbar-collapse navbar-collapse-example\">
                    <ul class=\"nav navbar-nav navbar-avatar navbar-right\">
                        <li class=\"has-num\">
                            <a href=\"/shop/order/orderList\" class=\"header-tooltip\"  style=\"margin-top:8px;\" data-toggle=\"tooltip\"
                               data-placement=\"bottom\" data-container=\"body\" title=\"\" data-original-title= \"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["realTimeInfo"]) ? $context["realTimeInfo"] : $this->getContext($context, "realTimeInfo")), "unDoOrderNums", array()), "html", null, true);
        echo "条未处理订单\">
                                <i style=\"font-size: 25px;\" class=\"icon-shopping-cart icon-xlarge text-default\"></i>
                                <b style=\"display: block;\" class=\"badge badge-notes bg-default count-n\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["realTimeInfo"]) ? $context["realTimeInfo"] : $this->getContext($context, "realTimeInfo")), "unDoOrderNums", array()), "html", null, true);
        echo "</b>
                            </a>
                        </li>
                        <li class=\"has-num\">
                            <a href=\"/shop/user/message\" class=\"header-tooltip\" style=\"margin-top:8px;\" data-toggle=\"tooltip\"
                               data-placement=\"bottom\" data-container=\"body\" title=\"\" data-original-title= \"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["realTimeInfo"]) ? $context["realTimeInfo"] : $this->getContext($context, "realTimeInfo")), "unReadMsgNums", array()), "html", null, true);
        echo "条未读信息\">
                                <i  style=\"font-size: 25px;\" class=\"icon-comment-alt icon-xlarge text-default\"></i>
                                <b style=\"display: block;\" class=\"badge badge-notes bg-danger count-n\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["realTimeInfo"]) ? $context["realTimeInfo"] : $this->getContext($context, "realTimeInfo")), "unReadMsgNums", array()), "html", null, true);
        echo "</b>
                            </a>
                        </li>
                        <li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
        // line 48
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user", array(), "any", false, true), "bossName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user", array(), "any", false, true), "bossName", array()), "未设置")) : ("未设置")), "html", null, true);
        echo "
                                <span class=\"thumb-small avatar inline\">
                                    <img src=\"/static/Images/avatar/avatar.jpg\" alt=\"Mika Sokeil\" class=\"img-circle\">
                                </span>
                                <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a href=\"#\">Action</a></li>
                                <li><a href=\"#\">Another action</a></li>
                                <li><a href=\"#\">Something else here</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"/shop/index/loginOut.html\"><i class=\"icon icon-off\"></i> 注销</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </header>
        <!-- / header -->
        ";
        // line 68
        echo "        <div id=\"left-bar\" style=\"width: 200px\">
            <nav class=\"menu\" id=\"left-menu\"  data-toggle=\"menu\" >
                <ul class=\"nav nav-primary\">
                    <li><a href=\"/index.php?/shop/index/index\"><i class=\"icon-home\"></i> 主面板</a></li>
                    <li><a href=\"#\"><i class=\"icon-building\"></i>我的店铺</a>
                        <ul class=\"nav\">
                            <li ";
        // line 74
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_shop_shopInfo")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/shop/shopInfo\">店铺信息</a></li>
                            <li";
        // line 76
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_shop_orderTime")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/shop/orderTime\">预约时间管理</a></li>
                            <li";
        // line 78
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_user_service")) {
                echo " class=\"active\" ";
            }
        }
        echo "><a href=\"/shop/user/service\">服务项目管理</a></li>
                            <li";
        // line 79
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_user_serviceArea")) {
                echo " class=\"active\" ";
            }
        }
        echo "><a href=\"/shop/user/serviceArea\">服务区域管理</a></li>
                            <li";
        // line 80
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_cargo_cargo")) {
                echo " class=\"active\" ";
            }
        }
        echo "><a href=\"/shop/cargo/cargoList\">仓储管理</a></li>
                        </ul>
                    </li>
                    <li><a href=\"#\"><i class=\"icon-user\"></i>员工管理</a>
                        <ul class=\"nav\">
                            <li";
        // line 85
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_employee_employeeList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/employee/employeeList\">员工管理</a></li>
                            <li";
        // line 87
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_vacate_vacateList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/vacate/vacateList\">员工考勤</a></li>
                            <li";
        // line 89
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_salary_index")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/salary/index\">薪资统计</a></li>
                        </ul>
                    </li>
                    <li><a href=\"#\"><i class=\"icon-yen\"></i>资金管理</a>
                        <ul class=\"nav\">
                            <li";
        // line 95
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_balance_balanceInfo")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/balance/balanceInfo\">资金管理</a></li>
                        </ul>
                    </li>
                    <li><a href=\"#\"><i class=\"icon-dashboard\"></i>工作中心</a>
                        <ul class=\"nav\">
                            <li ";
        // line 101
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_order_orderList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/order/orderList\"><i class=\"icon-shopping-cart\"></i>订单管理</a>
                            </li>

                            <li ";
        // line 105
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_order_add")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/order/add\"><i class=\"icon-shopping-cart\"></i>收银开单</a>
                            </li>

                            <li ";
        // line 109
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_chart_index")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/chart/index\"><i class=\"icon-line-chart\"></i>交易统计</a>
                            </li>
                            <li";
        // line 112
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_member_memberList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/member/memberList\"><i class=\"icon-user\"></i>会员管理</a></li>
                            <li ";
        // line 114
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_card_cardList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/card/cardList\"><i class=\"icon-cloud\"></i>会员卡</a>
                            </li>
                            <li ";
        // line 117
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_card_usercardList")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/card/userCardList\"><i class=\"icon-cloud\"></i>用户会员卡</a>
                            </li>
                            <li ";
        // line 120
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_promo_index")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/promo/index\"><i class=\"icon-lemon\"></i>活动管理</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=\"#\"><i class=\"icon-comments-alt\"></i>评论管理</a>
                        <ul class=\"nav\">
                            <li ";
        // line 128
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_comment_index")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/comment/index\">我的点评</a>
                            </li>

                            <li ";
        // line 132
        if (array_key_exists("page_tag", $context)) {
            if (((isset($context["page_tag"]) ? $context["page_tag"] : $this->getContext($context, "page_tag")) == "shop_comment_pay")) {
                echo " class=\"active\" ";
            }
        }
        echo ">
                                <a href=\"/shop/comment/index?type=pay\">评价管理</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href=\"/shop/user/message\"><i class=\"icon-tasks\"></i> 消息中心
                            <span class=\"label label-badge label-danger pull-right\">";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["realTimeInfo"]) ? $context["realTimeInfo"] : $this->getContext($context, "realTimeInfo")), "unReadMsgNums", array()), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        ";
        // line 147
        echo "        <div id=\"main-content\">
            <div id=\"breadcrumb\">
                <ul class=\"breadcrumb\">
                    <li>
                        <a href=\"/index.php?/shop/index/index\"><i class=\"icon icon-home\"></i> 主页</a>
                    </li>
                    <li>
                        <a id=\"parent-bread\" href=\"#\">";
        // line 154
        echo twig_escape_filter($this->env, ((array_key_exists("page_bread_top", $context)) ? (_twig_default_filter((isset($context["page_bread_top"]) ? $context["page_bread_top"] : $this->getContext($context, "page_bread_top")), "未设置")) : ("未设置")), "html", null, true);
        echo "</a>
                    </li>
                    <li id=\"children-bread\" class=\"active\">";
        // line 156
        echo twig_escape_filter($this->env, ((array_key_exists("page_bread_sub", $context)) ? (_twig_default_filter((isset($context["page_bread_sub"]) ? $context["page_bread_sub"] : $this->getContext($context, "page_bread_sub")), "未设置")) : ("未设置")), "html", null, true);
        echo "</li>
                </ul>
            </div>
            <div id=\"page-content\">
                ";
        // line 160
        $this->displayBlock('page_header', $context, $blocks);
        // line 167
        echo "                ";
        $this->displayBlock('main', $context, $blocks);
        // line 169
        echo "            </div>
        </div>

        <!-- 在此处挥洒你的创意 -->
        <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
        <script src=\"/static/Js/jquery.js\"></script>
        <!-- ZUI Javascript组件 -->
        <script src=\"/static/zui/js/zui.min.plus.js\"></script>
        <script src=\"/static/zui/lib/datetimepicker/datetimepicker.min.js\"></script>
        ";
        // line 179
        echo "        <script src=\"/static/layer/layer.js\"></script>
        <script src=\"/static/shop/js/global.js\"></script>
        <script>
            \$(function () {
                \$('#left-bar').add('#main-content').height(\$(window).height() - \$('header').height());
                \$('.header-tooltip').tooltip();
                \$('#left-menu ul.nav-primary ul.nav li.active').parents('li').addClass('active show');
            });
        </script>
        ";
        // line 188
        $this->displayBlock('script', $context, $blocks);
        // line 190
        echo "    </body>
</html>";
    }

    // line 12
    public function block_static($context, array $blocks = array())
    {
        // line 13
        echo "        ";
    }

    // line 160
    public function block_page_header($context, array $blocks = array())
    {
        // line 161
        echo "                    <div class=\"page-header\" >
                        <h1>
                            ";
        // line 163
        echo twig_escape_filter($this->env, ((array_key_exists("page_header_title", $context)) ? (_twig_default_filter((isset($context["page_header_title"]) ? $context["page_header_title"] : $this->getContext($context, "page_header_title")), "页面标题")) : ("页面标题")), "html", null, true);
        echo "
                        </h1>
                    </div>
                ";
    }

    // line 167
    public function block_main($context, array $blocks = array())
    {
        // line 168
        echo "                ";
    }

    // line 188
    public function block_script($context, array $blocks = array())
    {
        // line 189
        echo "        ";
    }

    public function getTemplateName()
    {
        return "/shop/layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  407 => 189,  404 => 188,  400 => 168,  397 => 167,  389 => 163,  385 => 161,  382 => 160,  378 => 13,  375 => 12,  370 => 190,  368 => 188,  357 => 179,  346 => 169,  343 => 167,  341 => 160,  334 => 156,  329 => 154,  320 => 147,  311 => 140,  296 => 132,  285 => 128,  270 => 120,  260 => 117,  250 => 114,  241 => 112,  231 => 109,  220 => 105,  209 => 101,  196 => 95,  183 => 89,  174 => 87,  165 => 85,  153 => 80,  145 => 79,  137 => 78,  128 => 76,  119 => 74,  111 => 68,  89 => 48,  82 => 44,  77 => 42,  69 => 37,  64 => 35,  41 => 14,  39 => 12,  31 => 7,  23 => 1,);
    }
}
