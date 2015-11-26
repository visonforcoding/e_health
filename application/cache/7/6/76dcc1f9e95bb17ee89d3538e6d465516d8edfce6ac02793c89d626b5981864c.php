<?php

/* /shop/chart/index.twig */
class __TwigTemplate_76dcc1f9e95bb17ee89d3538e6d465516d8edfce6ac02793c89d626b5981864c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/chart/index.twig", 2);
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
        $context["page_header_title"] = "数据统计";
        // line 4
        $context["page_tag"] = "shop_chart_index";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_static($context, array $blocks = array())
    {
        // line 6
        echo "    <style>
        .order-box ul li span{
            margin-right:10px;
        }
    </style>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"row work-copy\">
        <div class=\"panel\">
            <div class=\"panel-heading\">
                <i class=\"icon-list-ul\"></i> 数据统计
                <div class=\"panel-actions pull-right\">
                    <button role=\"button\" class=\"btn btn-mini close-panel\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
                </div>
            </div>
            <div id=\"intChart\" class=\"chart-bar row\" style=\"margin:10px;\">
                <div class=\"col-md-4\">
                    <input type=\"hidden\" id=\"chart-column\" value=\"order\" />
                    <button data-val=\"order\" class=\"btn btn-primary  chart-column-btn\"><i class=\"icon icon-book\"></i> 订单数</button>
                    <button data-val=\"income\" class=\"btn  chart-column-btn\"><i class=\"icon icon-yen red\"></i> 营业额</button>
                    <button data-val=\"member\" class=\"btn  chart-column-btn\"><i class=\"icon icon-yen red\"></i> 会员数</button>
                </div>
                <div class=\"input-group date   col-md-2 \" style=\"float: left;margin-left:-120px;margin-right:10px;\"  data-link-field=\"dtp_input1\">
                    <input class=\"form-control form-date \" id=\"choice_date\"  data-date=\"\" type=\"text\"  readonly>
                    <span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>
                </div>
                <div class=\"input-group col-md-1\">
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

    <div class=\"row\">
        <div class=\" col-xs-6\">
            <div class=\"panel\">
                <div class=\"panel-heading\">
                    <i class=\"icon-list-ul\"></i> 用户消费分析
                    <div class=\"panel-actions pull-right\">
                        <button role=\"button\" class=\"btn btn-mini close-panel\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
                    </div>
                </div>
                <div  id=\"initExpense\" class=\"chart-bar row\" style=\"margin:10px;\">
                    <input type=\"hidden\" id=\"chart-column\" value=\"order\" />
                    <button data-val=\"7day\" class=\"btn btn-primary  chart-column-btn\">本周</button>
                    <button data-val=\"1month\" class=\"btn  chart-column-btn\"> 最近一月</button>
                    <button data-val=\"3month\" class=\"btn  chart-column-btn\">最近三月</button>
                    <button data-val=\"6month\" class=\"btn  chart-column-btn\">半年</button>
                </div>
                <div class=\"panel-body\">
                    <div id=\"chart_1\" >

                    </div>
                </div>
            </div>
        </div>
        <div class=\" col-xs-6\">
            <div class=\"panel\">
                <div class=\"panel-heading\">
                    <i class=\"icon-list-ul\"></i> 产品销售分析
                    <div class=\"panel-actions pull-right\">
                        <button role=\"button\" class=\"btn btn-mini close-panel\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
                    </div>
                </div>
                <div  id=\"initServiceChart\" class=\"chart-bar row\" style=\"margin:10px;\">
                    <input type=\"hidden\" id=\"chart-column\" value=\"order\" />
                    <button data-val=\"7day\" class=\"btn btn-primary  chart-column-btn\">本周</button>
                    <button data-val=\"1month\" class=\"btn  chart-column-btn\"> 最近一月</button>
                    <button data-val=\"3month\" class=\"btn  chart-column-btn\">最近三月</button>
                    <button data-val=\"6month\" class=\"btn  chart-column-btn\">半年</button>
                </div>
                <div class=\"panel-body\">
                    <div id=\"chart_2\" >

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"panel\">
            <div class=\"panel-heading\">
                <i class=\"icon-list-ul\"></i> 用户消费排行
                <div class=\"panel-actions pull-right\">
                    <button role=\"button\" class=\"btn btn-mini close-panel\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
                </div>
            </div>
            <div class=\"panel-body\">
                <div id=\"buy_most_order\" class=\"order-box col-xs-6\"  >
                    <div  id=\"initMemberBuy\" class=\"chart-bar row\" style=\"margin:10px;\">
                        <input type=\"hidden\" id=\"chart-column\" value=\"order\" />
                        <button data-val=\"7day\" class=\"btn btn-primary  chart-column-btn\">本周</button>
                        <button data-val=\"1month\" class=\"btn  chart-column-btn\"> 最近一月</button>
                        <button data-val=\"3month\" class=\"btn  chart-column-btn\">最近三月</button>
                        <button data-val=\"6month\" class=\"btn  chart-column-btn\">半年</button>
                    </div>
                    <ul class=\"list-group\">
                        <li class=\"list-group-item\">
                            <a href=\"#\">活跃用户排行榜</a>
                        </li>
                    </ul>
                </div>
                <div id=\"buy_few_order\" class=\"order-box col-xs-6\"  >
                    <ul class=\"list-group\">
                        <li class=\"list-group-item\">
                            <a href=\"#\">可能即将丢失的用户(超过30天未消费)</a>
                        </li>
                        ";
        // line 124
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buy_few"]) ? $context["buy_few"] : $this->getContext($context, "buy_few")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 125
            echo "                            <li class=\"list-group-item\">
                                <span class=\"label label-badge label-danger pull-left\">";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</span> 
                                <span>";
            // line 127
            echo twig_escape_filter($this->env, (($this->getAttribute($context["item"], "trueName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["item"], "trueName", array()), "未设置")) : ("未设置")), "html", null, true);
            echo "</span>
                                <span>电话:";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "tel", array()), "html", null, true);
            echo "</span>
                                <span>最近一次消费时间：";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "ctime", array()), "html", null, true);
            echo "</span>
                                <span>";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "date_diff_day", array()), "html", null, true);
            echo "天前</span>
                            </li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\" col-xs-12\">
            <div class=\"panel\">
                <div class=\"panel-heading\">
                    <i class=\"icon-list-ul\"></i> 服务客单价
                    <div class=\"panel-actions pull-right\">
                        <button role=\"button\" class=\"btn btn-mini close-panel\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
                    </div>
                </div>
                <div class=\"panel-body\">
                    <div id=\"chart_3\" >

                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 156
    public function block_script($context, array $blocks = array())
    {
        // line 157
        echo "    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script> 
    <script>
        \$(function () {
            initChart();
            initExpense();
            initServiceChart();
            initServicePrice();
            initMemberBuy();
            \$('#choice_date,#choice-time-type').change(function () {
                initChart();
            });
            \$('.chart-column-btn').click(function () {
                \$(this).parents('div.chart-bar').find('.chart-column-btn').removeClass('btn-primary');
                \$(this).addClass('btn-primary');
            });
            \$('#intChart .chart-column-btn').click(function () {
                \$('#chart-column').val(\$(this).data('val'));
                initChart();
            });
            \$('#initExpense .chart-column-btn').click(function () {
                var time = \$(this).data('val');
                initExpense(time);
            });
            \$('#initServiceChart .chart-column-btn').click(function () {
                var time = \$(this).data('val');
                initServiceChart(time);
            });
            \$('#initMemberBuy .chart-column-btn').click(function () {
                var time = \$(this).data('val');
                initMemberBuy(time);
            });
        });
        function initChart() {
            var time = \$('#choice_date').val();
            var timeType = \$('#choice-time-type').val();
            var column = \$('#chart-column').val();
            \$.ajax({
                type: 'post',
                url: '/shop/chart/getData',
                data: {timeType: timeType, time: time, column: column},
                dataType: 'json',
                success: function (res) {
                    \$('#chart').highcharts({
                        chart: {},
                        title: {text: '数据统计'},
                        colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                        subtitle: {text: '我的店铺'},
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
        function initExpense(time) {
            \$.ajax({
                type: 'post',
                url: '/shop/chart/getStoreExpenseData',
                dataType: 'json',
                data: {time: time},
                success: function (res) {
                    \$('#chart_1').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                        title: {
                            text: '消费层级分析'
                        },
                        tooltip: {
                            pointFormat: '区间有: <b>{point.y}条</b>'
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
                        series: [res]
                    });
                }
            });
        }
        function initServiceChart(time) {
            \$.ajax({
                type: 'post',
                url: '/shop/chart/getStoreServiceData',
                dataType: 'json',
                data: {time: time},
                success: function (res) {
                    \$('#chart_2').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                        title: {
                            text: '产品销售分析'
                        },
                        tooltip: {
                            pointFormat: '销售额: <b>{point.y}元</b>'
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
                        series: [res]
                    });
                }
            });
        }

        function initServicePrice() {
            \$.ajax({
                type: 'post',
                url: '/shop/chart/getServicePriceData',
                dataType: 'json',
                success: function (res) {
                    \$('#chart_3').highcharts({
                        chart: {
                            type: 'column'
                        },
                        xAxis: {categories: res.Xcategories},
                        yAxis: {title: {text: res.Ytext}},
                        colors: ['#ED561B', '#50B432', '#058DC7', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                        title: {
                            text: '服务客单价'
                        },
                        tooltip: {
                            headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
                            pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}年月消费: </td>' +
                                    '<td style=\"padding:0\"><b>{point.y:.1f} 元/次</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: res.series
                    });
                }
            });
        }
        function initMemberBuy(time) {
            \$.ajax({
                type: 'post',
                url: '/shop/chart/getMemberBuyOrderData',
                dataType: 'json',
                data: {time: time},
                success: function (res) {
                    \$('#buy_most_order ul li').slice(1).remove();
                    \$.each(res, function (i, item) {
                        var name = item.trueName;
                        if (name === null) {
                            name = '未设置';
                        }
                        \$('#buy_most_order ul').append('<li class=\"list-group-item\">' +
                                '<span class=\"label label-badge label-danger pull-left\">' + (i + 1) +
                                '</span><span>' + name + '</span><span>' + item.order_nums +
                                '次消费</span><span>消费总金额' + item.total +
                                '元</span><span>电话:' + item.tel + '</span></li>');
                    });
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/chart/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 157,  242 => 156,  216 => 133,  199 => 130,  195 => 129,  191 => 128,  187 => 127,  183 => 126,  180 => 125,  163 => 124,  50 => 13,  47 => 12,  38 => 6,  35 => 5,  31 => 2,  29 => 4,  27 => 3,  11 => 2,);
    }
}
