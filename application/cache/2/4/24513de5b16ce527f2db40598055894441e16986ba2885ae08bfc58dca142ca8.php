<?php

/* /shop/index/login.twig */
class __TwigTemplate_24513de5b16ce527f2db40598055894441e16986ba2885ae08bfc58dca142ca8 extends Twig_Template
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
<html lang=\"en\">
    <head>
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
        <meta charset=\"utf-8\" />
        <title>Login Page - Ace Admin</title>

        <meta name=\"description\" content=\"User login page\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\" />

        <!-- bootstrap & fontawesome -->
        <link rel=\"stylesheet\" href=\"/static/zui/css/zui.min.css\" />
        <link rel=\"stylesheet\" href=\"/static/shop/css/base.css\" />
    </head>

    <body class=\"login-layout\">
        <div class=\"errBox\" >
            ";
        // line 18
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 19
            echo "                <div class=\"  center-block alert alert-danger with-icon\" style=\"width: 400px;margin-top: 10px;\">
                    <i class=\"icon-remove-sign\"></i>
                    <div class=\"content\">
                        <h4>登录出错</h4>
                        <p>";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "</p>
                    </div>
                </div>
            ";
        }
        // line 27
        echo "        </div>
        <div class=\"center-block login-container\">
            <div class=\"modal-dialog\" style=\"width: 375px;\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">灸疗店铺系统</h4>
                    </div>
                    <form action=\"\" method=\"post\"  class=\"form-horizontal\">
                        <div class=\"modal-body\">
                            <div class=\"form-group\">
                                <label for=\"inputEmail3\" class=\"col-sm-2 col-sm-offset-1 control-label\">手机号</label>
                                <div class=\"col-sm-8\">
                                    <input type=\"text\"  name=\"tel\" class=\"form-control\" id=\"tel\" placeholder=\"店主手机号\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"inputPassword3\" class=\"col-sm-2 col-sm-offset-1  control-label\">密码</label>
                                <div class=\"col-sm-8\">
                                    <input type=\"password\" name=\"pwd\" class=\"form-control\" id=\"inputPassword3\" placeholder=\"Password\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"col-sm-offset-2 col-sm-10\">
                                    <div class=\"checkbox\">
                                        <label>
                                            <input type=\"checkbox\"> 记住我
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">重置</button>
                            <button type=\"submit\" class=\"btn btn-primary\">登录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--[if !IE]> -->
        <script type=\"text/javascript\" src=\"/static/Js/jquery.js\"></script>
        <script type=\"text/javascript\" src=\"/static/zui/zui.min.js\">
        </script>
        <!-- inline scripts related to this page -->
        <script type=\"text/javascript\">

        </script>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/shop/index/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 27,  46 => 23,  40 => 19,  38 => 18,  19 => 1,);
    }
}
