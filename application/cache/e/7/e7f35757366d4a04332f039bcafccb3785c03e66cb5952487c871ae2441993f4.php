<?php

/* admin/coupon/add.twig */
class __TwigTemplate_e7f35757366d4a04332f039bcafccb3785c03e66cb5952487c871ae2441993f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/coupon/add.twig", 2);
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
        echo "    <div class=\"easyui-panel\" title=\"添加服务\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">优惠劵名称</span>
                    <input name=\"name\" id=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\" value=\"\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >满减金额</span>
                    <input type=\"text\" name=\"amount1\" class=\"easyui-numberbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\"><span>(现金劵满减金额为0)</span>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >扣减金额</span>
                    <input type=\"text\" name=\"amount2\" class=\"easyui-numberbox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">适用店铺</span>
                    <select name=\"shopId\">
                        <option value=\"0\">所有店铺适用</option>
                        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["shops"]) ? $context["shops"] : $this->getContext($context, "shops")));
        foreach ($context['_seq'] as $context["_key"] => $context["shop"]) {
            // line 25
            echo "                         <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "storeName", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                       
                    </select>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">适用服务</span>
                    <select name=\"serviceId\">
                        <option value=\"0\">所有服务适用</option>
                         ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 35
            echo "                         <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                    </select>  
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">开始时间</span>
                    <input type=\"text\" name=\"beginTime\" class=\"easyui-datetimebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">结束时间</span>
                    <input type=\"text\" name=\"endTime\" class=\"easyui-datetimebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">优惠劵描述</span>
                    <textarea name=\"desc\" id=\"desc\"></textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"flag\" value=\"1\" checked=\"checked\" />启用
                    <input type=\"radio\" name=\"flag\" value=\"0\" />禁用 
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\"></span>
                    <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"submitForm('node-form');\">提交</a>
                    <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"clearForm();\">返回列表</a>
                </div>
            </form>
        </div>
    </div>
";
    }

    // line 65
    public function block_script($context, array $blocks = array())
    {
        // line 66
        echo "    <script>

        function submitForm(id) {
            var \$form = \$('#' + id);
            if(!\$form.form('validate')){
                return false;
            }
            \$.ajax({
                type: \$form.attr('method'),
                url: \$form.attr('action'),
                data: \$form.serialize(),
                dataType: 'json',
                success: function (msg) {
                    if (typeof msg === 'object') {
                        if (msg.status) {
                           alert(msg.msg);
                            window.location.href = msg.url;
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
        return "admin/coupon/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 66,  124 => 65,  93 => 37,  82 => 35,  78 => 34,  69 => 27,  58 => 25,  54 => 24,  32 => 4,  29 => 3,  11 => 2,);
    }
}
