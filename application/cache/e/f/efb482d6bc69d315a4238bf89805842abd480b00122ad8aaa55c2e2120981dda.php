<?php

/* home/orderservice/choice_engineer.twig */
class __TwigTemplate_efb482d6bc69d315a4238bf89805842abd480b00122ad8aaa55c2e2120981dda extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/choice_engineer.twig", 1);
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
                <a href=\"/home/orderservice/service/service_id/";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["sid"]) ? $context["sid"] : $this->getContext($context, "sid")), "html", null, true);
        echo "\">
                    <div class=\"all-city\">
                        选项目
                    </div>
                </a>
            </li>
            <li>
                <a href=\"/home/orderservice/choiceStore/service_id/";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["sid"]) ? $context["sid"] : $this->getContext($context, "sid")), "html", null, true);
        echo "\">
                    <div class=\"zhineng\">
                        选店铺
                    </div>
                </a>
            </li>
            <li class=\"current\">
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
                    <a href=\"javascript:;\">按评价</a>
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


    <div class=\"goods-list-box\">

        <ul class=\"goods-list-ul\">
            ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["engineers"]) ? $context["engineers"] : $this->getContext($context, "engineers")));
        foreach ($context['_seq'] as $context["_key"] => $context["engineer"]) {
            // line 72
            echo "                <li>
                    <a href=\"/home/orderservice/engineerDetail/eid/";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["engineer"], "id", array()), "html", null, true);
            echo "/sid/";
            echo twig_escape_filter($this->env, (isset($context["sid"]) ? $context["sid"] : $this->getContext($context, "sid")), "html", null, true);
            echo "\">
                        <div class=\"goods-img-box\">
                            <img src=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($context["engineer"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
";
            // line 77
            echo "                        </div>
                        <div class=\"goods-inf-con\">
                            <div class=\"jishi-inf\">
                                <p class=\"jishi-name\">";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($context["engineer"], "name", array()), "html", null, true);
            echo "</p>
                                <div class=\"jishi-inf-box\">
                                    <p class=\"jishi-zizhi\"><span>男</span>执业医师</p>
                                    <p class=\"jishi-jianjie\">";
            // line 83
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["engineer"], "desc", array()), 0, 30), "html", null, true);
            echo "...</p>
                                </div>
                            </div>

                            <div class=\"jishi-coder\">
                                <span class=\"comment-count\">";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["engineer"], "commentNums", array()), "html", null, true);
            echo "评价</span>
                                <div class=\"score-start sprits\">
                                    <div class=\"current-score sprits\"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['engineer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "        </ul>
    </div>
";
    }

    // line 100
    public function block_script($context, array $blocks = array())
    {
        // line 101
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
        return "home/orderservice/choice_engineer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 101,  181 => 100,  175 => 97,  160 => 88,  152 => 83,  146 => 80,  141 => 77,  137 => 75,  130 => 73,  127 => 72,  123 => 71,  86 => 37,  76 => 30,  58 => 15,  53 => 12,  50 => 11,  40 => 4,  37 => 3,  31 => 2,  11 => 1,);
    }
}
