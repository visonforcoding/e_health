<?php

/* /shop/cargo/cargo.twig */
class __TwigTemplate_cee67e5adbbe5f7d05e7795be5e3c4ec0d78810faca7ee0f9d253760a31202fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/cargo/cargo.twig", 1);
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
        $context["page_header_title"] = "耗材管理";
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
    <style>
        #flowing-box{
            height:400px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
";
    }

    // line 16
    public function block_main($context, array $blocks = array())
    {
        // line 17
        echo "    <div class=\"work-copy\">
        <div class=\"table-toolbar col-xs-12\">
            <a href=\"/shop/cargo/cargoAdd\" class=\"btn btn-small btn-warning\">
                <i class=\"icon icon-plus-sign\"></i>添加记录</a>
        </div>
        <div class=\"col-xs-12\">
            <table id=\"list\"><tr><td></td></tr></table> 
            <div id=\"pager\"></div> 
        </div>
    </div>
    <div class=\"row work-copy\">
        <div class=\"col-xs-12\">
            <div class=\"list\">
                <header>
                    <h3><i class=\"icon-list-ul icon-border-circle\"></i> 出入库记录 &nbsp;<small>";
        // line 31
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["corages"]) ? $context["corages"] : $this->getContext($context, "corages"))), "html", null, true);
        echo "条记录</small></h3>
                </header>
                <section id=\"flowing-box\" class=\"items items-hover\">
                    ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["corages"]) ? $context["corages"] : $this->getContext($context, "corages")));
        foreach ($context['_seq'] as $context["_key"] => $context["corage"]) {
            // line 35
            echo "                        <div class=\"item row\">
                            <div class=\"col-md-2\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["corage"], "ctime", array()), "html", null, true);
            echo "</div>
                            <div class=\"col-md-2\">
                                ";
            // line 38
            if (($this->getAttribute($context["corage"], "do_type", array()) == "1")) {
                // line 39
                echo "                                    <i class=\"icon  icon-long-arrow-up green\">(入库)</i>
                                ";
            } else {
                // line 41
                echo "                                    <i class=\"icon  icon-long-arrow-down red\">(出库)</i>
                                ";
            }
            // line 43
            echo "                            </div>
                            <div class=\"col-md-1\">
                                ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["corage"], "cargo_name", array()), "html", null, true);
            echo "
                                ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["corage"], "num", array()), "html", null, true);
            echo "件
                            </div>
                            <div class=\"col-md-2\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["corage"], "remark", array()), "html", null, true);
            echo "</div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['corage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                </section>
            </div>
        </div>
    </div>
";
    }

    // line 56
    public function block_script($context, array $blocks = array())
    {
        // line 57
        echo "    <script src=\"/static/lib/jqgrid/js/jquery.jqGrid.min.js\"></script>
    <script src=\"/static/lib/jqgrid/js/i18n/grid.locale-cn.js\"></script>
    <script src=\"/static/highcharts/highcharts.js\" type=\"text/javascript\"></script> 
    <script src=\"/static/highcharts/modules/exporting.js\" type=\"text/javascript\"></script>
    <script>
        \$(function () {
            layer.config({
                extend: 'extend/layer.ext.js'
            });
            \$(\"#list\").jqGrid({
                url: \"/shop/cargo/getCargoList\",
                datatype: \"json\",
                mtype: \"POST\",
                colNames: [\"耗材名\", \"供应商\", \"采购价\", \"库存\", \"操作\"],
                colModel: [
                    {name: \"cargo_name\", editable: true, align: \"center\"},
                    {name: \"from\", editable: true, align: \"center\"},
                    {name: \"price\", editable: true, align: \"center\", editrules: {edithidden: true}},
                    {name: \"nums\", editable: true, align: \"center\", editrules: {edithidden: true}},
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
                caption: '仓储管理',
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
            response += '<a href=\"/shop/cargo/cargoEdit?id=' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 修改</a>';
            response += '<a onClick=\"addCargo(' + rowObject.id + ');\" class=\"grid-btn btn btn-primary btn-mini\"><i class=\"icon icon-pencil\"></i> 入库</a>';
            return response;
        }

        function delRecord(id) {
            layer.confirm('确定要删除该条记录？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
                \$.ajax({
                    url: '/shop/cargo/cargoDel',
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
        function addCargo(id) {
            layer.prompt({
                title: '输入入库件数',
                formType: 0 //prompt风格，支持0-2
            }, function (pass) {
                \$.ajax({
                    url: '/shop/cargo/addCargoNum',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id, pass: pass},
                    success: function (res) {
                        layer.msg(res.msg, {icon: 1});
                        if (res.status) {
                            \$('#list').trigger('reloadGrid');
                        }
                    }
                });
            });
        }

    </script>
";
    }

    public function getTemplateName()
    {
        return "/shop/cargo/cargo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 57,  130 => 56,  122 => 51,  113 => 48,  108 => 46,  104 => 45,  100 => 43,  96 => 41,  92 => 39,  90 => 38,  85 => 36,  82 => 35,  78 => 34,  72 => 31,  56 => 17,  53 => 16,  40 => 6,  38 => 5,  35 => 4,  31 => 1,  29 => 3,  27 => 2,  11 => 1,);
    }
}
