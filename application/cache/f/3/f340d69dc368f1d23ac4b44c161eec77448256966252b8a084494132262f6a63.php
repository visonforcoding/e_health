<?php

/* /shop/employee/employeeAdd.twig */
class __TwigTemplate_f340d69dc368f1d23ac4b44c161eec77448256966252b8a084494132262f6a63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/employee/employeeAdd.twig", 1);
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
        $context["page_header_title"] = "新增员工";
        // line 3
        $context["page_tag"] = "shop_employee_employeeList";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_static($context, array $blocks = array())
    {
        // line 5
        echo "    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 7
    public function block_main($context, array $blocks = array())
    {
        // line 8
        echo "    <div class='work-copy'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">真实姓名</label>
                <div class=\"col-md-4\">
                    <input type='text' name='truename' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">职位</label>
                <div class=\"col-md-4\">
                    <input type='text' name='job' data-validation-engine=\"validate[required]\"   class='form-control'  />
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
                <label class=\"col-md-2 control-label\">身份证</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required,funcCall[checkID]]\"  name='id_no'   class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">手机号</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required,custom[phone]]\"  name='tel'   class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">email</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required,,custom[email]]\"  name='email'   class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">入职时间</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-date\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"intime\" class=\"form-control\" size=\"16\"   type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">离职状态</label>
                <div class=\"col-md-4\">
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"status\" checked=\"checked\"  value=\"1\"> 在职
                    </label>
                    <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"status\"  value=\"0\"> 离职
                    </label>
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

    // line 89
    public function block_script($context, array $blocks = array())
    {
        // line 90
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
        function checkID(field, rules, i, options) {
            if (!validateIdCard(field.val())) {
                // this allows the use of i18 for the error msgs
                return '请输入正确的身份证号';
            }
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/employee/employeeAdd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 90,  129 => 89,  46 => 8,  43 => 7,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
