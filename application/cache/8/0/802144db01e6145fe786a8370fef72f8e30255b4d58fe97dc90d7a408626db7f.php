<?php

/* /shop/shop/shopInfo.twig */
class __TwigTemplate_802144db01e6145fe786a8370fef72f8e30255b4d58fe97dc90d7a408626db7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/shop/shopInfo.twig", 1);
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
        $context["page_bread_top"] = "我的店铺";
        // line 3
        $context["page_bread_sub"] = "店铺信息";
        // line 4
        $context["page_header_title"] = "我的店铺信息";
        // line 5
        $context["page_tag"] = "shop_shop_shopInfo";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_static($context, array $blocks = array())
    {
        // line 7
        echo "    <link href=\"/static/lib/jqupload/uploadfile.css\" rel=\"stylesheet\">
    <link href=\"/static/lib/jqvalidation/css/validationEngine.jquery.css\" rel=\"stylesheet\">
";
    }

    // line 10
    public function block_main($context, array $blocks = array())
    {
        // line 11
        echo "    <div class='example'>
        <form class=\"form-horizontal\" action=\"\" role=\"form\"  method='post'>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label required\">图片</label>
                <div class=\"col-md-3 input-img-box\">
                    <div  class=\"img-thumbnail input-img\" data-image=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idPic", array()), "html", null, true);
        echo " single\" >
                        <img id=\"idPic-img\"  src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idPic", array()), "html", null, true);
        echo "\"/>
                    </div>
                    <input name=\"idPic\"  value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idPic", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                    <div  id=\"idPic\" class=\"uploadfile\">重置图片</div>
                </div>
                <div  class=\"col-md-3 input-img-box\">
                    <div  class=\"img-thumbnail input-img\" >
                        <img id=\"cover-img\"  src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\"/>
                    </div>
                    <input name=\"cover\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                    <div id=\"cover\"  class=\"uploadfile\">重置图片</div>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">店铺名称</label>
                <div class=\"col-md-4\">
                    <input type='text' name='storeName'  value='";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "' class='form-control' readonly />
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">店铺地址</label>
                <div class=\"col-md-4\">
                    <div class=\"input-group\">
                        <input type='text' name='storeAddress'  value='";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeAddress", array()), "html", null, true);
        echo "' class='form-control' />
                        <span class=\"input-group-btn\"> <button id=\"marker-position\" class=\"btn btn-default\" type=\"button\"><i class=\"icon icon-globe\"></i></button> </span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">坐标</label>
                <div class=\"col-md-3\">
                    <div class=\"input-group\">
                        <input type='text' name='coordinate'  value='";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "coordinate", array()), "html", null, true);
        echo "' class='form-control' readonly />
                        <span class=\"input-group-btn\"> <button class=\"btn btn-default\" type=\"button\"><i class=\"icon icon-map-marker\"></i></button> </span>
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">店铺电话</label>
                <div class=\"col-md-4\">
                    <input type='text' data-validation-engine=\"validate[required]\"  name='storeTel'  value='";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeTel", array()), "html", null, true);
        echo "' class='form-control' />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-md-2 control-label\">服务时间</label>
                <div class=\"col-md-2\">
                    <div class=\"input-group date form-time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"startTime\" class=\"form-control\" size=\"16\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["service_start_time"]) ? $context["service_start_time"] : $this->getContext($context, "service_start_time")), "html", null, true);
        echo "\" readonly=\"\" type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-remove\"></span></span>
                        <span class=\"input-group-addon\"><span class=\"icon-time\"></span></span>
                    </div>
                </div>
                <div class=\"col-sm-1\">到</div>
                <div class=\"col-md-2\" style=\"margin-left:-80px\">
                    <div class=\"input-group date form-time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                        <input name=\"endTime\" class=\"form-control\" size=\"16\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["service_end_time"]) ? $context["service_end_time"] : $this->getContext($context, "service_end_time")), "html", null, true);
        echo "\" readonly=\"\" type=\"text\">
                        <span class=\"input-group-addon\"><span class=\"icon-remove\"></span></span>
                        <span class=\"input-group-addon\"><span class=\"icon-time\"></span></span>
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

    // line 91
    public function block_script($context, array $blocks = array())
    {
        // line 92
        echo "    <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqupload/jquery.uploadfile.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
    <script>
        \$(function () {
            initJqupload('idPic', '/upload/doUpload', 'jpg,png,gif,jpeg');
            initJqupload('cover', '/upload/doUpload', 'jpg,png,gif,jpeg');
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
            \$('#marker-position').click(function () {
                var address = \$(\"input[name='storeAddress']\").val();
                layer.open({
                    type: 2,
                    title: '拾取坐标',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['380px', '70%'],
                    content: '/shop/map/getLocation?address=' + escape(address) //iframe的url
                });
            });

        });
        function setLocation(loca) {
            //填充坐标
            \$('input[name=\"coordinate\"]').val(loca);
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/shop/shopInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 92,  166 => 91,  148 => 76,  137 => 68,  126 => 60,  114 => 51,  101 => 41,  91 => 34,  80 => 26,  75 => 24,  67 => 19,  62 => 17,  58 => 16,  51 => 11,  48 => 10,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
