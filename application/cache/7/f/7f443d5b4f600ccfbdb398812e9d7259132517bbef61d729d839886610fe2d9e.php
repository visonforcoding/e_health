<?php

/* admin/engineer/engineer_edit.twig */
class __TwigTemplate_7f443d5b4f600ccfbdb398812e9d7259132517bbef61d729d839886610fe2d9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/engineer/engineer_edit.twig", 1);
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
    <link rel=\"stylesheet\" href=\"/static/dropzone/dropzone.css\">
";
    }

    // line 7
    public function block_main($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"easyui-panel\" title=\"更新技师\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div style=\"margin: 10px 0;\"></div>
        <div class=\"form-box\" style=\"padding: 10px 0 10px 20px\">
            <form id=\"node-form\"  action=\"/admin/engineer/editEngineer\" method=\"post\" enctype=\"multipart/form-data\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "id", array()), "html", null, true);
        echo "\"/>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">所属商圈</span>
                    <input name=\"regionId\" id=\"area-region\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >名字</span>
                    <input type=\"text\" name=\"name\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "name", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >性别</span>
                    <input name=\"sex\" class=\"easyui-switchbutton\" ";
        // line 23
        if (($this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "sex", array()) == "1")) {
            echo "checked";
        }
        echo " data-options=\"onText:'男',offText:'女'\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >电话号码</span>
                    <input type=\"text\" name=\"tel\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "tel", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >地址</span>
                    <input type=\"text\" name=\"address\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "address", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >身份证号码</span>
                    <input type=\"text\" name=\"idNum\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "idNum", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >身份证照片</span>
                    <input name=\"idPic\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "idPic", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                    <div id=\"idPic\" class=\"dropzone\" >
                        <img id=\"idPic-img\" style=\"width:130px;\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "idPic", array()), "html", null, true);
        echo "\"/>
                    </div>
                    <a href=\"javascript:void(0)\" id=\"idPic-reset\" class=\"easyui-linkbutton dropzone-reset\" iconCls=\"icon-clear\">重置图片</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\" >列表显示照片</span>
                    <input name=\"cover\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "cover", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                    <div id=\"cover\" class=\"dropzone\" >
                    <img id=\"cover-img\" style=\"width:130px;\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "cover", array()), "html", null, true);
        echo "\"/>
                    </div>
                    <a href=\"javascript:void(0)\" id=\"cover-reset\" class=\"easyui-linkbutton dropzone-reset\" iconCls=\"icon-clear\">重置图片</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">简介</span>
                    <textarea style=\"width: 400px;height:60px\" name=\"desc\">";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "desc", array()), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">擅长</span>
                    <textarea style=\"width: 400px;height:60px\" name=\"skilled\">";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "skilled", array()), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">宣言</span>
                    <textarea style=\"width: 400px;height:60px;\" name=\"manifesto\">";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "manifesto", array()), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 67
        if (($this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "status", array()) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 68
        if (($this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "status", array()) == 0)) {
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

    // line 79
    public function block_script($context, array $blocks = array())
    {
        // line 80
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
            \$('#area-region').combotree('setValue',";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["engineer"]) ? $context["engineer"] : $this->getContext($context, "engineer")), "regionId", array()), "html", null, true);
        echo ");
           dz = initUpload('idPic','idPic');
            \$('#idPic-reset').click(function () {
                \$('#idPic-img').remove();
                dz.removeAllFiles(true);
            });
            cover = initUpload('cover','cover');
            \$('#cover-reset').click(function(){
                \$('#cover-img').remove();
                cover.removeAllFiles(true);
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
        return "admin/engineer/engineer_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 92,  171 => 80,  168 => 79,  151 => 68,  145 => 67,  138 => 63,  131 => 59,  124 => 55,  115 => 49,  110 => 47,  101 => 41,  96 => 39,  89 => 35,  82 => 31,  75 => 27,  66 => 23,  59 => 19,  49 => 12,  43 => 8,  40 => 7,  33 => 3,  30 => 2,  11 => 1,);
    }
}
