<?php

/* /shop/card/userCardList.twig */
class __TwigTemplate_f92bd79624335a1750e25f1727d3d7e082f947adb6e3bca3d09e7bef85bccb7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/card/userCardList.twig", 1);
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
        $context["page_tag"] = "shop_card_usercardList";
        // line 3
        $context["page_header_title"] = "用户会员卡管理";
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
            <input type=\"text\" name=\"keywords\" style=\"width:260px;\" class=\"form-control\" placeholder=\"按员真实姓名、手机号\"/>
            <label></label>
            <button onclick=\"doSearch();\" class=\"btn btn-info\"><i class=\"icon icon-search\"></i>搜索</button>
            <label></label>
            <a href=\"/shop/card/userCardAdd\" class=\"btn btn-small btn-warning\">添加会员卡<i class=\"icon icon-plus-sign\"></i></a>
        </div>
        <table id=\"list\"><tr><td></td></tr></table> 
        <div id=\"pager\"></div> 
    </div>
";
    }

    // line 23
    public function block_script($context, array $blocks = array())
    {
        // line 24
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script>
                \$(function () {
                    \$(\"#list\").jqGrid({
                        url: \"/shop/card/getUserCardList\",
                        datatype: \"json\",
                        mtype: \"POST\",
                        colNames: [\"名称\", \"开卡日期\", \"持卡人手机号\", \"持卡人姓名\", \"付款\", \"到期时间\", \"期限(年)\", \"操作\"],
                        colModel: [
                            {name: \"name\", editable: false},
                            {name: \"get_date\", editable: true, frozen: true},
                            {name: \"tel\", editable: true, frozen: true},
                            {name: \"trueName\", editable: true, frozen: true},
                            {name: \"price\", editable: true, align: \"center\"},
                            {name: \"expires_date\", editable: true, align: \"center\"},
                            {name: \"expires\", editable: true, align: \"center\", editrules: {edithidden: true}},
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
                        caption: '会员卡管理',
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
        ";
        // line 102
        echo "                response += '<a href=\"/shop/card/userCardEdit?id=' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 修改</a>';
                response += '<a onClick=\"viewRecord(' + rowObject.id + ');\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-eye-open\"></i> 查看明细</a>';
                return response;
            }

            function delRecord(id) {
                layer.confirm('确定要删除该条记录？', {
                    btn: ['确认', '取消'] //按钮
                }, function () {
                    \$.ajax({
                        url: '/shop/employee/employeeDel',
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
                \$(\"body\").append(\"<iframe src='/shop/employee/exportExcel?keywords=\" + keywords + \"' style='display: none;' ></iframe>\");
            }

            function viewRecord(id) {
                //查看明细
                url = '/shop/card/userCardDetail?id='+id;
                layer.open({
                    type: 2,
                    title: '查看详情',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['380px', '70%'],
                    content: url//iframe的url
                });
            }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/card/userCardList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 102,  68 => 24,  65 => 23,  49 => 10,  46 => 9,  40 => 6,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
