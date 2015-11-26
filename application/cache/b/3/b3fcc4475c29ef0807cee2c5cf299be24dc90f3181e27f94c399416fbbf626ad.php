<?php

/* shop/user/addArea.twig */
class __TwigTemplate_b3fcc4475c29ef0807cee2c5cf299be24dc90f3181e27f94c399416fbbf626ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "shop/user/addArea.twig", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_static($context, array $blocks = array())
    {
        // line 3
        echo "   <style>
        #city{ margin-bottom: 20px;}
        #city .prov,#city .city,#city .dist{width:150px;height:30px;}
        .btn{margin:5px 20px;}
        .choose ul {list-style:none;margin:0px}
        .choose ul li {float:left;width:80px;} 

   </style>
";
    }

    // line 12
    public function block_main($context, array $blocks = array())
    {
        // line 13
        echo "      
    <div><h3>请选择服务范围:</h3></div>
    <div> 
            <select id=\"province\" name=\"Province\" onchange=\"getArea('city', this.value)\" class=\"no-ml\" datatype=\"*\" nullmsg=\"请选择省份\">
               <option  value=\"\">选择省</option>
                      </select>
                      <select id=\"city\" name=\"City\" onchange=\"getArea('district', this.value)\" datatype=\"*\" nullmsg=\"请选择省市\">
                <option value=\"\">选择市</option>
                  </select>
                <select id=\"district\" name=\"District\" datatype=\"*\" nullmsg=\"请选择区\">
              <option value=\"\">选择区</option>
          </select>
    </div>
    <div class='content'>
        <div class='area'>
              <div class=\"panel\">
                <div class=\"panel-body\">
                     <div class=\"btn-group\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"choose\" contenteditable=\"true\">
            <div class=\"panel\">
              <div class=\"panel-heading\">已选择范围:</div>
              <div class=\"panel-body\">   
                  <ul >
                  </ul>
              </div>
            </div>
        </div> 
    </div>   
    <div><button id='submit'>确定</button></div>

\t
";
    }

    // line 49
    public function block_script($context, array $blocks = array())
    {
        // line 50
        echo "    <script type=\"text/javascript\">
         function getArea(area, pid, rs) {
            var obj = \$('#' + area);
            obj.find(\"option\").remove();
            obj.append('<option value=\"0\">---请选择---</option>');
            \$.ajax({
                url:\"/shop/user/get_area_json\",
                type: 'post',
                data: {'area': area, 'pid': pid},
                dataType: 'json',
                success: function(data) {
                    \$.each(data, function(i, n) {
                        if (n.name === rs) {
                            obj.append('<option selected=\"selected\" value=\"' + n.id + '\">' + n.name + '</option>');
                        } else {
                            obj.append('<option value=\"' + n.id + '\">' + n.name + '</option>');
                        }
                    });
                }
            });
        }


    </script>
\t  <script>
        \$(function() {
            getArea('province', \"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 0, array(), "array"), "pid", array(), "array"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 0, array(), "array"), "name", array(), "array"), "html", null, true);
        echo "\");
            getArea('city', \"";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 1, array(), "array"), "pid", array(), "array"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 1, array(), "array"), "name", array(), "array"), "html", null, true);
        echo "\");
            getArea('district', \"";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 2, array(), "array"), "pid", array(), "array"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 2, array(), "array"), "name", array(), "array"), "html", null, true);
        echo "\");
            getAllArea(";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["storeInfo"]) ? $context["storeInfo"] : $this->getContext($context, "storeInfo")), 2, array(), "array"), "id", array(), "array"), "html", null, true);
        echo ");

            \$('#province, #city').change(function() {
                 \$('.content .btn-group').html('');
                 \$('.choose ul li').remove();
            });

            //获取服务商圈
            \$('#district').change(function(){ 
                //区域id 
               \$('.choose ul li').remove();
               var regionId=\$(\"#district\").val(); 
               getAllArea(regionId);
            });

            function getAllArea(regionId){
               \$.ajax({
                   url: '/shop/user/getAllArea?type=";
        // line 96
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "',
                   type: 'POST',
                   data: {regionId: regionId},
                   success:function(msg){ 
                      //清除当前的服务 
                      \$('.content .btn-group').html('');
                      for (var i = 0; i < msg.length; i++) {
                           if(msg[i].type=='1'){
                              \$('.content .btn-group').append('<button type=\"button\" name=\"btn\" class=\"btn\" style=\"background:#FE7241\" id=\"'+msg[i].id+'\">'+msg[i].name+'</button>');
                              \$('.choose ul').append('<li class=\"'+msg[i].id+'\">'+msg[i].name+'</li>');

                           }else{
                             \$('.content .btn-group').append('<button type=\"button\" name=\"\" class=\"btn\" id=\"'+msg[i].id+'\">'+msg[i].name+'</button>');
                           }
                         
                          
                      }
                   }
               })

            }

          
            //给每个服务商圈绑定点击事件
            \$('.content .btn-group').on('click','button',function(){ 
                
                var id=\$(this).attr('id'); 
                var name=\$(this).attr('name');
                //id为0，则是选取全部
                 if(id=='0'){
                         \$('.choose ul').html(''); //清除当前已选的服务商圈
                         var html=\$('.content .btn-group').find('button'); 
                          for (var i = 1; i < html.length; i++) {
                              \$(html[i]).css('background','');  //把其他按钮的背景色去掉
                              \$('.choose ul').append('<li class=\"'+html[i].id+'\">'+html[i].innerHTML+'</li>');
                              \$(html[i]).removeAttr('name'); //移除其他按钮的name值，点击没效果
                          }
                  }else{

                  }


                if(name==''){
                    var value=\$(this).html();
                    \$(this).css('background','#FE7241');
                    \$(this).attr('name','btn');
                    if(id!='0'){
                        \$('.choose ul').append('<li class=\"'+id+'\">'+value+'</li>');
                    }
                }else if(name!=undefined){
                    
                    \$(this).css('background','');
                    if(id=='0'){
                        \$('.choose ul li').remove();  //id为0，则移除全部
                        var html=\$('.content .btn-group').find('button'); 
                        html.attr('name','');
                    }else{
                        \$('.choose ul>.'+id+'').remove();
                        \$(this).attr('name','');
                    }
                    
                }
                
            
            }); 

              //提交服务商圈
            \$('#submit').click(function(){
               var cityId=\$('#city').val();
               var regionId=\$('#district').val();
               var ids=[]; //服务商圈id
               var lis=\$('.choose ul').find('li');
               for (var i = 0; i < lis.length; i++) {
                   ids.push(\$(lis[i]).attr('class'));
               };
               \$.ajax({
                 url: '',
                 type: 'POST',
                 data: {cityId: cityId,regionId:regionId,ids:ids},
                 success:function(msg){
                          if(msg.status=='1'){
                              window.location.href='/shop/user/serviceArea';
                          }else{
                            alert(msg.msg);

                          }
                         
                 }
               })
               
            });

      
     
       });
   
    </script>
         

";
    }

    public function getTemplateName()
    {
        return "shop/user/addArea.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 96,  136 => 79,  130 => 78,  124 => 77,  118 => 76,  90 => 50,  87 => 49,  48 => 13,  45 => 12,  33 => 3,  30 => 2,  11 => 1,);
    }
}
