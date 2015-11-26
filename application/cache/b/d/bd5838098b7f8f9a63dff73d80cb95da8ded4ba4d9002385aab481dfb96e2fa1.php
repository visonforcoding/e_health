<?php

/* admin/store/store_edit.twig */
class __TwigTemplate_bd5838098b7f8f9a63dff73d80cb95da8ded4ba4d9002385aab481dfb96e2fa1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/store/store_edit.twig", 1);
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
            <form id=\"node-form\" class=\"form-inline\"  action=\"/admin/store/editStore\" method=\"post\" enctype=\"multipart/form-data\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "id", array()), "html", null, true);
        echo "\" />
                <table class=\"hasPicPost\">
                    <tr>
                        <td align=\"right\">
                            所属商圈：
                        </td>
                        <td>
                            <input class=\"inputall\" name=\"regionId\" id=\"area-region\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "regionId", array()), "html", null, true);
        echo "\">
                        </td>
                        <td align=\"right\">
                            店名：
                        </td>
                        <td>
                            <input type=\"text\" name=\"storeName\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                        <td align=\"right\">
                            店主姓名：
                        </td>
                        <td>
                            <input type=\"text\" name=\"bossName\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossName", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                    </tr>
                    <tr>
                        <td align=\"right\">
                            电话号码:
                        </td>
                        <td>
                            <input type=\"text\" name=\"bossTel\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bossTel", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                        <td align=\"right\">
                            地址:
                        </td>
                        <td>
                            <input type=\"text\" name=\"storeAddress\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeAddress", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                        <td align=\"right\">
                            营业时间:
                        </td>
                        <td>
                            <input type=\"text\" name=\"openTime\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "openTime", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                    </tr>
                    <tr>
                        <td align=\"right\">身份证号码:</td>
                        <td>
                            <input type=\"text\" name=\"idNum\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idNum", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                        </td>
                        <td align=\"right\">坐标:</td>
                        <td>
                            <input type=\"text\" id=\"coordinate\" name=\"coordinate\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "coordinate", array()), "html", null, true);
        echo "\" class=\"easyui-textbox\" precision=\"2\" data-options=\"required:true\"  aria-describedby=\"basic-addon1\">
                            <a href=\"javascript:void(0)\" class=\"easyui-linkbutton\" onclick=\"getLocation();\">拾取</a>
                        </td>
                    </tr>
                    <tr>
                        <td align=\"right\">身份证照:</td>
                        <td>
                            <input name=\"idPic\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idPic", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                            <div id=\"idPic\" class=\"dropzone\" >
                                <img id=\"idPic-img\" style=\"width:130px;\" src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "idPic", array()), "html", null, true);
        echo "\"/>
                            </div>
                            <a href=\"javascript:void(0)\" style=\"vertical-align: top;\" id=\"clear_button\" class=\"easyui-linkbutton idPic-reset\" iconCls=\"icon-clear\">重置图片</a>
                        </td>
                        <td align=\"right\">列表显示照片:</td>
                        <td>
                            <input name=\"cover\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                            <div id=\"cover\" class=\"dropzone\" >
                                <img id=\"cover-img\" style=\"width:130px;\" src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\"/>
                            </div>
                            <a href=\"javascript:void(0)\" style=\"vertical-align: top;\" id=\"clear_button\" class=\"easyui-linkbutton cover-reset\" iconCls=\"icon-clear\">重置图片</a>
                        </td>
                    </tr>
                </table>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">营业执照</span>
                     <input name=\"license\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "license", array()), "html", null, true);
        echo "\" type=\"hidden\"/>
                            <div id=\"license\" class=\"dropzone\" >
                                <img id=\"license-img\" style=\"width:130px;\" src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "license", array()), "html", null, true);
        echo "\"/>
                            </div>
                   <a href=\"javascript:void(0)\" style=\"vertical-align: top;\" id=\"clear_button\" class=\"easyui-linkbutton license-reset\" iconCls=\"icon-clear\">重置图片</a>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">下单须知</span>
                    <script id=\"orderNotice\" name=\"orderNotice\" style=\"width:80%;height: 100px;margin-left:70px;\" type=\"text/plain\">";
        // line 93
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "orderNotice", array());
        echo "</script>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">服务须知</span>
                    <script id=\"serviceNotice\" name=\"serviceNotice\" style=\"width:80%;height: 100px;margin-left:70px;\" type=\"text/plain\">";
        // line 97
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "serviceNotice", array());
        echo "</script>
                </div>
                <div class=\"input-group\">
                    <span class=\"input-group-addon\">状态</span>
                    <input type=\"radio\" name=\"status\" value=\"1\" ";
        // line 101
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "status", array()) == "1")) {
            echo "checked=\"checked\"";
        }
        echo " />启用
                    <input type=\"radio\" name=\"status\" value=\"0\" ";
        // line 102
        if (($this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "status", array()) == "0")) {
            echo "checked=\"checked\"";
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

    <div id=\"win\" class=\"easyui-dialog\" title=\"坐标拾取器\" style=\"width:600px;height:400px\"
         data-options=\"iconCls:'icon-save',modal:true,closed:true\">
        <div id=\"map\"></div>
    </div>
";
    }

    // line 118
    public function block_script($context, array $blocks = array())
    {
        // line 119
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
            var ue = UE.getEditor('orderNotice', {
                toolbars: toolbars,
                autoHeight: false
            });
            var ue_2 = UE.getEditor('serviceNotice', {
                toolbars: toolbars,
                autoHeight: false
            });

            dz = initUpload('idPic', 'idPic');
            \$('.idPic-reset').click(function () {
                \$('#idPic-img').remove();
                dz.removeAllFiles(true);
            });
            cover = initUpload('cover', 'cover');
            \$('.cover-reset').click(function () {
                \$('#cover-img').remove();
                cover.removeAllFiles(true);
            });
            license = initUpload('license', 'license');
            \$('.license-reset').click(function () {
                \$('#license-img').remove();
                license.removeAllFiles(true);
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

        function getLocation() {
            //拾取坐标
            console.log('i click');
            layer.open({
                type: 2,
                title: '拾取坐标',
                shadeClose: true,
                shade: 0.8,
                area: ['380px', '70%'],
                content: '/home/map/getLocation' //iframe的url
                }); 
        }
        
        function setLocation(loca){
            //填充坐标
             \$('#coordinate').textbox('setValue',loca);
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/store/store_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 119,  217 => 118,  195 => 102,  189 => 101,  182 => 97,  175 => 93,  166 => 87,  161 => 85,  150 => 77,  145 => 75,  136 => 69,  131 => 67,  121 => 60,  114 => 56,  105 => 50,  96 => 44,  87 => 38,  76 => 30,  67 => 24,  58 => 18,  48 => 11,  42 => 7,  39 => 6,  33 => 3,  30 => 2,  11 => 1,);
    }
}
