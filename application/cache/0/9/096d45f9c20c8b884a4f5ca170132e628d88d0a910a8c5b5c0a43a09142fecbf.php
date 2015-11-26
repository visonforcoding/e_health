<?php

/* /shop/card/userCardEdit.twig */
class __TwigTemplate_096d45f9c20c8b884a4f5ca170132e628d88d0a910a8c5b5c0a43a09142fecbf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/card/userCardEdit.twig", 2);
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
            echo "                            <option ";
            if (($this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "card_id", array()) == $this->getAttribute($context["card"], "id", array()))) {
                echo "selected=\"selected\"";
            }
            echo " value='";
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
                <label class=\"col-md-2 control-label\">用户手机号</label>
                <div class=\"col-md-4\">
                    <input type='hidden' value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "user_id", array()), "html", null, true);
        echo "\" name='user'    class='form-control'  />
                    <input type='text' name='tel' value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "tel", array()), "html", null, true);
        echo "\"   class='form-control'  />
                </div>
                <div class=\"col-md-2\">
                    <button type=\"button\" id=\"search-member\" class=\"btn btn-warning\"><i class=\"icon icon-search\"></i>搜寻...</button>
                </div>

            </div>


            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">售价</label>
                <div class=\"col-md-2\">
                    <input type='text' value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "price", array()), "html", null, true);
        echo "\" name='price' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
                <label class=\"control-label\">元</label>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">发卡日期</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-date\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"get_date\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usercard"]) ? $context["usercard"] : $this->getContext($context, "usercard")), "get_date", array()), "html", null, true);
        echo "\" class=\"form-control\" size=\"16\"   type=\"text\">
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

    // line 62
    public function block_script($context, array $blocks = array())
    {
        // line 63
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
        return "/shop/card/userCardEdit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 63,  135 => 62,  117 => 47,  105 => 38,  90 => 26,  86 => 25,  77 => 18,  58 => 16,  54 => 15,  46 => 9,  43 => 8,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
