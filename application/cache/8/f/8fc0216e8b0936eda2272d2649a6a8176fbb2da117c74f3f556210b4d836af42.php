<?php

/* home/user/my_collect.twig */
class __TwigTemplate_8fc0216e8b0936eda2272d2649a6a8176fbb2da117c74f3f556210b4d836af42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/my_collect.twig", 2);
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
                <a href=\"/home/user/myCollect.html\" class=\"current\">店铺</a>
            </li>
            <li>
                <a href=\"/home/user/myCollect/type/2.html\">技师</a>
            </li>
        </ul>
    </div>
";
    }

    // line 21
    public function block_main($context, array $blocks = array())
    {
        // line 22
        echo "
    <div class=\"goods-list-box\">

        <ul class=\"goods-list-ul\">
            ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["collects"]) ? $context["collects"] : $this->getContext($context, "collects")));
        foreach ($context['_seq'] as $context["_key"] => $context["collect"]) {
            // line 27
            echo "                <li>
                    <a href=\"/home/store/storeDetail?id=";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "id", array()), "html", null, true);
            echo ".html\">
                        <div class=\"goods-img-box\">
                            <img src=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "cover", array()), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"goods-inf-con\">
                            <div class=\"goods-name\">
                                ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "storeName", array()), "html", null, true);
            echo "
                            </div>
                            <p class=\"goods-jianjie\">[";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "name", array()), "html", null, true);
            echo "]";
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "services", array()), "html", null, true);
            echo "</p>

                            <div class=\"goods-score\">
                                <div class=\"score-start sprits\">
                                    <div class=\"current-score sprits\"></div>
                                </div>
                                <span class=\"comment-count\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["collect"], "commentNums", array()), "html", null, true);
            echo "评价</span>
                            </div>
                            <div class=\"distance\"><0.5km</div>
                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collect'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </ul>
    </div>
";
    }

    // line 52
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 54
    public function block_script($context, array $blocks = array())
    {
        // line 55
        echo "    <script>
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/my_collect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 55,  128 => 54,  123 => 52,  117 => 49,  104 => 42,  93 => 36,  88 => 34,  81 => 30,  76 => 28,  73 => 27,  69 => 26,  63 => 22,  60 => 21,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
