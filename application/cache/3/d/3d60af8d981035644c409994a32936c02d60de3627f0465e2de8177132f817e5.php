<?php

/* /admin/banner/banner_edit.twig */
class __TwigTemplate_3d60af8d981035644c409994a32936c02d60de3627f0465e2de8177132f817e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "/admin/banner/banner_edit.twig", 1);
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

    // line 2
    public function block_static($context, array $blocks = array())
    {
        // line 3
        echo "    <script type=\"text/javascript\" src=\"/static/dropzone/dropzone.js\"></script>
    <link rel=\"stylesheet\" href=\"/static/dropzone/dropzone.css\">
";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"easyui-panel\" title=\"修改焦点图\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"/admin/banner/editBanner\" method=\"post\" enctype=\"multipart/form-data\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array()), "html", null, true);
        echo "\"/>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >链接</span>
                    <input type=\"text\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "link", array()), "html", null, true);
        echo "\" name=\"link\" style=\"width: 300px\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >图片</span>
                    <input name=\"pic\" type=\"hidden\"/>
                    <div id=\"pic\" class=\"dropzone\" >
                         <img id=\"pic-img\" style=\"width:130px;\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "pic", array()), "html", null, true);
        echo "\"/>
                    </div>
                    <a href=\"javascript:void(0)\" id=\"pic-reset\" class=\"easyui-linkbutton dropzone-reset\" iconCls=\"icon-clear\">重置图片</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">描述</span>
                    <textarea style=\"width: 400px;height:60px\" name=\"desc\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "desc", array()), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 30
        if (($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "status", array()) == "1")) {
            echo " checked=\"checked\" ";
        }
        echo " />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 31
        if (($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "status", array()) == "0")) {
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

    // line 42
    public function block_script($context, array $blocks = array())
    {
        // line 43
        echo "    <!-- 配置文件 -->

    <script type=\"text/javascript\" src=\"/static/ueditor/ueditor.config.js\"></script>
    <!-- 编辑器源码文件 -->
    <script type=\"text/javascript\" src=\"/static/ueditor/ueditor.all.js\"></script>
    <!-- 实例化编辑器 -->
    <script>
        \$(function () {
            \$('#area-region').combotree({
                url: '/admin/area/asy_area_tree',
                required: true
            });
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

           dz = initUpload('pic','pic');
            \$('#pic-reset').click(function () {
                 \$('#pic-img').remove();
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
        function initUpload(id,name) {
            var dz = new Dropzone(\"div#\"+id, {
                maxFiles: 1,
                url: \"/admin/service/doUpload\",
                dictDefaultMessage: '点击选择文件或拖动文件到这里上传',
                uploadMultiple: false, //是否支持多文件上传
                dictRemoveFile: true,
                init: function () {
                    this.on(\"success\", function (file, res) {
                        if (res.status === true) {
                            showMessage(res.msg);
                            \$(\"input[name='\"+name+\"']\").val(res.url);
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
           return dz;
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/admin/banner/banner_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 43,  102 => 42,  85 => 31,  79 => 30,  72 => 26,  63 => 20,  54 => 14,  48 => 11,  42 => 7,  39 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }
}
