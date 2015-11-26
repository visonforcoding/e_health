/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * H5+百度地图获取地理位置
 * @param {Object} ak  百度地图api key
 * @param {Object} handlePos  成功获取结果后的回调函数
 * @param {type} posMsg description
 * @author cwp
 */
function BmapPos(ak, handlePos, posMsg) {
    this.ak = ak;
    this.handlePos = handlePos;
    this.posMsg = posMsg;
}

BmapPos.prototype = {
    init: function () {
        var self = this;
        if (window.navigator.geolocation) {
            if ($.isFunction(self.posMsg)) {
                self.posMsg();
            }
            var options = {
                enableHighAccuracy: true,
            };
            window.navigator.geolocation.getCurrentPosition(handleSuccess, handleError, options);
        } else {
            alert("浏览器不支持html5来获取地理位置信息");
        }
        function handleSuccess(position) {
            //设置一个提示
            // 获取到当前位置经纬度  本例中是chrome浏览器取到的是google地图中的经纬度
            var lng = position.coords.longitude;
            var lat = position.coords.latitude;
            var gpsPoint = new BMap.Point(lng, lat);
            // 将gps坐标转化为百度地图的经纬度
            var convertor = new BMap.Convertor();
            var pointArr = [];
            pointArr.push(gpsPoint);
            convertor.translate(pointArr, 1, 5, function (point) {
                if (point.status === 0) {
                    lng = point.points[0].lng;
                    lat = point.points[0].lat;
                    $.getJSON('http://api.map.baidu.com/geocoder/v2/?ak=' + self.ak + '&location='
                            + lat + ',' + lng + '&output=json&pois=1&callback=?', self.handlePos);
                } else {
                    //坐标转换失败
                }
            });
        }
        function handleError(error) {
            //获取坐标失败
            //alert(error.message);
        }
    },
};

function BmapBtn(handleClick, option) {
    // 默认停靠位置和偏移量
    this.defaultAnchor = BMAP_ANCHOR_BOTTOM_RIGHT;
    if (typeof option !== 'undefined') {
        this.defaultOffset = new BMap.Size(option.size.x, option.size.y);
    } else {
        this.defaultOffset = new BMap.Size(160, 100);

    }
    this.handleClick = handleClick;
}
// 通过JavaScript的prototype属性继承于BMap.Control
BmapBtn.prototype = new BMap.Control();
// 自定义控件必须实现自己的initialize方法,并且将控件的DOM元素返回
// 在本方法中创建个div元素作为控件的容器,并将其添加到地图容器中
BmapBtn.prototype.initialize = function (map) {
    // 创建一个DOM元素
    var btn = document.createElement("button");
    // 添加文字说明
    btn.appendChild(document.createTextNode("确定"));
    // 设置样式
    btn.style.cursor = "pointer";
    btn.style.border = "1px solid gray";
    btn.style.backgroundColor = "#20882B";
    btn.style.padding = '10px';
    btn.style.width = '100px';
    btn.style.color = 'white';
    //
    btn.onclick = this.handleClick;
    // 添加DOM元素到地图中
    map.getContainer().appendChild(btn);
    // 将DOM元素返回
    return btn;
};






