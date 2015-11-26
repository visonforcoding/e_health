<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-27 16:49:37 by caowenpeng , caowenpeng1990@126.com
 */
class Usercard_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 返回jqgrid 所需的json 数据格式
     * jqgrid 数据表格jquery  插件 @link http://www.trirand.com/blog/?page_id=15 jqgrid 官网
     * @param type $tableName 表名
     * @param type $page 页码
     * @param type $rows 每页显示行数
     * @param type $sort 排序字段
     * @param type $order 排序形式
     * @param type $where 查询条件
     * @return array total 总页数 page 当前页码 records 总记录数 rows 数据数组
     * 
     */
    public function getJsonData($tableName, $page, $rows, $sort = '', $order = '', $where = '') {
        $offset = ($page - 1) * $rows; //分页起始条数
        $selectStr = 'card.name,member_card.id,member.tel,member.trueName,member_card.expires_date,'
                . 'member_card.get_date,card.expires,member_card.price';
        if (!empty($where)) {
            $nums = $this->db ->join('member','member.id = member_card.user_id')
                         ->join('card','card.id = member_card.card_id')
                    ->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                        ->join('member','member.id = member_card.user_id')
                         ->join('card','card.id = member_card.card_id')
                        ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                        ->join('member','member.id = member_card.user_id')
                         ->join('card','card.id = member_card.card_id')
                        ->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                        ->join('member','member.id = member_card.user_id')
                        ->join('card','card.id = member_card.card_id')
                        ->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                        ->join('member','member.id = member_card.user_id')
                        ->join('card','card.id = member_card.card_id')
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
