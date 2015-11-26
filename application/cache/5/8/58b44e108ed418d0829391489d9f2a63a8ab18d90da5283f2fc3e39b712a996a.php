<?php

/* shop/vacate/vacateList.twig */
class __TwigTemplate_58b44e108ed418d0829391489d9f2a63a8ab18d90da5283f2fc3e39b712a996a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/vacate/vacateList.twig", 1);
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
        $context["page_tag"] = "shop_vacate_vacateList";
        // line 3
        $context["page_header_title"] = "员工考勤";
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
        echo "    <div class=\"col-xs-12\">
        <div class=\"table-bar\">
            <label>关键字:</label>
            <input type=\"text\" name=\"keywords\" style=\"width:260px;\" class=\"form-control\" placeholder=\"按员工编号、真实姓名、手机号\"/>
            <label></label>
            <button onclick=\"doSearch();\" class=\"btn btn-info\"><i class=\"icon icon-search\"></i>搜索</button>
            <label></label>
            <button onclick=\"doExport();\" class=\"btn btn-info\"><i class=\"icon icon-file-excel\"></i>导出</button>
            <a href=\"/shop/vacate/vacateAdd\" class=\"btn btn-small btn-warning\">添加记录<i class=\"icon icon-plus-sign\"></i></a>
        </div>
        <table id=\"list\"><tr><td></td></tr></table> 
        <div id=\"pager\"></div> 
    </div>
";
    }

    // line 24
    public function block_script($context, array $blocks = array())
    {
        // line 25
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script>
                \$(function () {
                    \$(\"#list\").jqGrid({
                        url: \"/shop/vacate/getVacateList\",
                        datatype: \"json\",
                        mtype: \"POST\",
                        colNames: [\"员工编号\",\"真实姓名\",\"开始时间\",\"结束时间\",\"请假天数\", \"状态\", \"操作\"],
                        colModel: [
                            {name: \"employee_no\", editable: false},
                            {name: \"truename\", editable: true, align: \"center\"},
                            {name: \"begin_time\", editable: true, align: \"center\"},
                            {name: \"end_time\", editable: true, align: \"center\"},
                            {name: \"days\", editable: true, align: \"center\"},
                            {name: \"status\", editable: true, editrules: {edithidden: true}, formatter: function (cellvalue, options, rowObject) {
                                    switch (cellvalue) {
                                        case '1':
                                            return '审核通过';
                                            break;
                                        case '0':
                                            return '待审核';
                                            break;
                                    }
                                }},
                            {name: \"actionBtn\", viewable: false, sortable: false, formatter: actionFormatrer}
                        ],
                        pager: \"#pager\",
                        rowNum: 10,
                        rowList: [10, 20, 30],
                        sortname: \"ctime\",
                        sortorder: \"desc\",
                        viewrecords: true,
                        gridview: true,
                        autoencode: true,
                        caption: '职员管理',
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
                    }).navGrid('#pager', {edit: false, add: false, del: false, view: true,search:false}, searchFn, editFn, addFn, delFn, viewFn);
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
                    response += '<a href=\"/shop/vacate/vacateEdit?id=' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 修改</a>';
                    return response;
                }

                function delRecord(id) {
                    layer.confirm('确定要删除该条记录？', {
                        btn: ['确认', '取消'] //按钮
                    }, function () {
                        \$.ajax({
                            url: '/shop/vacate/vacateDel',
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

                function doSearch() {
                    var keywords = \$('input[name=\"keywords\"]').val();
                    \$(\"#list\").jqGrid('setGridParam', {
                        postData: {keywords: keywords}
                    }).trigger(\"reloadGrid\");
                }

                function doExport() {
                    var keywords = \$('input[name=\"keywords\"]').val();
                    \$(\"body\").append(\"<iframe src='/shop/employee/exportExcel?keywords=\"+keywords+\"' style='display: none;' ></iframe>\");
                }
    </script>
";
    }

    public function getTemplateName()
    {
        return "shop/vacate/vacateList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 25,  66 => 24,  49 => 10,  46 => 9,  40 => 6,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
