<?php

/* home/orderservice/choice_store.twig */
class __TwigTemplate_3b59c954e3dcab37d2a5d2a5dea248baeb46c6af1bca217ba2cb356c8c0b0205 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/choice_store.twig", 1);
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "预约上门服务";
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
    <div class=\"title\">预约上门服务</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-location\">
        <a href=\"/home/map/getPos.html\">
            <i class=\"sprits location\"></i>
            <p>";
        // line 15
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
            <li>
                <a href=\"/home/orderservice/service\">
                    <div class=\"all-city\">
                        选项目
                    </div>
                </a>
            </li>
            <li class=\"current\">
                <a href=\"/home/orderservice/choiceStore/service_id/";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id")), "html", null, true);
        echo "\">
                    <div class=\"zhineng\">
                        选店铺
                    </div>
                </a>
            </li>
            <li>
                ";
        // line 45
        if ( !twig_test_empty((isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id")))) {
            // line 46
            echo "                    <a href=\"/home/orderservice/choiceEngineer/service_id/";
            echo twig_escape_filter($this->env, (isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id")), "html", null, true);
            echo "\" class=\"nob\">
                    ";
        } else {
            // line 48
            echo "                        <a href=\"/home/orderservice/choiceEngineer\" class=\"nob\">
                        ";
        }
        // line 50
        echo "                        <div class=\"zhineng\">
                            选技师
                        </div>
                    </a>
            </li>
        </ul>

        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\">按评分</a>
                </li>
                <li>
                    <a href=\"javascript:;\">按距离</a>
                </li>
                <li>
                    <a href=\"javascript:;\">按人气</a>
                </li>
            </ol>
        </div>
    </div>


    <ul class=\"shangmen-shop\">
        ";
        // line 74
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 75
            echo "            <li>
                <a href=\"/home/orderservice/orderHome/id/";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "id", array()), "html", null, true);
            echo "/sid/";
            echo twig_escape_filter($this->env, (isset($context["service_id"]) ? $context["service_id"] : $this->getContext($context, "service_id")), "html", null, true);
            echo "\">
                    <div class=\"shangmen-shop-img\">
                        <img src=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                    </div>
                    <div class=\"shangmen-shop-inf\">
                        <div class=\"shangmen-shop-name\">
                            <p>";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "storeName", array()), "html", null, true);
            echo "</p>
                        </div>
                        <div class=\"shangmen-shop-server\">
                            <ol>
                                ";
            // line 86
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["store"], "services", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
                // line 87
                echo "                                    <li>
                                        <span>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
                echo "</span><em>￥";
                echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
                echo "</em>
                                    </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "                            </ol>
                        </div>
                        <div class=\"shangmen-shop-code\">
                            <p>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["store"], "commentNums", array()), "html", null, true);
            echo "人评论</p>
                            <div class=\"shangmen-comment-code sprits\">
                                <div class=\"shangmen-current-code sprits\"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "    </ul>
";
    }

    // line 105
    public function block_script($context, array $blocks = array())
    {
        // line 106
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
                });
            }();
        });

    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/choice_store.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 106,  203 => 105,  198 => 103,  183 => 94,  178 => 91,  167 => 88,  164 => 87,  160 => 86,  153 => 82,  146 => 78,  139 => 76,  136 => 75,  132 => 74,  106 => 50,  102 => 48,  96 => 46,  94 => 45,  84 => 38,  58 => 15,  53 => 12,  50 => 11,  40 => 4,  37 => 3,  31 => 2,  11 => 1,);
    }
}
