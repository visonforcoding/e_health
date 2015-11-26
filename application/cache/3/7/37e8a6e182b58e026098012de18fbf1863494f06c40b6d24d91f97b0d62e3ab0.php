<?php

/* admin/coupon/edit.twig */
class __TwigTemplate_37e8a6e182b58e026098012de18fbf1863494f06c40b6d24d91f97b0d62e3ab0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/coupon/edit.twig", 2);
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
                    <input name=\"name\" id=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "name", array()), "html", null, true);
        echo "\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >满减金额</span>
                    <input type=\"text\" name=\"amount1\" class=\"easyui-numberbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\" value='";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "amount1", array()), "html", null, true);
        echo "'><span>(现金劵满减金额为0)</span>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >扣减金额</span>
                    <input type=\"text\" name=\"amount2\" class=\"easyui-numberbox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\"value='";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "amount2", array()), "html", null, true);
        echo "'>
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
            echo "\" ";
            if (($this->getAttribute($context["shop"], "id", array()) == $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "shopId", array()))) {
                echo "   ";
                echo "selected='selected'";
                echo "  ";
            }
            echo ">";
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
                        <option value=\"0\" >所有服务适用</option>
                         ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 35
            echo "                         <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\"  ";
            if (($this->getAttribute($context["service"], "id", array()) == $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "serviceId", array()))) {
                echo "  ";
                echo "selected='selected'";
                echo " ";
            }
            echo ">";
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
                    <input type=\"text\" name=\"beginTime\" class=\"easyui-datetimebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\" value='";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "beginTime", array()), "html", null, true);
        echo "'>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">结束时间</span>
                    <input type=\"text\" name=\"endTime\" class=\"easyui-datetimebox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\" value='";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "endTime", array()), "html", null, true);
        echo "'>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">优惠劵描述</span>
                    <textarea name=\"desc\" id=\"desc\">";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "desc", array()), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"flag\" value=\"1\" ";
        // line 53
        if (($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "flag", array()) == "1")) {
            echo "  ";
            echo "checked='checked'";
            echo " ";
        }
        echo " />启用
                    <input type=\"radio\" name=\"flag\" value=\"0\" ";
        // line 54
        if (($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "flag", array()) == "0")) {
            echo "  ";
            echo "checked='checked'";
            echo " ";
        }
        echo " />禁用 
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
        return "admin/coupon/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 66,  168 => 65,  149 => 54,  141 => 53,  134 => 49,  127 => 45,  120 => 41,  114 => 37,  97 => 35,  93 => 34,  84 => 27,  67 => 25,  63 => 24,  54 => 18,  47 => 14,  40 => 10,  32 => 4,  29 => 3,  11 => 2,);
    }
}
