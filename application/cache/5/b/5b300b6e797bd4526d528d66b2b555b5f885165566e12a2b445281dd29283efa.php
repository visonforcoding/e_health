<?php

/* home/store/view_comment.twig */
class __TwigTemplate_5b300b6e797bd4526d528d66b2b555b5f885165566e12a2b445281dd29283efa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/view_comment.twig", 2);
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
        echo "查看评论";
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
    <div class=\"title\">查看点评</div>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"goods-kinds  view-comment\">
        <ul class=\"goods-kinds-ul\">
            <li data-kinds=\"all-kinds\">
                <a href=\"javascript:;\">
                    <div class=\"all-kinds\">
                        全部星级
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
            <li data-kinds=\"all-zhineng\">
                <a href=\"javascript:;\" class=\"nob\">
                    <div class=\"zhineng\">
                        默认排序
                        <i class=\"sprits\"></i>
                    </div>
                </a>
            </li>
        </ul>

        <div class=\"select-kinds-layer\" data-kinds=\"all-kinds\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\">全部星级</a>
                </li>
                <li>
                    <a href=\"javascript:;\">五星级点评</a>
                </li>
                <li>
                    <a href=\"javascript:;\">四星级点评</a>
                </li>
                <li>
                    <a href=\"javascript:;\">三星级点评</a>
                </li>
                <li>
                    <a href=\"javascript:;\">二星级点评</a>
                </li>
                <li>
                    <a href=\"javascript:;\">一星级点评</a>
                </li>
            </ol>
        </div>

        <div class=\"select-kinds-layer\" data-kinds=\"all-zhineng\">
            <ol class=\"select-condition\">
                <li class=\"current\">
                    <a href=\"javascript:;\">默认排序</a>
                </li>
                <li>
                    <a href=\"javascript:;\">时间排序</a>
                </li>
            </ol>
        </div>
    </div>
    ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 68
            echo "        <div class=\"shop-detail-box view-comment\">
            <div class=\"comment-user-inf\">
                <div class=\"user-inf-img\">
                    <img src=\"";
            // line 71
            echo twig_escape_filter($this->env, (($this->getAttribute($context["comment"], "avatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["comment"], "avatar", array()), "/static/home/images/touxiang.png")) : ("/static/home/images/touxiang.png")), "html", null, true);
            echo "\" alt=\"\">
                </div>
                <div class=\"user-inf-text\">
                    <p>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "tel", array()), "html", null, true);
            echo "</p>
                    <div class=\"goods-score\">
                        <div class=\"score-start sprits\">
                            <div class=\"current-score sprits\"></div>
                        </div>
                        <span class=\"comment-count\">";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "ctime", array()), "html", null, true);
            echo "</span>
                    </div>
                </div>
            </div>
            <div class=\"shop-comment-text\">
                <p>";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "desc", array()), "html", null, true);
            echo "</p>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "

";
    }

    // line 91
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 93
    public function block_script($context, array $blocks = array())
    {
        // line 94
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var selectKinds = function () {
                var \$selectHandle = \$(\".goods-kinds-ul li\"),
                        _target = \"\",
                        \$showOption = \$(\".select-kinds-layer\");
                \$selectHandle.on(\"click\", function () {
                    if (!\$(this).hasClass(\"current\")) {
                        \$(this).addClass(\"current\").siblings().removeClass(\"current\");
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
        })

    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/view_comment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 94,  162 => 93,  157 => 91,  151 => 88,  141 => 84,  133 => 79,  125 => 74,  119 => 71,  114 => 68,  110 => 67,  54 => 13,  51 => 12,  41 => 5,  38 => 4,  32 => 3,  11 => 2,);
    }
}
