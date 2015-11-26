<?php

/* /shop/balance/withdraw.twig */
class __TwigTemplate_7412a0a574257c1b8c7ee767625d43b381ce4ccc36d7a0f4782bf103863dd867 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/balance/withdraw.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_header_title"] = "提现";
        // line 3
        $context["page_bread_top"] = "资金管理";
        // line 4
        $context["page_bread_sub"] = "提现";
        // line 5
        $context["page_tag"] = "shop_balance_balanceInfo";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_static($context, array $blocks = array())
    {
        // line 7
        echo "    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 9
    public function block_main($context, array $blocks = array())
    {
        // line 10
        echo "    <div class='example'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">用户名</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\" name='username' value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store_detail"]) ? $context["store_detail"] : $this->getContext($context, "store_detail")), "account_name", array()), "html", null, true);
        echo "\" readonly   class='form-control'  />
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">账号</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\" name='username' value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store_detail"]) ? $context["store_detail"] : $this->getContext($context, "store_detail")), "account_no", array()), "html", null, true);
        echo "\" readonly   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">提取金额</label>
                <div class=\"col-md-4\">
                    <input type='text'  name='amount' placeholder=\"提取金额不得超过";
        // line 29
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["store_detail"]) ? $context["store_detail"] : $this->getContext($context, "store_detail")), "balance", array())), "html", null, true);
        echo "元\"    class='form-control'   />
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">验证码</label>
                <div class=\"col-md-2\">
                    <input type='text'  name='vcode'    class='form-control'   />
                </div>
                <div class=\"col-md-2\">
                    <button id=\"getVCode\" type=\"button\" class=\"btn btn-primary\">获取验证码</button>
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-md-offset-2 col-md-10\">
                    <input type='submit' id='submit' class='btn btn-primary' value='确认' data-loading='稍候...' /> 
                </div>
            </div>
        </form>
    </div>
";
    }

    // line 50
    public function block_script($context, array $blocks = array())
    {
        // line 51
        echo "    <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
    <script>
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
            //
           \$('#getVCode').on('click',function(){
               \$obj = \$(this);
               \$(this).attr('disabled','disabled');
               \$(this).html('<span id=\"sendCodeCount\">60</span>S后再次发送');
               setInterval('clock()',1000);
               \$.ajax({
                   url:'/shop/balance/getVCode',
                   type:'post',
                   dataType:'json',
                   success:function(res){
                       layer.msg(res.msg);
                   }
               });
           });
        });
        
        function clock(){
          var count = \$('#sendCodeCount').html();
          if(count>0){
               \$('#sendCodeCount').html(count-1);
          }else{
              \$('#getVCode').removeAttr('disabled'); 
              \$('#getVCode').html('获取验证码'); 
          }
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/balance/withdraw.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 51,  101 => 50,  77 => 29,  67 => 22,  58 => 16,  50 => 10,  47 => 9,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
