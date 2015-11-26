<?php

class Orderhelper_Model extends CI_Model
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
    function get_all_orderhelpers()
    {
        $query = $this->db->get('orderHelper');
        return $query;
    }
    

    //通过店铺查询评论
    function get_orderhelper_by_uid($uid)
    {
        if($uid){

        }
        $query = $this->db->query("select *  FROM orderHelper WHERE  uid='" . $uid . "';");


        return $query;
    }


}
