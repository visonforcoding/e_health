<?php

/* admin/coupon/couponDetail.twig */
class __TwigTemplate_036bb0304ca6b5e36e8d663bd78eea495d27a3c21506a816118216eda58703bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/coupon/couponDetail.twig", 2);
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
        echo "    <div id=\"container\" style=\"min-width:380px;height:400px\"></div>
";
    }

    // line 6
    public function block_script($context, array $blocks = array())
    {
        // line 7
        echo "    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script> 
    <script>
        \$(function () {
        var use = ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["use_coupon_nums"]) ? $context["use_coupon_nums"] : $this->getContext($context, "use_coupon_nums")), "html", null, true);
        echo ";
                var no_use = ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["coupon_nums"]) ? $context["coupon_nums"] : $this->getContext($context, "coupon_nums")), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["use_coupon_nums"]) ? $context["use_coupon_nums"] : $this->getContext($context, "use_coupon_nums")), "html", null, true);
        echo ";
                \$('#container').highcharts({
        chart: {
        plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
        },
                colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                title: {
                text: '优惠券使用情况'
                },
                tooltip: {
                valueSuffix: '张'
                },
                plotOptions: {
                pie: {
                allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                        enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                }
                },
                series: [{
                type: 'pie',
                        name: '优惠券',
                        data: [
                                ['未使用', no_use],
                                ['已使用', use],
                        ]
                }]
        });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/coupon/couponDetail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  46 => 11,  40 => 7,  37 => 6,  32 => 4,  29 => 3,  11 => 2,);
    }
}
