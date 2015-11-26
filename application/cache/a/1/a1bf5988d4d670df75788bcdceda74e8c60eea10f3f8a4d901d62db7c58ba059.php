<?php

/* shop/salary/index.twig */
class __TwigTemplate_a1bf5988d4d670df75788bcdceda74e8c60eea10f3f8a4d901d62db7c58ba059 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/salary/index.twig", 1);
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
        $context["page_header_title"] = "出勤统计";
        // line 3
        $context["page_tag"] = "shop_salary_index";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_static($context, array $blocks = array())
    {
        // line 5
        echo "    <link rel='stylesheet' href='/static/lib/fullcalendar/fullcalendar.css' />

";
    }

    // line 8
    public function block_main($context, array $blocks = array())
    {
        // line 9
        echo "    <div class=\"col-xs-8 work-copy\">
        <div class=\"col-xs-11 center-block\" id=\"calendar\"></div>
        <div class=\"col-xs-1\"><a href=\"\" id=\"export\" class=\"btn btn-success\"><i class=\"icon icon-file-excel\"></i>导出该月薪资统计表</a></div>
    </div>
";
    }

    // line 14
    public function block_script($context, array $blocks = array())
    {
        // line 15
        echo "    <script src='/static/lib/fullcalendar/lib/moment.min.js'></script>
    <script src='/static/lib/fullcalendar/fullcalendar.js'></script>
    <script src='/static/lib/fullcalendar/lang/zh-cn.js'></script>
    <script>
        \$(function () {
            \$('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                editable: true,
                eventLimit: true, // allow \"more\" link when too many events
                eventSources: [
                    // your event source
                    {
                        url: '/shop/salary/getEvent', // use the `url` property
                        color: 'green', // an option!
                        textColor: 'white'  // an option!
                    }
                    // any other sources...
                ],
                viewRender: function (view, element) {
                    var date = \$(\"#calendar\").fullCalendar('getDate');
                    var year = date.year();
                    var init_month = date.month() + 1;
                    var url = '/shop/salary/exportSalary?year=' + year + '&month=' + init_month;
                    \$('#export').attr('href', url);
                }

            });

        });

    </script>
";
    }

    public function getTemplateName()
    {
        return "shop/salary/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  55 => 14,  47 => 9,  44 => 8,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
