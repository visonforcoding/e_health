<?php

/* admin/sys/admin_add.twig */
class __TwigTemplate_30edf4dd63438cfe1091d714e1fc73da988fe0c53c45cb8298efab8ccc622858 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/sys/admin_add.twig", 2);
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
        <form id=\"node-form\" action=\"/admin/sys/addAdmin\" method=\"post\">
            <input type=\"hidden\" name=\"id\"  value=\"\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >用户名</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" value=\"\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >电话号码</span>
                <input type=\"text\" name=\"phoneNo\" class=\"easyui-validatebox\" value=\"\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >邮箱</span>
                <input type=\"text\" name=\"mail\" class=\"easyui-validatebox\" value=\"\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >密码</span>
                <input class=\"easyui-textbox\" type=\"password\" name=\"password\" data-options=\"prompt:'密码',iconCls:'icon-lock',iconWidth:38\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >所属组</span>
                <select class=\"easyui-combobox\" name=\"role\" style=\"width:100px;\">
                    ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 28
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
        // line 30
        echo "                </select>
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">状态</span>
                <input type=\"radio\" name=\"status\" value=\"1\"  checked=\"checked\"  />启用
                <input type=\"radio\" name=\"status\" value=\"0\"  />禁用 
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

    // line 45
    public function block_script($context, array $blocks = array())
    {
        // line 46
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
        return "admin/sys/admin_add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 46,  90 => 45,  72 => 30,  61 => 28,  57 => 27,  32 => 4,  29 => 3,  11 => 2,);
    }
}
