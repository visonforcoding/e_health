<?php

/* /shop/member/memberAdd.twig */
class __TwigTemplate_6784cb0b2772f44e54a68b7d0c1e0f92991dfeb653165a33f0e510072d2f5b6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/member/memberAdd.twig", 2);
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
        // line 3
        $context["page_header_title"] = "添加会员";
        // line 4
        $context["page_tag"] = "shop_member_memberList";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_static($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 8
    public function block_main($context, array $blocks = array())
    {
        // line 9
        echo "    <div class='work-copy'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">真实姓名</label>
                <div class=\"col-md-4\">
                    <input type='text' name='trueName' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>
            
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">昵称</label>
                <div class=\"col-md-4\">
                    <input type='text' name='nick' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">电话</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\"  name='tel'   class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">性别</label>
                <div class=\"col-md-4\">
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"gender\" checked=\"checked\"  value=\"1\"> 男
                    </label>
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"gender\"  value=\"0\"> 女
                    </label>
                </div>
            </div>
            
             <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">生日</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-date\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"birthday\" class=\"form-control\" size=\"16\"   type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <div class=\"col-md-offset-2 col-md-10\">
                    <input type='submit' id='submit' class='btn btn-primary' value='保存' data-loading='稍候...' /> 
                </div>
            </div>
        </form>
    </div>
";
    }

    // line 64
    public function block_script($context, array $blocks = array())
    {
        // line 65
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
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/member/memberAdd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 65,  103 => 64,  46 => 9,  43 => 8,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
