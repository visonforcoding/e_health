<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-10-10  by chenban
 * 后台
*/
class Balance_model  extends LM_Model{
	
    public function __construct(){
        parent::__construct();
    }

    public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = '',$like=array()) {
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $selectStr="withdraw.*,store.storeName,store_detail.account_no,store_detail.account_name";
        if (!empty($where)) {
            $nums = $this->db->where($where,null,false)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                             ->join('store_detail','store_detail.sid=withdraw.sid')
                             ->join('store','store.id=withdraw.sid')
                             ->where($where,null, FALSE)->like($like)->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                             ->join('store_detail','store_detail.sid=withdraw.sid')
                             ->join('store','store.id=withdraw.sid')
                             ->where($where,null,FALSE)->like($like)->limit($pageSize, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->join('store_detail','store_detail.sid=withdraw.sid')
                                ->join('store','store.id=withdraw.sid')
                                ->like($like)
                                ->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                                ->join('store_detail','store_detail.sid=withdraw.sid')
                                ->join('store','store.id=withdraw.sid')
                                ->like($like)
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
