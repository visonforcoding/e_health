<?php

class Mapdemo_model extends CI_Model
{
    var $lng = '';
    var $lat = '';


    function __construct()
    {
        parent::__construct();
    }


    function add($lng, $lat)
    {
//        date_default_timezone_set("Asia/Shanghai");
        $this->lng = $lng;
        $this->lat = $lat;
        $this->createTime = date('Y-m-d H:i:s', time());
        $query = $this->db->insert("mapdemo",$this);
        return $query;
    }


}
