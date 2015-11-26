<?php

class Coupon_model  extends CI_Model
{
	var $id = "";
	var $type   = "";
    var $amount1 = "";
    var $amount2    = "";
	var $areaId   = "";
    var $shopId = "";
    var $beginTime  = "";
	var $endTime   = "";
    var $logo = "";
    var $desc = "";
    var $flag  = "";
    var $name = "";


    public function __construct()
    {
        parent::__construct();
    }


    public function get_coupons($id)
    {
    	if($id=='')
    	{
        	$query = $this->db->get('coupon');
        }
        else
        {
        	$query = $this->db->query("select * from `coupon` where `id` =". intval($id,10));
       	}
       	return $query;
        
    }

    //通过编号查找优惠券
    public function get_coupons_by_couponid($name)
    {
    	if($name == "")
    	{
    		$query = $this->db->get('coupon');
    	}
    	else
    	{
    		$query = $this->db->query("select * from `coupon` where `name` = '". $name . "'");
		}
       	return $query;
    }

    //通过微店id查找优惠券
    public function get_coupons_by_shopid($shopId)
    {
    	$query = $this->db->query("select * from `coupon` where `shopid` =". intval($shopId,10));
       	return $query;
    }


    //启动关闭优惠券
    public function on_off_coupon($couponId, $flag)
    {
           $query = $this->db->query("update `coupon` set `flag` ='".$flag."' where `id` = '". $couponId."'");
				
           return $query;
    }

    //增加优惠券
    public function add_coupon($name, $type, $amount1, $amount2, $areaId, $shopId, $beginTime, $endTime, $logo, $desc, $flag)
	{
        	$this->name = $name;
			$this->type = intval($type,10);   
		    $this->amount1 = $amount1; 
		    $this->amount2 = $amount2;    
			$this->areaId = $areaId;   
		    $this->shopId = $shopId; 
		    $this->beginTime = $beginTime; 
			$this->endTime = $endTime;  
		    $this->logo = $logo; 
		    $this->desc = $desc; 
		    $this->flag = $flag=='0'?'0':'1';  

        $query = $this->db->insert('coupon', $this);
		return $query;
    }

    public function edit_coupon($id, $name, $type, $amount1, $amount2, $areaId, $shopId, $beginTime, $endTime, $logo, $desc, $flag)
	{
			$this->id = intval($id,10);
			$this->name = $name;
			$this->type = $type;   
		    $this->amount1 = $amount1; 
		    $this->amount2 = $amount2;    
			$this->areaId = $areaId;   
		    $this->shopId = $shopId; 
		    $this->beginTime = $beginTime; 
			$this->endTime = $endTime;  
		    $this->logo = $logo; 
		    $this->desc = $desc; 
		    $this->flag = $flag=='0'?'0':'1';   

        $query = $this->db->update('coupon', $this, array('id' => intval($id,10)));
		return $query;
	}

    public function delete_coupon($id)
    {

        $query = $this->db->query("delete from `coupon` where `id` =".intval($id,10));
        return $query;
    }
}
