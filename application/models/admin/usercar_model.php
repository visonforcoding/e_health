<?php

class Usercar_model extends CI_Model
{
    var $state = '';
    var $type = '';
    var $name = '';
    var $mprice = '';
    var $price = '';
    var $desc = '';


    function __construct()
    {
        parent::__construct();
    }

    //查找全部车辆
    function get_all_usercars()
    {
        $query = $this->db->get('userCar');
        return $query;
    }


    //通过服务名称查服务
    function get_usercar_by_uid($uid)
    {
        if ($uid == "") {
            $query = $this->get_all_usercars();
        } else {
            $query = $this->db->query("select * from userCar where uid=" . $uid . ";");
        }
        return $query;
    }

}
