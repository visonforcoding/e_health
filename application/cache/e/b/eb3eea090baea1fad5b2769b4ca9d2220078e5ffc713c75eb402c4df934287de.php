<?php

/* /home/user/check_phone.twig */
class __TwigTemplate_eb3eea090baea1fad5b2769b4ca9d2220078e5ffc713c75eb402c4df934287de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "/home/user/check_phone.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
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
        echo "验证手机";
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
    <div class=\"title\">验证手机</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "\t<form action=\"#\" method='post'>
\t\t<ul class=\"change-phone-box\">
\t\t\t<li>
\t\t\t\t<a href=\"#\">
\t\t\t\t\t中国（+86）
\t\t\t\t\t<i class=\"sprits gonext\"></i>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<input type=\"text\" placeholder=\"请输入手机号码\" value='";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : $this->getContext($context, "phone")), "html", null, true);
        echo "' id='phone' name='phone' readonly=\"true\">
\t\t\t\t<a href=\"javascript:;\" class=\"get-phne-code geting\" id='get-yanzheng'>获取验证码</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<input type=\"text\"  id='code' name='code' placeholder=\"请输入验证码\">
\t\t\t</li>
\t\t</ul>


\t\t<input type=\"submit\" class=\"confrim-password\" value=\"验证\">
\t</form>
\t
";
    }

    // line 34
    public function block_script($context, array $blocks = array())
    {
        // line 35
        echo "\t<script type=\"text/javascript\">
\t\t\$(function(){
\t\t\t//获取验证码
\t\t\t\$('#get-yanzheng').click(function() {
\t\t\t\tvar phone=\$('#phone').val();
\t\t\t\t \$.ajax({
                    type: \"POST\",
                    url: \"/home/user/getCode.html\",
                    data: {'phone': phone},
                    success: function (msg) {
                        alert(\"发送成功\" );
                    }
                });
\t\t\t
\t\t\t});

\t\t\t//验证验证码的合理性
\t\t\t\$('.confrim-password').click(function() {
\t\t\t\tvar code=\$('#code').val();
\t\t\t\tif(code==''){
\t\t\t\t\talert('请填写验证码');
\t\t\t\t\treturn false;
\t\t\t\t}

\t\t\t\t//验证用户名
\t\t\t\t\$form = \$(this).parents('form');
                \$.ajax({
                    type: \$form.attr('method'),
                    url: \$form.attr('action'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof msg === 'object') {
                            if (msg.status) {
                                
                                window.location.href = msg.url;
                            } else {
                                alert(msg.msg);
                            }
                        }
                    }
                });
                return false;
\t\t\t\t
\t\t\t});


\t\t});


\t</script>
";
    }

    public function getTemplateName()
    {
        return "/home/user/check_phone.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 35,  81 => 34,  64 => 21,  53 => 12,  50 => 11,  40 => 4,  37 => 3,  31 => 2,  11 => 1,);
    }
}
