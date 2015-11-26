<?php

/* home/store/store_map.twig */
class __TwigTemplate_006495252355f51a3f0265fff2937a41050a44a5da260d6a8bff69193c736e52 extends Twig_Template
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
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
\t<title>苗苗儿推-店铺地图</title>
\t<script type=\"text/javascript\" src=\"js/zepto.js\"></script>
\t<script src=\"http://api.map.baidu.com/components?ak=wIdFSRkQyt4nwrYRgT1lHsoy&v=1.0\"></script>

\t<style type=\"text/css\">
\t\tbody, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
\t\t#golist {display: none;}
\t\t@media (max-device-width: 800px){
                    #golist{
                        display: block!important;
                    }
                }
\t\t.fanhui{
\t\t\tposition: fixed;
\t\t\tleft: 0;
\t\t\ttop: 40px;
\t\t\theight: 35px;
\t\t\twidth: 50px;
\t\t\tbackground-color: rgba(0,0,0,0.7);
\t\t\tborder-radius: 0 5px 5px 0;
\t\t\t-webkit-border-radius:0 5px 5px 0;
\t\t}
\t\t.fanhui a{
\t\t\tdisplay: block;
\t\t\twidth: 100%;
\t\t\theight: 100%;
\t\t\tcolor: #fff;
\t\t\tfont-size: 24px;
\t\t\tbackground: url(\"/static/home/images/goback.png\") no-repeat 20px center;
\t\t\tbackground-size: 50%;
\t\t}
\t</style>
</head>
<body>
        
\t<lbs-map width=\"100px\" style=\"height:100%\" center=\"116.307852,40.057031\">
    \t<lbs-poi name=\"百度大厦\" location=\"116.307852,40.057031\" addr=\"北京市海淀区上地十街10号\" ></lbs-poi>
    </lbs-map>

    <div class=\"fanhui\">
    \t<a href=\"javascript:history.go(-1)\"></a>
    </div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "home/store/store_map.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
