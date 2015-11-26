<?php

/* home/user/register.twig */
class __TwigTemplate_9ae0a0fc2d1794a4eb19a3884acbc6416660f5a70a88ff70a992cad6bf236982 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/register.twig", 1);
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
    <div class=\"title\">注册</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"login-sbox\">
        <form action=\"\" method=\"post\">

            <div class=\"login-input-group\">
                <input type=\"text\" id=\"phone\" name=\"phone\" class=\"login-phone-input\" placeholder=\"请输入手机号\">
                <span class=\"quhao\">+86</span>
            </div>

            <div class=\"login-input-group\">
                <input type=\"text\" name=\"code\" class=\"input-yanzheng\" placeholder=\"请输入验证码\">
                <a href=\"javascript:;\" class=\"get-yanzheng\">立即获取</a>
            </div>

            <div class=\"login-input-group\">
                <input type=\"password\" name=\"pwd\" placeholder=\"请设置登录密码\">
            </div>

            <div class=\"login-input-group\">
                <input type=\"submit\" class=\"submit-form\" value=\"注册\" class=\"able\">
            </div>
        </form>

        <p class=\"uesr-xieyi\">点击注册即同意E养生的<a href=\"#\">《用户许可协议》</a></p>
    </div>
";
    }

    // line 37
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 39
    public function block_script($context, array $blocks = array())
    {
        // line 40
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);

            //修改提交按钮的样式
            var registerSubmit = function () {
                var _handel = false;

                function checkSubmit() {
                    var phone = \$('#phone').val();
                    var code=\$('input[name=code]').val();
                    var pwd=\$('input[name=pwd]').val();
                    if (phone.length > 0 && code.length > 0 && pwd.length > 0) {
                        _handel = true;
                    }
                }
                \$(\".login-input-group\").bind(\"input propertychange\", function () {
                    checkSubmit();
                    if (_handel) {
                        \$(\".submit-form\").addClass(\"able\");
                    }
                });
                
                
            }();


            //获取验证码
            \$('.get-yanzheng').click(function () {
            
                var phone = \$('#phone').val();
                //验证手机号码              
                if(phone==''){
                    alert('电话号码不能为空');
                     return false;
               }
               var reg = /^0?1[3|4|5|8][0-9]\\d{8}\$/;
               if(!reg.test(phone)){
                    alert('电话号码格式不正确');
                     return false;
               }

                //alert(phone);
                \$.ajax({
                    type: \"POST\",
                    url: \"/home/user/getCode.html\",
                    data: {'phone': phone},
                    success: function (msg) {
                        alert(msg.msg);
                    }
                });
            });

            //提交注册信息
            \$('.submit-form').click(function () {
                \$form = \$(this).parents('form');
                //验证手机 
                 var phone = \$('#phone').val();
                           
                if(phone==''){
                    alert('电话号码不能为空');
                     return false;
               }
               var reg = /^0?1[3|4|5|8][0-9]\\d{8}\$/;
               if(!reg.test(phone)){
                    alert('电话号码格式不正确');
                     return false;
               }

               var code=\$('input[name=code]').val();
               if(code==''){
                    alert('验证码不能为空');
                    return false;
               }
               //验证密码不能为空
               
              var pwd=\$('input[name=pwd]').val(); 
              if(pwd==''){
                    alert('密码不能为空');
                     return false;
               }
               
                //验证用户名
                \$.ajax({
                    type: \$form.attr('method'),
                    url: \$form.attr('action'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof msg === 'object') {
                            if (msg.status) {
                                alert(msg.msg);
                                //window.location.href = msg.url;
                                if(msg.status ===true){
                                    window.location.href = '/home/user/login';
                                }
                            } else {
                                alert(msg.msg);
                            }
                        }
                    }
                });
                return false;
            })
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 40,  87 => 39,  82 => 37,  54 => 12,  51 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
