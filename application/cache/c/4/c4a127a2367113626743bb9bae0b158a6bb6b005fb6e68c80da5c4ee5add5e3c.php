<?php

/* /shop/card/userCardDetail.twig */
class __TwigTemplate_c4a127a2367113626743bb9bae0b158a6bb6b005fb6e68c80da5c4ee5add5e3c extends Twig_Template
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
        <style>
            table tr td:first-child{
                text-align: right;
                width:120px;
            }
        </style>
    </head>
    <body>
        <div class=\"example\">
            <table class=\"table\">
                <tbody>
                    <tr class=\"success\">
                        <td>卡种：</td>
                        <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "name", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"danger\">
                        <td>持卡人：</td>
                        <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "trueName", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"active\">
                        <td>持卡人手机号：</td>
                        <td>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "tel", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"active\">
                        <td>开卡日期：</td>
                        <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "get_date", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"warning\">
                        <td>到期日期：</td>
                        <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "expires_date", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"success\">
                        <td>购买金额：</td>
                        <td>";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "price", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr class=\"success\">
                        <td>消费情况：</td>
                        <td>";
        // line 48
        echo $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "contentStr", array());
        echo "</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 在此处挥洒你的创意 -->
        <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
        <script src=\"/static/Js/jquery.js\"></script>
        <!-- ZUI Javascript组件 -->
        <script src=\"/static/zui/js/zui.min.plus.js\"></script>
        ";
        // line 60
        echo "        <script src=\"/static/layer/layer.js\"></script>
        ";
        // line 62
        echo "        <script>
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/shop/card/userCardDetail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 62,  103 => 60,  89 => 48,  82 => 44,  75 => 40,  68 => 36,  61 => 32,  54 => 28,  47 => 24,  27 => 7,  19 => 1,);
    }
}
