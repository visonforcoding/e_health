<?php

/* home/user/login.twig */
class __TwigTemplate_5d508197301691ceb69c1775d9665b1223ebcb98da04c889f8f6cb6eb19fc45d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/login.twig", 1);
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
    <div class=\"title\">登录</div>
    <a href=\"/home/user/register.html\" class=\"edit-address\">注册</a>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"login-sbox\">
        <form action=\"#\">

            <div class=\"login-input-group\" id=\"user-name\" >
                <input type=\"text\" name=\"phone\" class=\"login-phone-input\" placeholder=\"请输入手机号\">
                <span class=\"quhao\">+86</span>
                <i class=\"sprits del\"></i>
            </div>

            <div class=\"login-input-group\" id=\"user-password\">
                <input type=\"password\" name=\"pwd\" placeholder=\"请输入密码\">
                <i class=\"sprits del\"></i>
            </div>

            <div class=\"login-input-group\">
                <input type=\"submit\" id=\"login-submit-bnt\" value=\"登录\">
            </div>
        </form>

        <a href=\"/home/user/resetPwd.html\" class=\"find-password\">忘记密码？</a>
    </div>
";
    }

    // line 35
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 37
    public function block_script($context, array $blocks = array())
    {
        // line 38
        echo "    <script>

        \$(function () {
            FastClick.attach(document.body);

            var loginSubmit = function () {
                var _handel = false;

                \$(\".login-input-group\").bind(\"input propertychange\", function () {
                    \$(this).find(\".del\").show();

                });

                \$(\".login-input-group .del\").on(\"click\", function () {

                    \$(this).parent().find(\"input\").focus().val('');
                    \$(this).hide();
                });
                function checkSubmit() {
                    var _val = \$(\"#user-name\").find(\"input\").val();
                    if (_val.length > 0) {
                        _handel = true;
                    }
                }
                \$(\"#user-password\").bind(\"input propertychange\", function () {
                    checkSubmit();
                    if (_handel) {
                        \$(\"#login-submit-bnt\").addClass(\"able\");
                    }
                });
            }();
            \$('#login-submit-bnt').click(function () {
                \$form = \$(this).parents('form');
                //验证手机号码

                var phone = \$('input[name=phone]').val();
                if (phone == '') {
                    alert('电话号码不能为空');
                    return false;
                }
                var reg = /^0?1[3|4|5|8][0-9]\\d{8}\$/;
                if (!reg.test(phone)) {
                    alert('电话号码格式不正确');
                    return false;
                }
                //alert(phone);
                //验证密码
                var pwd = \$('input[name=pwd]').val();
                if (pwd == '') {
                    alert('密码不能为空');
                    return false;
                }
                //验证成功发送ajax请求
                \$.ajax({
                    type: 'post',
                    url: \$form.attr('action'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof msg === 'object') {
                            if (msg.status === true) {
                                if (msg.url === undefined) {
                                    var lasturl = getUrlParam('lasturl');
                                    if(lasturl !== null){
                                        window.location.href = lasturl;
                                    }else{
                                        window.location.href = '/';
                                    }
                                } else {
                                    window.location.href = msg.url;
                                }
                            } else {
                                alert(msg.msg);
                            }
                        }
                    }
                });
                return false;
            });
        });
        function getUrlParam(name) {
            var reg = new RegExp(\"(^|&)\" + name + \"=([^&]*)(&|\$)\"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null)
                return unescape(r[2]);
            return null; //返回参数值
        }


    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 38,  85 => 37,  80 => 35,  55 => 13,  52 => 12,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
