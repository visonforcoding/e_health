<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-10-27 11:05:25 by caowenpeng , caowenpeng1990@126.com
*/

class Card_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getJsonData($tableName,$store_id, $page, $rows, $sort = '', $order = '', $where = '') {
        $offset = ($page - 1) * $rows; //分页起始条数
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->limit($rows, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        $this->load->model('Service_model','service_model');
        $services = $this->service_model->fetchServicesByStoreid($store_id);
        if (empty($res)) {
            $res = array();
        }else{
            $contentStr = '';
            foreach($res as $key=>$value){
                $content = $value['content'];
                $content_arr = unserialize($content);
                foreach ($content_arr as $k=>$v){
                    foreach ($services as $service) {
                        if($service['id'] == $v['id']){
                            $contentStr .= $service['name'].'('.$v['nums'].'次)';
                        }
                    }
                }
                $res[$key]['contentStr'] = $contentStr;
            }
        }
        
        if ($nums > 0) {
            $total_pages = ceil($nums / $rows);
        } else {
            $total_pages = 0;
        }
        $arr_json = array( 'page' => $page, 'total'=>$total_pages,'records'=>$nums,'rows' => $res);
        return $arr_json;
    }

    
}