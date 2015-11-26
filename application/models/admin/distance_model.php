<?php

class Distance_model extends CI_Model
{
    private $lng = 0;
    private $lat = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function addShopDistance($shops, $lng, $lat)
    {
        $this->lng = $lng;
        $this->lat = $lat;
        foreach ($shops as $item) {
            $item->distance = $this->caculateDistance($item);
        }
        return $shops;
    }


    private function caculateDistance($item)
    {
        $EARTH_RADIUS = 6378137.0;    //单位M
        $arr = explode(",", $item->coordinate);
		$tmp1 = explode(":", $arr[0]);
		$tmp2 = explode(":", $arr[1]);
        if (count($arr) == 2) {
            $lng1 = floatval($tmp1[1]);
            $lat1 = floatval($tmp2[1]);
        } else {
            $lng1 = 0;
            $lat1 = 0;
        }

        $radLat1 = $this->getRad($lat1);

        $radLat2 = $this->getRad($this->lat);


        $a = $radLat1 - $radLat2;

        $b = $this->getRad($lng1) - $this->getRad($this->lng);

        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s = $s * $EARTH_RADIUS;
        $s = round($s * 10000) / 10000.0;
        $s = intval($s);
        if($s > 1000){
            $s = intval($s/1000).'k';
        }
        return $s;
    }

    private function getRad($d)
    {
        return $d * M_PI / 180.0;
    }
}
