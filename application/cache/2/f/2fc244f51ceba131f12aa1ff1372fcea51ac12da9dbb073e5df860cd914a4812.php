<?php

/* home/orderservice/engineer_detail_1.twig */
class __TwigTemplate_2fc244f51ceba131f12aa1ff1372fcea51ac12da9dbb073e5df860cd914a4812 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/engineer_detail_1.twig", 1);
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
        echo "项目详情";
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
    <div class=\"title\">技师-";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "name", array()), "html", null, true);
        echo "</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-detail-box\">
        <div class=\"order-server-option\">
            <div class=\"order-option-img\">
                <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "cover", array()), "html", null, true);
        echo "\" alt=\"\">
            </div>
            <div class=\"detail-jishi-inf\">
                <div class=\"detail-jishi-name\">";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "name", array()), "html", null, true);
        echo "</div>
                <div class=\"detail-jishi-zhizhao\"><span>";
        // line 19
        if (($this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "sex", array()) == "1")) {
            echo "男";
        } else {
            echo "女";
        }
        echo "</span><span>职业医师</span></div>
                <div class=\"detail-jishi-code sprits\">
                    <div class=\"detail-code-length sprits\"></div>
                </div>
            </div>
        </div>

        <div class=\"detail-jishi-jianjie\">
            <h4>【简介】</h4>
            <p>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "desc", array()), "html", null, true);
        echo "</p>
            <h4>【擅长】</h4>
            <p>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "skilled", array()), "html", null, true);
        echo "</p>
            <h4>【服务宣言】</h4>
            <p>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "manifesto", array()), "html", null, true);
        echo "</p>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"jishi-server-list\">
            <h4>【服务条目】</h4>
            <ul class=\"server-ul-list\">
                ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : $this->getContext($context, "services")));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 41
            echo "                    <li>
                        <div class=\"server-list-name\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "name", array()), "html", null, true);
            echo "</div>
                        <div class=\"server-list-time\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "stime", array()), "html", null, true);
            echo "分钟</div>
                        <div class=\"server-list-price\">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "price", array()), "html", null, true);
            echo "元</div>
                        <a href=\"/home/orderservice/submitOrder/eid/";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "id", array()), "html", null, true);
            echo "/sid/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["service"], "id", array()), "html", null, true);
            echo "\" class=\"server-list-yuyue\">预约</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "            </ul>
        </div>
    </div>
    <div class=\"shop-detail-box\">
        <div class=\"jishi-server-list\">
            <h4>【用户评论】</h4>
            <ul class=\"jishi-comment-list\">
                ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 56
            echo "                    <li>
                        <div class=\"commenter-inf\">
                            <div class=\"commenter-img\">
                                <img src=\"";
            // line 59
            echo twig_escape_filter($this->env, (($this->getAttribute($context["comment"], "avatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["comment"], "avatar", array()), "/static/home/images/touxiang.png")) : ("/static/home/images/touxiang.png")), "html", null, true);
            echo "\" alt=\"\">
                            </div>
                            <div class=\"commenter-inf-text\">
                                <p class=\"commenter-name\">";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "tel", array()), "html", null, true);
            echo "</p>
                                <div class=\"detail-jishi-code sprits\">
                                    <div class=\"detail-code-length sprits\"></div>
                                </div>
                            </div>
                            <div class=\"commented-time\">
                                ";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "ctime", array()), "html", null, true);
            echo "
                            </div>
                        </div>
                        <div class=\"commented-text\">
                            <p>";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "desc", array()), "html", null, true);
            echo "</p>
                        </div>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "            </ul>
        </div>
        ";
        // line 78
        if (($this->getAttribute((isset($context["comment_info"]) ? $context["comment_info"] : $this->getContext($context, "comment_info")), "totalnum", array()) > 2)) {
            // line 79
            echo "            <a href=\"/home/store/viewComment?type=2&id=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "id", array()), "html", null, true);
            echo "\" class=\"view-all-comment\">
                <div>查看所有<i class=\"sprits\"></i></div>
            </a>
        ";
        }
        // line 83
        echo "    </div>
";
    }

    // line 85
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 87
    public function block_script($context, array $blocks = array())
    {
        // line 88
        echo "    <script>
        \$(function () {
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/engineer_detail_1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 88,  213 => 87,  208 => 85,  203 => 83,  195 => 79,  193 => 78,  189 => 76,  179 => 72,  172 => 68,  163 => 62,  157 => 59,  152 => 56,  148 => 55,  139 => 48,  128 => 45,  124 => 44,  120 => 43,  116 => 42,  113 => 41,  109 => 40,  98 => 32,  93 => 30,  88 => 28,  72 => 19,  68 => 18,  62 => 15,  57 => 12,  54 => 11,  48 => 9,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
