<?php

/* home/map/getPos.twig */
class __TwigTemplate_7678ad52b1fcb36350232a943ed623fe6d4aa291d51397486d0c12167a342bc9 extends Twig_Template
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
        <div id=\"allmap\"></div>
        ";
        // line 42
        echo "        <script src=\"http://api.map.baidu.com/api?v=2&ak=REAZ3A4MUALZ78fO1jl7Gnx1\"></script>
        <script src=\"/static/Js/mobile.js\"></script>
        <script src=\"/static/Js/pgwCookie.js\"></script>
        <script>
            \$(function () {
                ak = 'REAZ3A4MUALZ78fO1jl7Gnx1';
                var bm = new BmapPos(ak, handlePos, posMsg);
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
                bm.init();//定位
            });
            function handlePos(res) {
                if (res.status === 0) {
                    //成功
                    var lng = res.result.location.lng;
                    var lat = res.result.location.lat;
                    var point = new BMap.Point(lng, lat);
                    map.panTo(point);
                    map.centerAndZoom(point, 8);
                    setTimeout(function () {
                        map.setZoom(17);
                    }, 1000);  //2秒后放大到14级
                    marker = new BMap.Marker(point);  // 创建标注
                    map.addOverlay(marker);               // 将标注添加到地图中
                    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                    marker.enableDragging();//可拖拽
                    marker.addEventListener(\"dragend\", resetPos);
                    var city = res.result.addressComponent.city;
                    var lng = res.result.location.lng;
                    var lat = res.result.location.lat;
                    \$.pgwCookie({'name': 'pos_city', value: city,path:'/'});
                    \$.pgwCookie({'name': 'pos_location', json: true, value: {lng: lng, lat: lat},path:'/'});
                    \$.pgwCookie({'name': 'pos_address', value: res.result.formatted_address,path:'/'});
                }
            }
            function resetPos() {
                //重新手动拖动定位
                var p = marker.getPosition();  //获取marker的位置
                \$.getJSON('http://api.map.baidu.com/geocoder/v2/?ak=' + ak + '&location='
                        + p.lat + ',' + p.lng + '&output=json&pois=1&callback=?', function (res) {
                            var city = res.result.addressComponent.city;
                            var formatted_address = res.result.formatted_address;
                            var lng = res.result.location.lng;
                            var lat = res.result.location.lat;
                            var location = {lng:lng,lat:lat};
                            \$.pgwCookie({'name': 'pos_city', value: city,path:'/'});
                            \$.pgwCookie({'name': 'pos_location', json: true, value: location,path:'/'});
                            \$.pgwCookie({'name': 'pos_address', value: res.result.formatted_address,path:'/'});
                        });
            }
            function confirmPos() {
                window.history.go(-1);
            }

            function posMsg() {
                msgDiv = document.createElement('div');
                msgDiv.appendChild(document.createTextNode(\"正在定位中....\"));
                msgDiv.style.backgroundColor = '#E9DFA3';
                msgDiv.style.padding = '5px';
                msgDiv.style.position = 'fixed';
                msgDiv.style.top = '40px';
                msgDiv.style.left = '0';
                document.body.appendChild(msgDiv);
                setTimeout('msgDiv.style.display=\"none\"', 2000);
            }

        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "home/map/getPos.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 42,  19 => 1,);
    }
}
