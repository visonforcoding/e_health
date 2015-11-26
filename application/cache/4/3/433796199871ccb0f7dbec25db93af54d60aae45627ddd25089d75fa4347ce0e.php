<?php

/* home/orderservice/service.twig */
class __TwigTemplate_433796199871ccb0f7dbec25db93af54d60aae45627ddd25089d75fa4347ce0e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/service.twig", 2);
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
        echo "预约上门服务";
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
    <div class=\"title\">预约上门服务</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"shop-location\">
        <a href=\"/home/map/getPos.html\">
            <i class=\"sprits location\"></i>
            <p>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["pos_address"]) ? $context["pos_address"] : $this->getContext($context, "pos_address")), "html", null, true);
        echo "</p>
            <i class=\"sprits go-next\"></i>
        </a>
    </div>

    <div class=\"goods-kinds\">
        <ul class=\"goods-kinds-ul shangmen\">
            <li data-kinds=\"all-kinds\">
                <a href=\"javascript:;\">
                    <div class=\"all-kinds\">
                        排序
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li class=\"current\">
                <a href=\"/home/orderservice/service.html\">
                    <div class=\"all-city\">
                        选项目
                    </div>
                </a>
            </li>
            <li>
                <a href=\"/home/orderservice/choiceStore.html\">
                    <div class=\"zhineng\">
                        选店铺
                    </div>
                </a>
            </li>
            <li>
                <a href=\"/home/orderservice/choiceEngineer\" class=\"nob\">
                    <div class=\"zhineng\">
                        选技师
                    </div>
                </a>
            </li>
        </ul>

        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"/home/orderservice/service/type/1\">价格由低到高</a>
                </li>
                <li>
                    <a href=\"/home/orderservice/service/type/2\">价格由高到低</a>
                </li>
                <li>
                    <a href=\"/home/orderservice/service/type/3\">时间由短到长</a>
                </li>
                <li>
                    <a href=\"/home/orderservice/service/type/4\">时间由长到短</a>
                </li>
            </ol>
        </div>
    </div>
    <div class=\"goods-list-box\">
        <ul class=\"options-list-ul\">
            ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 74
            echo "                <li>
                    <a href=\"/home/orderservice/serviceDetail/id/";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\">
                        <div class=\"options-picture\">
                            <img src=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"options-inf\">
                            <div class=\"options-name\">
                                <p>";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</p>
                                <span>￥";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "</span>
                            </div>

                            <div class=\"options-time\">
                                <i class=\"sprits\"></i>";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "stime", array()), "html", null, true);
            echo "分钟
                            </div>
                            <div class=\"options-text\">
                                <p>";
            // line 89
            echo twig_escape_filter($this->env, twig_slice($this->env, strip_tags($this->getAttribute($context["service"], "efficacy", array())), 0, 36), "html", null, true);
            echo "....</p>
                            </div>
                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "        </ul>
    </div>
";
    }

    // line 98
    public function block_script($context, array $blocks = array())
    {
        // line 99
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);

            var selectKinds = function () {
                var \$selectHandle = \$(\".goods-kinds-ul li\"),
                        _target = \"\",
                        \$showOption = \$(\".select-kinds-layer\");
                \$selectHandle.on(\"click\", function () {
                    if (!\$(this).hasClass(\"current\") && \$(this).index() == 0) {
                        \$(this).addClass(\"current\");
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
        return "home/orderservice/service.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 99,  172 => 98,  166 => 95,  154 => 89,  148 => 86,  141 => 82,  137 => 81,  130 => 77,  125 => 75,  122 => 74,  118 => 73,  58 => 16,  53 => 13,  50 => 12,  40 => 5,  37 => 4,  31 => 3,  11 => 2,);
    }
}
