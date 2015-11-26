<?php

class Login_model  extends CI_Model
{
	var $id = "";
	var $name = "";
	var $no   = "";



    public function __construct()
    {
        parent::__construct();
    }


    public function get_admin_by_id($id)
    {
    	$query = $this->db->query("select `password` from `manager` where `id` = ". intval($id,10) );
        return $query;      
    }

    //通过代号查找地区
    public function get_id($name, $password)
    {
    	$query = $this->db->query("select id from `manager` where `name` = '". $name . "' and `password` = '" .$password ."'");
       	return $query;
    }

    public function get_shopid($phone, $password)
    {
    	$query = $this->db->query("select * from `shop` where `phoneNo` = '". $phone . "' ");
       	return $query;
    }
}
