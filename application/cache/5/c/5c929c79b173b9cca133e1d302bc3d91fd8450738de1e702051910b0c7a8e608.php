<?php

/* admin/article/article_add.twig */
class __TwigTemplate_5c929c79b173b9cca133e1d302bc3d91fd8450738de1e702051910b0c7a8e608 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/article/article_add.twig", 1);
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
        echo "    <div class=\"easyui-panel\" title=\"添加技师\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"/admin/article/addArticle\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >标题</span>
                    <input type=\"text\" style=\"width:200px\" name=\"title\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >来源</span>
                    <input type=\"text\" name=\"from\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">摘要</span>
                    <textarea style=\"width: 400px;height:60px\" name=\"abstract\"></textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">内容</span>
                    <script id=\"content\" name=\"detail\" style=\"width:80%;height: 400px;margin-left:70px;\" type=\"text/plain\"></script>
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

    // line 41
    public function block_script($context, array $blocks = array())
    {
        // line 42
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
            var ue = UE.getEditor('content', {
                autoHeight: false
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
        function initUpload(id, name) {
            var dz = new Dropzone(\"div#\" + id, {
                maxFiles: 1,
                url: \"/admin/service/doUpload\",
                dictDefaultMessage: '点击选择文件或拖动文件到这里上传',
                uploadMultiple: false, //是否支持多文件上传
                dictRemoveFile: true,
                init: function () {
                    this.on(\"success\", function (file, res) {
                        if (res.status === true) {
                            showMessage(res.msg);
                            \$(\"input[name='\" + name + \"']\").val(res.url);
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
        return "admin/article/article_add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 42,  79 => 41,  42 => 7,  39 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }
}
