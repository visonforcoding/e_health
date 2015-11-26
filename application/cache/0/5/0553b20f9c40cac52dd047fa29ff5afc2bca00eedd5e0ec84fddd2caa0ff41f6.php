<?php

/* home/store/online_order.twig */
class __TwigTemplate_0553b20f9c40cac52dd047fa29ff5afc2bca00eedd5e0ec84fddd2caa0ff41f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/online_order.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/front.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "预约店面详情";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">在线预约</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <form action=\"/home/order/orderPay\" method=\"post\">
        <input name=\"store_id\" type=\"hidden\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "\"/> 
        <input name=\"sid\" type=\"hidden\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id", array()), "html", null, true);
        echo "\"/> 
        <input name=\"isVisit\" type=\"hidden\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["isVisit"]) ? $context["isVisit"] : $this->getContext($context, "isVisit")), "html", null, true);
        echo "\"/> 
        <input name=\"token\" type=\"hidden\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "\"/> 
        <div class=\"shop-detail-box online\">
            <div class=\"online-name\">
                <div class=\"online-name-left\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "</div>
                <div class=\"online-name-right\">
                    服务项目：<span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "name", array()), "html", null, true);
        echo "</span>
                </div>
            </div>
        </div>
        <div class=\"shop-detail-box\">
            <ul class=\"submit-order-inf\">
                <li>
                    <div class=\"submit-order-infleft\">
                        单价
                    </div>
                    <div id=\"single-price\" data-price=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "\"  class=\"submit-order-infright\">
                        ￥";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "元
                    </div>
                </li>

                <li>
                    <div class=\"submit-order-infleft\">
                        数量
                    </div>
                    <div class=\"submit-order-infright change-num\">
                        <div class=\"count-num-box\">
                            <a href=\"javascript:;\" class=\"jian-handle\">
                                <i class=\"sprits\"></i>
                            </a>
                            <input name=\"num\" type=\"text\" class=\"count-num-input\" value=\"1\">
                            <a href=\"javascript:;\" class=\"jia-handle\">
                                <i class=\"sprits\"></i>
                            </a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class=\"submit-order-infleft\">
                        总计
                    </div>
                    <div class=\"submit-order-infright\">
                        <span class=\"total-price\">￥";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "元</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class=\"shop-detail-box online\">
            <ul class=\"online-inner-box\">
                <li class=\"nob\" id=\"select-time\">
                    <div class=\"online-left\">预约时间</div>
                    <input id=\"yuyue-time-input\" name=\"stime\" type=\"hidden\"/>
                    <div class=\"online-right\" id=\"yuyue-time\">
                        <span style=\"color:#ccc\">请您选择预约时间</span><i class=\"sprits gonext\"></i>
                    </div>
                </li>
            </ul>
        </div>

        <div class=\"shop-detail-box online\">
            <ul class=\"online-inner-box\">
                <li>
                    <div class=\"online-left\">
                        <input type=\"text\" name=\"name\" class=\"guixing\" placeholder=\"您贵姓\">
                    </div>
                    <div class=\"online-right\">
                        <div class=\"radiobox-gorup\">
                            <div class=\"radio-box\">
                                <input type=\"radio\" value=\"1\"  name=\"sex\">
                                <i class=\"sprits\"></i>
                            </div>
                            先生
                        </div>
                        <div class=\"radiobox-gorup\">
                            <div class=\"radio-box\">
                                <input type=\"radio\" value=\"0\" name=\"sex\" checked=\"checked\">
                                <i class=\"sprits checked\"></i>
                            </div>
                            女士
                        </div>
                    </div>
                </li>
                <li class=\"nob\">
                    <input type=\"text\" name=\"tel\" class=\"input-tel\" placeholder=\"请输入您的手机号码\">
                </li>
            </ul>
        </div>
        <div class=\"shop-detail-box online\">
            <a href=\"/home/orderservice/useFavorable?service_id=";
        // line 106
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id", array()), "html", null, true);
        echo "&store_id=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "\">
                <div class=\"online-quan\">
                    <div class=\"online-quan-left\">优惠券</div>
                    <div class=\"onlone-quan-right\">
                        ";
        // line 111
        echo "                        <i class=\"sprits gonext\"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class=\"shop-detail-box online\">
            <input type=\"text\" name=\"remark\" class=\"teshu-yaoqiu\" placeholder=\"如果您有什么特殊要求，请告知我们\">
        </div>
        <div class=\"shop-detail-box online\">
            <div class=\"online-help\">
                <div class=\"online-help-left\">帮他人预定</div>
                <div class=\"help-bnt\">
                    <i class=\"sprits\"></i>
                </div>
            </div>
        </div>
        <button href=\"#\" type=\"submit\" class=\"detail-yuyue-bnt\">提交订单</button>
    </form>

    <div class=\"zhezhao\"></div>
    <div class=\"select-time\">
        <p>请选择开始时间，灰色表示已被他人预约</p>
        <div class=\"select-day\">
            <ul>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
                <li><span></span><i class=\"sprits\"></i></li>
            </ul>
        </div>

        <div class=\"select-hour\">
            <ul>
                ";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["orderTime"]) ? $context["orderTime"] : $this->getContext($context, "orderTime")), "timeArr", array()));
        foreach ($context['_seq'] as $context["key"] => $context["time"]) {
            // line 148
            echo "                    <li ";
            if (($context["time"] == "0")) {
                echo " class=\"disable\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (8 + $context["key"]), "html", null, true);
            echo ":00</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['time'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "            </ul>
        </div>
    </div>
";
    }

    // line 154
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 156
    public function block_script($context, array $blocks = array())
    {
        // line 157
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var selectRadio = function () {
                \$(\".radiobox-gorup\").on(\"click\", function () {

                    \$(\".radiobox-gorup\").find(\"i\").removeClass(\"checked\");
                    \$(\".radiobox-gorup\").find(\"input\").prop(\"checked\", \"\");
                    \$(this).find(\"i\").addClass(\"checked\");
                    \$(this).find(\"input\").prop(\"checked\", \"checken\");
                });
            }();
            var helpHandle = function () {
                \$(\".help-bnt\").on(\"click\", function () {
                    if (!\$(this).hasClass(\"help\")) {
                        \$(this).addClass(\"help\");
                    } else {
                        \$(this).removeClass(\"help\");
                    }
                })
            }();
            var selectTime = function () {
                var myDate = new Date();
                var currentYear = myDate.getFullYear();
                var currentMonth = myDate.getMonth() + 1;
                var currentDay = myDate.getDate();
                var currentHour = myDate.getHours();
                var _targetDay = \"\";

                \$(\".select-day ul\").width(167 * \$(\".select-day li\").length + 60);

                if (currentMonth == 2) {
                    if ((currentYear % 4 == 0 && currentYear % 100 != 0) || (currentYear % 100 == 0 && currentYear % 400 == 0)) {
                        _targetDay = 29
                    } else {
                        _targetDay = 28
                    }
                }
                if (currentMonth == 1 || currentMonth == 3 || currentMonth == 5 || currentMonth == 7 || currentMonth == 8 || currentMonth == 10 || currentMonth == 12) {
                    _targetDay = 31
                }
                if (currentMonth == 4 || currentMonth == 6 || currentMonth == 9 || currentMonth == 11) {
                    _targetDay = 30;
                }

                for (var i = 0; i < 7; i++) {//初步设置可预定天数为一周内
                    currentDay++;
                    if (currentDay > _targetDay) {
                        currentDay = 1;
                        currentMonth++;
                        if (currentMonth <= 9) {
                            currentMonth = \"0\" + currentMonth;
                        }
                    }
                    \$(\".select-day span\").eq(i).text(currentMonth + \"-\" + parseInt(currentDay - 1));
                }//初始化

                \$(\"#select-time\").on(\"click\", function () {
                    \$(\".zhezhao, .select-time\").show();
                    creatHour();
                });

                \$(\".select-day\").on(\"click\", \"li\", function (event) {
                    event.stopPropagation();
                    \$(this).addClass(\"selected\").siblings().removeClass(\"selected\");
                    if (\$(this).index() > 0) {
                        \$(\".select-hour li\").addClass(\"able\");
                        for (var i = 0; i < \$(\".select-hour li\").length; i++) {
                            if (\$(\".select-hour li\").eq(i).hasClass('disable')) {
                                \$(\".select-hour li\").eq(i).removeClass('able');
                            }
                        }
                    } else {
                        creatHour();
                    }
                    \$(\".select-hour\").show();
                });

                \$(\".select-hour li\").on(\"click\", function (event) {
                    event.stopPropagation();
                    var _yuyue_hour = \$(this).text();
                    var _yuyue_day = \$(\".select-day\").find(\".selected\").text();
                    var _yuyue_day_array = _yuyue_day.split(\"-\");
                    var _time_text = _yuyue_day_array[0] + \"月\" + _yuyue_day_array[1] + \"日\" + _yuyue_hour + '<i class=\"sprits gonext\"></i>';
                    var _time_val = currentYear + '-' + _yuyue_day_array[0] + \"-\" + _yuyue_day_array[1] + \" \" + _yuyue_hour + ':00';
                    \$(\"#yuyue-time\").html(_time_text);
                    \$(\"#yuyue-time-input\").val(_time_val);
                    \$(\".zhezhao, .select-time\").hide();
                });


                function creatHour() {
                    \$(\".select-day li\").eq(0).addClass(\"selected\").siblings().removeClass(\"selected\");
                    \$(\".select-hour li\").removeClass(\"able\");

                    for (var i = 0; i < \$(\".select-hour li\").length; i++) {
                        if (parseInt(\$(\".select-hour li\").eq(i).text() + 1) > currentHour) {
                            \$(\".select-hour li\").eq(i).addClass(\"able\");
                            if (\$(\".select-hour li\").eq(i).hasClass('disable')) {
                                \$(\".select-hour li\").eq(i).removeClass('able');
                            }
                        }

                    }
                }
                \$(\".zhezhao\").on(\"click\", function () {
                    \$(\".zhezhao, .select-time\").hide();
                });

                var countNum = function () {
                    var \$jian = \$(\".jian-handle\"),
                            \$jia = \$(\".jia-handle\"),
                            \$count = \$(\".count-num-input\");

                    var _val = 0;

                    \$jian.on(\"click\", function () {
                        _val = \$count.val();
                        if (_val > 1) {
                            \$count.val(--_val);
                        }
                    });
                    \$jia.on(\"click\", function () {
                        _val = \$count.val();
                        \$count.val(++_val);
                    });
                }();
            }();
            \$('.change-num a').bind('click', function () {
                var num = \$('.count-num-input').val();
                var single_price = \$('#single-price').data('price');
                \$('.total-price').text('￥' + num * single_price + '元');
            });
            
            \$('form').submit(function () {
                var stime = \$(\"#yuyue-time-input\").val();
                if (stime == '') {
                    alert('预约时间不可以为空');
                    return false;
                }
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/online_order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 157,  252 => 156,  247 => 154,  240 => 150,  227 => 148,  223 => 147,  185 => 111,  176 => 106,  126 => 59,  97 => 33,  93 => 32,  80 => 22,  75 => 20,  69 => 17,  65 => 16,  61 => 15,  57 => 14,  54 => 13,  51 => 12,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
