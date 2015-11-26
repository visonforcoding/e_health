<?php

/* home/user/user_center.twig */
class __TwigTemplate_b35e6b739cdb11f9de15bfe0902690b06d7f4feba26939a2efe3a63902f81c58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/user_center.twig", 2);
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
        // line 3
        $context["page_tag"] = "user";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "我的";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">我的</div>
    <div class=\"user-message\">
        <a href=\"/home/user/message.html\">
        <i class=\"sprits\"></i>
        ";
        // line 15
        if (((isset($context["msg_count"]) ? $context["msg_count"] : $this->getContext($context, "msg_count")) > 0)) {
            echo "<em>";
            echo twig_escape_filter($this->env, (isset($context["msg_count"]) ? $context["msg_count"] : $this->getContext($context, "msg_count")), "html", null, true);
            echo "</em>";
        } else {
            echo " ";
        }
        // line 16
        echo "        </a>
    </div>
";
    }

    // line 19
    public function block_main($context, array $blocks = array())
    {
        // line 20
        echo "    <ul class=\"user-center-ul\">
        <li>
            <a href=\"/home/user/userInfo.html\">
                <div class=\"user-center-img\">
                    <img src=\"/static/home/images/touxiang.png\" alt=\"\">
                </div>
                <div class=\"user-cernte-text\">
                    <p class=\"user-name\">";
        // line 27
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nick", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nick", array()), "未设置昵称")) : ("未设置昵称")), "html", null, true);
        echo "</p>
                    <p class=\"user-tel\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "tel", array()), "html", null, true);
        echo "</p>
                </div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>
    </ul>
    <ul class=\"user-center-ul lht\">
        <li>
            <a href=\"/home/order/orderList.html\">
                <i class=\"user-icon sprits order\"></i>
                <div class=\"user-center-text\">我的订单</div>
                <div class=\"user-center-right\">
                    <span>";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["comment_order_count"]) ? $context["comment_order_count"] : $this->getContext($context, "comment_order_count")), "html", null, true);
        echo "单待评价</span>
                </div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>

        <li>
            <a href=\"/home/user/message.html\">
                <i class=\"user-icon sprits message\"></i>
                <div class=\"user-center-text\">消息</div>
                <div class=\"user-center-right\">
                    <span>";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["msg_count"]) ? $context["msg_count"] : $this->getContext($context, "msg_count")), "html", null, true);
        echo "条未读</span>
                </div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>
    </ul>
    <ul class=\"user-center-ul lht\">
        <li>
            <a href=\"/home/user/myFavorable.html\">
                <i class=\"user-icon sprits ticket\"></i>
                <div class=\"user-center-text\">优惠劵</div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>

        <li>
            <a href=\"/home/user/myCollect.html\">
                <i class=\"user-icon sprits collect\"></i>
                <div class=\"user-center-text\">收藏</div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>
    </ul>
    <ul class=\"user-center-ul invite-ul\">
        <li>
            <a href=\"#\">
                <i class=\"user-icon sprits invite\"></i>
                <div class=\"user-center-text\">邀请好友</div>
                <div class=\"user-center-right\">
                    赢红包
                </div>
                <i class=\"sprits gonext\"></i>
            </a>
        </li>
    </ul>
    <div class=\"zhezhao\"></div>
    <div class=\"share-group-layer\">
        <ul>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share1\"></i>
                    <p>微信好友</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share2\"></i>
                    <p>朋友圈</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share3\"></i>
                    <p>QQ</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share4\"></i>
                    <p>短信</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share5\"></i>
                    <p>新浪微博</p>
                </a>
            </li>

            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share6\"></i>
                    <p>QQ空间</p>
                </a>
            </li>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share7\"></i>
                    <p>邮件</p>
                </a>
            </li>
            <li>
                <a href=\"javascript:;\">
                    <i class=\"sprits share8\"></i>
                    <p>复制链接</p>
                </a>
            </li>
        </ul>
        <a href=\"javascript:;\" class=\"cancle cancle-share\">取消邀请</a>
    </div>
    <a href=\"/home/user/loginOut.html\" class=\"detail-yuyue-bnt\">退出</a>
";
    }

    // line 147
    public function block_script($context, array $blocks = array())
    {
        // line 148
        echo "    <script>
        \$(function () {
            FastClick.attach(document.body);
            var share = function () {
                \$(\".invite-ul\").on(\"click\", function (event) {
                    event.stopPropagation();
                    \$(\".zhezhao, .share-group-layer\").show();
                })
            }();
            \$(\".zhezhao, .cancle-share\").on(\"click\", function () {
                \$(\".zhezhao, .share-group-layer\").hide();
            });

        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/user/user_center.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 148,  213 => 147,  113 => 51,  99 => 40,  84 => 28,  80 => 27,  71 => 20,  68 => 19,  62 => 16,  54 => 15,  43 => 6,  40 => 5,  34 => 4,  30 => 2,  28 => 3,  11 => 2,);
    }
}
