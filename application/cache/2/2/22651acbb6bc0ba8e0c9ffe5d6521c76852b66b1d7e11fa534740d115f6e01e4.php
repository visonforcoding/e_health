<?php

/* home/user/user_info.twig */
class __TwigTemplate_22651acbb6bc0ba8e0c9ffe5d6521c76852b66b1d7e11fa534740d115f6e01e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/user/user_info.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
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
        // line 2
        $context["page_tag"] = "user";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_static($context, array $blocks = array())
    {
        // line 4
        echo "    <script type=\"text/javascript\" src=\"/static/home/js/jquery-1.9.1.min.js\"></script>
";
        // line 7
        echo "    <script type=\"text/javascript\" src=\"/static/home/js/megapix-image.js\"></script>
    <script src=\"/static/home/js/mobiscroll_date.js\" charset=\"gb2312\"></script> 
    <script src=\"/static/home/js/mobiscroll.js\"></script>
    ";
        // line 12
        echo "    <link rel=\"stylesheet\" href=\"/static/home/css/mobiscroll_date.css\"/>
    ";
        // line 14
        echo "    ";
    }

    // line 58
    public function block_title($context, array $blocks = array())
    {
        echo "我的";
    }

    // line 59
    public function block_header($context, array $blocks = array())
    {
        // line 60
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">个人信息</div>
";
    }

    // line 67
    public function block_main($context, array $blocks = array())
    {
        // line 68
        echo "    <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
        <ul class=\"user-inf-ul\">
            <div class=\"canvas\"><canvas width=\"100%\" height=\"200\" id=\"slideshow\" style=\"opacity:0\"></canvas></div>
            <li class=\"user-touxiang\">
                <div class=\"user-inf-left\">
                    我的头像
                </div>
                <div class=\"user-inf-right\" style=\"width:500px\">
                    <div class=\"user-inf-tx\">
                        <i class=\"sprits\"></i>
                    </div>
                    <!-- <input type=\"file\" name=\"file_head\" id=\"file_head\" onchange=\"javascript:setImagePreview();\" /> -->
                    <!-- 上传图片 -->
                    <div class=\"picture\">
                        <div class=\"upload_box\">
                            <div class=\"box upload\"></div>
                        </div>
                        <input id=\"btn_upload\" type=\"file\" name=\"file_head\" id=\"file_head\"/>
                    </div>
                    <!-- 上传图片 end-->
                </div>
                <i class=\"sprits gonext\"></i>
            </li>
            <li>
                <div class=\"user-inf-left\">
                    用户名
                </div>
                <div class=\"user-inf-right\">
                    <input type=\"text\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : null), "nick", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : null), "nick", array()), "未设置昵称")) : ("未设置昵称")), "html", null, true);
        echo "\" name = \"nick\">
                </div>
                <i class=\"sprits gonext\"></i>
            </li>
            <li>
                <div class=\"user-inf-left\">
                    性别
                </div>
                <div class=\"user-inf-right\">
                    <div class=\"radios-group\">
                        <div class=\"radios-list ";
        // line 106
        if (($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array()) == 2)) {
            echo "  selected ";
        }
        echo "\">
                            <i class=\"sprits\"></i>
                            女士
                            <input type=\"radio\" name=\"sex\" value =\"2\"  ";
        // line 109
        if (($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array()) == 2)) {
            echo "  checked=\"checked\" ";
        }
        echo " >
                        </div>
                        <div class=\"radios-list ";
        // line 111
        if ((($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array()) == 1) || twig_test_empty($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array())))) {
            echo "  selected ";
        }
        echo "\">
                            <i class=\"sprits\"></i>
                            男士
                            <input type=\"radio\" name=\"sex\" value =\"1\"  ";
        // line 114
        if ((($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array()) == 1) || twig_test_empty($this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "gender", array())))) {
            echo "  checked=\"checked\" ";
        }
        echo ">
                        </div>
                    </div>
                </div>
                ";
        // line 119
        echo "            </li>
            <li>
                <div class=\"user-inf-left\">
                    生日
                </div>
                <!-- <div class=\"user-inf-right\">
                        <input type=\"text\" placeholder=\"1992年02月02日\">
                </div> -->
                <div id=\"demo_default\" class=\"demos user-inf-right\">            
                    <input type=\"text\" name=\"test_default\" class=\"disabled\" readonly=\"readonly\" placeholder=\"2015-08-29\" id=\"test_default\"/>
                </div>  
                <div style=\"display: none;\">
                    <label for=\"demo\">Demo</label>
                    <select name=\"demo\" id=\"demo\" class=\"changes\">
                    </select>
                </div>
                <i class=\"sprits gonext\"></i>
            </li> 
            <li>
                <div class=\"user-inf-left\">
                    常用地址
                </div>
                <div class=\"user-inf-right\">
                    <input type=\"text\" value=\"新豪方大厦5F\" name = \"address\">
                </div>
                <i class=\"sprits gonext\"></i>
            </li> 
        </ul>
        <ul class=\"user-inf-ul\">
            <li>
                <a href=\"/home/user/changePhone.html\">
                    <div class=\"user-inf-left\">
                        手机号码
                    </div>
                    <div class=\"user-inf-right\">
                        <input type=\"text\" value=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userInfo"]) ? $context["userInfo"] : $this->getContext($context, "userInfo")), "tel", array()), "html", null, true);
        echo "\" disabled=\"disabled\" name = \"tel\">
                    </div>
                    <i class=\"sprits gonext\"></i>
                </a>
            </li>
            <li>
                <a href=\"/home/user/changePassWord.html\">
                    <div class=\"user-inf-left\">
                        修改密码
                    </div>
                    <i class=\"sprits gonext\"></i>
                </a>
            </li>

        </ul>
        <a href=\"javascript:;\" class=\"save-change\">保存修改</a>
    </form>
