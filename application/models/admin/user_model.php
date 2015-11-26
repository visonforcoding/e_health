<?php

class User_model  extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }


    public function get_users()
    {
        $query = $this->db->get('user');
        return $query;
    }

    //通过手机号查用户
    public function get_user_by_phone($phone="")
    {
    	if($phone == "")
    	{
    		$query = $this->db->get('user');
    	}
    	else
    	{
    		$query = $this->db->query("select * from `user` where `phoneNo` = '". $phone."'");
		}
       	return $query;
    }

    //启动关闭用户
    public function on_off_user($phone, $flag)
    {
           $query = $this->db->query("update `user` set `flag` ='".$flag."' where `phoneNo` = '". $phone."'");

           return $query;
    }

}
