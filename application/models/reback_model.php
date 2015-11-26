<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-10-10  by chenban
*/
class Reback_model  extends LM_Model{
	
    public function __construct(){
        parent::__construct();
    }

    public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = '') {
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $selectStr="reback.*,order.orderNo,member.nick,member.Tel,store.storeName";
        if (!empty($where)) {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                              ->join('order','reback.order_id=order.id','left')
                              ->join('member','reback.user_id=member.id','left')
                              ->join('store','reback.store_id=store.id','left')
                              ->where($where)
                              ->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                              ->join('order','reback.order_id=order.id','left')
                              ->join('member','reback.user_id=member.id','left')
                              ->join('store','reback.store_id=store.id','left')
                              ->where($where)->limit($pageSize, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                              ->join('order','reback.order_id=order.id','left')
                              ->join('member','reback.user_id=member.id','left')
                              ->join('store','reback.store_id=store.id','left')
                              ->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                              ->join('order','reback.order_id=order.id','left')
                              ->join('member','reback.user_id=member.id','left')
                              ->join('store','reback.store_id=store.id','left')
                              ->limit($pageSize, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        if (empty($res)) {
            $res = array();
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        return $arr_json;
    }
    


}
