<?php

/* /shop/order/add.twig */
class __TwigTemplate_72f3d2d75e7a37ce33c1a1fa64e8add003e90e8096387c1fdf5a5304a99910b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/order/add.twig", 1);
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
        $context["page_tag"] = "shop_order_add";
        // line 3
        $context["page_header_title"] = "收银开单";
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
        echo "    <div class =\"work-copy\">
        <div class=\"example\">
            <ul id=\"myTab\" class=\"nav nav-tabs\">
                <li class=\"active\">
                    <a href=\"#tab1\" data-toggle=\"tab\">到店</a>
                </li>
                <li>
                    <a href=\"#tab2\" data-toggle=\"tab\">上门</a>
                </li>
            </ul>
            <div class=\"tab-content\" style=\"margin-top:10px;\">
                <div class=\"tab-pane in active\" id=\"tab1\">
                    <h3>到店</h3>
                    <form class=\"form-horizontal\" role=\"form\" method='post'>
                        <input type=\"hidden\" value=\"0\" name=\"isVisit\"/>
                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label\">用户手机</label>
                            <div class=\"col-md-4\">
                                <input  type='text' name='phone' id='phone' value='' class='user-tel form-control' />
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label\">服务名</label>
                            <div class='col-md-4'>
                                <select name='serviceId' id='serviceId' class='choice-service form-control'>
                                    ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            echo "                                        <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "serviceId", array()), "html", null, true);
            echo "' data-price=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
            echo "元)</option>
                                        <!--<option value='0'>转贴</option>-->
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                                </select>
                            </div>
                        </div> 

                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label\">会员卡</label>
                            <div class='col-md-2'>
                                <select name='card' id='serviceId' class='form-control'>

                                </select>
                            </div>
                            <div class=\"col-md-2\">
                                <button type=\"button\" onClick=\"viewRecord();\" class=\"btn btn-success btn-small\"><i class=\"icon icon-eye-open\"></i>查看该卡明细</button>
                            </div>
                        </div> 

                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label\">预约人数</label>
                            <div class=\"col-md-4\">
                                <input type='text' name='nums' id='nums' class='form-control' />
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label\">订单价格</label>
                            <div class=\"col-md-4\">
                                <input type='text' name='price' id='price' class='form-control' />
                            </div>
                        </div>
                        ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cargos"]) ? $context["cargos"] : $this->getContext($context, "cargos")));
        foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
            // line 67
            echo "                            <div class=\"form-group\">
                                <label class=\"col-md-2 control-label required\">";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "cargo_name", array()), "html", null, true);
            echo "</label>
                                <div class='col-md-4'>
                                    <input type=\"hidden\" name=\"cargo[]\" value=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "id", array()), "html", null, true);
            echo "\"/> 
                                    <input type=\"text\" name=\"num[]\"/> 件(库存剩余";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "nums", array()), "html", null, true);
            echo ")
                                </div>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                        <div class=\"form-group\">
                            <div class=\"col-md-offset-2 col-md-10\">
                                <input type='submit' id='submit' class='btn btn-primary' value='保存' data-loading='稍候...' /> &nbsp;&nbsp; <input type='reset' id='reset' class='btn btn-primary' value='返回列表' data-loading='稍候...' />
                            </div>
                        </div>
                    </form>
                </div>
                <div class=\"tab-pane\" id=\"tab2\">
                    <div class=\"tab-pane in active\" id=\"tab1\">
                        <h3>上门</h3>
                        <form class=\"form-horizontal\" role=\"form\" method='post'>
                            <input type=\"hidden\" value=\"1\" name=\"isVisit\"/>
                            <div class=\"form-group\">
                                <label class=\"col-md-2 control-label\">用户手机</label>
                                <div class=\"col-md-4\">
                                    <input type='text' name='phone' id='phone' value='' class='user-tel form-control' />
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"col-md-2 control-label\">服务名</label>
                                <div class='col-md-4'>
                                    <select name='serviceId' id='serviceId' class='choice-service form-control'>
                                        ";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 98
            echo "                                            ";
            if (($this->getAttribute($context["item"], "isVisit", array()) == "1")) {
                // line 99
                echo "                                                <option value='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "serviceId", array()), "html", null, true);
                echo "' >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
                echo "元</option>
                                            ";
            }
            // line 101
            echo "                                            <!--<option value='0'>转贴</option>-->
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                                    </select>
                                </div>
                            </div> 

                            <div class=\"form-group\">
                                <label class=\"col-md-2 control-label\">预约人数</label>
                                <div class=\"col-md-4\">
                                    <input type='text' name='nums' id='nums' class='form-control' />
                                </div>
                            </div>

                            <div class=\"form-group\">
                                <label class=\"col-md-2 control-label\">订单价格</label>
                                <div class=\"col-md-4\">
                                    <input type='text' name='price' id='price' class='form-control' />
                                </div>
                            </div>
                            ";
        // line 120
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cargos"]) ? $context["cargos"] : $this->getContext($context, "cargos")));
        foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
            // line 121
            echo "                                <div class=\"form-group\">
                                    <label class=\"col-md-2 control-label required\">";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "cargo_name", array()), "html", null, true);
            echo "</label>
                                    <div class='col-md-4'>
                                        <input type=\"hidden\" name=\"cargo[]\" value=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "id", array()), "html", null, true);
            echo "\"/> 
                                        <input type=\"text\" name=\"num[]\"/> 件(库存剩余";
            // line 125
            echo twig_escape_filter($this->env, $this->getAttribute($context["cargo"], "nums", array()), "html", null, true);
            echo ")
                                    </div>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "                            <div class=\"form-group\">
                                <div class=\"col-md-offset-2 col-md-10\">
                                    <input type='submit' id='submit' class='btn btn-primary' value='保存' data-loading='稍候...' /> &nbsp;&nbsp; <input type='reset' id='reset' class='btn btn-primary' value='返回列表' data-loading='稍候...' />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
