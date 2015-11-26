<?php

/* admin/sys/group_edit.twig */
class __TwigTemplate_670c08be05d708fd9c56e4d2f8979343cc42372319bf2984a4b2087ee2602aab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/sys/group_edit.twig", 2);
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
        <form id=\"node-form\" action=\"/admin/sys/editGroup\" method=\"post\">
            <input type=\"hidden\" name=\"id\"  value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_group"]) ? $context["cur_group"] : null), "id", array()), "html", null, true);
        echo "\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\" >组名</span>
                <input type=\"text\" name=\"name\" class=\"easyui-validatebox\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_group"]) ? $context["cur_group"] : null), "name", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">备注</span>
                <textarea name=\"remark\" style=\"width: 409px; height: 75px;\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur_group"]) ? $context["cur_group"] : null), "remark", array()), "html", null, true);
        echo "</textarea>
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">权限</span>
                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["nodes"]) ? $context["nodes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["node"]) {
            // line 19
            echo "                    <span style=\"display:block;margin-left: 70px;\">
                         ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["node"], "html", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["node"], "name", array()), "html", null, true);
            echo "
                    </span>
                    ";
            // line 22
            if (twig_test_iterable($this->getAttribute($context["node"], "child", array()))) {
                // line 23
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["node"], "child", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 24
                    echo "                            <span style=\"display:block;margin-left: 70px;\">
                                <input ";
                    // line 25
                    if ($this->getAttribute($context["item"], "checked", array())) {
                        echo "checked";
                    }
                    echo " type=\"checkbox\" name=\"node_id[]\"  node=\"";
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
                // line 28
                echo "                    ";
            }
            // line 29
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['node'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\">状态</span>
                <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 33
        if (($this->getAttribute((isset($context["cur_group"]) ? $context["cur_group"] : null), "status", array()) == "1")) {
            echo " checked=\"checked\" ";
        }
        echo " />启用
                <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 34
        if (($this->getAttribute((isset($context["cur_group"]) ? $context["cur_group"] : null), "status", array()) == "0")) {
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

    // line 44
    public function block_script($context, array $blocks = array())
    {
        // line 45
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
        return "admin/sys/group_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 45,  133 => 44,  117 => 34,  111 => 33,  106 => 30,  100 => 29,  97 => 28,  80 => 25,  77 => 24,  72 => 23,  70 => 22,  64 => 20,  61 => 19,  57 => 18,  50 => 14,  43 => 10,  37 => 7,  32 => 4,  29 => 3,  11 => 2,);
    }
}
