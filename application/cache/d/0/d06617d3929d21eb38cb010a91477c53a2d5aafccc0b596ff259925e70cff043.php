<?php

/* home/map/getLocation.twig */
class __TwigTemplate_d06617d3929d21eb38cb010a91477c53a2d5aafccc0b596ff259925e70cff043 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
        <title>苗苗儿推-店铺地图</title>
        <script type=\"text/javascript\" src=\"/static/home/js/zepto.js\"></script>
        <style type=\"text/css\">
            body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
            #golist {display: none;}
            @media (max-device-width: 800px){
                #golist{
                    display: block!important;
                }
            }
            .fanhui{
                position: fixed;
                left: 0;
                top: 40px;
                height: 35px;
                width: 50px;
                background-color: rgba(0,0,0,0.7);
                border-radius: 0 5px 5px 0;
                -webkit-border-radius:0 5px 5px 0;
            }
            .fanhui a{
                display: block;
                width: 100%;
                height: 100%;
                color: #fff;
                font-size: 24px;
                background: url(\"/static/home/images/goback.png\") no-repeat 20px center;
                background-size: 50%;
            }
        </style>
    </head>
    <body>
        <div>
            <input type=\"text\" id=\"search_address\" class=\"serarch_map\" style=\"width:300px\" value=\"深圳市南山区新豪方大厦\"/> 
            <button onclick=\"searchMap();\">搜索</button>
        </div>
        <div id=\"allmap\"></div>
        ";
        // line 46
        echo "        <script src=\"http://api.map.baidu.com/api?v=2&ak=REAZ3A4MUALZ78fO1jl7Gnx1\"></script>
        <script src=\"/static/Js/mobile.js\"></script>
        <script src=\"/static/Js/pgwCookie.js\"></script>
        <script>
                \$(function () {
                    ak = 'REAZ3A4MUALZ78fO1jl7Gnx1';
                    map = new BMap.Map(\"allmap\");    // 创建Map实例
                    var point = new BMap.Point(116.404, 39.915);
                    map.centerAndZoom(point, 11);  // 初始化地图,设置中心点坐标和地图级别
                    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
                    map.setCurrentCity(\"\");          // 设置地图显示的城市 此项是必须设置的
                    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
                    // 添加导航控件
                    var navigationControl = new BMap.NavigationControl({
                        // 靠左上角位置
                        anchor: BMAP_ANCHOR_BOTTOM_LEFT,
                        offset: new BMap.Size(10, 100),
                        // LARGE类型
                        type: BMAP_NAVIGATION_CONTROL_LARGE,
                    });
                    var btn = new BmapBtn(confirmPos);
                    map.addControl(navigationControl);
                    map.addControl(btn);
                });
                function confirmPos() {
                    var index =   window.parent.layer.getFrameIndex(window.name);
                    loca = newpoint.lng+','+newpoint.lat;
                    parent.window.setLocation(loca);
                    parent.layer.close(index);
                }
                function searchMap() {
                    var address = \$('#search_address').val();
                    // 创建地址解析器实例
                    var myGeo = new BMap.Geocoder();
                    // 将地址解析结果显示在地图上,并调整地图视野
                    myGeo.getPoint(address, function (point) {
                        if (point) {
                            newpoint = point; //全局变量
                            map.centerAndZoom(point, 16);
                            map.addOverlay(new BMap.Marker(point));
                        } else {
                            alert(\"您选择地址没有解析到结果,试试加入市名!\");
                        }
                    }, \"北京市\");
                }
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "home/map/getLocation.twig";
    }

    public function getDebugInfo()
    {
        return array (  63 => 46,  19 => 1,);
    }
}
