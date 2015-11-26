<?php

/* home/index.twig */
class __TwigTemplate_f06bf7719a1f12a57bf112a1ff6577dfa2956370dbeb1e9f3a7e6f16fb50237c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/index.twig", 1);
        $this->blocks = array(
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

    // line 2
    public function block_header($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"location\">
        <span>";
        // line 4
        echo twig_escape_filter($this->env, ((array_key_exists("location", $context)) ? (_twig_default_filter((isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "深圳")) : ("深圳")), "html", null, true);
        echo "</span>
        <i class=\"sprits\"></i>
    </div>
    <div class=\"title\">苗苗儿推</div>
    <div class=\"message\">
        <a href=\"mailto:email 1017769144@qq.com\"><i class=\"sprits\"></i></a>
    </div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div id=\"slider1_container\" style=\"position: relative; margin: 0 auto;top: 0px; left: 0px; width: 750px; height: 320px; overflow: hidden;\">
        <!-- Slides Container -->
        <div u=\"slides\" style=\"cursor: move; position: absolute; left: 0px; top: 0px; width: 750px; height: 320px; overflow: hidden;\">
            ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : $this->getContext($context, "banners")));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 17
            echo "                <div>
                    <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["banner"], "link", array()), "html", null, true);
            echo "\"> <img u=\"image\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["banner"], "pic", array()), "html", null, true);
            echo "\" /></a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "            <div>
                <a href=\"#\"> <img u=\"image\" src=\"/static/home/images/banner1.png\" /></a>
            </div>
            <div>
                <a href=\"#\"> <img u=\"image\" src=\"/static/home/images/banner2.png\" /></a>
            </div>
        </div>
        <div u=\"navigator\" class=\"jssorb21\" style=\"bottom: 26px; right: 6px;\">
            <!-- bullet navigator item prototype -->
            <div u=\"prototype\"></div>
        </div>
    </div>

    <ul class=\"index-menu\">
        <li>
            <a href=\"/home/orderservice/service\">
                <i class=\"sprits menu1\"></i>
                <p>预约上门</p>
            </a>
        </li>

        <li>
            <a href=\"/home/store/index\">
                <i class=\"sprits menu2\"></i>
                <p>儿推馆</p>
            </a>
        </li>

        <li>
            <a href=\"/home/store/promoStore\">
                <i class=\"sprits menu3\"></i>
                <p>优惠信息</p>
            </a>
        </li>

        <li>
            <a href=\"/home/health/index\">
                <i class=\"sprits menu4\"></i>
                <p>养生知识</p>
            </a>
        </li>
    </ul>

    <div class=\"box-title\">
        <p>猜你喜欢</p>
    </div>
    <div class=\"goods-list-box\">
        <ul class=\"goods-list-ul\">
            ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 70
            echo "                <li>
                    <a href=\"/home/store/storeDetail/id/";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "id", array()), "html", null, true);
            echo ".html\">
                        <div class=\"goods-img-box\">
                            <img src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                            ";
            // line 75
            echo "                        </div>
                        <div class=\"goods-inf-con\">
                            <div class=\"goods-name\">
                                ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "storeName", array()), "html", null, true);
            echo "
                            </div>
                            <p class=\"goods-jianjie\">[";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "name", array()), "html", null, true);
            echo "]";
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "services", array()), "html", null, true);
            echo "</p>
                            <div class=\"goods-score\">
                                <div class=\"score-start sprits\">
                                    <div data-score=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "score", array()), "html", null, true);
            echo "\" style=\"width:";
            echo twig_escape_filter($this->env, ($this->getAttribute($context["store"], "score", array()) * 10), "html", null, true);
            echo "%\" class=\"current-score sprits\"></div>
                                </div>
                                <span class=\"comment-count\">";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "commentNums", array()), "html", null, true);
            echo "评价</span>
                            </div>

                            <div class=\"distance\">";
            // line 88
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
        // line 93
        echo "    </div>
";
    }

    // line 95
    public function block_script($context, array $blocks = array())
    {
        // line 96
        echo "    <script src=\"http://api.map.baidu.com/api?v=2&ak=REAZ3A4MUALZ78fO1jl7Gnx1\"></script>
    <script src=\"/static/Js/mobile.js\"></script>
    <script src=\"/static/Js/pgwCookie.js\"></script>
    <script>
        \$(function () {
            var bm = new BmapPos('REAZ3A4MUALZ78fO1jl7Gnx1', handlePos);
            bm.init();
        });
        function handlePos(res) {
            if (res.status === 0) {
                //成功
                var city = res.result.addressComponent.city;
                var lng = res.result.location.lng;
                var lat = res.result.location.lat;
                \$.pgwCookie({name: 'pos_city', city: city, path: '/'});
                \$.pgwCookie({name: 'pos_location', json: true, value: {lng: lng, lat: lat}, path: '/'});
                \$.pgwCookie({name: 'pos_address', value: res.result.formatted_address, path: '/'});
        ";
        // line 114
        echo "                }
            }
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 114,  190 => 96,  187 => 95,  182 => 93,  171 => 88,  165 => 85,  158 => 83,  150 => 80,  145 => 78,  140 => 75,  136 => 73,  131 => 71,  128 => 70,  124 => 69,  74 => 21,  63 => 18,  60 => 17,  56 => 16,  51 => 13,  48 => 12,  36 => 4,  33 => 3,  30 => 2,  11 => 1,);
    }
}
