<?php

/* shop/user/serviceArea.twig */
class __TwigTemplate_cd0b9508d3f808d97cd641df1cbb28da9f8fbc7be31eef6dc3643aca9e01e32a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/user/serviceArea.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_bread_top"] = "工作中心";
        // line 3
        $context["page_bread_sub"] = "服务区域管理";
        // line 4
        $context["page_header_title"] = "服务区域管理";
        // line 5
        $context["page_tag"] = "shop_user_serviceArea";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_static($context, array $blocks = array())
    {
        // line 7
        echo "\t<style>
\t     #list ul {list-style:none;margin:0px}
\t      #list ul li {float:left;width:80px;} 

\t</style>
";
    }

    // line 13
    public function block_main($context, array $blocks = array())
    {
        // line 14
        echo "\t<article>
\t\t<section>
\t\t\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["areaData"]) ? $context["areaData"] : $this->getContext($context, "areaData")));
        foreach ($context['_seq'] as $context["key"] => $context["city"]) {
            // line 17
            echo "\t\t    <header><h3>";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</h3></header>
\t\t\t<article>
\t\t\t    <div class=\"example\" contenteditable=\"true\">
\t\t\t      <div class=\"panel\">
\t\t\t      \t";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["city"]);
            foreach ($context['_seq'] as $context["k1"] => $context["district"]) {
                // line 22
                echo "\t\t\t        <div class=\"panel-heading\">";
                echo twig_escape_filter($this->env, $context["k1"], "html", null, true);
                echo "   <button style='float:right;cursor:pointer;margin-left:10px;' onClick='javascript:window.location.href=\"/shop/user/editArea?area=";
                echo twig_escape_filter($this->env, $context["k1"], "html", null, true);
                echo "&type=edit\"' class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-pencil\"></i> 修改</button>

\t\t\t        <button style='float:right;cursor:pointer;margin-left:10px;' onClick='javascript:window.location.href=\"/shop/user/editArea?area=";
                // line 24
                echo twig_escape_filter($this->env, $context["k1"], "html", null, true);
                echo "&type=del\"' class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-trash\">删除</i> </button>

\t\t\t        </div>
\t\t\t        <div class=\"panel-body\" id='list'>
\t\t\t\t        <ul >
\t\t\t\t        \t";
                // line 29
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["district"]);
                foreach ($context['_seq'] as $context["k2"] => $context["area"]) {
                    // line 30
                    echo "\t\t\t\t        \t<li>";
                    echo twig_escape_filter($this->env, $context["area"], "html", null, true);
                    echo "</li>
\t\t\t\t            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['k2'], $context['area'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                echo "\t\t\t\t        </ul>
\t\t\t    \t</div>
\t\t\t       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k1'], $context['district'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t      </div>
\t\t\t    </div>
\t\t    </article>
\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "\t\t    <button onClick='javascript:window.location.href=\"/shop/user/editArea\"' class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-plus-sign\"></i> 添加</button>
\t\t</section>
\t<article>
\t
";
    }

    // line 44
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "shop/user/serviceArea.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 44,  120 => 39,  111 => 35,  103 => 32,  94 => 30,  90 => 29,  82 => 24,  74 => 22,  70 => 21,  62 => 17,  58 => 16,  54 => 14,  51 => 13,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
