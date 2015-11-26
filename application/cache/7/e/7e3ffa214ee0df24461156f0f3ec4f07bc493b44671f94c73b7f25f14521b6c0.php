<?php

/* shop/user/message.twig */
class __TwigTemplate_7e3ffa214ee0df24461156f0f3ec4f07bc493b44671f94c73b7f25f14521b6c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/user/message.twig", 1);
        $this->blocks = array(
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
        $context["page_bread_sub"] = "消息中心";
        // line 4
        $context["page_header_title"] = "消息中心";
        // line 5
        $context["page_tag"] = "shop_user_message";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "\t<div class=\"list list-condensed\" style=\"width:90%\">
\t\t<header>
\t          <div class=\"pull-right\">
\t            <div class=\"btn-group\" data-toggle=\"buttons-radio\">
\t              <button type=\"button\" class=\"btn btn-default active\"><i class=\"icon-th-list\"></i></button>
\t              <button type=\"button\" class=\"btn btn-default\"><i class=\"icon-th\"></i></button>
\t              <button type=\"button\" class=\"btn btn-default\"><i class=\"icon-th-large\"></i></button>
\t            </div>
\t          </div>
\t          <h3><i class=\"icon-list-ul icon-border-circle\"></i> 我的消息&nbsp;</h3>
\t    </header>
\t\t<div class=\"list\">
\t\t  <section class=\"items items-hover\">
\t\t  \t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["msgs"]) ? $context["msgs"] : $this->getContext($context, "msgs")));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 21
            echo "\t          <div class=\"item\">
\t            <div class=\"item-heading\">
\t              <div class=\"pull-right\">";
            // line 23
            if (($this->getAttribute($context["msg"], "isRead", array()) == "0")) {
                echo "<a class='edit' id='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["msg"], "id", array()), "html", null, true);
                echo "' href=\"javascript:void(0)\"><i class=\"icon-pencil\"></i> 标记为已读</a> ";
            }
            echo "</div>
\t              <h4>";
            // line 24
            if (($this->getAttribute($context["msg"], "isRead", array()) == "0")) {
                echo " <span class=\"label label-success\">NEW</span>&nbsp; ";
            }
            echo "<a href=\"###\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["msg"], "title", array()), "html", null, true);
            echo "</a></h4>
\t            </div>
\t            <div class=\"item-content\">
\t                ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["msg"], "content", array()), "html", null, true);
            echo "
\t            </div>
\t            <div class=\"item-footer\">
\t              <span class=\"text-muted\">";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["msg"], "ctime", array()), "html", null, true);
            echo "</span>
\t            </div>
\t          </div>
\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t       </section>
\t        <footer>
\t        <ul class=\"pager\">
\t          ";
        // line 37
        echo (isset($context["pageShow"]) ? $context["pageShow"] : $this->getContext($context, "pageShow"));
        echo "
\t             <!--<li class=\"previous\"><a href=\"#\">»上一页 </a> </li>
\t            <li><a href=\"#\">1</a></li>
\t            <li><a href=\"#\">...</a></li>
\t            <li><a href=\"#\">6</a></li>
\t            <li class=\"active\"><a href=\"#\">7</a></li>
\t            <li><a href=\"#\">8</a></li>
\t            <li><a href=\"#\">9</a></li>
\t            <li><a href=\"#\">...</a></li>
\t            <li><a href=\"#\">12</a></li>
\t            <li class=\"next\"><a href=\"#\">下一页 »</a></li>-->
\t          </ul>
\t\t\t\t

\t        </footer>
\t    </div>
\t</div>
";
    }

    // line 55
    public function block_script($context, array $blocks = array())
    {
        // line 56
        echo "\t<script>
\t\t\$(function(){
\t\t\t\$(\".edit\").click(function(){
\t\t\t\tvar obj=\$(this);
\t\t\t\tvar id=\$(this).attr('id');
\t\t\t\t\$.ajax({
\t\t\t\t\turl: '/shop/user/setRead',
\t\t\t\t\ttype: 'POST',
\t\t\t\t\tdata: {id : id},
\t\t\t\t\tsuccess:function(msg){
\t\t\t\t\t\tif(msg.status=='1'){
\t\t\t\t\t\t\tobj.hide();
\t\t\t\t\t\t\tobj.parent().parent().find('span').hide();
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\talert(msg.msg);
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t})
\t\t\t\t
\t\t\t});

\t    });
    </script>
";
    }

    public function getTemplateName()
    {
        return "shop/user/message.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 56,  125 => 55,  103 => 37,  98 => 34,  88 => 30,  82 => 27,  72 => 24,  64 => 23,  60 => 21,  56 => 20,  41 => 7,  38 => 6,  34 => 1,  32 => 5,  30 => 4,  28 => 3,  26 => 2,  11 => 1,);
    }
}
