<?php

class Ordershop_Model extends CI_Model
{
    private $name = '';
    private $phoneNo = '';
    private $coordinate = '';
    private $carId = '';
    private $logo = '';


    public function __construct()
    {
        parent::__construct();
    }

    //查找全部订单
    public function get_all_ordershops($begin=0, $row=20)
    {
        $query = $this->db->query("SELECT * FROM orderShop ORDER BY id DESC LIMIT $begin, $row" );
        return $query;
    }
    //查找全部订单
    public function get_all_ordershops_count($uid=0)
    {
        $re = $this->db->query("SELECT count(*) as num FROM orderShop".($uid>0?" where uid=$uid":"") );
		$row = $re->row_array(); 
        return $row['num'];
    }


    //通过用户id查询店铺
    public function get_ordershop_by_uid($uid, $begin=0, $row=20)
    {
        $sql = "SELECT o.*, s.name, ser.name AS serviceName, ser.mprice, ser.price 
        FROM orderShop o, shop s, shopPrice sp, service ser WHERE o.uid='$uid' 
        AND o.sid = s.id 
        AND o.serviceId=sp.id 
        AND sp.serviceId = ser.id 
        ORDER BY o.id DESC limit $begin, $row";
		//showoo($this->db->last_query()		);
        return $this->db->query($sql);
    }
	
    //查询店铺订单， 可以筛选  用户id  店铺id  服务id  并且按照订单付款的时间维度
    /**
	 * $param  array
	 * $type 1查询列表  默认       2总条数     3总金融    4 总条数 +总金融 
	 */
    public function get_ordershop($param, $type=1)
    {
		$column = "o.*, u.phoneNo AS uphone, u.nike, s.name AS sname, spser.name AS serviceName, uc.name AS ucname, CONCAT(car.proname,car.carNO) AS carNO";
		$cond = "1=1"; $limit = "";
		if($type == 2) $column = "count(*) as num";
		if($type == 3) $column = "SUM(price) as total_price";
		if($type == 4) $column = "count(*) as num, SUM(amount) as total_amount";
		if(isset($param['uid'])) $cond .= " and o.uid={$param['uid']}";
		//if(isset($param['phone'])) $cond .= " u.phoneNo={$param['phone']}";
		if(isset($param['sid'])) $cond .= " and o.sid={$param['sid']}";
		if(isset($param['area_id'])) $cond .= " and s.areaId={$param['area_id']}";
		if(isset($param['service_id'])) $cond .= " and spser.serid={$param['service_id']}";
		if(isset($param['begin_time'])) $cond .= " and o.payTime>='{$param['begin_time']}'";
		if(isset($param['end_time'])) $cond .= " and o.payTime<='{$param['end_time']}'";
		if($type == 1 && isset($param['begin'])) $limit = " limit {$param['begin']}, {$param['row']}";
		
        $sql = "SELECT $column
        FROM  orderShop AS o 
        LEFT JOIN `user` AS u ON o.uid = u.id 
        LEFT JOIN shop AS s ON o.sid = s.id 
        LEFT JOIN userCar AS car ON o.carId = car.id 
 		LEFT JOIN (SELECT sp.id, ser.id AS serid, sp.serviceId, ser.name FROM service ser, shopPrice sp WHERE sp.serviceId = ser.id) AS spser ON o.serviceId = spser.id 
        LEFT JOIN (SELECT coupon.name, userCoupon.id FROM coupon, userCoupon WHERE userCoupon.cid = coupon.id) AS uc ON o.ucid = uc.id  
        WHERE $cond 
        AND o.orderStatus <> 1
        ORDER BY o.id DESC $limit";
        //showoo($sql);
        return $this->db->query($sql);
    }

    //通过店铺id查询订单
    public function get_ordershop_count_by_sid(){
        $query = $this->db->query("select sid, count(sid) as num from orderShop where orderStatus = 2 or orderStatus = 5 group by sid");
        return $query;
    }


    //按服务类型统计总金额
    function get_ordershop_count_by_service()
    {
        $query = $this->db->query("select shopPrice.serviceId, count(shopPrice.serviceId),sum(orderShop.amount),service.name from orderShop inner join shopPrice on orderShop.serviceId = shopPrice.id inner join service on shopPrice.serviceId = service.id group by shopPrice.serviceId order by sum(orderShop.amount) desc;");
        return $query;
    }

    //按微店统计总金额
    function get_ordershop_count_by_shop()
    {
        $query = $this->db->query("select orderShop.sid, count(orderShop.sid),sum(orderShop.amount),shop.name from orderShop inner join shop on orderShop.sid = shop.id group by orderShop.sid order by sum(orderShop.amount) desc;");
        return $query;
    }

    //查看今天
    function get_ordershop_count_by_today()
    {
        $now = date('Y-m-d 00:00:00', time());
        $query = $this->db->query("select createTime, count(id),sum(amount) from orderShop where createTime >= '".$now."';");
        return $query;
    }

    //查看本月
    function get_ordershop_count_by_month(){
        $query = $this->db->query("select count(id),sum(amount) from orderShop where date_format(createTime,'%Y-%m')=date_format(now(),'%Y-%m');");
        return $query;
    }


    //查看本年
    function get_ordershop_count_by_year(){
        $query = $this->db->query("select count(id),sum(amount) from orderShop where date_format(createTime,'%Y')=date_format(now(),'%Y');");
        return $query;
    }
    

}
