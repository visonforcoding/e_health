<?php

/* shop/user/service.twig */
class __TwigTemplate_7ceaa7c2eccb1476053330107db65ce00544d6d34bc8f6a50834c724500c957d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/user/service.twig", 1);
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
        $context["page_bread_sub"] = "服务项目管理";
        // line 4
        $context["page_header_title"] = "服务项目管理";
        // line 5
        $context["page_tag"] = "shop_user_service";
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
        echo "    <div class=\"col-xs-12\">
        <table id=\"list\"><tr><td></td></tr></table> 
        <div id=\"pager\"></div> 
    </div>
";
    }

    // line 17
    public function block_script($context, array $blocks = array())
    {
        // line 18
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script>
        \$(function () {

            \$(\"#list\").jqGrid({
                url: \"/shop/user/getData\",
                datatype: \"json\",
                mtype: \"POST\",
                colNames: [\"id\", \"服务项目\", \"价格\", \"服务时长\", \"预约类型\", '操作'],
                colModel: [
                    {name: \"id\", hidden: true, key: true, editable: true, width: 200, },
                    {name: \"service\", editable: true, editoptions: true, edittype: \"select\", editoptions:{value: \"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["serviceStr"]) ? $context["serviceStr"] : $this->getContext($context, "serviceStr")), "html", null, true);
        echo "\"}, width: 250, },
                    {name: \"price\", width: 200, },
                    {name: \"stime\", width: 200, },
                    {name: \"isVisit\", editable: true, edittype: \"select\", editoptions: {value: \"0:上门;1:到店\"}, width: 200, },
                    {name: \"operator\", formatter: operateFormatter, width: 215, }
                ],
                pager: \"#pager\",
                rowNum: 10,
                rowList: [10, 20, 30],
                sortname: \"ctime\",
                sortorder: \"desc\",
                viewrecords: true,
                gridview: true,
                autoencode: true,
                caption: '服务项目管理',
                autowidth: true,
                shrinkToFit: 30,
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
                editurl: '/shop/user/editService'
            }).navGrid('#pager', {add: true, edit: false, view: true, del: true}, searchFn, editFn);

            var searchFn = {
            };
            var editFn = {
                jqModal: true,
                closeAfterAdd: true,
                closeAfterEdit: true,
                reloadAfterSubmit: true,
                closeOnEscape: true,
                savekey: [true, 13],
                afterSubmit: function (response) {
                    var responseText = \$.parseJSON(response.responseText);
                    var success = responseText.success;
                    var message = responseText.message;
                    return [success, message];
                }

            };
            function operateFormatter(cellvalue, options, rowObject) {
                var isVisit = rowObject['isVisit'];
                var id = rowObject['id'];
                editDelStr = '';
                if (isVisit == '上门+到店') {
                    var editDelStr = '<button  id=\"update' + rowObject.id + '\" onClick=\"update(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-edit\"></i> 取消预约上门</button>';
                } else {
                    var editDelStr = '<button id=\"update' + rowObject.id + '\" onClick=\"update(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-edit\"></i> 可预约上门</button>';
                }
                editDelStr += '<button id=\"update' + rowObject.id + '\" onClick=\"setCargo(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-cubes\"></i> 绑定耗材</button>';
                return editDelStr;
            }
        });

        function update(id) {
            \$.ajax({
                url: '/shop/user/changeVisitStatus',
                type: 'post',
                data: {id: id},
                success: function (re) {
                    re = JSON.parse(re);
                    if (re.code == 'ok') {
                            \$('#list').trigger('reloadGrid');
                    } else {
                        alert('更新失败，请联系管理员');
                    }
                }})

        }
        function setCargo(id) {
            //查看明细
            url = '/shop/cargo/setCargo?id=' + id;
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
        return "shop/user/service.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 30,  64 => 18,  61 => 17,  53 => 12,  50 => 11,  44 => 8,  42 => 7,  39 => 6,  35 => 1,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
