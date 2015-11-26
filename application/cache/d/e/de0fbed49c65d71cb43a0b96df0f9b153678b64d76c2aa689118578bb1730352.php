<?php

/* home/health/health_detail.twig */
class __TwigTemplate_de0fbed49c65d71cb43a0b96df0f9b153678b64d76c2aa689118578bb1730352 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/health/health_detail.twig", 2);
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
    <div class=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "title", array()), "html", null, true);
        echo "</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"yangsheng-detail-box\">
        <div class=\"yangsheng-contant\">
            <h2 class=\"yangsheng-title\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "title", array()), "html", null, true);
        echo "</h2>
            <p class=\"yangsheng-inf\">
            发表日期：<span>";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "ctime", array()), "Y-m-d"), "html", null, true);
        echo "</span> | 来源 ：<span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "from", array()), "html", null, true);
        echo "</span> | 点击数：<span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "hit", array()), "html", null, true);
        echo "</span>次</p>
            <div class=\"yangsheng-text\">
                <p>";
        // line 19
        echo $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "detail", array());
        echo "</p>
            </div>
        </div>
        <div class=\"comment-yangsheng\">
            <p>我要留言</p>
            <form action=\"#\">
                <textarea id=\"desc\" name=\"comment\"></textarea>
                <input id=\"doComment\" type=\"button\" value=\"发送\">
            </form>
        </div>
        <div class=\"hot-comment-yangsheng\">
            <p class=\"hot-comment-title\">热门评论</p>
            <ul class=\"jishi-comment-list\">
                ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 33
            echo "                    <li>
                        <div class=\"commenter-inf\">
                            <div class=\"commenter-img\">
                                <img src=\"";
            // line 36
            echo twig_escape_filter($this->env, (($this->getAttribute($context["comment"], "avatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["comment"], "avatar", array()), "/static/home/images/touxiang.png")) : ("/static/home/images/touxiang.png")), "html", null, true);
            echo "\" alt=\"\">
                            </div>
                            <div class=\"commenter-inf-text\">
                                <p class=\"commenter-name\">";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "tel", array()), "html", null, true);
            echo "</p>
                            </div>
                            <div class=\"commented-time\">
                                ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "ctime", array()), "html", null, true);
            echo "
                            </div>
                        </div>
                        <div class=\"commented-text\">
                            <p>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "desc", array()), "html", null, true);
            echo "</p>
                        </div>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "            </ul>
        </div>
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
        \$(function(){
           \$('#doComment').click(function(){
               var id = ";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["health"]) ? $context["health"] : $this->getContext($context, "health")), "id", array()), "html", null, true);
        echo ";
               var desc = \$('#desc').val();
               \$.ajax({
                   url:'/home/health/doComment',
                   type:'post',
                   data:{'id':id,'desc':desc},
                   dataType:'json',
                   success:function(res){
                       alert(res.msg);
                       if(res.url != undefined){
                           window.location.href = res.url;
                       }else{
                           if(res.status===true){
                               window.location.reload();
                           }
                       }
                   }
               }) 
           })
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "home/health/health_detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 62,  145 => 59,  142 => 58,  137 => 56,  129 => 50,  119 => 46,  112 => 42,  106 => 39,  100 => 36,  95 => 33,  91 => 32,  75 => 19,  66 => 17,  61 => 15,  57 => 13,  54 => 12,  48 => 10,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
