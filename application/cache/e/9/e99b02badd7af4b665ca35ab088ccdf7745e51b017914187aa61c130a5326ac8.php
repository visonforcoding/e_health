<?php

/* shop/user/setCargo.twig */
class __TwigTemplate_e99b02badd7af4b665ca35ab088ccdf7745e51b017914187aa61c130a5326ac8 extends Twig_Template
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
        // line 26
        echo "                display: inline-block;
            }
            .col-md-1{
                ";
        // line 30
        echo "                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class=\"work-copy\" style=\"width:350px;margin:5px auto auto auto;\">
            <form action=\"\" method=\"post\">
                ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cargos"]) ? $context["cargos"] : $this->getContext($context, "cargos")));
        foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
            // line 38
            echo "                    <div class=\"form-group service-group\">
                        <div class=\"col-md-2\">
                            <input name=\"store_cargo[]\" type=\"hidden\" value=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "id", array()), "html", null, true);
            echo "\" type=\"checkbox\" >
                        </div>
                        <label class=\"col-md-2 control-label\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "cargo_name", array()), "html", null, true);
            echo "</label>
                        <div class=\"col-md-2\">
                            <input type='text'  name='nums[]' ";
            // line 44
            if ($this->getAttribute((isset($context["service_cargos"]) ? $context["service_cargos"] : null), $this->getAttribute($context["cargo"], "id", array()), array(), "array", true, true)) {
                echo "value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service_cargos"]) ? $context["service_cargos"] : $this->getContext($context, "service_cargos")), $this->getAttribute($context["cargo"], "id", array()), array(), "array"), "html", null, true);
                echo "\"";
            } else {
                echo "\" value=\"0\"";
            }
            echo " data-validation-engine=\"validate[required],custom[integer]]\"   class='form-control'  />
                        </div>
                        <label class=\"control-label\">件</label>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "                <input type='submit' id='submit' class='btn btn-primary' value='保存' data-loading='稍候...' /> 
            </form>
        </div>
        <!-- 在此处挥洒你的创意 -->
        <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
        <script src=\"/static/Js/jquery.js\"></script>
        <!-- ZUI Javascript组件 -->
        <script src=\"/static/zui/js/zui.min.plus.js\"></script>
        ";
        // line 58
        echo "        <script src=\"/static/layer/layer.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
        <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
        ";
        // line 63
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
        return "shop/user/setCargo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 63,  107 => 58,  97 => 49,  80 => 44,  75 => 42,  70 => 40,  66 => 38,  62 => 37,  53 => 30,  48 => 26,  27 => 7,  19 => 1,);
    }
}
