<?php

/* home/store/promo_store.twig */
class __TwigTemplate_2c2c0e32b6df04d3a73151f769e39f780f682ced1450bfbeef64d0898adf4611 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/promo_store.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
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
        echo "优惠商家";
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
    <div class=\"header-center\">
      ";
        // line 19
        echo "    </div>
    <div class=\"header-search\">
        <a href=\"shop-search.html\">
            <i class=\"sprits\"></i>
        </a>
    </div>
";
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "    <div class=\"shop-location\">
        <a href=\"shop-map.html\">
            <i class=\"sprits location\"></i>
            <p>";
        // line 30
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
                        全城
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
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition2\"></i>推拿</a>
                </li>
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition3\"></i>针灸</a>
                </li>
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition4\"></i>汗蒸</a>
                </li>
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition5\"></i>刮痧</a>
                </li>
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition6\"></i>拔罐</a>
                </li>
                <li>
                    <a href=\"javascript:;\"><i class=\"sprits condition7\"></i>面部护理</a>
                </li>
            </ol>
        </div>

        <div class=\"select-kinds-layer\" data-kinds=\"all-city\">
            <ol class=\"select-condition\">
               <li class=\"current\">
                    <a href=\"/home/store/promoStore\">全城</a>
                </li>
                ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["areas"]) ? $context["areas"] : $this->getContext($context, "areas")));
        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
            // line 93
            echo "                    <li>
                        <a href=\"/home/store/promoStore/area/";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "name", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "            </ol>
        </div>

        <div class=\"select-kinds-layer\" data-kinds=\"all-zhineng\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\">智能排序</a>
                </li>
                <li>
                    <a href=\"javascript:;\">离我最近</a>
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

    ";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 119
            echo "        <div class=\"youhui-shop-list\">
            <div class=\"youhui-shio-inf\">
                <div class=\"youhui-shop-name\">";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "storeName", array()), "html", null, true);
            echo "</div>
                <div class=\"youhui-shop-code\">
                    <div class=\"youhui-code-box sprits\">
                        <div class=\"youhui-get-code sprits\"></div>
                    </div>
                    ";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "commentNums", array()), "html", null, true);
            echo "评价
                </div>
                <a href=\"#\">更多养生</a>
                <div class=\"youhui-shop-address\">深南大道沿线</div>
            </div>
            <ul class=\"youhui-shop-server\">
                ";
            // line 132
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["store"], "promo_services", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
                // line 133
                echo "                    <li>
                        <a href=\"/home/store/storeOrder/id/";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "store_id", array()), "html", null, true);
                echo "/service_id/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "service_id", array()), "html", null, true);
                echo "\">
                        <div class=\"youhui-shop-img\">
                            <img src=\"";
                // line 136
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "cover", array()), "html", null, true);
                echo "\" alt=\"\">
                        </div>
                        <div class=\"youhui-shop-text\">
                            <p>";
                // line 139
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "title", array()), "html", null, true);
                echo "</p> 
                            <p> ";
                // line 140
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
                echo "</p>
                            <p class=\"youhui\"><span>¥";
                // line 141
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
                echo " </span><em>¥";
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "mprice", array()), "html", null, true);
                echo "</em> <b>已售";
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "orderCount", array()), "html", null, true);
                echo "</b></p>
                        </div>
                        </a>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo "            </ul>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 150
    public function block_script($context, array $blocks = array())
    {
        // line 151
        echo "    <script>
        \$(function () {
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
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/promo_store.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 151,  250 => 150,  240 => 146,  225 => 141,  221 => 140,  217 => 139,  211 => 136,  204 => 134,  201 => 133,  197 => 132,  188 => 126,  180 => 121,  176 => 119,  172 => 118,  149 => 97,  138 => 94,  135 => 93,  131 => 92,  66 => 30,  61 => 27,  58 => 26,  48 => 19,  40 => 5,  37 => 4,  31 => 3,  11 => 2,);
    }
}
