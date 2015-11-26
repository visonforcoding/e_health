<?php

/* /shop/order/appoint.twig */
class __TwigTemplate_afa7d06dc1df60bfe615bf196cea6e8f0c921253ae88522c6e382d2118ed196a extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"zh-cn\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("page_title", $context)) ? (_twig_default_filter((isset($context["page_title"]) ? $context["page_title"] : $this->getContext($context, "page_title")), "灸疗管理后台")) : ("灸疗管理后台")), "html", null, true);
        echo "</title>
        <!-- zui -->
        <link href=\"/static/zui/css/zui.min.css\" rel=\"stylesheet\">
        <link href=\"/static/shop/css/base.css\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.jqgrid.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.ace.css\">
        <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
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
                ";
        // line 27
        echo "                display: inline-block;
            }
            .col-md-1{
                ";
        // line 31
        echo "                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class=\"work-copy\" style=\"width:350px;margin:5px auto auto auto;\">
            <form class=\"form-horizontal\" role=\"form\" method=\"post\" >
                <input type=\"hidden\" name=\"order_id\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["order_id"]) ? $context["order_id"] : $this->getContext($context, "order_id")), "html", null, true);
        echo "\"/>
                <div class=\"form-group\">
                    <label class=\"col-md-2 control-label required\">选择店员</label>
                    <div class='col-md-4'>
                        <select name='employee' id='original' class='form-control'>
                            ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["employees"]) ? $context["employees"] : $this->getContext($context, "employees")));
        foreach ($context['_seq'] as $context["_key"] => $context["employee"]) {
            // line 44
            echo "                                <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "id", array()), "html", null, true);
            echo "' selected='selected'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "truename", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "tel", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['employee'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                        </select>
                    </div>
                </div>
                ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cargos"]) ? $context["cargos"] : $this->getContext($context, "cargos")));
        foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
            // line 50
            echo "                    <div class=\"form-group\">
                        <label class=\"col-md-2 control-label required\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "cargo_name", array()), "html", null, true);
            echo "</label>
                        <div class='col-md-4'>
                            <input type=\"hidden\" name=\"cargo[]\" value=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "id", array()), "html", null, true);
            echo "\"/> 
                            <input type=\"text\" name=\"num[]\"/> 件(库存剩余";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "nums", array()), "html", null, true);
            echo ")
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                <input type=\"submit\" class=\"btn btn-primary\" value=\"确定\"/>
            </form>
        </div>
        <!-- 在此处挥洒你的创意 -->
        <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
        <script src=\"/static/Js/jquery.js\"></script>
        <!-- ZUI Javascript组件 -->
        <script src=\"/static/zui/js/zui.min.plus.js\"></script>
        ";
        // line 67
        echo "        <script src=\"/static/layer/layer.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
        ";
        // line 72
        echo "        <script>
            \$(function () {
                \$('form').validationEngine();
                \$('form').ajaxForm({
                    beforeSubmit: function (formData, jqForm, options) {

                    },
                    success: function (data) {
                        if (data.status) {
                            layer.alert(data.msg, {icon: 6});
                        } else {
                            layer.alert(data.msg, {icon: 5});
                        }
                    }
                });
            });
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/shop/order/appoint.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 72,  128 => 67,  118 => 58,  108 => 54,  104 => 53,  99 => 51,  96 => 50,  92 => 49,  87 => 46,  74 => 44,  70 => 43,  62 => 38,  53 => 31,  48 => 27,  27 => 8,  19 => 2,);
    }
}
