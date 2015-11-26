<?php

/* home/store/comment.twig */
class __TwigTemplate_7d70f4853e32be15c940c34d8d166220d75d6fbd10d666aa06987c5200cd08bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/store/comment.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'static' => array($this, 'block_static'),
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
        echo "预约店面详情";
    }

    // line 3
    public function block_static($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        .comment-tag li{
            cursor: pointer;
        }
        .comment-tag li:hover{
            background: #FF7725;
            color: white;
        }
    </style>
";
    }

    // line 14
    public function block_header($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">点评</div>
";
    }

    // line 22
    public function block_main($context, array $blocks = array())
    {
        // line 23
        echo "    <div class=\"comment-box\">
        <div class=\"zongti-pingjia\">
            <div class=\"zongti-pingjia-left\">
                <span>总体评价：</span>
                <ul class=\"comment-start\">
                    <li class=\"current\"></li>
                    <li class=\"current\"></li>
                    <li class=\"current\"></li>
                    <li class=\"current\"></li>
                    <li class=\"current\"></li>
                </ul>
            </div>
            <span class=\"comment-level\">惊喜</span>
            <input name=\"score\" type=\"hidden\" value=\"10\"/>
        </div>
        <div class=\"comment-tag\">
            <ul>
                ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comment_desc"]) ? $context["comment_desc"] : $this->getContext($context, "comment_desc")));
        foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
            // line 41
            echo "                    <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["desc"], "desc", array()), "html", null, true);
            echo "</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "            </ul>
        </div>
        <div class=\"comment-textaera\">
            <textarea name=\"content\" class=\"content\" placeholder=\"亲，我们的服务您满意吗？环境怎么样？技术怎么样？\"></textarea>
        </div>

        <a href=\"javascript:;\" class=\"submit-comment\">提交</a>
    </div>
    <div class=\"add-tag-layer\">
        <div class=\"add-tag-con\">
            <input type=\"text\" placeholder=\"请输入您的标签\">
            <a href=\"javascript:;\" class=\"save-tag\">添&nbsp;&nbsp;&nbsp;&nbsp;加</a>
            <div class=\"close-bnt sprits\"></div>
        </div>
    </div>
";
    }

    // line 59
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 61
    public function block_script($context, array $blocks = array())
    {
        // line 62
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var commentStart = function () {
                var commentLevel = [\"极差\", \"失望\", \"一般\", \"满意\", \"惊喜\"];

                var \$stratLi = \$(\".comment-start li\");
                var _index = \"\";
                var \$levelText = \$(\".comment-level\");

                \$stratLi.on(\"click\", function () {
                    _index = \$(this).index();
                    \$stratLi.removeClass(\"current\");
                    for (var i = 0; i <= _index; i++) {
                        \$stratLi.eq(i).addClass(\"current\");
                    }
                    score = (_index + 1) * 2;
                    \$(\"input[name='score']\").val(score);
                    \$levelText.text(commentLevel[_index]);

                });
            }();
            var textareaFocus = function () {

                \$(\".comment-textaera textarea\").focus(function () {
                    \$(this).addClass(\"focus\");
                    \$(this).parent().addClass(\"focus\");

                });

                \$(\".comment-textaera textarea\").blur(function () {
                    \$(this).removeClass(\"focus\");
                    \$(this).parent().removeClass(\"focus\");

                });

            }();
            //
            \$('.comment-tag li').click(function () {
                var content = \$(this).text();
                \$('.comment-textaera textarea').val(content);
            });
            //提交评论
            \$('.submit-comment').click(function () {
                var score = \$(\"input[name='score']\").val();
                var content = \$(\"textarea.content\").val();
                var sid = '";
        // line 108
        echo twig_escape_filter($this->env, (isset($context["sid"]) ? $context["sid"] : $this->getContext($context, "sid")), "html", null, true);
        echo "';
                \$.ajax({
                    type: 'post',
                    data: {'score': score, 'content': content, 'sid': sid},
                    dataType: 'json',
                    success: function (res) {
                        alert(res.msg);
                        window.location.href = res.url;
                    }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/store/comment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 108,  130 => 62,  127 => 61,  122 => 59,  103 => 43,  94 => 41,  90 => 40,  71 => 23,  68 => 22,  58 => 15,  55 => 14,  42 => 4,  39 => 3,  33 => 2,  11 => 1,);
    }
}
