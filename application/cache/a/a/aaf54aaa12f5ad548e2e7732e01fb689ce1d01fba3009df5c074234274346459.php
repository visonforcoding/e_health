<?php

/* /admin/home.twig */
class __TwigTemplate_aaf54aaa12f5ad548e2e7732e01fb689ce1d01fba3009df5c074234274346459 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"top_tiles\">
    <div  class=\"animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12\">
        <div class=\"tile-stats\">
            <div style=\"width:40px;float:left;padding:10px;\" class=\"icon\"><span style=\"font-size:36px\" class=\"lm-icon-shopping-cart\"></span>
            </div>
            <div style=\"float:left;font-size:48px;\" class=\"count\">";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["new_order_nums"]) ? $context["new_order_nums"] : $this->getContext($context, "new_order_nums")), "html", null, true);
        echo "</div>
            <div style=\"clear: both;\"><h3>今日订单数</h3></div>
        </div>
    </div>
            
    <div  class=\"animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12\">
        <div class=\"tile-stats\">
            <div style=\"width:40px;float:left;padding:10px;\" class=\"icon\"><span style=\"font-size:36px\" class=\"lm-icon-shopping-cart\"></span>
            </div>
            <div style=\"float:left;font-size:48px;\" class=\"count\">";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["month_order_nums"]) ? $context["month_order_nums"] : $this->getContext($context, "month_order_nums")), "html", null, true);
        echo "</div>
            <div style=\"clear: both;\"><h3>本月订单数</h3></div>
        </div>
    </div>
            
    <div  class=\"animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12\">
        <div class=\"tile-stats\">
            <div style=\"width:40px;float:left;padding:10px;\" class=\"icon\"><span style=\"font-size:36px;\" class=\"lm-icon-man\"></span>
            </div>
            <div style=\"float:left;font-size:48px;\" class=\"count\">";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["new_member_nums"]) ? $context["new_member_nums"] : $this->getContext($context, "new_member_nums")), "html", null, true);
        echo "</div>
            <div style=\"clear: both;\"><h3>新增会员</h3></div>
        </div>
    </div>
            
    <div class=\"clear\"></div>
</div>
<div class=\"chart-box easyui-panel\"  title=\"统计\">
    <div class=\"chart-bar easyui-panel\" style=\"padding: 5px;\">
        <a href=\"javascript:void(0)\" data-column=\"order\" data-options=\"toggle:true,group:'g1',selected:true\" id=\"search_button\" class=\"easyui-linkbutton getChart\" iconCls=\"icon-book\">订单</a>
        <a href=\"javascript:void(0)\" data-column=\"money\" data-options=\"toggle:true,group:'g1'\" id=\"clear_button\" class=\"easyui-linkbutton getChart\" iconCls=\"icon-money_dollar\">营业额</a>
        <a href=\"javascript:void(0)\" data-column=\"user\" data-options=\"toggle:true,group:'g1'\" id=\"clear_button\" class=\"easyui-linkbutton getChart\" iconCls=\"icon-user\">用户</a>
        <input id=\"time\" class=\"getChartByTime\" type=\"text\" value=\"\" />
      按<select class=\"easyui-combobox\" id=\"timeType\" name=\"state\" style=\"width:100px;\">
            <option value=\"year\">年</option>
            <option value=\"month\">月</option>
            <option value=\"week\">周</option>
        </select>
    </div>
    <div id=\"chart\" style=\"min-width: 310px; max-width: 800px; height: 400px;\">

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/admin/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 25,  38 => 16,  26 => 7,  19 => 2,);
    }
}
