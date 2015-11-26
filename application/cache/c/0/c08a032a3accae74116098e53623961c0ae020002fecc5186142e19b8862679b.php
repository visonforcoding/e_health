<?php

/* /shop/cargo/cargoAdd.twig */
class __TwigTemplate_c08a032a3accae74116098e53623961c0ae020002fecc5186142e19b8862679b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/cargo/cargoAdd.twig", 2);
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
        $context["page_header_title"] = "添加耗材类别";
        // line 4
        $context["page_tag"] = "shop_cargo_cargo";
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
                <label class=\"col-md-2 control-label\">名称</label>
                <div class=\"col-md-4\">
                    <input type='text' name='cargo_name' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>
            
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">供应商名称</label>
                <div class=\"col-md-4\">
                    <input type='text' name='from' data-validation-engine=\"validate[required]\"   class='form-control'  />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">采购价</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\"  name='price'   class='form-control' />
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

    // line 41
    public function block_script($context, array $blocks = array())
    {
        // line 42
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
            //
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/cargo/cargoAdd.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 42,  80 => 41,  46 => 9,  43 => 8,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
