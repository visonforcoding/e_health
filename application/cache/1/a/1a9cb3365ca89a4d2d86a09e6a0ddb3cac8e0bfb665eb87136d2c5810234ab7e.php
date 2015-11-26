<?php

/* /shop/member/viewBuy.twig */
class __TwigTemplate_1a9cb3365ca89a4d2d86a09e6a0ddb3cac8e0bfb665eb87136d2c5810234ab7e extends Twig_Template
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
        <link href=\"/static/shop/css/base.css\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.jqgrid.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.ace.css\">
        <style>
            table tr td:first-child{
                text-align: right;
                width:120px;
            }
            #flowing-box{
                height:400px;
                overflow-y: scroll;
                overflow-x: hidden;
            }
            .col-md-2{
                width:200px;
                display: inline-block;
            }
            .col-md-1{
                width:100px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class=\"example\">
            <div class=\"work-copy\">
                <div class=\"table-toolbar col-xs-12\" style=\" margin-bottom:10px;\">
                    <div class=\"infobox infobox-green\">
                        <div class=\"infobox-icon\">
                            <i class=\"icon icon-shopping-cart fa fa-comments\"></i>
                        </div>
                        <div class=\"infobox-data\">
                            <span class=\"infobox-data-number\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "nums", array()), "html", null, true);
        echo "</span>
                            <div class=\"infobox-content\">消费记录总数</div>
                        </div>
                        <!-- #section:pages/dashboard.infobox.stat -->
                        <div class=\"stat stat-success\">
                            ";
        // line 48
        echo "                        </div>
                        <!-- /section:pages/dashboard.infobox.stat -->
                    </div>
                    <div class=\"infobox infobox-green\">
                        <div class=\"infobox-icon\">
                            <i class=\"icon icon-yen fa fa-comments\"></i>
                        </div>
                        <div class=\"infobox-data\">
                            <span class=\"infobox-data-number\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "total", array()), "html", null, true);
        echo "</span>
                            <div class=\"infobox-content\">消费总金额</div>
                        </div>
                        <!-- #section:pages/dashboard.infobox.stat -->
                        <div class=\"stat stat-success\">
                            ";
        // line 62
        echo "                        </div>
                        <!-- /section:pages/dashboard.infobox.stat -->
                    </div>
                </div>
                <div class=\"col-xs-12\">
                    <div class=\"list\">
                        <header>
                            <h3><i class=\"icon-list-ul icon-border-circle\"></i> 交易明细 &nbsp;<small>";
        // line 69
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["info"]) ? $context["info"] : null), "nums", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["info"]) ? $context["info"] : null), "nums", array()), "0")) : ("0")), "html", null, true);
        echo "条记录</small></h3>
                        </header>
                        <section id=\"flowing-box\" class=\"items items-hover\">
                            ";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["followings"]) ? $context["followings"] : $this->getContext($context, "followings")));
        foreach ($context['_seq'] as $context["_key"] => $context["following"]) {
            // line 73
            echo "                                <div class=\"item row\">
                                    <div class=\"col-md-2\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "ctime", array()), "html", null, true);
            echo "</div>
                                    <div class=\"col-md-1\">
                                        ";
            // line 76
            if (($this->getAttribute($context["following"], "income", array()) == "1")) {
                // line 77
                echo "                                            <i class=\"icon  icon-long-arrow-up green\">(收入)</i>
                                        ";
            } else {
                // line 79
                echo "                                            <i class=\"icon  icon-long-arrow-down red\">(支出)</i>
                                        ";
            }
            // line 81
            echo "                                        ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "amount", array()), "html", null, true);
            echo "
                                    </div>
                                    <div class=\"col-md-2\">";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "remark", array()), "html", null, true);
            echo "</div>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['following'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- 在此处挥洒你的创意 -->
        <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
        <script src=\"/static/Js/jquery.js\"></script>
        <!-- ZUI Javascript组件 -->
        <script src=\"/static/zui/js/zui.min.plus.js\"></script>
        ";
        // line 98
        echo "        <script src=\"/static/layer/layer.js\"></script>
        <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
        <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
        ";
        // line 102
        echo "        <script>
            \$(function () {

            });
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/shop/member/viewBuy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 102,  156 => 98,  143 => 86,  134 => 83,  128 => 81,  124 => 79,  120 => 77,  118 => 76,  113 => 74,  110 => 73,  106 => 72,  100 => 69,  91 => 62,  83 => 56,  73 => 48,  65 => 42,  27 => 7,  19 => 1,);
    }
}
