<?php

class Usercoupon_model extends CI_Model
{
    var $id = '';
    var $uid = '';
    var $cid = '';
    var $code = '';
    var $flag = '';


    function __construct()
    {
        parent::__construct();
    }

    //查找全部技师
    function get_all_usercoupons()
    {
        $query = $this->db->query("select userCoupon.*,user.phoneNo,user.nike from userCoupon inner join user on userCoupon.uid=user.id;");
        return $query;
    }


    //通过服务名称查服务
    function get_usercoupon_by_phoneNo($phoneNo)
    {
        if ($phoneNo == "") {
            $query = $this->get_all_usercoupons();
        } else {
            $query = $this->db->query("select userCoupon.*,user.phoneNo,user.nike from userCoupon inner join user on userCoupon.uid=user.id where user.phoneNo='" . $phoneNo . "';");
        }
        return $query;
    }

    function get_usercoupon_count_by_uid()
    {
        $query = $this->db->query("select uid, count(uid) from userCoupon group by uid;");
        return $query;
    }

    function get_usercoupon_count_by_sid()
    {
        $query = $this->db->query("select sid, count(sid) from userCoupon group by sid;");
        return $query;
    }
	
	/**
	 * 使用优惠券
	 */
    function consumeCoupon($id)
    {
        $re = $this->db->query("select * from userCoupon where id=$id");
		$tmp = $re->row_array();
		if(!$tmp) return;
		$cond = array();
		if($tmp['twice'] > $tmp['used']){ //次卡就减次数  否则就直接使用完
			$cond['used'] = intval($tmp['used'])+1;
			if(($tmp['twice'] - $tmp['used']) == 1) $cond['flag'] = 2;
		}
		else{
			$cond['flag'] = 2;
		}
		$this->db->update('userCoupon', $cond, array('id'=>$id)); 
    }

    function start($id)
    {
        $query = $this->db->query("update userCoupon set flag='1' where id=" . $id . ";");
        return $query;
    }

    function stop($id)
    {
        $query = $this->db->query("update userCoupon set flag='0' where id=" . $id . ";");
        return $query;
    }


    function add_usercoupon($state, $type, $name, $mprice, $price, $desc)
    {
        $this->state = $state;
        $this->type = $type;
        $this->name = $name;
        $this->mprice = $mprice;
        $this->price = $price;
        $this->desc = $desc;

        $query = $this->db->insert('userCoupon', $this);
        return $query;
    }

    function delete_usercoupon_by_id($id)
    {
        $query = $this->db->query("delete from userCoupon where id='" . $id . "';");
        return $query;
    }

    function saveService($id, $state, $type, $name, $mprice, $price, $desc)
    {
        $data = array('state' => $state, 'type' => $type, 'name' => $name, 'mprice' => $mprice, 'price' => $price, 'desc' => $desc);

        $where = "id = '" . $id . "'";

        $str = $this->db->update_string('userCoupon', $data, $where);

        $query = $this->db->query($str);

        return $query;
    }

}
