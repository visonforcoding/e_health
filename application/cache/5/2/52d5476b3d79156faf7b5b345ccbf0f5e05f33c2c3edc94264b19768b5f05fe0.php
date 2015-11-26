<?php

/* home/health/health.twig */
class __TwigTemplate_52d5476b3d79156faf7b5b345ccbf0f5e05f33c2c3edc94264b19768b5f05fe0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/health/health.twig", 2);
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
        echo "苗苗儿推-养生知识";
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
    <div class=\"title\">养生知识</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "   <ul class=\"yangsheng-list\">
            ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["healths"]) ? $context["healths"] : $this->getContext($context, "healths")));
        foreach ($context['_seq'] as $context["_key"] => $context["health"]) {
            // line 15
            echo "\t\t<li>
\t\t\t<a href=\"/home/health/healthDetail/id/";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["health"], "id", array()), "html", null, true);
            echo "\">
\t\t\t\t<p class=\"big-p\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["health"], "title", array()), "html", null, true);
            echo "</p>
\t\t\t\t<p class=\"small-p\">";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["health"], "abstract", array()), "html", null, true);
            echo "</p>
";
            // line 20
            echo "\t\t\t</a>
\t\t</li>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['health'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t</ul>
";
    }

    // line 25
    public function block_script($context, array $blocks = array())
    {
        // line 26
        echo "   
";
    }

    public function getTemplateName()
    {
        return "home/health/health.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 26,  88 => 25,  83 => 23,  75 => 20,  71 => 18,  67 => 17,  63 => 16,  60 => 15,  56 => 14,  53 => 13,  50 => 12,  40 => 5,  37 => 4,  31 => 3,  11 => 2,);
    }
}
