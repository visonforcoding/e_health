<?php

/* home/user/my_collect_jishi.twig */
class __TwigTemplate_cfe343a21264532c7c1fb7cd85e1b39c62ef4352c3c76030968491d44cb5b035 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/my_collect_jishi.twig", 2);
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "我的";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"goback\">
        <a href=\"/home/user/userCenter.html\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"header-center\">
        <ul class=\"shop-tab\">
            <li>
                <a href=\"/home/user/myCollect.html\" >店铺</a>
            </li>
            <li>
                <a href=\"/home/user/myCollect/type/2\" class=\"current\">技师</a>
            </li>
        </ul>
    </div>
";
    }

    // line 21
    public function block_main($context, array $blocks = array())
    {
        // line 22
        echo "    <div class=\"goods-list-box\">
        <ul class=\"goods-list-ul collect-jishi\">
            ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["collects"]) ? $context["collects"] : $this->getContext($context, "collects")));
        foreach ($context['_seq'] as $context["_key"] => $context["collect"]) {
            // line 25
            echo "                <li>
                    <a href=\"jishi-detail.html\">
                        <div class=\"goods-img-box\">
                            <img src=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                            <i class=\"sprits\"></i>
                        </div>
                        <div class=\"goods-inf-con\">
                            <div class=\"jishi-inf\">
                                <p class=\"jishi-name\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "name", array()), "html", null, true);
            echo "</p>
                                <div class=\"jishi-inf-box\">
                                    <p class=\"jishi-zizhi\"><span>";
            // line 35
            if (($this->getAttribute($context["collect"], "sex", array()) == "1")) {
                echo "男";
            } else {
                echo "女";
            }
            echo "</span>执业医师</p>
                                    <p class=\"jishi-jianjie\">";
            // line 36
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["collect"], "desc", array()), 0, 30), "html", null, true);
            echo "</p>
                                </div>
                            </div>

                            <div class=\"jishi-coder\">
                                <span class=\"comment-count\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "commentNums", array()), "html", null, true);
            echo "评价</span>
                                <div class=\"score-start sprits\">
                                    <div class=\"current-score sprits\"></div>
                                </div>
                            </div>
                        </div>
                        <div class=\"collect-jishi-juli\">
                            <i class=\"sprits\"></i>966米
                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collect'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "        </ul>
    </div>
";
    }

    // line 56
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 58
    public function block_script($context, array $blocks = array())
    {
        // line 59
        echo "    <script>
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/my_collect_jishi.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 59,  134 => 58,  129 => 56,  123 => 53,  105 => 41,  97 => 36,  89 => 35,  84 => 33,  76 => 28,  71 => 25,  67 => 24,  63 => 22,  60 => 21,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
