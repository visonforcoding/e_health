<?php

/* /admin/sys/node_add.twig */
class __TwigTemplate_217a06f8ebc0a84222aadf8583f6f176f195939eee731e60060d5ffb54eebcf3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "/admin/sys/node_add.twig", 2);
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
        <form id=\"node-form\" action=\"/admin/sys/addNode\" method=\"post\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\">父节点</span>
                <input name=\"pid\" id=\"node-tree\" value=\"0\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >节点</span>
                <input type=\"text\" name=\"node\" class=\"easyui-validatebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">名称</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\" placeholder=\"节点名称\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">备注</span>
                <textarea name=\"remark\" style=\"width: 409px; height: 75px;\"></textarea>
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
            \$('#node-tree').combotree({
                url: '/admin/sys/get_node_tree',
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
                            \$.messager.alert('消息',msg.msg,'info');
                            //window.location.href = msg.url;
                        } else {
                           \$.messager.alert('消息',msg.msg,'error');
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
        return "/admin/sys/node_add.twig";
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
