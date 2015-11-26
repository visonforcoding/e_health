<?php

/* admin/index.twig */
class __TwigTemplate_4522171a87f9b8e5891a371fe194bb927ec572bd726b20597707199c0215f496 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/index.twig", 1);
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

    // line 2
    public function block_main($context, array $blocks = array())
    {
        // line 3
        echo "    <div data-options=\"region:'north',border:false\" style=\"height: 74px;  background: -webkit-linear-gradient(bottom, #4D7673 , #7BA16F );padding: 10px;background: transparent -moz-linear-gradient(center bottom , #4D7673 0%, #7BA16F 100%) repeat scroll 0% 0%;\">
        <img src=\"images/logo.png\" />灸疗后台管理系统
        <div style=\"float: right\">欢迎您，";
        // line 5
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "name", array()), "管理员")) : ("管理员")), "html", null, true);
        echo " <a href=\"/admin/login/logout.html\">个人信息</a>|<a href=\"/admin/login/logout.html\">退出</a></div>
    </div>
    <div data-options=\"region:'south',border:false\" style=\"height: 23px;\">
        <div class=\"footer\">Powered by柠檬智慧</div>
    </div>
    <div data-options=\"region:'west',split:true\" title=\"导航菜单\" style=\"width: 170px;\">
        ";
        // line 11
        $this->loadTemplate("/admin/menu.twig", "admin/index.twig", 11)->display($context);
        // line 12
        echo "    </div>
    <div data-options=\"region:'center',title:'',iconCls:'icon-ok'\">
        <div id=\"tabs\" class=\"easyui-tabs\" data-options=\"tools:'#tab-tools'\">
            <div title=\"主页\" data-options=\"iconCls:'icon-house'\" style=\"padding: 10px; height: 100%;\">
                ";
        // line 16
        $this->loadTemplate("/admin/home.twig", "admin/index.twig", 16)->display($context);
        // line 17
        echo "            </div>
        </div>
    </div>
";
    }

    // line 21
    public function block_script($context, array $blocks = array())
    {
        // line 22
        echo "    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script> 
    <script>
        \$(function () {
            //左侧菜单点击事件
            \$(\"a[data-url]\").click(function () {
                var text = \$(this).text();
                var url = \$(this).data('url');
                createTab(text, url);
            });
            \$('#time').datebox({
                required: true,
                value: '-'
            });
            //首页的统计
            initChart('order');
            \$('.getChart').bind('click', function () {
                initChart();
            });
            \$('#time').datebox({
                onSelect: function (date) {
                    initChart();
                }
            });
            \$('#timeType').combobox({
                onSelect: function (record) {
                    initChart();
                }
            });

        });
        var index = 0;
        //创建Frame
        function createFrame(url) {
            var height = window.screen.height - 300;
            var s = '<iframe  frameborder=\"0\"  src=\"' + url + '\" style=\"min-height:800px;width:100%;height:' + height + ';\"></iframe>';
            return s;
        }
        function addPanel() {
            index++;
            \$('#tabs').tabs('add', {
                title: 'Tab' + index,
                content: '<div style=\"padding:10px\">Content' + index + '</div>',
                closable: true
            });
        }
        function removePanel() {
            var tab = \$('#tabs').tabs('getSelected');
            if (tab) {
                var index = \$('#tabs').tabs('getTabIndex', tab);
                \$('#tabs').tabs('close', index);
            }
        }
        function createTab(text, url) {
            if (\$(\"#tabs\").tabs('exists', text)) {
                \$('#tabs').tabs('select', text);
                var tab = \$('#tabs').tabs('getSelected'); // get selected panel
                var iframe = \$(tab.panel('options').content);
                var src = iframe.attr('src');
                \$('#tabs').tabs('update', {
                    tab: tab,
                    options: {
                        content: createFrame(src)
                    }
                });
            } else {
                \$('#tabs').tabs('add', {
                    title: text,
                    closable: true,
                    content: createFrame(url),
                });
            }
        }

        function initChart() {
            var column = \$('.l-btn-selected').data('column');
            var time = \$('#time').datebox('getValue');
            var type = \$('#timeType').combobox('getValue');
            \$.ajax({
                type: 'post',
                url: '/admin/chart/getData',
                data: {timeType: type, time: time, column: column},
                dataType: 'json',
                success: function (res) {
                    \$('#chart').highcharts({
                        chart: {type: 'line'},
                        title: {text: '数据统计'},
                        subtitle: {text: '灸疗平台'},
                        tooltip: {
                             valueSuffix: res.valueSuffix
                        },
                        xAxis: {categories: res.Xcategories},
                        yAxis: {title: {text: res.Ytext}},
                        plotOptions: {line: {dataLabels: {enabled: true}, enableMouseTracking: true}},
                        series: res.series
                    });
                }
            });
        }
        //首页统计
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 22,  62 => 21,  55 => 17,  53 => 16,  47 => 12,  45 => 11,  36 => 5,  32 => 3,  29 => 2,  11 => 1,);
    }
}
