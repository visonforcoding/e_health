<?php

class Manager_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = '') {
         $offset = ($curPage - 1) * $pageSize; //分页起始条数
        if(!empty($where)){
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select('manager.*,admin_group.name as gname,manager.name as mname')
                        ->join('admin_group','admin_group.id = manager.role')
                        ->where($where)
                        ->limit($pageSize, $offset)
                        ->order_by($sort,$order)
                        ->get($tableName);
            } else {
                $res = $this->db->select('manager.*,admin_group.name as gname,manager.name as mname')
                        ->join('admin_group','admin_group.id = manager.role')
                        ->where($where)->limit($pageSize,$offset )->get($tableName);
            }
        }else{
            $nums = $this->db->count_all_results($tableName); //总条数
            if(!empty($order)) {
                $res = $this->db->select('manager.*,admin_group.name as gname,manager.name as mname')
                        ->join('admin_group','admin_group.id = manager.role')
                        ->limit($pageSize, $offset)->order_by($sort,$order)->get($tableName);
            } else {
                $res = $this->db->select('manager.*,admin_group.name as gname,manager.name as mname')
                        ->join('admin_group','admin_group.id = manager.role')
                        ->limit($pageSize,$offset )->get($tableName);
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
