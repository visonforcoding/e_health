<?php

/* /shop/order/orderList.twig */
class __TwigTemplate_81cea5a6d51263b353f11a3ee003e5031841e1c141bbac2dbb7a67aa09c31175 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/order/orderList.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_bread_top"] = "工作中心";
        // line 3
        $context["page_bread_sub"] = "订单管理";
        // line 4
        $context["page_header_title"] = "订单管理";
        // line 5
        $context["page_tag"] = "shop_order_orderList";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_static($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        // line 8
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.jqgrid.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.ace.css\">
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"col-xs-12 \">
        <div class=\"table-bar\">
            <label>关键字:</label>
            <input type=\"text\" name=\"keywords\" style=\"width:260px;\" class=\"form-control\" placeholder=\"按订单编号\"/>
            <label>订单状态:</label>
            <select name=\"type\" style=\"width:120px;\" id=\"original\" class=\"form-control\">
                <option  value=\"0\" >不限</option>
                <option  value=\"1\">待支付</option>
                <option  value=\"2\">已取消</option>
                <option  value=\"3\">待服务</option>
                <option  value=\"4\">申请退款</option>
                <option  value=\"5\">退款中</option>
                <option  value=\"6\">拒绝退款</option>
                <option  value=\"7\">已退款</option>
                <option  value=\"8\">已服务</option>
            </select>
            <label></label>
            <button onclick=\"doSearch();\" class=\"btn btn-info\"><i class=\"icon icon-search\"></i>搜索</button>
            <label></label>
            <button onclick=\"doExport();\" class=\"btn btn-info\"><i class=\"icon icon-file-excel\"></i>导出</button>
        </div>
        <table id=\"list\"><tr><td></td></tr></table> 
        <div id=\"pager\"></div> 
    </div>
    ";
        // line 37
        echo "    <div class=\"modal fade\" id=\"refundModal\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">×</span><span class=\"sr-only\">关闭</span></button>
                    <h4 class=\"modal-title\">拒绝退款</h4>
                </div>
                <div class=\"modal-body\">
                    <form class=\"form-horizontal\" role=\"form\" method=\"post\" >
                        <div class=\"form-group\">
                            <label class=\"col-md-2 control-label required\">拒绝原因</label>
                            <div class='col-md-4'>
                                <input type=\"hidden\" value=\"\" id=\"refuse-order-id\"/>
                                <select name='refuseReason' placeholder='请选择拒绝原因' id='original' class='form-control'>
                                    <option value='已按时服务,不予退款' selected='selected'>已按时服务,不予退款</option>
                                    <option value='就不退款，气死你' selected='selected'>就不退款，气死你</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <div>
                                <label class=\"col-md-2 control-label\">退款说明(可不填)</label>

                            </div>
                            <div class='col-md-8'>
                                <textarea name='summary' id='summary' rows='3' class='form-control'></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">关闭</button>
                    <button type=\"button\" id=\"sumbit-refus-reback\" class=\"btn btn-primary\">保存</button>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 75
    public function block_script($context, array $blocks = array())
    {
        // line 76
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script>
                \$(function () {
                    \$(\"#list\").jqGrid({
                        url: \"/shop/order/getOrderList\",
                        datatype: \"json\",
                        mtype: \"POST\",
                        colNames: [\"订单编号\", \"下单日期\", \"服务名\", \"预约类型\", \"原价\", \"实付款\", \"电话\", \"状态\",
                            \"操作\", '备注', '用户', \"预约时间\", '客户地址'],
                        colModel: [
                            {name: \"orderNo\", editable: true, width: 40},
                            {name: \"ctime\", editable: true, width: 40},
                            {name: \"name\", width: 40, editable: true, align: \"center\"},
                            {name: \"isVisitStr\", width: 30, editable: true, align: \"center\"},
                            {name: \"price\", width: 30, editable: true, align: \"center\"},
                            {name: \"amount\", width: 30, hidden: false, align: \"center\", editable: true, edittype: 'text'},
                            {name: \"tel\", hidden: false, width: 30, editable: true, editrules: {edithidden: true}},
                            {name: \"statusText\", width: 30, editable: true, align: \"center\"},
                            {name: \"actionBtn\", viewable: false, width: 50, sortable: false, formatter: actionFormatrer},
                            {name: \"remark\", hidden: true, editable: true, editrules: {edithidden: true}},
                            {name: \"nick\", hidden: true, editable: true, editrules: {edithidden: true}},
                            {name: \"serviceTime\", hidden: true, editable: true, editrules: {edithidden: true}},
                            {name: \"address\", hidden: true, editable: true, editrules: {edithidden: true}},
                        ],
                        pager: \"#pager\",
                        rowNum: 10,
                        rowList: [10, 20, 30],
                        sortname: \"ctime\",
                        sortorder: \"desc\",
                        viewrecords: true,
                        gridview: true,
                        autoencode: true,
                        caption: '订单列表',
                        autowidth: true,
                        height: 'auto',
                        rownumbers: true,
                        jsonReader: {
                            root: \"rows\",
                            page: \"page\",
                            total: \"total\",
                            records: \"records\",
                            repeatitems: false,
                            id: \"0\"
                        },
                    }).navGrid('#pager', {edit: false, add: false, del: false, view: true, search: false}, searchFn, editFn, addFn, delFn, viewFn);

                    //提交拒绝退款
                    \$('#sumbit-refus-reback').click(function () {
                        var id = \$('#refuse-order-id').val();
                        var refuseReason = \$(\"select[name='refuseReason']\").val();
                        \$.ajax({
                            url: '/shop/order/refusReback',
                            type: 'post',
                            dataType: 'json',
                            data: {id: id, refuseReason: refuseReason},
                            success: function (res) {
                                layer.msg(res.msg, {icon: 1});
                                \$('#refundModal').modal('hide');
                            }
                        })
                    });
                    //指派店员
                    \$('#sumbit-appoint').click(function () {
                        var id = \$('#appoint-order-id').val();
                        var employee_id = \$('select[name=\"employee\"] option:selected').val();
                        \$.ajax({
                            url: '/shop/order/appoint',
                            type: 'post',
                            dataType: 'json',
                            data: {id: id, employee_id: employee_id},
                            success: function (res) {
                                layer.msg(res.msg, {icon: 1});
                                \$('#appointModal').modal('hide');
                            }
                        });
                    });
                });
                var searchFn = {
                };
                var editFn = {
                    jqModal: true,
                    reloadAfterSubmit: true,
                    closeOnEscape: true,
                    savekey: [true, 13],
                    closeAfterEdit: true,
                    url: '',
                    beforeShowForm: function (form) {
                        \$('#tr_password', form).hide();
                    },
                    afterSubmit: function (response) {
                        var responseText = \$.parseJSON(response.responseText);
                        var success = responseText.success;
                        var message = responseText.message;
                        return [success, message];
                    }
                };
                function edit() {

                }
                ;
                function addFn() {
                    console.log('add');
                }
                function delFn() {
                    console.log('add');
                }
                function viewFn() {
                    console.log('view');
                }

                function actionFormatrer(cellvalue, options, rowObject) {
                    var response = '';
                    if (rowObject.statusText === '申请退款') {
                        response = '<a  onClick=\"rebackPay(' + rowObject.id + ')\" class=\"label grid-btn label-badge label-danger\">确认退款</a>';
                        response += '<a onClick=\"refuseFn(' + rowObject.id + ')\" class=\"label grid-btn label-badge label-danger\">拒绝退款</a>';
                    }
                    if (rowObject.statusText === '已评价') {
                        response = '<a class=\"label grid-btn label-badge label-danger\">查看评价</a>';
                    }
                    if (rowObject.statusText === '待服务') {
                        if (rowObject.truename) {
                            response = '<a onClick=\"javascript:void(0);\" class=\"btn grid-btn btn-small btn-warning\"><i class=\"icon icon-hand-right\"></i>已指派店员' + rowObject.truename + '</a>';
                        } else {
                            response = '<a onClick=\"appointEmployee(' + rowObject.id + ')\" class=\"btn btn-small grid-btn btn-primary\"><i class=\"icon icon-hand-right\"></i>指派店员</a>';
                        }
                    }
                    return response;
                }

                function refuseFn(id) {
                    //拒绝退款
                    \$('#refuse-order-id').val(id);
                    \$('#refundModal').modal({show: true});
                }
                function rebackPay(id) {
                    //确认退款
                    layer.confirm('确定确认退款？', {
                        btn: ['确认', '取消'] //按钮
                    }, function () {
                        //确认退款
                        \$.ajax({
                            url: '/shop/order/rebackPay',
                            type: 'post',
                            dataType: 'json',
                            data: {id: id},
                            success: function (res) {
                                layer.msg(res.msg, {icon: 1});
                            }
                        });
                    }, function () {
                        // layer.msg('奇葩么么哒', {shift: 6});
                    });
                }

                function doSearch() {
                    //搜索
                    var keywords = \$('input[name=\"keywords\"]').val();
                    var type = \$('select[name=\"type\"] option:selected').val();
                    \$(\"#list\").jqGrid('setGridParam', {
                        postData: {keywords: keywords, type: type}
                    }).trigger(\"reloadGrid\");
                }
                function appointEmployee(id) {
                    //指派店员
                    url = '/shop/order/appoint?id=' + id;
                    layer.open({
                        type: 2,
                        title: '查看详情',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['380px', '50%'],
                        content: url//iframe的url
                    });
                }

    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/order/orderList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 76,  120 => 75,  79 => 37,  53 => 12,  50 => 11,  44 => 8,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
