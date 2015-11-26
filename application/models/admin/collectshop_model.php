<?php

class Collectshop_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //查找全部技师
    function get_all_collectshops()
    {
        $query = $this->db->query("select collectShop.id,collectShop.uid,collectShop.sid,collectShop.collectTime,user.cardId,user.phoneNo,user.nike from collectShop inner join user on collectShop.uid=user.id;");
        return $query;
    }
    //select cs.*, u.cardId,u.phoneNo,u.nike, s.flag from collectShop cs, shop s, user u where cs.uid=u.id and s.flag='1' and s.id=cs.sid


    //通过服务名称查服务
    function get_collectshop_by_uname($name)
    {
        if ($name == "") {
            $query = $this->get_all_collectshops();
        } else {
            $query = $this->db->query("select collectShop.id,collectShop.uid,collectShop.sid,collectShop.collectTime,user.cardId,user.phoneNo,user.nike from collectShop inner join user on collectShop.uid=user.id where user.nike='" . $name . "';");
        }
        return $query;
    }

    //统计用户收藏数量
    function get_collectshop_count_by_uid()
    {
        $query = $this->db->query("select uid, count(uid) from collectShop group by uid;");
        return $query;
    }

    //统计店铺被收藏的数量
    function get_collectshop_count_by_sid()
    {
        $query = $this->db->query("select sid, count(sid) from collectShop group by sid;");
        return $query;
    }

    //判断是否收藏了
    function check_exists($uid, $sid)
    {
        $query = $this->db->query("select * from collectShop where uid=" . $uid . " and sid=" . $sid . ";");
        return $query->result();
    }

    //增加收藏
    function add_collectshop($uid, $sid)
    {
//        date_default_timezone_set("Asia/Shanghai");

        $check_result = $this->check_exists($uid,$sid);

        $this->db->query("update collectShop set `default`='0' where uid=$uid");

        if($check_result){
            $this->db->query("update collectShop set `default`='1' where uid=$uid and sid=$sid");
            return $check_result;
        }
        $arr = array('uid'=>$uid, 'sid'=>$sid,'collectTime'=>date('Y-m-d H:i:s', time()),'default'=>'1');
        $query = $this->db->insert('collectShop', $arr);
        return $query;
    }

    //获取用户收藏店铺
    function get_collectshop_by_uid($uid)
    {
        $query = $this->db->query("select cs.uid,cs.sid,cs.collectTime,cs.default,s.* from collectShop cs, shop s where cs.sid=s.id and cs.uid=$uid and s.flag='1' order by cs.default desc");
        return $query;
    }
    //select cs.uid,cs.sid,cs.collectTime,cs.default,s.* from collectShop cs, shop s where cs.sid=s.id and cs.uid=18
    //select cs.*, u.cardId,u.phoneNo,u.nike, s.flag from collectShop cs, shop s, user u where cs.uid=u.id and s.flag='1' and s.id=cs.sid

}
