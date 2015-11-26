<?php

class Weather_model extends CI_Model
{

    public $arrWindDirection = array(
        "0" => "无持续风向",
        "1" => "东北风",
        "2" => "东风",
        "3" => "东南风",
        "4" => "南风",
        "5" => "西南风",
        "6" => "西风",
        "7" => "西北风",
        "8" => "北风",
        "9" => "旋转风"
    );
    public $arrWindPower = array(
        "0" => "微风",
        "1" => "3-4级",
        "2" => "4-5级",
        "3" => "5-6级",
        "4" => "6-7级",
        "5" => "7-8级",
        "6" => "8-9级",
        "7" => "9-10级",
        "8" => "10-11级",
        "9" => "11-12级"
    );

    public $weatherCode = array(
        "0" => "晴",
        "1" => "多云",
        "2" => "阴",
        "3" => "阵雨",
        "4" => "雷阵雨",
        "5" => "雷阵雨伴有冰雹",
        "6" => "雨夹雪",
        "7" => "小雨",
        "8" => "中雨",
        "9" => "大雨",
        "10" => "暴雨",
        "11" => "大暴雨",
        "12" => "特大暴雨",
        "13" => "阵雪",
        "14" => "小雪",
        "15" => "中雪",
        "16" => "大雪",
        "17" => "暴雪",
        "18" => "雾",
        "19" => "冻雨",
        "20" => "沙尘暴",
        "21" => "小到中雨",
        "22" => "中到大雨",
        "23" => "大到暴雨",
        "24" => "暴雨到大暴雨",
        "25" => "大暴雨到特大暴雨",
        "26" => "小到中雪",
        "27" => "中到大雪",
        "28" => "大到暴雪",
        "29" => "浮尘",
        "30" => "扬沙",
        "31" => "强沙尘暴",
        "53" => "霾",
        "99" => "无"
    );

    public $cleanCar = array(
        "0" => 100,
        "1" => 100,
        "2" => 100,
        "3" => 50,
        "4"=>50
    );




    public function __construct()
    {
        parent::__construct();
    }


    public function get_weather($id)
    {

        set_time_limit(0);
        $private_key = 'aeb63e_SmartWeatherAPI_c390479';
        $appid = 'f1d5567cedcb213e';
        $appid_six = substr($appid, 0, 6);
        $areaid = $id;
        $type = 'forecast_v';
        $date = date("YmdHi");
        $public_key = "http://open.weather.com.cn/data/?areaid=" . $areaid . "&type=" . $type . "&date=" . $date . "&appid=" . $appid;

        $key = base64_encode(hash_hmac('sha1', $public_key, $private_key, TRUE));

        $URL = "http://open.weather.com.cn/data/?areaid=" . $areaid . "&type=" . $type . "&date=" . $date . "&appid=" . $appid_six . "&key=" . urlencode($key);


        $string = file_get_contents($URL);

        return $string;

    }

    public function get_other($id)
    {
        $private_key = 'aeb63e_SmartWeatherAPI_c390479';
        $appid = 'f1d5567cedcb213e';
        $appid_six = substr($appid, 0, 6);
        $areaid = $id;
        $type = 'index_f';
        $date = date("YmdHi");
        $public_key = "http://open.weather.com.cn/data/?areaid=" . $areaid . "&type=" . $type . "&date=" . $date . "&appid=" . $appid;

        $key = base64_encode(hash_hmac('sha1', $public_key, $private_key, TRUE));

        $URL = "http://open.weather.com.cn/data/?areaid=" . $areaid . "&type=" . $type . "&date=" . $date . "&appid=" . $appid_six . "&key=" . urlencode($key);


        $string = file_get_contents($URL);

        return $string;
    }


}
