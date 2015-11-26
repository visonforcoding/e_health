<?php

/* admin/store/index.twig */
class __TwigTemplate_32587ca95908b23e4a3d548852fb955dc702fc345d2d9625b4303b4650128321 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/store/index.twig", 2);
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
    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"easyui-panel\" title=\"店铺管理\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:true,border:false\" >
        <div id=\"tb\" style=\"padding:5px;height:auto\">  
            <div style=\"margin-bottom:5px\">
                <a href=\"#\" onclick=\"window.parent.createTab('添加节点', '/admin/store/addStore');\" class=\"easyui-linkbutton\" iconCls=\"icon-add\" plain=\"true\">添加</a>
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

    // line 27
    public function block_script($context, array $blocks = array())
    {
        // line 28
        echo "    <script src=\"/static/jeasyui/ext/datagrid-cellediting.js\"></script>
    <script>
        \$(function () {
         var dg =    \$('#dg').datagrid({
                url: \"/admin/store/getStore.html\",
                pagination: true,
                rownumbers: true, //显示行号
                multiSort: true, //是否能按多个字段排序
                fitColumns: false, //可以自动拓展
                height: 450,
                toolbar: '#tb',
                striped:true,
                nowrap:true,
                pageList: [5, 10, 20, 30, 40, 50, 60],
                autoRowHeight: true,
                sortName: 'id',
                clickToEdit:true,
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'storeNum', title: '店铺编号'},
                        {field: 'storeName', title: '店铺名称'},
                        {field: 'bossName', title: '店主姓名'},
                        {field: 'idNum', title: '身份证号'},
                        {field: 'idPic', title: '身份证照', formatter: function (value, row, index) {
                                return '<img src=\"' + value + '\" width=\"50px;\"/>';
                            }},
                        {field: 'bossTel', title: '店主电话'},
                        {field: 'storeAddress', title: '店铺地址'},
                        {field: 'openTime', title: '营业时间'},
                        {field: 'ctime', title: '创建时间', sortable: true},
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
                        }}, formatter: function (value, row, index) {
                                if (value === '1') {
                                    return '启用';
                                } else {
                                    return '禁用';
                                }
                            }},
       ";
        // line 99
        echo "                        {field: 'action', title: \"操作\",  formatter: function (value, row, index) {
                                var str = '';
                                str += \"<a class='cwp-btn' title='编辑' href='/admin/store/editStore/id/\" + row.id + \"'><span style='color:#E66A3C' class='lm-icon-pencil2'></span> 编辑</a>\";
                                str += \"<a class='cwp-btn' title='查看明细'  onClick='showDetail(\" + row.id + \");'><span style='color:#E66A3C' class='lm-icon-eye'></span> 查看明细</a>\";
                                return str;
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
                    if (field === 'idPic' || field === 'openPic') {
                        \$('#pic').window({
                            title: '查看大图',
                            modal: true,
                            content: '<img src=\"' + value + '\"/>'
                        });
                    }
                }
            });
        });
        function delIt() {
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
                    url: \"/admin/store/editRow\",
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
        
          function showDetail(id) {
            //查看明细
            url = '/admin/store/storeDetail?id=' + id;
            layer.open({
                type: 2,
                title: '查看详情',
                shadeClose: true,
                shade: 0.1,
                area: ['680px', '90%'],
                 maxmin: true, //开启最大化最小化按钮
                content: url//iframe的url
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/store/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 99,  65 => 28,  62 => 27,  38 => 6,  35 => 5,  30 => 3,  11 => 2,);
    }
}
