<?php

/* /shop/card/userCardAdd.twig */
class __TwigTemplate_36c144ece87cae6a81f2d40e1de2ab9b6127e0775c46d04ffe04086653ed27de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/card/userCardAdd.twig", 2);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["page_header_title"] = "给用户添加会员卡";
        // line 4
        $context["page_tag"] = "shop_card_usercardList";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_static($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 8
    public function block_main($context, array $blocks = array())
    {
        // line 9
        echo "    <div class='work-copy'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">卡种</label>
                <div class=\"col-md-4\">
                    <select name='card' id='original' class='form-control'>
                        ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cards"]) ? $context["cards"] : $this->getContext($context, "cards")));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 16
            echo "                            <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "id", array()), "html", null, true);
            echo "' data-price=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "price", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "name", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "price", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                    </select>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">会员</label>
                <div class=\"col-md-4\">
                    <select name='user' id='original' class='form-control'>
                        ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["store_members"]) ? $context["store_members"] : $this->getContext($context, "store_members")));
        foreach ($context['_seq'] as $context["_key"] => $context["store_member"]) {
            // line 27
            echo "                            <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["store_member"], "id", array()), "html", null, true);
            echo "'  >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["store_member"], "trueName", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["store_member"], "tel", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store_member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                    </select>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">售价</label>
                <div class=\"col-md-2\">
                    <input type='text' name='price' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
                <label class=\"control-label\">元</label>
            </div>
                    
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">发卡日期</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-date\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"get_date\" class=\"form-control\" size=\"16\"   type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <div class=\"col-md-offset-2 col-md-10\">
                    <input type='submit' id='submit' class='btn btn-primary' value='保存' data-loading='稍候...' /> 
                </div>
            </div>
        </form>
    </div>
";
    }

    // line 60
    public function block_script($context, array $blocks = array())
    {
        // line 61
        echo "    <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
    <script>
        \$(function () {
            \$('form').validationEngine();
            \$('form').ajaxForm({
                beforeSubmit: function (formData, jqForm, options) {
                },
                success: function (data) {
                    if (data.status) {
                        layer.alert(data.msg, {icon: 6});
                    } else {
                        layer.alert(data.msg, {icon: 5});
                    }
                }
            });
            \$('#search-member').on('click',function(){
                var tel = \$('input[name=\"tel\"]').val();
                \$.ajax({
                    url:'/shop/member/getMemberJsonByTel',
                    type:'post',
                    data:{tel:tel},
                    dataType:'json',
                    success:function(res){
                        if(res.status){
                            \$('input[name=\"user\"]').val(res.data.id);
                            layer.msg('用户已确认', {shift: 6});
                        }else{
                            layer.msg(res.msg, {shift: 6});
                            
                        }
                    }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/card/userCardAdd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 61,  133 => 60,  100 => 29,  87 => 27,  83 => 26,  73 => 18,  58 => 16,  54 => 15,  46 => 9,  43 => 8,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
