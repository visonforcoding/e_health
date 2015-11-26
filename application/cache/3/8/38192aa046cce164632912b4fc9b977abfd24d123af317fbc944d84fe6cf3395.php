<?php

/* /shop/member/memberEdit.twig */
class __TwigTemplate_38192aa046cce164632912b4fc9b977abfd24d123af317fbc944d84fe6cf3395 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/member/memberEdit.twig", 2);
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
        $context["page_header_title"] = "修改会员";
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
        echo "    <div class='example'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">真实姓名</label>
                <div class=\"col-md-4\">
                    <input type='text' value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "trueName", array()), "html", null, true);
        echo "\" name='trueName' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">昵称</label>
                <div class=\"col-md-4\">
                    <input type='text' value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "nick", array()), "html", null, true);
        echo "\" name='nick' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">电话</label>
                <div class=\"col-md-4\">
                    <input type='text' value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "tel", array()), "html", null, true);
        echo "\" data-validation-engine=\"validate[required]\"  name='tel'   class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">性别</label>
                <div class=\"col-md-4\">
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"gender\" ";
        // line 37
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "gender", array()) == "1")) {
            echo " checked=\"checked\" ";
        }
        echo "  value=\"1\"> 男
                    </label>
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"gender\" ";
        // line 40
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "gender", array()) == "0")) {
            echo " checked=\"checked\" ";
        }
        echo " value=\"0\"> 女
                    </label>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">生日</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-date\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"birthday\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "birthday", array()), "html", null, true);
        echo "\" class=\"form-control\" size=\"16\"   type=\"text\">
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
        return "/shop/member/memberEdit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 65,  125 => 64,  107 => 49,  93 => 40,  85 => 37,  74 => 29,  64 => 22,  54 => 15,  46 => 9,  43 => 8,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
