<?php

/* /shop/cargo/storeCargo.twig */
class __TwigTemplate_f150640c7d4c92906907a7a78d79faa142f15d261553bdaa59b9efbecaf4c492 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/cargo/storeCargo.twig", 1);
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
        $context["page_header_title"] = "仓储管理";
        // line 3
        $context["page_tag"] = "shop_cargo_cargo";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_static($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        // line 6
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.jqgrid.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.ace.css\">
";
    }

    // line 9
    public function block_main($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"work-copy\">
        <div class=\"table-toolbar col-xs-12\">
            <a href=\"/shop/member/memberAdd\" class=\"btn btn-small btn-warning\">
                <i class=\"icon icon-plus-sign\"></i> 添加记录</a>
            <a href=\"/shop/cargo/cargoList\" class=\"btn btn-small btn-warning\">
                <i class=\"icon icon-list\"></i> 耗材管理</a>
        </div>
        <div class=\"col-xs-12\">
            <table id=\"list\"><tr><td></td></tr></table> 
            <div id=\"pager\"></div> 
        </div>
    </div>
";
    }

    // line 23
    public function block_script($context, array $blocks = array())
    {
        // line 24
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script>
    <script>
        \$(function () {
            \$(\"#list\").jqGrid({
                url: \"/shop/member/getMemberList\",
                datatype: \"json\",
                mtype: \"POST\",
                colNames: [\"创建日期\", \"真实姓名\", \"昵称\", \"手机\", \"性别\", \"操作\"],
                colModel: [
                    {name: \"ctime\", editable: true},
                    {name: \"trueName\", editable: true, align: \"center\"},
                    {name: \"nick\", editable: true, align: \"center\"},
                    {name: \"tel\", editable: true, align: \"center\", editrules: {edithidden: true}},
                    {name: \"gender\", editable: true, align: \"center\", editrules: {edithidden: true}, formatter: function (cellvalue, options, rowObject) {
                            if (cellvalue === '1') {
                                return '男';
                            } else {
                                return '女';
                            }
                        }},
                    {name: \"actionBtn\", width: 230, viewable: false, sortable: false, formatter: actionFormatrer},
                ],
                pager: \"#pager\",
                rowNum: 10,
                rowList: [10, 20, 30],
                sortname: \"ctime\",
                sortorder: \"desc\",
                viewrecords: true,
                gridview: true,
                autoencode: true,
                caption: '会员管理',
                autowidth: true,
                shrinkToFit: false,
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
            response = '<button onClick=\"delRecord(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-trash\"></i> 删除</button>';
            response += '<a href=\"/shop/member/memberEdit?id=' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 修改</a>';
            response += '<a onClick=\"viewBuy(' + rowObject.id + ');\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-eye-open\"></i> 查看消费明细</a>';
            return response;
        }

        function delRecord(id) {
            layer.confirm('确定要删除该条记录？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
                \$.ajax({
                    url: '/shop/member/memberDel',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id},
                    success: function (res) {
                        layer.msg(res.msg, {icon: 1});
                        if (res.status) {
                            \$('#list').trigger('reloadGrid');
                        }
                    }
                });
            }, function () {
                // layer.msg('奇葩么么哒', {shift: 6});
            });
        }

        function viewBuy(id) {
            //查看明细
            url = '/shop/member/viewBuy?id=' + id;
            layer.open({
                type: 2,
                title: '查看详情',
                shadeClose: true,
                shade: 0.8,
                area: ['980px', '70%'],
                content: url//iframe的url
            });
        }
        
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/cargo/storeCargo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 24,  65 => 23,  49 => 10,  46 => 9,  40 => 6,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
