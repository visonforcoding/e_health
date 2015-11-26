<?php

/* home/orderservice/order_home_store.twig */
class __TwigTemplate_a496946db8514909b9ef182677a87f8bd64d22024e0c1c642f8505ba62a19b18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/order_home_store.twig", 1);
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
        <a href=\"javascript:;\" class=\"header-like ";
        // line 12
        if ((isset($context["collect"]) ? $context["collect"] : $this->getContext($context, "collect"))) {
            echo "liked";
        }
        echo "\">
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
            <p>预约服务项目</p>
            <ul class=\"select-server\">
                ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 32
            echo "                    <li data-sid=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["loop"], "first", array()) && twig_test_empty((isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id"))))) {
                echo " class=\"selected\"";
            } elseif (($this->getAttribute($context["service"], "id", array()) == (isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id")))) {
                echo "class=\"selected\" ";
            }
            echo "> 
                        <i class=\"sprits\"></i>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "            </ul>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【项目描述】</p>
        </div>
        ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 44
            echo "            <ul class=\"detail-yuyue-price\">
                <li style=\"width:50%\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</li>
                <li style=\"width:50%;text-align: right;\"><span>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "元</span></li>
            </ul>

            <ul class=\"detail-server-list\">
                <li>
                    服务时长：<span>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "stime", array()), "html", null, true);
            echo "分钟</span>
                </li>
                <li>理疗功效：<p>";
            // line 53
            echo twig_escape_filter($this->env, strip_tags($this->getAttribute($context["service"], "efficacy", array())), "html", null, true);
            echo "</p></li>
            </ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【服务范围】</p>
        </div>

        <div class=\"server-limit\">
            <p>";
        // line 64
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
        // line 74
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
        // line 84
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "orderNotice", array());
        echo "
        </div>
    </div>
    <a href=\"/home/orderservice/submitOrder/store_id/";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "/sid/";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")), 0, array()), "id", array()), "html", null, true);
        echo "\" class=\"detail-yuyue-bnt\">立即预约</a>
";
    }

    // line 89
    public function block_footer($context, array $blocks = array())
    {
        // line 90
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

    // line 152
    public function block_script($context, array $blocks = array())
    {
        // line 153
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
                })

            }();
            var share = function () {
                \$(\".header-share\").on(\"click\", function () {
                    \$(\".zhezhao\").show();
                    \$(\".share-group-layer\").addClass(\"show\");
                });
            }();

            /**
             * 收藏按钮点击事件
             * @type Function|undefined
             */
            var likeBnt = function () {
                var sid = '";
        // line 181
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "';
                var is_login = '";
        // line 182
        echo twig_escape_filter($this->env, (isset($context["is_login"]) ? $context["is_login"] : $this->getContext($context, "is_login")), "html", null, true);
        echo "';
                \$(\".header-like\").on(\"click\", function () {
                    var obj = \$(this);
                    if (is_login) {
                        \$.ajax({
                            url: '/home/useraction/collect.html',
                            type: 'post',
                            dataType: 'json',
                            data: {'sid': sid},
                            success: function (msg) {
                                if (msg.status === true) {
                                    obj.toggleClass('liked');
                                    layer.open({
                                        content: msg.msg,
                                        style: 'padding:30px 40px;width:200px;font-size:15px;border:none;',
                                        time: 2
                                    });
                                }
                            }
                        });
                    } else {
                        window.location.href = '/home/user/login.html';
                    }
                });
            }();

            var selectServer = function () {
                \$(\".select-server\").on(\"click\", \"li\", function () {
                    \$('ul.select-server li').removeClass('selected');
                    \$(this).addClass(\"selected\");
                    var sid = \$(this).data('sid');
                    var store = '";
        // line 213
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "';
                    var url = '/home/orderservice/submitOrder/store_id/' + store + '/sid/' + sid;
                    \$('.detail-yuyue-bnt').attr('href', url);
                });
            }();
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/order_home_store.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  362 => 213,  328 => 182,  324 => 181,  294 => 153,  291 => 152,  226 => 90,  223 => 89,  215 => 87,  209 => 84,  196 => 74,  183 => 64,  173 => 56,  164 => 53,  159 => 51,  151 => 46,  147 => 45,  144 => 44,  140 => 43,  130 => 35,  114 => 33,  103 => 32,  86 => 31,  78 => 26,  71 => 22,  68 => 21,  65 => 20,  51 => 12,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
