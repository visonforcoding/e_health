<?php

/* home/user/reset_pwd.twig */
class __TwigTemplate_c5256d1a923a9b4e08e75dbaa51d7eb0ef34c61ffdbfe57b8e6506ea7bdd1228 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/reset_pwd.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/front.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "登录";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">密码重置</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"login-sbox\">
        <form action=\"#\">
            <div class=\"login-input-group\">
                <input type=\"text\" id=\"phone\" name=\"phone\" placeholder=\"请输入手机号\">
            </div>
            <div class=\"login-input-group\">
                <input type=\"text\" name=\"code\" class=\"input-yanzheng\" placeholder=\"请输入验证码\">
                <a href=\"javascript:;\" class=\"get-yanzheng\">立即获取</a>
            </div>
            <div class=\"login-input-group\">
                <input type=\"password\" name=\"pwd\" placeholder=\"请输入新密码\">
            </div>

            <div class=\"login-input-group\">
                <input type=\"submit\" id=\"submit-form\" value=\"完成\" class=\"able\">
            </div>
        </form>
        <p class=\"lianxi-kefu\">如遇到手机丢失，账号被盗等问题请联系客服QQ:4490056</p>
    </div>
";
    }

    // line 32
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 34
    public function block_script($context, array $blocks = array())
    {
        // line 35
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            \$('.get-yanzheng').click(function () {
                var phone = \$('#phone').val();
                \$.ajax({
                    type: \"POST\",
                    url: \"/home/user/getCode.html\",
                    data: {'phone': phone},
                    success: function (msg) {
                        alert(\"Data Saved: \" + msg);
                    }
                });
            });
            \$('#submit-form').click(function () {
                \$form = \$(this).parents('form');
                \$.ajax({
                    type:'post',
                    url: '/home/user/resetPwd.html',
                    data: \$form.serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof msg === 'object') {
                            if (msg.status) {
                                alert(msg.msg);
                                //window.location.href = msg.url;
                            } else {
                                alert(msg.msg);
                            }
                        }
                    }
                });
                return false;
            });
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/reset_pwd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 35,  82 => 34,  77 => 32,  54 => 12,  51 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
