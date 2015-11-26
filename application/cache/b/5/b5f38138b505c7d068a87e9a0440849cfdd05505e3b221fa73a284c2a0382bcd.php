<?php

/* /admin/banner/banner_add.twig */
class __TwigTemplate_b5f38138b505c7d068a87e9a0440849cfdd05505e3b221fa73a284c2a0382bcd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "/admin/banner/banner_add.twig", 1);
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
        echo "    <div class=\"easyui-panel\" title=\"添加焦点图\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"/admin/banner/addBanner\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >链接</span>
                    <input type=\"text\" name=\"link\" style=\"width: 300px\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >图片</span>
                    <input name=\"pic\" type=\"hidden\"/>
                    <div id=\"pic\" class=\"dropzone\" >
                    </div>
                    <a href=\"javascript:void(0)\" id=\"clear_button\" class=\"easyui-linkbutton pic-reset\" iconCls=\"icon-clear\">重置图片</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">描述</span>
                    <textarea style=\"width: 400px;height:60px\" name=\"desc\"></textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" checked=\"checked\" />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" />禁用 
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

    // line 40
    public function block_script($context, array $blocks = array())
    {
        // line 41
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
            \$('.pic-reset').click(function () {
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
        return "/admin/banner/banner_add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 41,  78 => 40,  42 => 7,  39 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }
}
