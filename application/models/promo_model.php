<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-7-30 11:34:56 by caowenpeng , caowenpeng1990@126.com
 * 用户模型
*/
class Promo_model extends LM_Model{
    function __construct() {
        parent::__construct();
    }

    public function getJsonData($tableName, $page, $rows, $sort = '', $order = '', $where = '') {
    	$offset = ($page - 1) * $rows; //分页起始条数
        $selectStr = 'store_promo.id,store_promo.title,store_promo.mprice,store_promo.price,store_promo.begintime,store_promo.endtime,store_promo.isVisit,store_promo.status,store_service.name as service';
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                        ->select($selectStr)
                        ->join('store_service','store_promo.serviceId = store_service.id')
                        ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);

            } else {
                $res = $this->db
                        ->select($selectStr)
                        ->join('store_service','store_promo.serviceId = store_service.id')
                        ->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                        ->select($selectStr)
                        ->join('store_service','store_promo.serviceId = store_service.id')
                        ->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                        ->select($selectStr)
                        ->join('store_service','store_promo.serviceId = store_service.id')
                        ->limit($rows, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        foreach ($res as $key => $value) {
        	if($value['status']=='1'){
        		$res[$key]['status']='启用';
        	}else{
        		$res[$key]['status']='关闭';
        	}

            if($value['isVisit']=='1'){
                $res[$key]['isVisit']='上门+到店';
            }else{
                $res[$key]['isVisit']='上门';
            }
        }

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

    public function getPromoById($id){
        $query = $this->db->where(array('id'=>$id))->get('store_promo');
        $promo = $query->row_array();
        return $promo;
    }
}

