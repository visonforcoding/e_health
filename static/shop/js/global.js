$(function () {
    // 仅选择日期
    $('.form-date').val(new Date().Format('YYYY-MM-dd'));
    $(".form-date").datetimepicker({
        language: "zh-CN",
        autoclose: 1,
        format: "yyyy-mm-dd",
        startView: 'decade',
        minView: 2
    });
    $(".form-datetime").datetimepicker({
        language: "zh-CN",
        autoclose: 1,
        startView: 'decade',
        format: "yyyy-mm-dd hh:ii:ss",
    });
    // 选择时间
    $(".form-time").datetimepicker({
        language: "zh-CN",
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0,
        format: 'hh:ii'
    });

    //关闭panel
    $(".close-panel").on('click', function () {
        $(this).parents('div.panel').find('div.panel-body,div.chart-bar').slideToggle("slow");
    });

});

//---------------------------------------------------  
// 日期格式化  
// 格式 YYYY/yyyy/YY/yy 表示年份  
// MM/M 月份  
// W/w 星期  
// dd/DD/d/D 日期  
// hh/HH/h/H 时间  
// mm/m 分钟  
// ss/SS/s/S 秒  
//---------------------------------------------------  
Date.prototype.Format = function (formatStr)
{
    var str = formatStr;
    var Week = ['日', '一', '二', '三', '四', '五', '六'];

    str = str.replace(/yyyy|YYYY/, this.getFullYear());
    str = str.replace(/yy|YY/, (this.getYear() % 100) > 9 ? (this.getYear() % 100).toString() : '0' + (this.getYear() % 100));

    str = str.replace(/MM/, (this.getMonth() + 1) > 9 ? (this.getMonth() + 1).toString() : '0' + (this.getMonth() + 1));
    str = str.replace(/M/g, (this.getMonth() + 1));

    str = str.replace(/w|W/g, Week[this.getDay()]);

    str = str.replace(/dd|DD/, this.getDate() > 9 ? this.getDate().toString() : '0' + this.getDate());
    str = str.replace(/d|D/g, this.getDate());

    str = str.replace(/hh|HH/, this.getHours() > 9 ? this.getHours().toString() : '0' + this.getHours());
    str = str.replace(/h|H/g, this.getHours());
    str = str.replace(/mm/, this.getMinutes() > 9 ? this.getMinutes().toString() : '0' + this.getMinutes());
    str = str.replace(/m/g, this.getMinutes());

    str = str.replace(/ss|SS/, this.getSeconds() > 9 ? this.getSeconds().toString() : '0' + this.getSeconds());
    str = str.replace(/s|S/g, this.getSeconds());

    return str;
};


/**
 * jquery-file-upload 上传插件初始化 消息弹出依赖layer.js
 * @link http://hayageek.com/docs/jquery-upload-file.php#doc
 * @param {type} id 上传触发按钮
 * @param {type} url 
 * @param {type} allowedTypes
 * @returns {undefined}
 */
function initJqupload(id, url, allowedTypes) {
    var uploadObj = $('#' + id).uploadFile({
        url: url,
        returnType: 'json',
        maxFileCount: 1,
        allowedTypes: allowedTypes,
        doneStr: "上传完成",
        dragDrop: false,
        multiple: false,
        showDone: true,
        uploadStr: "重置图片",
        showStatusAfterSuccess: false,
        maxFileCountErrorStr: "不被允许,允许的最大数量为",
        dragDropStr: "<span><b>试试拖动文件上传</b></span>",
        extErrorStr: "类型不允许,允许类型如下:",
        multiDragErrorStr: '这里只能一次上传一张',
        customErrorKeyStr: '上传发生了错误',
        onSuccess: function (files, data, xhr, pd) {
            if (data.status) {
                $('#' + id).prevAll('.img-thumbnail').find('img').attr('src', data.url);
                $('#' + id).parent('.input-img-box').children('input').val(data.url);
            } else {
                uploadObj.reset();
                layer.alert(data.msg);
            }
        },
        onSelect: function (files)
        {
            uploadObj.reset();  //单个图片上传的 委曲求全的办法
        },
        onError: function (files, status, errMsg, pd) {
            console.log(status);
        }
    });
}

/*
 * 身份证15位编码规则：dddddd yymmdd xx p
 * dddddd：6位地区编码
 * yymmdd: 出生年(两位年)月日，如：910215
 * xx: 顺序编码，系统产生，无法确定
 * p: 性别，奇数为男，偶数为女
 * 
 * 身份证18位编码规则：dddddd yyyymmdd xxx y
 * dddddd：6位地区编码
 * yyyymmdd: 出生年(四位年)月日，如：19910215
 * xxx：顺序编码，系统产生，无法确定，奇数为男，偶数为女
 * y: 校验码，该位数值可通过前17位计算获得
 * 
 * 前17位号码加权因子为 Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ]
 * 验证位 Y = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ]
 * 如果验证码恰好是10，为了保证身份证是十八位，那么第十八位将用X来代替
 * 校验位计算公式：Y_P = mod( ∑(Ai×Wi),11 )
 * i为身份证号码1...17 位; Y_P为校验码Y所在校验码数组位置
 */
function validateIdCard(idCard) {
    //15位和18位身份证号码的正则表达式
    var regIdCard = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;

    //如果通过该验证，说明身份证格式正确，但准确性还需计算
    if (regIdCard.test(idCard)) {
        if (idCard.length == 18) {
            var idCardWi = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); //将前17位加权因子保存在数组里
            var idCardY = new Array(1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2); //这是除以11后，可能产生的11位余数、验证码，也保存成数组
            var idCardWiSum = 0; //用来保存前17位各自乖以加权因子后的总和
            for (var i = 0; i < 17; i++) {
                idCardWiSum += idCard.substring(i, i + 1) * idCardWi[i];
            }

            var idCardMod = idCardWiSum % 11;//计算出校验码所在数组的位置
            var idCardLast = idCard.substring(17);//得到最后一位身份证号码

            //如果等于2，则说明校验码是10，身份证号码最后一位应该是X
            if (idCardMod == 2) {
                if (idCardLast == "X" || idCardLast == "x") {
                    return true;
                } else {
                    return false;
                }
            } else {
                //用计算出的验证码与最后一位身份证号码匹配，如果一致，说明通过，否则是无效的身份证号码
                if (idCardLast == idCardY[idCardMod]) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    } else {
        return false;
    }
}


/**
 * 浏览器全屏
 * @param {type} element
 * @returns {undefined}
 * @example   下面的代码就是整个页面调用全屏模式 
 *    var html = document.documentElement; 
*   fullScreen(html); 
*   下面的则是对指定元素，比如 
*  var canvas = document.getElementById('mycanvas'); 
*  fullScreen(canvas);  
 */
function fullScreen(element) {
    if (element.requestFullScreen) {
        element.requestFullScreen();
    } else if (element.webkitRequestFullScreen) {
        element.webkitRequestFullScreen();
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    }
}