";
    }

    // line 172
    public function block_script($context, array $blocks = array())
    {
        // line 173
        echo "    <script>
        var btn = '';
        \$(function () {
            FastClick.attach(document.body);
            var selectRadio = function () {
                \$(\".radios-list\").on(\"click\", function () {
                    \$(\".radios-list\").removeClass(\"selected\");
                    \$(\".radios-list\").find(\"input\").attr(\"checked\", \" \");
                    \$(this).addClass(\"selected\");
                    \$(this).find(\"input\").attr(\"checked\", \"checked\");
                });
            }();
            var changeInput = function () {
                \$(\".user-inf-right input\").on(\"focus\", function () {
                    \$(\".user-inf-right input\").removeClass(\"change\")
                    \$(this).addClass(\"change\");
                });
            }();
            // 上传图片
            \$(\"body\").on(\"change\", \".user-inf-ul .picture input\", function () {
                //预览图片
                \$(\".user-inf-ul .upload_box\").html('<div class=\"box\"><div class=\"img\"><img src=\"\" alt=\"\"></div></div>');
                var file = this.files[0];
                var mpImg = new MegaPixImage(file);
                var resCanvas1 = document.getElementById('slideshow');
                // resCanvas1 = canvas.getContext('2d'),
                canvasImg = new Image();
                mpImg.render(resCanvas1, {
                    minWidth: 154, minHeight: 128,
                });
                setTimeout(function () {
                    canvasImg.src = resCanvas1.toDataURL(\"image/jpeg\", 0.8);
                    imagedata = encodeURIComponent(canvasImg.src);
                    canvasImg.onload = function () {
                        \$(\".user-inf-ul .upload_box .box:first\").find(\"img\").attr(\"src\", canvasImg.src);
                        \$(\".user-inf-ul .pictrue\").find(\"input\").val(canvasImg.src);
                    }
                }, 500);
                //开始上传
            });

            \$('.save-change').click(function () {
                \$form = \$(this).parents('form');
                \$.ajax({
                    type: \$form.attr('method'),
                    url: \$form.attr('action'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof msg === 'object') {
                            if (msg.status) {
                                //window.location.reload();
                            } else {
                                alert(msg.msg);
                            }
                        }
                    }
                });
                return false;
            });
        });
        // 日期
        \$(function () {
            var currYear = (new Date()).getFullYear();
            var opt = {};
            opt.date = {preset: 'date'};
            opt.datetime = {preset: 'datetime'};
            opt.time = {preset: 'time'};
            opt.default = {
                theme: 'android-ics light', //皮肤样式
                display: 'modal', //显示方式 
                mode: 'scroller', //日期选择模式
                dateFormat: 'yyyy-mm-dd',
                lang: 'zh',
                showNow: true,
                nowText: \"今天\",
                startYear: currYear - 50, //开始年份
                endYear: currYear + 10 //结束年份
            };

            \$(\"#test_default\").mobiscroll(\$.extend(opt['date'], opt['default']));

        });
        // 日期end
    </script>

";
    }

    public function getTemplateName()
    {
        return "home/user/user_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 173,  209 => 172,  187 => 154,  150 => 119,  141 => 114,  133 => 111,  126 => 109,  118 => 106,  105 => 96,  75 => 68,  72 => 67,  62 => 60,  59 => 59,  53 => 58,  49 => 14,  46 => 12,  41 => 7,  38 => 4,  35 => 3,  31 => 1,  29 => 2,  11 => 1,);
    }
}
