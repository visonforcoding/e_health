<?php

/* /shop/card/cardList.twig */
class __TwigTemplate_effbaee7ded43a8e715f76414b1981dbad6fe7c03e91d8cf3fdf20402f5866c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/card/cardList.twig", 1);
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
        $context["page_tag"] = "shop_card_cardList";
        // line 3
        $context["page_header_title"] = "会员卡管理";
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
            ";
        // line 18
        echo "            <a href=\"/shop/card/cardAdd\" class=\"btn btn-small btn-warning\">添加会员卡<i class=\"icon icon-plus-sign\"></i></a>
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
                        url: \"/shop/card/getCardList\",
                        datatype: \"json\",
                        mtype: \"POST\",
                        colNames: [\"名称\", \"创建时间\", \"原价(元)\", \"售价(元)\",\"会员卡内容\",\"期限(年)\" , \"操作\"],
                        colModel: [
                            {name: \"name\", editable: false},
                            {name: \"ctime\", editable: true, frozen: true},
                            {name: \"mprice\", editable: true, align: \"center\"},
                            {name: \"price\", editable: true, align: \"center\"},
                            {name: \"contentStr\",width:350, editable: true, editrules: {edithidden: true}},
                            {name: \"expires\", editable: true,align: \"center\", editrules: {edithidden: true}},
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
        echo "                    response += '<a href=\"/shop/card/cardEdit?id=' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 修改</a>';
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
                    \$(\"body\").append(\"<iframe src='/shop/employee/exportExcel?keywords=\"+keywords+\"' style='display: none;' ></iframe>\");
                }
    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/card/cardList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 102,  65 => 25,  62 => 24,  53 => 18,  49 => 10,  46 => 9,  40 => 6,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
