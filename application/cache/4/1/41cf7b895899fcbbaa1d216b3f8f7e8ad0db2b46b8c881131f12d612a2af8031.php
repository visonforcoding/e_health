<?php

/* admin/coupon/index.twig */
class __TwigTemplate_41cf7b895899fcbbaa1d216b3f8f7e8ad0db2b46b8c881131f12d612a2af8031 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/coupon/index.twig", 1);
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
        echo "    <div class=\"easyui-panel\" title=\"优惠券种管理\" data-options=\"iconCls:'icon-user2',collapsible:true,fit:false,border:false\" >
        <div id=\"tb\" style=\"padding:5px;height:auto\">  
            <div style=\"margin-bottom:5px\">
                <a href=\"/admin/coupon/add\"  class=\"easyui-linkbutton\" iconCls=\"icon-add\" plain=\"true\">添加</a>
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
";
    }

    // line 23
    public function block_script($context, array $blocks = array())
    {
        // line 24
        echo "    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script> 
    <script>
        \$(function () {
            \$('#dg').datagrid({
                url: \"/admin/coupon/getCoupon.html\",
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
                        {field: 'name', title: '优惠劵名称'},
                        {field: 'type', title: '优惠劵类型'},
                        {field: 'amount1', title: '满减金额'},
                        {field: 'amount2', title: '扣减金额'},
                        {field: 'storeName', title: '适用店铺'},
                        {field: 'service', title: '适用服务'},
                        {field: 'beginTime', title: '优惠劵开始时间', sortable: true},
                        {field: 'endTime', title: '优惠劵结束时间', sortable: true},
                        {field: 'flag', title: '状态', formatter: function (value, row, index) {
                                if (value === '1') {
                                    return '启用';
                                } else {
                                    return '禁用';
                                }
                            }},
                        {field: 'action', title: \"操作\", width: 20, formatter: function (value, row, index) {

                                if (row.flag == '1') {
                                    var actionStr = \"<a class='cwp-btn' title='关闭' href='/admin/coupon/on_off_coupon/\" + row.id + \"/0'><span style='color:#E66A3C' class='icon-pencil2'></span> 关闭</a>\" +
                                            \"<a class='cwp-btn' title='编辑' href='/admin/coupon/edit/\" + row.id + \"' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-pencil2'></span> 编辑</a>\" +
                                            \"<a class='cwp-btn' title='查看使用情况' onClick='showCoupon(\" + row.id + \");' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-pencil2'></span> 查看使用情况</a>\";
                                } else {
                                    var actionStr = \"<a class='cwp-btn' title='启用' href='/admin/coupon/on_off_coupon/\" + row.id + \"/1'><span style='color:#E66A3C' class='icon-pencil2'></span> 启用</a>\" +
                                            \"<a class='cwp-btn' title='编辑' href='/admin/coupon/edit/\" + row.id + \"' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-pencil2'></span> 编辑</a>\" +
                                            \"<a class='cwp-btn' title='查看使用情况' onClick='showCoupon(\" + row.id + \");' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-pencil2'></span> 查看使用情况</a>\";

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
        ";
        // line 114
        echo "        });

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

        function delIt() {
            var rows = \$('#dg').datagrid('getSelected');
            var ss = rows.id;
            \$.messager.confirm('Confirm', '确定要删除记录?', function (r) {
                if (r) {
                    \$.ajax({
                        type: \"POST\",
                        url: \"/admin/coupon/delCoupon\",
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

        function showCoupon(id) {
            //查看明细
            url = '/admin/coupon/couponDetail?id=' + id;
            layer.open({
                type: 2,
                title: '查看详情',
                shadeClose: true,
                shade: 0.1,
                area: ['380px', '70%'],
                content: url//iframe的url
            });
        }

    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/coupon/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 114,  58 => 24,  55 => 23,  32 => 3,  29 => 2,  11 => 1,);
    }
}
