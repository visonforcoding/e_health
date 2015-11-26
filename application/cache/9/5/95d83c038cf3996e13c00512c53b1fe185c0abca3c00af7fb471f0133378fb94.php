<?php

/* /shop/card/cardAdd.twig */
class __TwigTemplate_95d83c038cf3996e13c00512c53b1fe185c0abca3c00af7fb471f0133378fb94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/card/cardAdd.twig", 1);
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
        // line 2
        $context["page_header_title"] = "新增会员卡";
        // line 3
        $context["page_tag"] = "shop_card_cardList";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_static($context, array $blocks = array())
    {
        // line 5
        echo "    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 7
    public function block_main($context, array $blocks = array())
    {
        // line 8
        echo "    <div class='work-copy'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">卡名称</label>
                <div class=\"col-md-4\">
                    <input type='text' name='name' data-validation-engine=\"validate[required]]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">期限</label>
                <div class=\"col-md-4\">
                    <input type='text' name='expires' data-validation-engine=\"validate[required,custom[integer]\"   class='form-control'  />
                </div>
                <label class=\"control-label\">年</label>
            </div>

            ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["shop_services"]) ? $context["shop_services"] : $this->getContext($context, "shop_services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 26
            echo "                <div class=\"form-group service-group\">
                    <label class=\"col-md-2 control-label\">服务内容</label>
                    <div class=\"col-md-2\">
                        <select name='service_id[]' id='original' class='form-control'>
                                <option value='";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "' data-price=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "</option>
                        </select>
                    </div>
                    <div class=\"col-md-2\">
                        <input type='text' value=\"0\" name='service_nums[]' data-validation-engine=\"validate[required],custom[integer]]\"   class='form-control'  />
                    </div>
                    <label class=\"control-label\">次</label>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">原价</label>
                <div class=\"col-md-2\">
                    <input type='text' name='mprice' value=\"0\" data-validation-engine=\"validate[required]\"   class='form-control' readonly  />
                </div>
                <label class=\"control-label\">元</label>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">售价</label>
                <div class=\"col-md-2\">
                    <input type='text' name='price' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
                <label class=\"control-label\">元</label>
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

    // line 66
    public function block_script($context, array $blocks = array())
    {
        // line 67
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
        ";
        // line 88
        echo "                 \$('.service-group input,.service-group select').on('change', function () {
                     var mprice = 0;
                     \$('.service-group').each(function (index, domEle) {
                         var eprice = \$(domEle).find('option:selected').data('price');
                         var nums = \$(domEle).find('input').val();
                         mprice = mprice + eprice * nums;
                     });
                     \$('input[name=\"mprice\"]').val(mprice);
                 });
             });
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/card/cardAdd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 88,  128 => 67,  125 => 66,  96 => 39,  75 => 30,  69 => 26,  65 => 25,  46 => 8,  43 => 7,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
