<?php

/* admin/member/index.twig */
class __TwigTemplate_de5a3cd06e4fabb2bdd7edea1c075ae626ee7be9eb971ccb4d6007f9630c12a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/member/index.twig", 2);
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
        echo "    <div class=\"easyui-panel\" title=\"会员管理\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div id=\"tb\" style=\"padding:5px;height:auto\">  
            <div style=\"margin-bottom:5px\">
                <a href=\"/admin/member/addMember\" class=\"easyui-linkbutton\" iconCls=\"icon-add\" plain=\"true\">添加</a>
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
";
    }

    // line 24
    public function block_script($context, array $blocks = array())
    {
        // line 25
        echo "    <script>
        \$(function () {
            \$('#aa').accordion('select', '会员管理');
            \$('#dg').datagrid({
                url: \"/admin/member/getMembers.html\",
                pagination: true,
                rownumbers: true, //显示行号
                multiSort: true, //是否能按多个字段排序
                fitColumns: true, //可以自动拓展
                height: 450,
                toolbar: '#tb',
                pageList: [5, 10, 20, 30, 40, 50, 60],
                autoRowHeight: false,
                sortName:'id',
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'tel', title: '手机号'},
                        {field: 'nick', title: '昵称'},
                        {field: 'gender', title: '性别',formatter: function(value,row,index){
\t\t\t\tif (value==='1'){
\t\t\t\t\treturn '男';
\t\t\t\t} else {
\t\t\t\t\treturn '女';
\t\t\t\t}
\t\t\t}},
                        {field: 'ctime', title: '创建时间', sortable: true},
                        {field: 'birthday', title: '生日', sortable: true},
                        {field: 'utime', title: '修改时间', sortable: true},
                        {field: 'status', title: '状态',editor: {type:'combobox',options:{
                                valueField:'value',
                                textField:'label',
                                data: [{
                                    label: '启用',
                                    value: '1'
                                },{
                                   label: '禁用',
\t\t\t           value: '0'
\t\t           }]
                        }},formatter: function(value,row,index){
\t\t\t\tif (value==='1'){
\t\t\t\t\treturn '启用';
\t\t\t\t} else {
\t\t\t\t\treturn '禁用';
\t\t\t\t}
\t\t\t}},
                        {field: 'action', title: \"操作\", width: 20, formatter: function (value, row, index) {
                                return \"<a class='cwp-btn' title='编辑' href='/admin/member/editMember/id/\" + row.id + \"'><span style='color:#E66A3C' class='icon-pencil2'></span> 编辑</a>\" ;
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
        });
        function delIt() {
            var ss = [];
            var rows = \$('#dg').datagrid('getSelections');
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                ss.push(row.id); //这行记录的ID值 
            }
            ;
            \$.messager.confirm('Confirm', '确定要删除记录?', function (r) {
                if (r) {
                    \$.ajax({
                        type: \"POST\",
                        url: \"/video/delVideo.html\",
                        data: {\"data[]\": ss},
                        success: function (msg) {
                            showMessage(msg.info);
                            \$('#dg').datagrid('load', {
                            });
                        }
                    });
                }
            });
        }
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
                    url: \"/admin/member/editRow\",
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
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/member/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 25,  55 => 24,  32 => 4,  29 => 3,  11 => 2,);
    }
}
