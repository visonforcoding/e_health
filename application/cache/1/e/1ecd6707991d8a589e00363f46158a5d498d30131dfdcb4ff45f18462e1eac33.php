<?php

/* /admin/usercoupon/add.twig */
class __TwigTemplate_1ecd6707991d8a589e00363f46158a5d498d30131dfdcb4ff45f18462e1eac33 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "/admin/usercoupon/add.twig", 2);
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
                    <select name='cid' class=\"easyui-combobox\" style=\"width:143px;\" >
                        ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")));
        foreach ($context['_seq'] as $context["_key"] => $context["coupon"]) {
            // line 12
            echo "                          <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "id", array()), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "name", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coupon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "                    </select>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >会员手机号</span>
                    <input type=\"text\" name=\"phone\" class=\"easyui-validatebox\"  data-options=\"required:true\"  aria-describedby=\"basic-addon1\"><span>(输入0为全部用户)</span>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">开始时间</span>
                    <input type=\"text\" name=\"beginTime\" class=\"easyui-datetimebox\"   aria-describedby=\"basic-addon1\"><span>(无则不填)</span>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">结束时间(无则不填)</span>
                    <input type=\"text\" name=\"endTime\" class=\"easyui-datetimebox\"  aria-describedby=\"basic-addon1\"><span>(无则不填)</span>
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

    // line 37
    public function block_script($context, array $blocks = array())
    {
        // line 38
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
        return "/admin/usercoupon/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 38,  82 => 37,  56 => 14,  45 => 12,  41 => 11,  32 => 4,  29 => 3,  11 => 2,);
    }
}
