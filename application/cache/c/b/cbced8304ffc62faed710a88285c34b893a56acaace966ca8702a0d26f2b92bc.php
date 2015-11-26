<?php

/* /shop/shop/orderTime.twig */
class __TwigTemplate_cbced8304ffc62faed710a88285c34b893a56acaace966ca8702a0d26f2b92bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/shop/orderTime.twig", 1);
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
        $context["page_bread_sub"] = "预约时间管理";
        // line 4
        $context["page_header_title"] = "预约时间管理";
        // line 5
        $context["page_tag"] = "shop_shop_orderTime";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_static($context, array $blocks = array())
    {
        // line 7
        echo "    <style>
        #time-set-box{
            width:500px;
        }
        #time-set-box .btn{
            width: 100px;
            margin: 1px;
        }
    </style>
";
    }

    // line 17
    public function block_main($context, array $blocks = array())
    {
        // line 18
        echo "    <div class=\"row\">
        <div id=\"time-set-box\" class=\"col-lg-12 \">
            ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["orderTime"]) ? $context["orderTime"] : $this->getContext($context, "orderTime")), "timeArr", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["time"]) {
            // line 21
            echo "                <div class=\"col-lg-3 \">
                    <button data-index=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\" data-val=\"";
            echo twig_escape_filter($this->env, $context["time"], "html", null, true);
            echo "\" class=\"btn btn-lg  ";
            if (($context["time"] == 1)) {
                echo "btn-primary active";
            }
            echo "\">";
            echo twig_escape_filter($this->env, ($this->getAttribute($context["loop"], "index0", array()) + 8), "html", null, true);
            echo ":00</button>
                </div>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['time'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "        </div>
    </div>
    <h3>设置每个时间点的预约容量</h3>
    <div class=\"row\" style=\"margin-top:10px;\">
        <div class=\"col-lg-2 col-lg-offset-1\">
            <div class=\"input-group\">
                <span class=\"input-group-btn minus-btn\"><button class=\"btn\"><i class=\"icon icon-minus\"></i></button></span>
                <input class=\"form-control\" id=\"nums\"  value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["orderTime"]) ? $context["orderTime"] : $this->getContext($context, "orderTime")), "nums", array()), "html", null, true);
        echo "\" type=\"text\">
                <span  class=\"input-group-btn plus-btn\"><button class=\"btn\"><i class=\"icon icon-plus\"></i></button></span>
            </div>
        </div>
    </div>
    <div class=\"row mt10\">
        <div class=\"col-lg-4 col-lg-offset-2\">
            <div class=\"input-group\">
                <button id=\"submit\" class=\"btn\" >确认修改</button>
            </div>
        </div>
    </div>
";
    }

    // line 45
    public function block_script($context, array $blocks = array())
    {
        // line 46
        echo "    <script>
        \$(function () {
            \$('#time-set-box .btn').click(function () {
                \$(this).toggleClass('btn-primary active');
                \$(this).data('val',(\$(this).data('val')*1)^1);
            });
            \$('.plus-btn').click(function(){
                \$obj = \$(this).prev('input');
                \$obj.val(\$obj.val()*1+1);
            });
            \$('.minus-btn').click(function(){
                \$obj = \$(this).next('input');
                if(\$obj.val()>1){
                    \$obj.val(\$obj.val()*1-1);
                }
            });
            \$('#submit').click(function(){
                var nums = \$('#nums').val();
                var timeArr = [];
                \$('#time-set-box .btn').each(function(index,domEle){
                    var timeOpen = \$(domEle).data('val');
                    timeArr.push(timeOpen);
                });
                \$.ajax({
                    type:'post',
                    dataType:'json',
                    data:{timeArr:timeArr,nums:nums},
                    success:function(res){
                        layer.msg(res.msg,{icon:1});
                    }
                });
            })
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/shop/orderTime.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 46,  133 => 45,  116 => 32,  107 => 25,  82 => 22,  79 => 21,  62 => 20,  58 => 18,  55 => 17,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
