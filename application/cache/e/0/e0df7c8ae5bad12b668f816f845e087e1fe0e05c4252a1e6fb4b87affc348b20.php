<?php

/* admin/area/add_area.twig */
class __TwigTemplate_e0df7c8ae5bad12b668f816f845e087e1fe0e05c4252a1e6fb4b87affc348b20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/area/add_area.twig", 2);
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
        <form id=\"node-form\" action=\"/admin/area/addArea\" method=\"post\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\">父节点</span>
                <input name=\"pid\" id=\"area-tree\" value=\"0\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >名称</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">首字母大写</span>
                <input type=\"text\" name=\"letter\" class=\"easyui-validatebox\" data-options=\"required:true\" placeholder=\"节点名称\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">地区编码</span>
                <input type=\"text\" name=\"code\" class=\"easyui-validatebox\" data-options=\"required:true\" placeholder=\"节点名称\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">状态</span>
                <input type=\"radio\" name=\"status\" value=\"1\" checked=\"checked\" />启用
                <input type=\"radio\" name=\"status\" value=\"0\" />禁用 
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

    // line 36
    public function block_script($context, array $blocks = array())
    {
        // line 37
        echo "    <script>
        \$(function () {
            \$('#area-tree').combotree({
                url: '/admin/area/asy_area_tree',
                required: true
            });
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
        return "admin/area/add_area.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 37,  67 => 36,  32 => 4,  29 => 3,  11 => 2,);
    }
}
