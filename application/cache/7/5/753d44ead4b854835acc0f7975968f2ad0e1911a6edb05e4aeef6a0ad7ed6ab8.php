<?php

/* /admin/banner/index.twig */
class __TwigTemplate_753d44ead4b854835acc0f7975968f2ad0e1911a6edb05e4aeef6a0ad7ed6ab8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "/admin/banner/index.twig", 2);
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

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"easyui-panel\" title=\"焦点图管理\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div id=\"tb\" style=\"padding:5px;height:auto\">  
            <div style=\"margin-bottom:5px\">
                <a href=\"/admin/banner/addBanner\" class=\"easyui-linkbutton\" iconCls=\"icon-add\" plain=\"true\">添加</a>
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-remove\" plain=\"true\" onclick=\"delIt();\">删除</a>
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-edit\" plain=\"true\" onclick=\"editIt();\">编辑</a>  
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-redo\" plain=\"true\" onclick=\"cancelEdit()\">取消</a> 
                <a href=\"#\" class=\"easyui-linkbutton\" iconCls=\"icon-save\" plain=\"true\" onclick=\"saveEdit();\">保存</a>  
            </div>
            <div>
                昵称:
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

    // line 25
    public function block_script($context, array $blocks = array())
    {
        // line 26
        echo "    <script>
        \$(function () {
            \$('#dg').datagrid({
                url: \"/admin/banner/getBanners.html\",
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
                        {field: 'pic', title: '图片', formatter: function (value, row, index) {
                                return '<img src=\"' + value + '\" width=\"50px;\"/>';
                            }},
                        {field: 'desc', title: '描述'},
                        {field: 'link', title: '链接'},
                        {field: 'ctime', title: '创建时间', sortable: true},
                        {field: 'utime', title: '修改时间', sortable: true},
                        {field: 'status', title: '状态', formatter: function (value, row, index) {
                                if (value === '1') {
                                    return '启用';
                                } else {
                                    return '禁用';
                                }
                            }},
                        {field: 'check', title: '审核状态', formatter: function (value, row, index) {
                                if (value === '1') {
                                    return '审核通过';
                                } else {
                                    return '审核不通过';
                                }
                            }},
                        {field: 'action', title: \"操作\", width: 20, formatter: function (value, row, index) {
                                return \"<a class='cwp-btn' title='编辑' href='/admin/banner/editBanner/id/\" + row.id + \"'><span style='color:#E66A3C' class='icon-pencil2'></span> 编辑</a>\" +
                                        \"<a class='cwp-btn' title='删除' href='javascript:void(0)' onclick='delIt();' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-close'></span> 删除</a>\";
                            }}
                    ]],
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
                    if(field==='pic'||field==='openPic'){
                        \$('#pic').window({
                            title:'查看大图',
                            modal: true,
                            content:'<img  src=\"'+value+'\"/>'
                        });
                    }
                }
            });
        });
        function delIt() {
            var rows = \$('#dg').datagrid('getSelected');
            var ss = rows.id;
            \$.messager.confirm('Confirm', '确定要删除记录?', function (r) {
                if (r) {
                    \$.ajax({
                        type: \"POST\",
                        url: \"/admin/sys/delNode\",
                        data: {\"data\": ss},
                        success: function (res) {
                            \$.messager.alert('消息', res.msg, 'info');
                            \$('#dg').datagrid('load', {
                            });
                        }
                    });
                }
            });
        }
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
        return "/admin/banner/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 26,  56 => 25,  32 => 4,  29 => 3,  11 => 2,);
    }
}
