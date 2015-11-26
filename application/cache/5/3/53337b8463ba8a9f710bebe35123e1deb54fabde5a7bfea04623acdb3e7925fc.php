<?php

/* admin/userCoupon/index.twig */
class __TwigTemplate_53337b8463ba8a9f710bebe35123e1deb54fabde5a7bfea04623acdb3e7925fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/userCoupon/index.twig", 1);
        $this->blocks = array(
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
    public function block_main($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"easyui-panel\" title=\"店铺管理\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div id=\"tb\" style=\"padding:5px;height:auto\">  
            <div style=\"margin-bottom:5px\">
                <a href=\"/admin/userCoupon/add\"  class=\"easyui-linkbutton\" iconCls=\"icon-add\" plain=\"true\">添加</a>
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-remove\" plain=\"true\" onclick=\"delIt();\">删除</a>
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-edit\" plain=\"true\" onclick=\"editIt();\">编辑</a>  
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-redo\" plain=\"true\" onclick=\"cancelEdit()\">取消</a> 
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-save\" plain=\"true\" onclick=\"saveEdit();\">保存</a>  
            </div>
            <div>
                优惠劵名称:
                <input id=\"name\" type=\"text\" value=\"\" >
                <a href=\"javascript:void(0)\" id=\"search_button\" class=\"easyui-linkbutton\" iconCls=\"icon-search\">搜索</a>
                <a href=\"javascript:void(0)\" id=\"clear_button\" class=\"easyui-linkbutton\" iconCls=\"icon-clear\">清除</a>
            </div>
        </div>
        <table id=\"dg\">
        </table>
    </div>
    <div id=\"pic\" ></div>
";
    }

    // line 24
    public function block_script($context, array $blocks = array())
    {
        // line 25
        echo "    <script>
        \$(function () {
            \$('#dg').datagrid({
                url: \"/admin/userCoupon/getUserCoupon.html\",
                pagination: true,
                rownumbers: true, //显示行号
                multiSort: true, //是否能按多个字段排序
                fitColumns: true, //可以自动拓展
                height: 450,
                toolbar: '#tb',
                pageList: [5, 10, 20, 30, 40, 50, 60],
                autoRowHeight: true,
                sortName: 'id',
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'tel', title: '用户电话'},
                        {field: 'code', title: '优惠劵编号'},
                        {field: 'type', title: '优惠劵类型'},
                        {field: 'amount1', title: '满减金额'},
                        {field: 'amount2', title: '扣减金额'},
                        {field: 'storeName', title: '适用店铺'},
                        {field: 'service', title: '适用服务'},
                        {field: 'beginTime', title: '优惠劵开始时间', sortable: true},
                        {field: 'endTime', title: '优惠劵结束时间', sortable: true},
                        {field: 'flag', title: '状态', width:1,formatter: function (value, row, index) {
                                if (value == '1') {
                                    return '正常';
                                } else if(value=='2'){
                                    return '已使用';
                                }else if(value=='3'){
                                    return '已过期';
                                }else{
                                    return '停用';
                                }
                            }},
                        {field: 'action', title: \"操作\", width: 20, formatter: function (value, row, index) {

                                if(row.flag=='1'){
                                    var actionStr=\"<a class='cwp-btn' title='关闭' href='/admin/userCoupon/on_off_usercoupon/\" + row.id + \"/4'><span style='color:#E66A3C' class='icon-pencil2'></span> 关闭</a>\";
                                }else{
                                    var actionStr=\"<a class='cwp-btn' title='启用' href='/admin/userCoupon/on_off_usercoupon/\" + row.id + \"/1'><span style='color:#E66A3C' class='icon-pencil2'></span> 启用</a>\";

                                }
                                return actionStr;
                            }}
                    ]]
            });
            \$('#addCat_form').form({
                onSubmit: function () {
                    var isValid = \$(this).form('validate');
                    if (!isValid) {
                        showMessage('类别名不能为空！');
                    }
                    return isValid;
                },
                success: function (data) {
                    showMessage(data);
                }
            });
            \$('#name').validatebox({
                required: true
            });
            \$('#pid-combotree').combotree({
                onChange: function (newValue, oldValue) {
                    \$('#dg').datagrid({
                        queryParams: {
                            pid: newValue
                        }
                    });
                }
            });
            //搜素按钮
            \$('#search_button').click(function () {
                var name = \$('#name').val();
                \$('#dg').datagrid({
                    queryParams: {
                        name: name
                    }
                });
            });
            //清除按钮
            \$('#clear_button').click(function () {
                \$('#name').val('');
                \$('#dg').datagrid({
                    queryParams: {
                    }
                });
            });

            //双击查看大图
            \$('#dg').datagrid({
                onDblClickCell: function (index, field, value) {
                    if (field === 'idPic' || field === 'openPic') {
                        \$('#pic').window({
                            title: '查看大图',
                            width: 600,
                            height: 400,
                            modal: true,
                            content: '<img src=\"' + value + '\"/>'
                        });
                    }
                }
            });
        });
      
        ;
        function editIt() {
            \$('#dg').datagrid('beginEdit', getIndex());
        }
        function getIndex() {
            // 获取行索引
            var row = \$('#dg').datagrid('getSelected');
            var index = \$('#dg').datagrid('getRowIndex', row);
            return index;
        }
        function saveEdit() {
            \$('#dg').datagrid('endEdit', getIndex());
            var updated = \$('#dg').datagrid('getChanges', 'updated');
            if (updated.length) {
                \$.ajax({
                    type: \"POST\",
                    url: \"\",
                    data: {\"data\": updated},
                    success: function (msg) {
                        showMessage(msg.info);
                        \$('#dg').datagrid('reload');
                    }
                });
            } else {
                showMessage(\"您未更新任何数据！\");
            }
        }
        function cancelEdit() {
            //取消编辑
            \$('#dg').datagrid('cancelEdit', getIndex());
        }
        function showMessage(msg) {
            \$.messager.show({
                title: \"提示信息\",
                msg: msg,
                timeout: 2000,
                showType: 'slide',
                style: {
                    right: 0,
                    left: '',
                    top: parent.document.body.scrollTop + parent.document.documentElement.scrollTop,
                    bottom: ''
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/userCoupon/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 25,  56 => 24,  32 => 3,  29 => 2,  11 => 1,);
    }
}
