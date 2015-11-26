<?php

/* home/store/store_detail.twig */
class __TwigTemplate_e07c7cac780d4af40cb21cae1cf9bb86f25a6080f3f0cad743af505cf4764ba7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/store_detail.twig", 1);
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
        echo "商家详情";
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
    <div class=\"title\">商家详情</div>
    <div class=\"header-right\">
        <a href=\"javascript:;\" class=\"header-like ";
        // line 11
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

    // line 19
    public function block_main($context, array $blocks = array())
    {
        // line 20
        echo "    <div class=\"shop-detail-banner\">
        <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
    </div>
    <div class=\"shop-detail-box\">
        <div class=\"shop-detail-inf\">
            <div class=\"shop-detail-name\">
                ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "
            </div>
            <div class=\"goods-score\">
                <div class=\"score-start sprits\">
                    <div class=\"current-score sprits\"></div>
                </div>
                <span class=\"comment-count\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comments_info"]) ? $context["comments_info"] : $this->getContext($context, "comments_info")), "avgscore", array()), "html", null, true);
        echo "分</span>
            </div>
            <div class=\"shop-deatil-juli\">
                805km
            </div>
        </div>
        <div class=\"shop-detail-inf nob\">
            <div class=\"shop-detail-server\">
                <p>项目：";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "services", array()), "html", null, true);
        echo "</p>
                <p>营业时间：";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "openTime", array()), "html", null, true);
        echo "</p>
            </div>
            <a href=\"/home/store/storeOrder/id/";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "\" class=\"yuyue-xiadan\">预约下单</a>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <ul class=\"shop-detail-contant\">
            <li>
                <a href=\"/home/store/storeMap.html\">
                    <i class=\"sprits location\"></i>
                    <p>";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeAddress", array()), "html", null, true);
        echo "</p>
                    <i class=\"sprits gonext\"></i>
                </a>
            </li>
            <li class=\"nob\">
                <a href=\"tel:";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossTel", array()), "html", null, true);
        echo "\">
                    <i class=\"sprits tel\"></i>
                    <p>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossTel", array()), "html", null, true);
        echo "</p>
                    <i class=\"sprits gonext\"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class=\"shop-detail-daijinqun\">
        ";
        // line 66
        if ((isset($context["promos"]) ? $context["promos"] : $this->getContext($context, "promos"))) {
            // line 67
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["promos"]) ? $context["promos"] : $this->getContext($context, "promos")));
            foreach ($context['_seq'] as $context["_key"] => $context["promo"]) {
                // line 68
                echo "                <a href=\"#\">
                    <i class=\"sprits daijinjuan\"></i>
                    <div class=\"detail-daijinjuan-text\">
                        <p>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($context["promo"], "title", array()), "html", null, true);
                echo "</p>
                        <p><span>¥";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["promo"], "price", array()), "html", null, true);
                echo "</span><b>¥";
                echo twig_escape_filter($this->env, $this->getAttribute($context["promo"], "mprice", array()), "html", null, true);
                echo "</b></p>
                    </div>
                    <i class=\"sprits gonext\"></i>
                </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "        ";
        }
        // line 78
        echo "    </div>


    <div class=\"shop-detail-comment\">
        <div class=\"goods-score\">
            <div class=\"score-start sprits\">
                <div class=\"current-score sprits\"></div>
            </div>
            <span class=\"comment-count\">";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comments_info"]) ? $context["comments_info"] : $this->getContext($context, "comments_info")), "avgscore", array()), "html", null, true);
        echo "分</span>
        </div>

        <div class=\"shop-gocomment\">
            <a href=\"#\">
                ";
        // line 92
        echo "                <span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comments_info"]) ? $context["comments_info"] : $this->getContext($context, "comments_info")), "totalnum", array()), "html", null, true);
        echo "评价</span>
            </a>
        </div>
    </div>
    <div class=\"shop-detail-box\">
        ";
        // line 97
        if ((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments"))) {
            // line 98
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 99
                echo "                <div class=\"comment-user-inf\">
                    <div class=\"user-inf-img\">
                        <img src=\"";
                // line 101
                echo twig_escape_filter($this->env, (($this->getAttribute($context["comment"], "avatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["comment"], "avatar", array()), "/static/home/images/touxiang.png")) : ("/static/home/images/touxiang.png")), "html", null, true);
                echo "\" alt=\"\">
                    </div>
                    <div class=\"user-inf-text\">
                        <p>";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "tel", array()), "html", null, true);
                echo "</p>
                        <div class=\"goods-score\">
                            <div class=\"score-start sprits\">
                                <div class=\"current-score sprits\"></div>
                            </div>
                            <span class=\"comment-count\">";
                // line 109
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "ctime", array()), "html", null, true);
                echo "</span>
                        </div>
                    </div>
                </div>
                <div class=\"shop-comment-text\">
                    <p>";
                // line 114
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "desc", array()), "html", null, true);
                echo "</p>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 117
            echo "        ";
        }
        // line 118
        echo "        ";
        if (($this->getAttribute((isset($context["comments_info"]) ? $context["comments_info"] : $this->getContext($context, "comments_info")), "totalnum", array()) > 2)) {
            // line 119
            echo "            <a href=\"/home/store/viewComment?type=1&id=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
            echo "\" class=\"view-more-comment\">
                <span>查看全部";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comments_info"]) ? $context["comments_info"] : $this->getContext($context, "comments_info")), "totalnum", array()), "html", null, true);
            echo "条评价</span>
                <i class=\"sprits gonext\"></i>
            </a>
        ";
        }
        // line 124
        echo "    </div>
