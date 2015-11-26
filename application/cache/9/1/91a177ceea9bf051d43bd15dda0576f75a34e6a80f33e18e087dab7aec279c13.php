<?php

/* home/store/store.twig */
class __TwigTemplate_91a177ceea9bf051d43bd15dda0576f75a34e6a80f33e18e087dab7aec279c13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/store.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
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
        echo "商家列表";
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
    <div class=\"header-center\">
        <ul class=\"shop-tab\">
            <li>
                <a href=\"\" class=\"current\">全部商家</a>
            </li>
            <li>
                <a href=\"/home/store/promoStore.html\">优惠商家</a>
            </li>
        </ul>
    </div>
    <div class=\"header-search\">
        <a href=\"shop-search.html\">
            <i class=\"sprits\"></i>
        </a>
    </div>
";
    }

    // line 25
    public function block_main($context, array $blocks = array())
    {
        // line 26
        echo "    <div class=\"shop-location\">
        <a href=\"/home/map/getPos.html\">
            <i class=\"sprits location\"></i>
            <p>";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["pos_address"]) ? $context["pos_address"] : $this->getContext($context, "pos_address")), "html", null, true);
        echo "</p>
            <i class=\"sprits go-next\"></i>
        </a>
    </div>

    <div class=\"goods-kinds\">
        <ul class=\"goods-kinds-ul\">
            <li data-kinds=\"all-kinds\">
                <a href=\"javascript:;\">
                    <div class=\"all-kinds\">
                        全部分类
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li data-kinds=\"all-city\">
                <a href=\"javascript:;\">
                    <div class=\"all-city\">
                        ";
        // line 47
        echo twig_escape_filter($this->env, ((array_key_exists("search_area", $context)) ? (_twig_default_filter((isset($context["search_area"]) ? $context["search_area"] : $this->getContext($context, "search_area")), "全城")) : ("全城")), "html", null, true);
        echo "
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li data-kinds=\"all-zhineng\">
                <a href=\"javascript:;\" class=\"nob\">
                    <div class=\"zhineng\">
                        智能排序
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
        </ul>
        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\"><i class=\"sprits condition1\"></i>全部分类</a>
                </li>
                ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 67
            echo "                    <li>
                        <a data-type=\"service\" data-val=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\" >
                            <i class=\"sprits condition2\"></i>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "            </ol>
        </div>

        <div class=\"select-kinds-layer\" data-kinds=\"all-city\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"/home/store/index\">全城</a>
                </li>
                ";
        // line 80
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["areas"]) ? $context["areas"] : $this->getContext($context, "areas")));
        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
            // line 81
            echo "                    <li>
                        <a data-type=\"area\" data-val=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "id", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "name", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "            </ol>
        </div>

        <div class=\"select-kinds-layer\" data-kinds=\"all-zhineng\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\">智能排序</a>
                </li>
                <li>
                    <a href=\"?sortType=dist\">离我最近</a>
                </li>
                <li>
                    <a href=\"javascript:;\">人气最高</a>
                </li>
                <li>
                    <a href=\"javascript:;\">评价最好</a>
                </li>
            </ol>
        </div>
    </div>
    <div class=\"goods-list-box\">
        <ul class=\"goods-list-ul\">
            ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 108
            echo "                <li>
                    <a href=\"/home/store/storeDetail/id/";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "id", array()), "html", null, true);
            echo "\">
                        <div class=\"goods-img-box\">
                            <img src=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
";
            // line 113
            echo "                        </div>
                        <div class=\"goods-inf-con\">
                            <div class=\"goods-name\">
                                ";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "storeName", array()), "html", null, true);
            echo "
                            </div>
                            <p class=\"goods-jianjie\">[";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "name", array()), "html", null, true);
            echo "]";
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "services", array()), "html", null, true);
            echo " </p>

                            <div class=\"goods-score\">
                                <div class=\"score-start sprits\">
                                    <div class=\"current-score sprits\"></div>
                                </div>
                                <span class=\"comment-count\">";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "commentNums", array()), "html", null, true);
            echo "评价</span>
                            </div>

                            <div class=\"distance\">";
            // line 127
            echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["store"], "distance", array()) / 1000), 1, "floor"), "html", null, true);
            echo "km</div>
                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "        </ul>
    </div>
    <script>
        \$(function () {
            console.info(GetRequest());
            \$('.select-condition a').click(function () {
                //多条件筛选
                var type = \$(this).data('type');
                var val = \$(this).data('val');
                var search = GetRequest();
                if (\$.isEmptyObject(search)) {
                    window.location.href = '/home/store/index?' + type + '=' + val;
                } else {
                    search[type] = val;
                    var params = \$.param(search);
                    window.location.href = '/home/store/index?' + params;
                }
            });
            FastClick.attach(document.body);
            var selectKinds = function () {
                var \$selectHandle = \$(\".goods-kinds-ul li\"),
                        _target = \"\",
                        \$showOption = \$(\".select-kinds-layer\");
                \$selectHandle.on(\"click\", function () {
                    if (!\$(this).hasClass(\"current\")) {
                        \$(this).addClass(\"current\").siblings().removeClass(\"current\");
                        _target = \$(this).data(\"kinds\");

                        for (var i = 0; i < \$showOption.length; i++) {
                            var _point = \$showOption.eq(i).data(\"kinds\");
                            if (_point == _target) {
                                \$showOption.hide();
                                \$showOption.eq(i).show();
                                \$showOption.eq(i).height(\$(\"body\").height() - 170);
                            }
                        }
                    } else {
                        \$(this).removeClass(\"current\");
                        \$showOption.hide();
                    }

                });
                \$showOption.on(\"click\", \"li\", function () {
                    \$showOption.hide();
                    \$selectHandle.removeClass(\"current\")
                })
            }()
        })

        function GetRequest() {
            var url = location.search; //获取url中\"?\"符后的字串
            var theRequest = new Object();
            if (url.indexOf(\"?\") != -1) {
                var str = url.substr(1);
                strs = str.split(\"&\");
                for (var i = 0; i < strs.length; i++) {
                    theRequest[strs[i].split(\"=\")[0]] = (strs[i].split(\"=\")[1]);
                }
            }
            return theRequest;
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/store.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 132,  229 => 127,  223 => 124,  212 => 118,  207 => 116,  202 => 113,  198 => 111,  193 => 109,  190 => 108,  186 => 107,  162 => 85,  151 => 82,  148 => 81,  144 => 80,  134 => 72,  125 => 69,  121 => 68,  118 => 67,  114 => 66,  92 => 47,  71 => 29,  66 => 26,  63 => 25,  39 => 4,  36 => 3,  30 => 2,  11 => 1,);
    }
}
