<?php

/* admin/member/editMember.twig */
class __TwigTemplate_0429d4873f1f9e11ce2a93b58cb2d8dbb5879835de7f2e0b0f11bf2e9cb464d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/member/editMember.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
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

    // line 2
    public function block_static($context, array $blocks = array())
    {
        // line 3
        echo "    <script type=\"text/javascript\" src=\"/static/dropzone/dropzone.js\"></script>
    <link rel=\"stylesheet\" href=\"/static/dropzone/dropzone.css\">
";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"easyui-panel\" title=\"添加会员\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\" class=\"form-inline\"  action=\"/admin/member/editMember\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"input-group\">
                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "id", array()), "html", null, true);
        echo "\" >
                    <span class=\"input-group-addon\" >电话号码</span>
                    <input type=\"text\" name=\"tel\" class=\"easyui-textbox\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "tel", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >昵称</span>
                    <input type=\"text\" name=\"nick\" class=\"easyui-textbox\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "nick", array()), "html", null, true);
        echo "\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >真实姓名</span>
                    <input type=\"text\" name=\"trueName\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "trueName", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >地址</span>
                    <input type=\"text\" name=\"address\" class=\"easyui-textbox\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "address", array()), "html", null, true);
        echo "\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >初始密码</span>
                    <input type=\"text\" name=\"pwd\" class=\"easyui-textbox\" value=\"123456\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">性别</span>
                    <input type=\"radio\" name=\"gender\" value=\"1\" ";
        // line 34
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "gender", array()) == "1")) {
            echo "checked=\"checked\"";
        }
        echo " />男
                    <input type=\"radio\" name=\"gender\" value=\"2\" ";
        // line 35
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "gender", array()) == "2")) {
            echo "checked=\"checked\"";
        }
        echo " />女 
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >生日</span>
                    <input type=\"text\" name=\"birthday\" class=\"easyui-datebox\" value=\"123456\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 43
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "status", array()) == "1")) {
            echo "checked=\"checked\"";
        }
        echo " />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 44
        if (($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "status", array()) == "0")) {
            echo "checked=\"checked\"";
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
    </div>
";
    }

    // line 55
    public function block_script($context, array $blocks = array())
    {
        // line 56
        echo "    <!-- 配置文件 -->
    <script>
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
                            alert(msg.msg);
                            //window.location.href = msg.url;
                        } else {
                            alert(msg.msg);
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
        return "admin/member/editMember.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 56,  128 => 55,  111 => 44,  105 => 43,  92 => 35,  86 => 34,  75 => 26,  68 => 22,  61 => 18,  54 => 14,  49 => 12,  42 => 7,  39 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }
}
