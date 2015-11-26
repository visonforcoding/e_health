<?php

/* admin/sys/admin_edit.twig */
class __TwigTemplate_5dfcd0a146bf07abfab776a7aec46b30c0f350d08475cd8cfe3771874beb94e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/sys/admin_edit.twig", 2);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/esui.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "    <div style=\"margin: 10px 0;\"></div>
    <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
        <form id=\"node-form\" action=\"/admin/sys/editAdmin\" method=\"post\">
            <input type=\"hidden\" name=\"id\"  value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "id", array()), "html", null, true);
        echo "\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >用户名</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "name", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >电话号码</span>
                <input type=\"text\" name=\"phoneNo\" class=\"easyui-validatebox\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "phoneNo", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >邮箱</span>
                <input type=\"text\" name=\"mail\" class=\"easyui-validatebox\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "mail", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >所属组</span>
                <select class=\"easyui-combobox\" name=\"role\" style=\"width:100px;\">
                    ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 24
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "name", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                </select>
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">状态</span>
                <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 30
        if (($this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "status", array()) == "1")) {
            echo " checked=\"checked\" ";
        }
        echo " />启用
                <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 31
        if (($this->getAttribute((isset($context["cur_admin"]) ? $context["cur_admin"] : null), "status", array()) == "0")) {
            echo " checked=\"checked\" ";
        }
        echo " />禁用 
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\"></span>
                <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"submitForm('node-form');\">提交</a>
                <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"clearForm();\">清除</a>
            </div>
        </form>
    </div>
";
    }

    // line 41
    public function block_script($context, array $blocks = array())
    {
        // line 42
        echo "    <script>
        \$(function () {
        });
        function submitForm(id) {
            var \$form = \$('#' + id);
            \$.ajax({
                type: \$form.attr('method'),
                url: \$form.attr('action'),
                data: \$form.serialize(),
                dataType: 'json',
                success: function (msg) {
                    if (typeof msg === 'object') {
                        if (msg.status) {
                            \$.messager.alert('消息', msg.msg, 'info');
                            //window.location.href = msg.url;
                        } else {
                            \$.messager.alert('消息', msg.msg, 'error');
                        }
                    }
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/sys/admin_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 42,  108 => 41,  92 => 31,  86 => 30,  80 => 26,  69 => 24,  65 => 23,  57 => 18,  50 => 14,  43 => 10,  37 => 7,  32 => 4,  29 => 3,  11 => 2,);
    }
}
