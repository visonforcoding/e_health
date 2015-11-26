<?php

/* shop/comment/index.twig */
class __TwigTemplate_4da18978fcf0d48c879243f2a94130ef423e5f50b97e59305cf23a2ae1a1cb93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/comment/index.twig", 1);
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
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "pay")) {
            // line 4
            $context["page_bread_sub"] = "我的评价";
            // line 5
            $context["page_header_title"] = "我的评价";
            // line 6
            $context["page_tag"] = "shop_comment_pay";
        } else {
            // line 8
            $context["page_bread_sub"] = "我的点评";
            // line 9
            $context["page_header_title"] = "我的点评";
            // line 10
            $context["page_tag"] = "shop_comment_index";
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_static($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        // line 15
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.jqgrid.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/lib/jqgrid/css/ui.ace.css\">
";
    }

    // line 18
    public function block_main($context, array $blocks = array())
    {
        // line 19
        echo "    <div class=\"col-xs-12\">
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
        
         //type为pay，则显示评价
          ";
        // line 31
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "pay")) {
            // line 32
            echo "                \$(\"#list\").jqGrid({
                    url: \"/shop/comment/getComment?type=pay\",
                    datatype: \"json\",
                    mtype: \"POST\",
                    colNames: [\"评论ID\", \"用户手机\", \"用户昵称\", \"评价分数\", \"评价时间\", \"评价内容\", \"回复内容\", \"操作\"],
                    colModel: [
                        {name: \"id\", width: 55},
                        {name: \"phoneNo\", width: 90},
                        {name: \"uname\", width: 90},
                        {name: \"score\", width: 90},
                        {name: \"ctime\", width: 100},
                        {name: \"desc\", width: 150, sortable: false},
                        {name: \"rcontent\", width: 200},
                        {name: \"operator\", width: 150,formatter:operateFormatter}
                    ],
                    pager: \"#pager\",
                    rowNum: 10,
                    rowList: [10, 20, 30],
                    sortname: \"invid\",
                    sortorder: \"desc\",
                    viewrecords: true,
                    gridview: true,
                    autoencode: true,
                    caption: '评价管理',
                    autowidth: true,
                    height: 'auto',
                    rownumbers:true,
                    ";
            // line 60
            echo "                    jsonReader: {
                        root: \"rows\",
                        page: \"page\",
                        total: \"total\",
                        records: \"records\",
                        repeatitems: false,
                        id: \"0\"
                    }
                });
                 
               function operateFormatter(cellvalue, options, rowObject){
                    var rcontent=rowObject['rcontent'];
                    var id=rowObject['id']; 
                    //如果没有回复信息，则显示回复按钮
                    if(rcontent==null){ 
                       

                        var editDelStr=' <button  id=\"del'+rowObject.id+'\" onClick=\"del(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-trash\"></i> 删除</button>&nbsp;&nbsp; <button  id=\"add'+rowObject.id+'\" onClick=\"add(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-edit\"></i> 回复</button>';
                    }else{
                          
                        var editDelStr='<button  id=\"del'+rowObject.id+'\" onClick=\"del(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-trash\"></i> 删除</button>&nbsp;&nbsp; <button  id=\"update'+rowObject.id+'\" onClick=\"update(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-edit\"></i> 修改</button>';
                    }
                   
                    return editDelStr;
             } 
            });
       //点评     
      ";
        } else {
            // line 87
            echo " 
            \$(\"#list\").jqGrid({
                    url: \"/shop/comment/getComment\",
                    datatype: \"json\",
                    mtype: \"POST\",
                    colNames: [\"评论ID\", \"用户手机\", \"用户昵称\", \"评价分数\", \"评价时间\", \"评价内容\", \"操作\"],
                    colModel: [
                        {name: \"id\", width: 55},
                        {name: \"phoneNo\", width: 90},
                        {name: \"uname\", width: 90},
                        {name: \"score\", width: 90},
                        {name: \"ctime\", width: 100},
                        {name: \"desc\", width: 150, sortable: false}, 
                        {name: \"operator\", width: 150,formatter:operateFormatter}
                    ],
                    pager: \"#pager\",
                    rowNum: 10,
                    rowList: [10, 20, 30],
                    sortname: \"invid\",
                    sortorder: \"desc\",
                    viewrecords: true,
                    gridview: true,
                    autoencode: true,
                    caption: '我的点评',
                    autowidth: true,
                    height: 'auto',
                    rownumbers:true,
                    ";
            // line 115
            echo "                    jsonReader: {
                        root: \"rows\",
                        page: \"page\",
                        total: \"total\",
                        records: \"records\",
                        repeatitems: false,
                        id: \"0\"
                    }
                });
                 
                 function operateFormatter(cellvalue, options, rowObject){
                        
                        var id=rowObject['id']; 
                        var editDelStr='<button  id=\"del'+rowObject.id+'\" onClick=\"del(' + rowObject.id + ');\" data-id=\"' + rowObject.id + '\" class=\"grid-btn btn btn-primary btn-mini del-record\"><i class=\"icon icon-trash\"></i> 删除</button>';
                        return editDelStr;
                 }
    
                
            });
      
      ";
        }
        // line 135
        echo " 
      
      
        //删除
        function del(id){
            if(!confirm(\"确定要删除吗？\"))
            {
                return;
            }
            var td=\$('#del'+id).parent().prev(); //获取回复信息
            if(td.html()=='&nbsp;'){
                url=\"/shop/comment/del/id/\"+id+\"/type/reply\";
            }else{
                url=\"/shop/comment/del/id/\"+id;
            }
            \$.ajax({
                url:url, 
                success:function(re){
                re = JSON.parse(re);
                if(re.code == 'ok'){
                    \$('#del'+id).parent().parent().hide();
                }
                else{
                    alert('删除失败，请联系管理员');
                }
            }})
        }
        
         function add(id){
           
           var td=\$('#add'+id).parent().prev();
           var content=td.html();
           td.html('<textarea id=\"content\">'+content+'</textarea><a href=\"#\" id=\"button\">确定</a>');
           \$('#button').click(function(){
                var content=\$('#content').val();
                \$.ajax({
                    url:'/shop/comment/edit', 
                    type:'post',
                    data:{id:id,content:content},
                    success:function(re){
                     re = JSON.parse(re);
                    if(re.code == 'ok'){
                        \$('#add'+id).parent().prev().html(content);
                        \$('#add'+id).parent().html(\"<a href='javascript:void(0);' id='del\"+id+\"' onclick='del(\"+id+\")'>删除</a>&nbsp;&nbsp;<a href='javascript:void(0);' id='update\"+id+\"' onclick='update(\"+id+\")'>修改回复</a>\");
                    }
                    else{
                        alert('更新失败，请联系管理员');
                    }
               }})
           });
        }

        function update(id){
           var td=\$('#update'+id).parent().prev();
           var content=td.html();
           td.html('<textarea id=\"content\">'+content+'</textarea><a href=\"#\" id=\"button\">确定</a>');
           \$('#button').click(function(){
                var content=\$('#content').val();
                \$.ajax({
                    url:'/shop/comment/edit?type=update', 
                    type:'post',
                    data:{id:id,content:content},
                    success:function(re){
                     re = JSON.parse(re);
                    if(re.code == 'ok'){
                        \$('#update'+id).parent().prev().html(content);
                    }
                    else{
                        alert('更新失败，请联系管理员');
                    }
               }})
           });

        }
       
    </script>
";
    }

    public function getTemplateName()
    {
        return "shop/comment/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 135,  172 => 115,  143 => 87,  113 => 60,  84 => 32,  82 => 31,  74 => 25,  71 => 24,  63 => 19,  60 => 18,  54 => 15,  52 => 14,  49 => 13,  45 => 1,  42 => 10,  40 => 9,  38 => 8,  35 => 6,  33 => 5,  31 => 4,  29 => 3,  27 => 2,  11 => 1,);
    }
}
