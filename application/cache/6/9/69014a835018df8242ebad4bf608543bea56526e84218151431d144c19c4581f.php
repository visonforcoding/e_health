<?php

/* admin/service/editService.twig */
class __TwigTemplate_69014a835018df8242ebad4bf608543bea56526e84218151431d144c19c4581f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/service/editService.twig", 2);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/esui.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_static($context, array $blocks = array())
    {
        // line 4
        echo "    <script type=\"text/javascript\" src=\"/static/dropzone/dropzone.js\"></script>
    <link rel=\"stylesheet\" href=\"/static/dropzone/dropzone.css\">
";
    }

    // line 7
    public function block_main($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"easyui-panel\" title=\"编辑服务\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"/admin/service/editService\" method=\"post\" enctype=\"multipart/form-data\">
                <input name=\"id\" type=\"hidden\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id", array()), "html", null, true);
        echo "\" />
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">项目名</span>
                    <input name=\"name\" id=\"name\" class=\"easyui-validatebox\" data-options=\"required:true\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "name", array()), "html", null, true);
        echo "\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >售价</span>
                    <input type=\"text\" name=\"price\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "price", array()), "html", null, true);
        echo "\" class=\"easyui-numberbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >服务时长</span>
                    <input type=\"text\" name=\"stime\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "stime", array()), "html", null, true);
        echo "\" class=\"easyui-numberbox\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >封面</span>
                    <input name=\"cover\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "cover", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                    <div id=\"my-dropzone\" class=\"dropzone\" >
                        <img class=\"reset-btn\" style=\"width:130px;\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "cover", array()), "html", null, true);
        echo "\"/>
                    </div>
                     <a href=\"javascript:void(0)\" id=\"clear_button\" class=\"easyui-linkbutton dropzone-reset\" iconCls=\"icon-clear\">重新上传</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">功效</span>
                    <script id=\"efficacy\" name=\"efficacy\" style=\"width:80%;height: 100px;margin-left:70px;\" type=\"text/plain\">";
        // line 35
        echo $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "efficacy", array());
        echo "</script>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">禁忌</span>
                    <script id=\"taboo\" name=\"taboo\"  style=\"width:80%;height: 100px;margin-left:70px;\" type=\"text/plain\">";
        // line 39
        echo $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "taboo", array());
        echo "</script>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 43
        if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "status", array()) == "1")) {
            echo " checked=\"checked\" ";
        }
        echo " />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 44
        if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "status", array()) == "0")) {
            echo " checked=\"checked\" ";
        }
        echo " />禁用 
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\"></span>
                    <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"submitForm('node-form');\">提交</a>
                    <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"clearForm();\">清除</a>
                </div>
            </form>
        </div>
    </div>
";
    }

    // line 55
    public function block_script($context, array $blocks = array())
    {
        // line 56
        echo "    <!-- 配置文件 -->
    <script type=\"text/javascript\" src=\"/static/ueditor/ueditor.config.js\"></script>
    <!-- 编辑器源码文件 -->
    <script type=\"text/javascript\" src=\"/static/ueditor/ueditor.all.js\"></script>
    <!-- 实例化编辑器 -->
    <script>
        \$(function () {
            var toolbars = [
                [
                    'undo', //撤销
                    'redo', //重做
                    'bold', //加粗
                    'indent', //首行缩进
                    'italic', //斜体
                    'underline', //下划线
                    'strikethrough', //删除线
                    'fontborder', //字符边框
                    'horizontal', //分隔线
                    'unlink', //取消链接
                    'fontfamily', //字体
                    'fontsize', //字号
                    'link', //超链接
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'forecolor', //字体颜色
                    'backcolor', //背景色
                    'insertorderedlist', //有序列表
                    'insertunorderedlist', //无序列表
                    'fullscreen', //全屏
                    'imagecenter', //居中
                    'lineheight', //行间距
                    'edittip ', //编辑提示
                ]
            ];
            var ue = UE.getEditor('efficacy', {
                toolbars: toolbars,
                autoHeight: false
            });
            var ue_2 = UE.getEditor('taboo', {
                toolbars: toolbars,
                autoHeight: false
            });
            var dz = new Dropzone(\"div#my-dropzone\", {
                maxFiles: 1,
                url: \"/admin/service/doUpload\",
                dictDefaultMessage: '点击选择文件或拖动文件到这里上传',
                uploadMultiple: false, //是否支持多文件上传
                dictRemoveFile: true,
                init: function () {
                    this.on(\"success\", function (file, res) {
                        if (res.status === true) {
                             showMessage(res.msg);
                            \$(\"input[name='cover']\").val(res.url);
                        } else {
                            showMessage(res.msg);
                            this.removeFile(file);
                        }
                    });
                    this.on(\"maxfilesexceeded\", function (file) {
                        alert('只允许单张上传');
                        this.removeFile(file);
                    });
                }
            });
            
            \$('.dropzone-reset').click(function(){
                \$('.reset-btn').remove();
               dz.removeAllFiles(true); 
            });

        });
        function submitForm(id) {
            var \$form = \$('#' + id);
            \$.ajax({
                type: \$form.attr('method'),
                url: \$form.attr('action'),
                data: \$form.serialize(),
                dataType: 'json',
                success: function (msg) {
                    if (typeof msg === 'object') {
                        if (msg.status) {
                           alert(msg.msg);
                            //window.location.href = msg.url;
                        } else {
                           alert(msg.msg);
                        }
                    }
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/service/editService.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 56,  126 => 55,  109 => 44,  103 => 43,  96 => 39,  89 => 35,  80 => 29,  75 => 27,  68 => 23,  61 => 19,  54 => 15,  48 => 12,  42 => 8,  39 => 7,  33 => 4,  30 => 3,  11 => 2,);
    }
}
