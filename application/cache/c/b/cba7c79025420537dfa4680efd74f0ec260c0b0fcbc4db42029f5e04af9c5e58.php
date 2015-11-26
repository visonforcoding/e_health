<?php

/* admin/reback/index.twig */
class __TwigTemplate_cba7c79025420537dfa4680efd74f0ec260c0b0fcbc4db42029f5e04af9c5e58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/reback/index.twig", 1);
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
            <div>
                用户手机:
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

    // line 17
    public function block_script($context, array $blocks = array())
    {
        // line 18
        echo "    <script>
        \$(function () {
            \$('#dg').datagrid({
                url: \"/admin/reback/getreback.html\",
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
                        {field: 'orderNo', title: '订单编号'},
                        //{field: 'nick', title: '申请退款用户'},
                        {field: 'Tel', title: '用户手机'},
                        // {field: 'payType', title: '退还方式'},
                        {field: 'account', title: '退换账户'},
                        {field: 'amount', title: '退还金额'},
                        {field: 'storeName', title: '退款店铺'},
                        {field: 'ctime', title: '创建时间', sortable: true},
                        {field: 'status', title: '状态', formatter: function (value, row, index) {
                                if (value == '0') {
                                    return '商家同意退款';
                                } else if (value == '1') {
                                    return '商家确认';
                                } else if (value == '11') {
                                    return '商家拒绝退款';
                                } else if (value == '2') {
                                    return '平台拒绝退款';
                                } else if (value == '3') {
                                    return '已打款';
                                }
                            }},
                        {field: 'action', title: \"操作\", width: 20, formatter: function (value, row, index) {
                                if (row.status == '0' || row.status == '1') {
                                    return \"<a class='cwp-btn' title=' 拒绝退款' onClick='refuse(\" + row.id + \")'><span style='color:#E66A3C' class='icon-pencil2'></span> 拒绝退款</a>\"
                                            + \"<a class='cwp-btn' title='已打款' onClick='confirm(\" + row.id + \")'><span style='color:#E66A3C' class='icon-pencil2'></span> 已打款</a>\"
                                            ;
                                } else {
                                    return '';
                                }
                            }}
                    ]]
            });
            layer.config({
                extend: 'extend/layer.ext.js'
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


            //搜索按钮
            \$('#search_button').click(function () {
                var name = \$('#name').val();
                \$('#dg').datagrid({
                    queryParams: {
                        name: name
                    }
                });
            })
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
        
        //拒绝退款
        function refuse(id) {
            layer.prompt({
                title: '请填写拒绝理由',
                formType: 2 //prompt风格，支持0-2
            }, function (value, index) {
                \$.ajax({
                    type: \"POST\",
                    url: \"/admin/reback/refuse\",
                    data: {id:id,reason:value},
                    success: function (msg) {
                        layer.msg(msg.msg);
                        \$('#dg').datagrid('reload');
                    }
                });
                layer.close(index);
            });
        }
        
        function confirm(id){
             \$.ajax({
                type: \"POST\",
                url: \"/admin/reback/confirm\",
                data: { id:id},
                success: function (res) {
                    layer.msg(res.msg);
                    \$('#dg').datagrid('reload');
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/reback/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 18,  49 => 17,  32 => 3,  29 => 2,  11 => 1,);
    }
}
