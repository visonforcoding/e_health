<?php

/* /admin/store/storeDetail.twig */
class __TwigTemplate_e7a091142df644a27c42607201eb69e043280f60985050db1e7819d746203244 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"zh\"><head>
        <meta charset=\"utf-8\">
        <meta content=\"IE=edge,chrome=1\" http-equiv=\"X-UA-Compatible\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/zui/css/zui.min.css\">
        <link href=\"/static/zui/lib/datetimepicker/datetimepicker.min.css\" rel=\"stylesheet\">
        <script src=\"/static/Js/jquery.js\" type=\"text/javascript\"></script>
        <style>
            body{
                padding: 10px;
            }
            .row{
                margin-right:0px;
                margin-left: 0px;
            }
            .store-info dt{
                margin-bottom:10px;
            }
            .store-info span{
                margin-right:5px;
            }
            .databox{
                margin:10px;
                height: 65px;
                padding: 5px;
                margin-bottom: 30px;
                vertical-align: top;
                min-width: 230px;
                float: left;
                border-radius:5px;
                background-image: linear-gradient(to right, #DDD, #FFF);
            }
            .databox-left{
                float: left;
            }
            .databox-left i{
                font-size:32px;
            }
            .databox-right{
                float: left;
                margin-left:10px;
                position: relative;
            }
            .green{
                color: green;
            }
            .databox .databox-data{
                color: palevioletred;
                font-size:20px;
            }
            .databox .databox-stat{
                display: inline-block;
                position: absolute;
                right: -106px;
                top: 0px;
                padding: 2px 5px;
            }
        </style>
    </head>
    <body class=\" theme-blue\">
        <h3>";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "</h3>
        <div class=\"row\">
            <div class=\"col-sm-2\" style=\"width:250px;float:left\">
                <img class=\"img-circle\" width=\"200px\" height=\"200px\" src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\"/>
            </div>
            <div class=\"col-sm-2\" style=\"width:200px;float:left;\">
                <dl class=\"store-info\">
                    <dt><span><i class=\"icon-user\"></i> 店主姓名:</span>";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossName", array()), "html", null, true);
        echo "</dt>
                    <dt><span><i class=\"icon-phone\"></i> 店主电话:</span>";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossTel", array()), "html", null, true);
        echo "</dt>
                    <dt><span><i class=\"icon-map-marker\"></i> 店铺地址:</span>";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeAddress", array()), "html", null, true);
        echo "</dt>
                    <dt><span><i class=\"icon-time\"></i> 加入时间:</span>";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "ctime", array()), "html", null, true);
        echo "</dt>
                </dl>
            </div>
        </div>
 ";
        // line 86
        echo "        <div class=\"row\">
            <div class=\"databox databox-graded\">
                <div class=\"databox-left no-padding\">
                    <i class=\"icon-shopping-cart green\"></i>
                </div>
                <div class=\"databox-right padding-top-20\">
                    <div class=\"databox-stat yellow radius-bordered\">
                        <i class=\"stat-icon icon icon-leaf\"></i>
                    </div>
                    <div class=\"databox-text darkgray\">线上订单数</div>
                    <div class=\"databox-text darkgray databox-data\">";
        // line 96
        echo twig_escape_filter($this->env, (isset($context["online_order_nums"]) ? $context["online_order_nums"] : $this->getContext($context, "online_order_nums")), "html", null, true);
        echo "</div>
                </div>
            </div>
            <div class=\"databox databox-graded\">
                <div class=\"databox-left no-padding\">
                    <i class=\"icon-shopping-cart green\"></i>
                </div>
                <div class=\"databox-right padding-top-20\">
                    <div class=\"databox-stat yellow radius-bordered\">
                        <i class=\"stat-icon icon icon-leaf\"></i>
                    </div>
                    <div class=\"databox-text darkgray\">线下开单数</div>
                    <div class=\"databox-text darkgray databox-data\">";
        // line 108
        echo twig_escape_filter($this->env, (isset($context["offline_order_nums"]) ? $context["offline_order_nums"] : $this->getContext($context, "offline_order_nums")), "html", null, true);
        echo "</div>
                </div>
            </div>
            <div class=\"databox databox-graded\">
                <div class=\"databox-left no-padding\">
                    <i class=\"icon-comments-alt green\"></i>
                </div>
                <div class=\"databox-right padding-top-20\">
                    <div class=\"databox-stat yellow radius-bordered\">
                        <i class=\"stat-icon icon icon-leaf\"></i>
                    </div>
                    <div class=\"databox-text darkgray\">评论数</div>
                    <div class=\"databox-text darkgray databox-data\">";
        // line 120
        echo twig_escape_filter($this->env, (isset($context["comment_nums"]) ? $context["comment_nums"] : $this->getContext($context, "comment_nums")), "html", null, true);
        echo "</div>
                </div>
            </div>
            <div class=\"databox databox-graded\">
                <div class=\"databox-left no-padding\">
                    <i class=\"icon-yen green\"></i>
                </div>
                <div class=\"databox-right padding-top-20\">
                    <div class=\"databox-stat yellow radius-bordered\">
                        <i class=\"stat-icon icon icon-leaf\"></i>
                    </div>
                    <div class=\"databox-text darkgray\">可提现金额</div>
                    <div class=\"databox-text darkgray databox-data\">";
        // line 132
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["detail"]) ? $context["detail"] : $this->getContext($context, "detail")), "balance", array()), "html", null, true);
        echo "</div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"panel\" data-url='http://baidu.com'>
                <div class=\"panel-heading\">
                    <i class=\"icon-list-ul\"></i> 数据统计
                </div>
                <div id=\"toolbar\" class=\"chart-bar row\" style=\"margin:10px;\">
                    <div class=\"col-md-4\" style=\"width:220px;float: left;\">
                        <input type=\"hidden\" id=\"chart-column\" value=\"order\" />
                        <button data-val=\"order\" class=\"btn btn-primary  chart-column-btn\"><i class=\"icon icon-book\"></i> 订单数</button>
                        <button data-val=\"income\" class=\"btn  chart-column-btn\"><i class=\"icon icon-yen red\"></i> 营业额</button>
                    </div>
                    <div class=\"input-group date   col-md-2 \" style=\"float: left;margin-left:10px;margin-right:10px;width:150px;\"  data-link-field=\"dtp_input1\">
                        <input class=\"form-control form-date \" id=\"choice_date\"  data-date=\"\" type=\"text\"  readonly>
                        <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                    </div>
                    <div class=\"input-group col-md-1\" style=\"float:left;width:100px;\">
                        <span class=\"input-group-addon\">按</span>
                        <select id=\"choice-time-type\" class=\"form-control\" >
                            <option value=\"year\">年</option>
                            <option value=\"month\">月</option>
                        </select>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"panel-body\">
                    <div id=\"chart\" >

                    </div>
                </div>
            </div>
        </div>
        <script src=\"/static/zui/js/zui.js\"></script>
        <script src=\"/static/zui/lib/datetimepicker/datetimepicker.min.js\"></script>
        <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
        <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script> 
        <script src=\"/static/shop/js/global.js\" type=\"text/javascript\"></script> 
        <script>
            \$(function () {
                initChart();
                \$('#choice_date,#choice-time-type').change(function () {
                    console.log('init chart');
                    initChart();
                });
                \$('.chart-column-btn').click(function () {
                    \$('#chart-column').val(\$(this).data('val'));
                    \$('.chart-column-btn').removeClass('btn-primary');
                    \$(this).addClass('btn-primary');
                    initChart();
                });
            });
            function initChart() {
                var store_id = '";
        // line 187
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "';
                var time = \$('#choice_date').val();
                var timeType = \$('#choice-time-type').val();
                var column = \$('#chart-column').val();
                \$.ajax({
                    type: 'post',
                    url: '/admin/store/getChartData',
                    data: {timeType: timeType, time: time, column: column, store_id: store_id},
                    dataType: 'json',
                    success: function (res) {
                        \$('#chart').highcharts({
                            chart: {},
                            title: {text: '数据统计'},
                            colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                            subtitle: {text: '";
        // line 201
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "'},
                            xAxis: {categories: res.Xcategories},
                            yAxis: {title: {text: res.Ytext}},
                            tooltip: {
                                valueSuffix: res.valueSuffix
                            },
                            plotOptions: {
                                line: {dataLabels: {enabled: true, }, enableMouseTracking: true, },
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels:
                                            {
                                                enabled: true,
                                                color: '#000000',
                                                connectorColor: '#000000',
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                            }
                                }},
                            series: res.series
                        });
                    }
                });
            }
        </script>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/admin/store/storeDetail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 201,  231 => 187,  173 => 132,  158 => 120,  143 => 108,  128 => 96,  116 => 86,  109 => 74,  105 => 73,  101 => 72,  97 => 71,  90 => 67,  84 => 64,  19 => 1,);
    }
}
