<?php

/* home/store/store_order.twig */
class __TwigTemplate_17473c067ac4b55e18ad1a0c28df16c142ac64f0c0d57c23974c94132cdaaf7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/store_order.twig", 1);
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "预约店面详情";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>

    <div class=\"title\">预约店面详情</div>
    <div class=\"header-right\">
        <a href=\"javascript:;\" class=\"header-like\">
            <i class=\"sprits\"></i>
        </a>
        <a href=\"javascript:;\" class=\"header-share\">
            <i class=\"sprits\"></i>
        </a>
    </div>
";
    }

    // line 20
    public function block_main($context, array $blocks = array())
    {
        // line 21
        echo "    <div class=\"shop-detail-banner\">
        <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
    </div>
    <div class=\"shop-detail-box\">
        <div class=\"yuyue-deail-name\">
            <p><span>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "</span>您的专业养生基地</p>
        </div>
        <div class=\"yuyue-option\">
            <p>预约上门项目</p>
            <ul class=\"select-server\">
                ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["homeservices"]) ? $context["homeservices"] : $this->getContext($context, "homeservices")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 32
            echo "                    <li data-visit=\"1\" data-sid=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\" > 
                        <i class=\"sprits\"></i>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "            </ul>
        </div>
        <div class=\"yuyue-option\">
            <p>预约到店项目</p>
            <ul class=\"select-server\">
                ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 41
            echo "                    <li data-visit=\"0\" data-sid=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\" > 
                        <i class=\"sprits\"></i>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "            </ul>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【项目描述】</p>
        </div>
        ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 53
            echo "            <ul class=\"detail-yuyue-price\">
                <li style=\"width:50%\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</li>
                <li style=\"width:50%;text-align:right\"><span>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "元</span></li>
            </ul>

            <ul class=\"detail-server-list\">
                <li>
                    服务时长：<span>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "stime", array()), "html", null, true);
            echo "分钟</span>
                </li>
                <li>理疗功效：<p>";
            // line 62
            echo twig_escape_filter($this->env, strip_tags($this->getAttribute($context["service"], "efficacy", array())), "html", null, true);
            echo "</p></li>
            </ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【服务范围】</p>
        </div>
        <div class=\"server-limit\">
            <p>";
        // line 72
        echo twig_escape_filter($this->env, (isset($context["service_area"]) ? $context["service_area"] : $this->getContext($context, "service_area")), "html", null, true);
        echo "</p>
        </div>
    </div>
    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【服务前须知】</p>
        </div>
        <ul class=\"server-notic-ul\">
            ";
        // line 80
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "serviceNotice", array());
        echo "
        </ul>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【订单修改/取消】</p>
        </div>
        <div class=\"server-limit\">
            ";
        // line 89
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "orderNotice", array());
        echo "
        </div>
    </div>
    <a href=\"javascript:;\" class=\"detail-yuyue-bnt\">立即预约</a>
";
    }

    // line 94
    public function block_footer($context, array $blocks = array())
    {
        // line 95
        echo "    <div class=\"zhezhao\"></div>
    <div class=\"share-group-layer\">
        <ul>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share1\"></i>
                    <p>微信好友</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share2\"></i>
                    <p>朋友圈</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share3\"></i>
                    <p>QQ</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share4\"></i>
                    <p>短信</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share5\"></i>
                    <p>新浪微博</p>
                </a>
            </li>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share6\"></i>
                    <p>QQ空间</p>
                </a>
            </li>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share7\"></i>
                    <p>邮件</p>
                </a>
            </li>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share8\"></i>
                    <p>复制链接</p>
                </a>
            </li>
        </ul>
        <a href=\"javascript:;\" class=\"cancle cancle-share\">取消分享</a>
    </div>
    <div class=\"liked-notic\">
        收藏成功
    </div>
";
    }

    // line 157
    public function block_script($context, array $blocks = array())
    {
        // line 158
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);

            var jiuCuo = function () {

                \$(\"#jiucuo\").on(\"click\", function () {
                    \$(\".zhezhao\").show();
                    \$(\".jiucuo-layer-con\").addClass(\"show\");
                });

                \$(\".cancle\").on(\"click\", function () {
                    \$(\".zhezhao\").hide();
                    \$(\".jiucuo-layer-con, .share-group-layer\").removeClass(\"show\");
                });

            }();

            var share = function () {
                \$(\".header-share\").on(\"click\", function () {
                    \$(\".zhezhao\").show();
                    \$(\".share-group-layer\").addClass(\"show\");
                })
            }();

            var likeBnt = function () {
                \$(\".header-like\").on(\"click\", function () {
                    if (!\$(this).hasClass(\"liked\")) {
                        \$(this).addClass(\"liked\");
                        \$(\".liked-notic\").show();
                        setTimeout(function () {
                            \$(\".liked-notic\").hide();
                        }, 1500);
                    }

                });
            }();

            var selectServer = function () {
                \$(\".select-server\").on(\"click\", \"li\", function () {
                    \$('ul.select-server li').removeClass('selected');
                    \$(this).addClass(\"selected\");
                    var sid = \$(this).data('sid');
                    var store = '";
        // line 201
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "';
                    var isVisit = \$(this).data('visit');
                    if(isVisit==='1'){
                        var url = '/home/orderservice/submitOrder?store_id='+ store+'&sid'+sid;
                    }else{
                        var url = '/home/store/onlineOrder?store_id=' + store + '&sid=' + sid + '&visit=' + isVisit;
                    }
                    \$('.detail-yuyue-bnt').attr('href', url);
                });
            }();
            \$('a.detail-yuyue-bnt').bind('click', function () {
                var len = \$('ul.select-server li.selected').length;
                if (len === 0) {
                    alert('请先选择服务项目');
                }
            }
            );
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/store_order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 201,  277 => 158,  274 => 157,  209 => 95,  206 => 94,  197 => 89,  185 => 80,  174 => 72,  165 => 65,  156 => 62,  151 => 60,  143 => 55,  139 => 54,  136 => 53,  132 => 52,  122 => 44,  114 => 42,  109 => 41,  105 => 40,  98 => 35,  90 => 33,  85 => 32,  81 => 31,  73 => 26,  66 => 22,  63 => 21,  60 => 20,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
