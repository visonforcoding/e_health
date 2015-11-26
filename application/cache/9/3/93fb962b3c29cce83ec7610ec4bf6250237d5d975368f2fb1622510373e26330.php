<?php

/* home/user/message.twig */
class __TwigTemplate_93fb962b3c29cce83ec7610ec4bf6250237d5d975368f2fb1622510373e26330 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/message.twig", 2);
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
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">消息</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <ul class=\"yangsheng-list message\">
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 15
            echo "            <li";
            if (($this->getAttribute($context["message"], "isRead", array()) == "1")) {
            } else {
                echo " class=\"new\" ";
            }
            echo " data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "id", array()), "html", null, true);
            echo "\">
                <a href=\"#\">
                    <p class=\"big-p\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "title", array()), "html", null, true);
            echo "<span>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "ctime", array()), "html", null, true);
            echo "</span></p>
                    <p class=\"small-p\">";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "content", array()), "html", null, true);
            echo "</p>
                </a>
               ";
            // line 20
            if (($this->getAttribute($context["message"], "isRead", array()) == "1")) {
            } else {
                echo " <em class=\"new-message\"></em>";
            }
            // line 21
            echo "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </ul>
";
    }

    // line 25
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 27
    public function block_script($context, array $blocks = array())
    {
        // line 28
        echo "    <script>
        \$(function(){
           \$('ul.message li.new').click(function(){
            var id = \$(this).data('id');
            \$this = \$(this);
            \$.ajax({
                url:'/home/user/readMsg',
                type:'post',
                data:{'mid':id},
                dataType:'json',
                success:function(res){
                    if(res.status === true){
                        \$this.find('.new-message').remove();
                    }
                }
            });
           }) ;
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/message.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 28,  105 => 27,  100 => 25,  95 => 23,  88 => 21,  83 => 20,  78 => 18,  72 => 17,  61 => 15,  57 => 14,  54 => 13,  51 => 12,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