";
    }

    // line 143
    public function block_script($context, array $blocks = array())
    {
        // line 144
        echo "    <script type=\"text/javascript\" src=\"/static/lib/jqform/jquery.form.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/languages/jquery.validationEngine-zh_CN.js\"></script>
    <script type=\"text/javascript\" src=\"/static/lib/jqvalidation/js/jquery.validationEngine.js\"></script>
    <script>
        \$(function () {
            \$('form').validationEngine();
            \$('form').submit(function () {
                var mprice = \$(this).find('select[name=\"serviceId\"] option:selected').data('price');
                \$(this).ajaxSubmit({
                    beforeSubmit: function (formData, \$form, options) {
                        //return false;
                    },
                    data: {mprice: mprice},
                    success: function (data) {
                        if (data.status) {
                            layer.alert(data.msg, {icon: 6});
                        } else {
                            layer.alert(data.msg, {icon: 5});
                        }
                    }
                });
                return false;
            });

            //
        });
        \$(function () {
            \$('.user-tel').focusout(function () {
                var \$obj = \$(this);
                doSearchCard(\$obj);
            });
            \$('.choice-service').change(function () {
                var \$obj = \$(this);
                doSearchCard(\$obj);
            });
        });

        function doSearchCard(\$obj) {
            var tel = \$obj.parents('form').find('input[name=\"phone\"]').val();
            var service = \$obj.parents('form').find('select[name=\"serviceId\"] option:selected').val();
            \$.ajax({
                url: '/shop/card/getMemberCardJson',
                type: 'post',
                dataType: 'json',
                data: {tel: tel, serviceId: service},
                success: function (res) {
                    \$obj.parents('form').find('select[name=\"card\"] option').remove();
                    if (res.status) {
                        \$.each(res.data, function (i, item) {
                            \$obj.parents('form').find('select[name=\"card\"]').append('<option value=\"' + item.id + '\">' + item.name + '</option>');
                        });
                    } else {
                        \$obj.parents('form').find('select[name=\"card\"]').append('<option value=\"0\">无会员卡可用</option>');
                    }
                }
            });
        }

        function viewRecord() {
            //查看明细
            var id = \$('select[name=\"card\"] option:selected').val();
            if (typeof id === 'undefined') {
                layer.alert('没有会员卡');
                return false;
            }
            url = '/shop/card/userCardDetail?id=' + id;
            layer.open({
                type: 2,
                title: '查看详情',
                shadeClose: true,
                shade: 0.6,
                area: ['380px', '70%'],
                content: url//iframe的url
            });
        }

    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/order/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 144,  260 => 143,  243 => 129,  233 => 125,  229 => 124,  224 => 122,  221 => 121,  217 => 120,  198 => 103,  191 => 101,  181 => 99,  178 => 98,  174 => 97,  150 => 75,  140 => 71,  136 => 70,  131 => 68,  128 => 67,  124 => 66,  93 => 37,  77 => 34,  73 => 33,  46 => 8,  43 => 7,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
