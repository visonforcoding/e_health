<?php

/* admin/sys/group_add.twig */
class __TwigTemplate_a02d063c49a68d89aff48c44d103aabf3e5a93c93dd8766053b66929ebeeae80 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/sys/group_add.twig", 2);
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
        <form id=\"node-form\" action=\"/admin/sys/addGroup\" method=\"post\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >组名</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">备注</span>
                <textarea name=\"remark\" style=\"width: 409px; height: 75px;\"></textarea>
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">权限</span>
                ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["nodes"]) ? $context["nodes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["node"]) {
            // line 18
            echo "                    <span style=\"display:block;margin-left: 70px;\">
                         ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["node"], "html", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["node"], "name", array()), "html", null, true);
            echo "
                    </span>
                    ";
            // line 21
            if (twig_test_iterable($this->getAttribute($context["node"], "child", array()))) {
                // line 22
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["node"], "child", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 23
                    echo "                            <span style=\"display:block;margin-left: 70px;\">
                                <input type=\"checkbox\" name=\"node_id[]\"  node=\"";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo "\" /> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "
                            </span>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 27
                echo "                    ";
            }
            // line 28
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['node'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "            </div>
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

    // line 43
    public function block_script($context, array $blocks = array())
    {
        // line 44
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
        return "admin/sys/group_add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 44,  109 => 43,  92 => 29,  86 => 28,  83 => 27,  70 => 24,  67 => 23,  62 => 22,  60 => 21,  54 => 19,  51 => 18,  47 => 17,  32 => 4,  29 => 3,  11 => 2,);
    }
}
