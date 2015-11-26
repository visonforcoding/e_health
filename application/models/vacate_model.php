<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-8 16:54:10 by caowenpeng , caowenpeng1990@126.com
 */
class Vacate_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getJsonData($tableName, $page, $rows, $sort = '', $order = '', $where = '') {
        $offset = ($page - 1) * $rows; //分页起始条数
        $selectStr = 'store_employee_vacate.id,store_employee_vacate.days,store_employee_vacate.begin_time,store_employee_vacate.end_time,'
                . 'store_employee_vacate.end_time,store_employee.employee_no,store_employee.truename,store_employee_vacate.status,'
                . 'store_employee_vacate.days';
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store_employee', 'store_employee.id = store_employee_vacate.employee_id')
                                ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store_employee', 'store_employee.id = store_employee_vacate.employee_id')
                                ->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store_employee', 'store_employee.id = store_employee_vacate.employee_id')
                                ->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store_employee', 'store_employee.id = store_employee_vacate.employee_id')
                                ->limit($rows, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        if (empty($res)) {
            $res = array();
        }
        if ($nums > 0) {
            $total_pages = ceil($nums / $rows);
        } else {
            $total_pages = 0;
        }
        $arr_json = array('page' => $page, 'total' => $total_pages, 'records' => $nums, 'rows' => $res);
        return $arr_json;
    }

}
