<?php

class Shop_model extends CI_Model
{
	 var $name = '';
    var $phoneNo = '';
    var $address = '';
    var $coordinate = '';
    var $workTime = '';
    var $logo1 = '';
    var $logo2 = '';
    var $logo3 = '';
    var $tel = '';
    var $email = '';
    var $desc = '';
    var $password = '';
    var $flag = '';
    var $busyST = '';
    var $areaId = '';
    var $busyDate = '';


    public function __construct()
    {
        parent::__construct();
    }

    //查找全部微店
    public function get_all_shops()
    {
        $query = $this->db->get('shop');
        return $query;
    }
	
    public function get_all_using_shops($areaid=0)
    {
        if($areaid > 0){
            $query = $this->db->query("select s.* from shop s,area a where a.pid='$areaid' and s.areaId = a.id and s.flag='1'");
        }else{
            $query = $this->db->query('select * from shop where flag="1"');
        }
        return $query;
    }

    //通过id查微店
    public function get_shop_by_id($id)
    {
        $query = $this->db->query("select * from `shop` where `id` = " . intval($id, 10));
        return $query;
    }

    //通过手机号查微店
    public function get_shop_by_phone($phone)
    {
        if ($phone == "") {
            $query = $this->db->get('shop');
        } else {
            $query = $this->db->query("select * from `shop` where `phoneNo` = '" . $phone . "'");
        }
        return $query;
    }

    //插入手机号
    public function add_shop_phone($phone)
    {
        $this->phoneNo = $phone;
        $query = $this->db->insert('shop', $this);
        return $query;
    }

    //查询店铺评论
    /**
	 * $param  array
	 * $type 1查询列表  默认       2总条数     
	 */
    public function get_comment($param, $type=1)
    {
		$column = "m.*, u.nike AS uname, u.phoneNo AS uphone, spser.name AS spname, re.content AS recont";
		$cond = "1=1"; $limit = "";
		if($type == 2) $column = "count(*) as num";
		if(isset($param['sid'])) $cond .= " and m.sid={$param['sid']}";
		if(isset($param['type'])) $cond .= " and m.type={$param['type']}";
		if(isset($param['begin_time'])) $cond .= " and m.comTime>='{$param['begin_time']}'";
		if(isset($param['end_time'])) $cond .= " and m.comTime<='{$param['end_time']}'";
		if($type == 1 && isset($param['begin'])) $limit = " limit {$param['begin']}, {$param['row']}";
		
        $sql = "SELECT $column 
        FROM `comment` m 
		LEFT JOIN orderShop os ON m.oid=os.id 
		LEFT JOIN `user` u ON m.uid=u.id 
		LEFT JOIN shop s ON m.sid=s.id 
		LEFT JOIN (SELECT sp.id, ser.id AS serid, sp.serviceId, ser.name FROM service ser, shopPrice sp WHERE sp.serviceId = ser.id) AS spser ON os.serviceId = spser.id
		LEFT JOIN reply re ON re.cid = m.id
        WHERE $cond 
        ORDER BY m.id DESC $limit";
        return $this->db->query($sql);
    }

    public function add_shop_phone2($name, $address, $coordinate, $workTime, $busyTime, $busyDate,$areaId, $logo1, $logo2, $logo3, $tel, $phoneNo, $email, $desc, $password, $flag)
    {
        $this->name = $name;
        $this->address = $address;
        $this->coordinate = $coordinate;
        $this->workTime = $workTime;
        $this->busyST = intval($busyTime,10);
        $this->busyDate = $busyDate;
        $this->logo1 = $logo1;
        $this->logo2 = $logo2;
        $this->logo3 = $logo3;
        $this->tel = $tel;
        $this->phoneNo = $phoneNo;
        $this->email = $email;
        $this->desc = $desc;
        $this->password = $password;
        $this->areaId = intval($areaId, 10);
        $this->flag = $flag == '0' ? '0' : '1';

        $query = $this->db->insert('shop', $this);
        return $query;
    }

    public function edit_shop($id, $name, $areaId, $address, $coordinate, $workTime,$busyTime,$busyDate, $logo1, $logo2, $logo3, $tel, $phoneNo, $email, $desc, $password, $flag)
    {
        $this->id = intval($id, 10);
        $this->name = $name;
        $this->address = $address;
        $this->coordinate = $coordinate;
        $this->workTime = $workTime;
        $this->busyST = intval($busyTime,10);
        $this->busyDate = $busyDate;
		//如果未修改该值，不对该值处理
		if($logo1 != '')
		{
			$this->logo1 = $logo1;
		}else{
			unset($this->logo1);
		}
		//如果未修改该值，不对该值处理
		if($logo2 != '')
		{
			$this->logo2 = $logo2;
		}else{
			unset($this->logo2);
		}
				//如果未修改该值，不对该值处理
		if($logo3 != '')
		{
			$this->logo3 = $logo3;
		}else{
			unset($this->logo3);
		}
		
        $this->tel = $tel;
        $this->phoneNo = $phoneNo;
        $this->email = $email;
        $this->desc = $desc;
        if($password != '')
        {
        	$this->password = $password;
        }else{
        	unset($this->password);
        } 
        $this->flag = $flag == '0' ? '0' : '1';
        $this->areaId = intval($areaId, 10);

        $query = $this->db->update('shop', $this, array('id' => intval($id, 10)));
        return $query;
    }

    //启动关闭店铺
    public function on_off_shop($phone, $flag)
    {
        $query = $this->db->query("update `shop` set `flag`  ='" . $flag . "' where `id` = " . $phone);
        return $query;
    }
}
