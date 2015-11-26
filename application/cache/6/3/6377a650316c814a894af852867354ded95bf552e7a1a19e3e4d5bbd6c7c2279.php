<?php

/* shop/promo/index.twig */
class __TwigTemplate_6377a650316c814a894af852867354ded95bf552e7a1a19e3e4d5bbd6c7c2279 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/promo/index.twig", 1);
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
        $context["page_bread_sub"] = "活动管理";
        // line 4
        $context["page_header_title"] = "活动管理";
        // line 5
        $context["page_tag"] = "shop_promo_index";
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
                url: \"/shop/promo/getPromoData\",
                datatype: \"json\",
                mtype: \"POST\",
                colNames: [\"cid\",\"优惠名称\", \"优惠服务\", \"原价\", \"优惠价\", \"开始时间\", \"结束时间\", \"状态\",\"操作\"],
                colModel: [
                    {name: \"cid\", index:'cid',editable: true, align: \"center\",hidden:true,key:true},
                    {name: \"title\", editable: true, align: \"center\",editrules:{required:true}},
                    {name: \"service\", index:'service',editable: true, edittype:\"select\",editoptions:{value:\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["serviceStr"]) ? $context["serviceStr"] : $this->getContext($context, "serviceStr")), "html", null, true);
        echo "\" },editselected:'service'},
                    {name: \"mprice\",  align: \"center\"},
                    {name: \"price\",  editable: true, align: \"center\",editrules:{required:true,number:true,custom:true, custom_func:mypricecheck}},
                    {name: \"begintime\",  editable: true, editoptions:{
                        dataInit:function(el){
                           
                               \$(el).datetimepicker({
                                    language: \"zh-CN\",
                                    weekStart: 1,
                                    todayBtn: 1,
                                    autoclose: 1,
                                    todayHighlight: 1,
                                    startView: 2,
                                    showMeridian: 1,
                                    forceParse: 1,
                                    format: \"yyyy-mm-dd hh:ii:ss\"
                                });
                        }
                    },editrules:{required:true}},
                    {name: \"endtime\",viewable:false, editable: true,editoptions:{
                            dataInit:function(el){
                                   \$(el).datetimepicker({
                                        language: \"zh-CN\",
                                        weekStart: 1,
                                        todayBtn: 1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 2,
                                        showMeridian: 1,
                                        forceParse: 1,
                                        format: \"yyyy-mm-dd hh:ii:ss\"
                                    });
                            }
                       },editrules:{required:true}
                    },
                    {name: \"status\",fixed:true,iddex:'status',viewable:false,  editable: true,sortable: false,edittype:\"select\",editoptions:{value:\"1:启用;0:关闭\"},editselected:'status'},
                    {name: \"operator\", editrules:{ edithidden: true }, formatter: \"actions\" },
                ],
                pager: \"#pager\",
                rowNum: 10,
                rowList: [10, 20, 30],
                sortname: \"ctime\",
                sortorder: \"desc\",
                viewrecords: true,
                gridview: true,
                autoencode: true,
                caption: '优惠列表',
                autowidth: true,
                height: 'auto',
                rownumbers: true,
                jsonReader: {
                    root: \"rows\",
                    page: \"page\",
                    total: \"total\",
                    records: \"records\",
                    repeatitems: false,
                },
                editurl:\"/shop/promo/edit\",

            }).navGrid('#pager', {search:false,add: true,  edit:true,view: true,del: true,}, searchFn, editFn, addFn, delFn, viewFn);
        });
         var searchFn = {         
        };
        var editFn = {
            //jqModal: true,
            //reloadAfterSubmit: true,
            //closeAfterEdit:true,
            //closeOnEscape: true,
           // savekey: [true, 13],
            afterSubmit: function (response) {
                var responseText = \$.parseJSON(response.responseText);
                var success = responseText.success;
                var message = responseText.message;
                return [success, message];
            }
       
        };
        var delFn={

        }
        function addFn(){
            closeAfterAdd:true;
        }
        function edit() {

        }
        function delFn() {
            console.log('add');
        }
        function viewFn() {
            console.log('view');
        }

        function mypricecheck(value, colname){
            if(value<0){
               return [false,'优惠价不能小于0'];
            }else{
               return [true,''];
            }
           
        }
      
    

    </script>
";
    }

    public function getTemplateName()
    {
        return "shop/promo/index.twig";
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
