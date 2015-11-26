<?php

/* shop/vacate/vacateEdit.twig */
class __TwigTemplate_045614f73d43c23331b22aa7c479c92ff0623cc3086ebc7eb25dd1c8bee6faf1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/vacate/vacateEdit.twig", 1);
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
        $context["page_header_title"] = "假条添加";
        // line 3
        $context["page_tag"] = "shop_vacate_vacateList";
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
                <label class=\"col-md-2 control-label\">员工</label>
                <div class=\"col-md-4\">
                    <select name=\"employee_id\" id=\"original\" class=\"form-control\">
                        ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["employees"]) ? $context["employees"] : $this->getContext($context, "employees")));
        foreach ($context['_seq'] as $context["_key"] => $context["employee"]) {
            // line 16
            echo "                            <option   value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "id", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["vacate"]) ? $context["vacate"] : $this->getContext($context, "vacate")), "employee_id", array()) == $this->getAttribute($context["employee"], "id", array()))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "truename", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["employee"], "tel", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['employee'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                    </select>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">请假天数</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\" name='days' value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vacate"]) ? $context["vacate"] : $this->getContext($context, "vacate")), "days", array()), "html", null, true);
        echo "\"    class='form-control'   />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">开始时间</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-datetime\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"begin_time\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vacate"]) ? $context["vacate"] : $this->getContext($context, "vacate")), "begin_time", array()), "html", null, true);
        echo "\" class=\"form-control\" size=\"16\"   type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">结束时间</label>
                <div class=\"col-md-2\" >
                    <div class=\"input-group date form-datetime\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"end_time\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vacate"]) ? $context["vacate"] : $this->getContext($context, "vacate")), "end_time", array()), "html", null, true);
        echo "\" class=\"form-control\" size=\"16\"  type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">备注</label>
                <div class=\"col-md-4\">
                    <input type='text' value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vacate"]) ? $context["vacate"] : $this->getContext($context, "vacate")), "remark", array()), "html", null, true);
        echo "\" data-validation-engine=\"validate[required]\"  name='remark'   class='form-control' />
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
        return "shop/vacate/vacateEdit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 65,  136 => 64,  120 => 51,  108 => 42,  96 => 33,  85 => 25,  76 => 18,  59 => 16,  55 => 15,  46 => 8,  43 => 7,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
