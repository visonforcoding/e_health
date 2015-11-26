<?php

class Order_Model extends CI_Model
{
    var $name = '';
    var $phoneNo = '';
    var $coordinate = '';
    var $carId = '';
    var $logo = '';


    function __construct()
    {
        parent::__construct();
    }

    //查找全部评论
    function get_all_orders()
    {
        $query = $this->db->get('order');
        return $query;
    }

    //通过店铺查询订单
    function get_order_by_sid($sid)
    {
        if(!$sid){
            $query = $this->db->get('order');
        }else{
            $query = $this->db->query("select * from order where sid='" . $sid . "';");
        }
        return $query;
    }


}