";
    }

    // line 126
    public function block_footer($context, array $blocks = array())
    {
        // line 127
        echo "    <ul class=\"shop-detail-footer\">
        <li class=\"current\" id=\"jiucuo\">
            <a href=\"javascript:;\">
                <div class=\"shop-footer-box\">
                    <i class=\"sprits jiucuo\"></i>我要纠错
                </div>
            </a>
        </li>
        <li class=\"current\">
            <a href=\"/home/store/comment/sid/";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "\">
                <div class=\"shop-footer-box\">
                    <i class=\"sprits dianping\"></i>我要点评
                </div>
            </a>
        </li>
    </ul>
    <div class=\"zhezhao\"></div>
    <div class=\"jiucuo-layer-con\">
        <ul>
            <li>商户信息错误</li>
            <li>商户已关</li>
            <li>地理位置错误</li>
            <li>商户重复</li>
            <li>其他</li>
        </ul>
        <a href=\"javascript:;\" class=\"cancle\">取消</a>
    </div>

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

    // line 217
    public function block_script($context, array $blocks = array())
    {
        // line 218
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
                \$(\".header-share\").on(\"click\", function (event) {
                    event.stopPropagation();
                    \$(\".zhezhao, .share-group-layer\").show();
                })
            }();
            \$(\".zhezhao, .cancle-share\").on(\"click\", function () {
                \$(\".zhezhao, .share-group-layer\").hide();
            });
            /**
             * 收藏按钮点击事件
             * @type Function|undefined
             */
            var likeBnt = function () {
                var sid = '";
        // line 245
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "';
                var is_login = '";
        // line 246
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
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/store_detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  401 => 246,  397 => 245,  368 => 218,  365 => 217,  280 => 136,  269 => 127,  266 => 126,  261 => 124,  254 => 120,  249 => 119,  246 => 118,  243 => 117,  234 => 114,  226 => 109,  218 => 104,  212 => 101,  208 => 99,  203 => 98,  201 => 97,  192 => 92,  184 => 86,  174 => 78,  171 => 77,  158 => 72,  154 => 71,  149 => 68,  144 => 67,  142 => 66,  132 => 59,  127 => 57,  119 => 52,  107 => 43,  102 => 41,  98 => 40,  87 => 32,  78 => 26,  70 => 21,  67 => 20,  64 => 19,  50 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
