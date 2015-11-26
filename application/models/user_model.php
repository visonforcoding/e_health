<?php

class User_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function getJsonData($tableName, $page, $rows, $sort = '', $order = '', $where = '') {
    	$offset = ($page - 1) * $rows; //分页起始条数
        $selectStr = 'store_service.id as id,store_service.isVisit,service.name as service,service.price,service.stime ';
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                        ->select($selectStr)
                        ->join('service','store_service.serviceId = service.id')
                        ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);

            } else {
                $res = $this->db
                        ->select($selectStr)
                        ->join('service','store_service.serviceId = service.id')
                        ->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                        ->select($selectStr)
                        ->join('service','store_service.serviceId = service.id')
                        ->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                        ->select($selectStr)
                        ->join('service','store_service.serviceId = service.id')
                        ->limit($rows, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        foreach ($res as $key => $value) {
        	if($value['isVisit']=='1'){
        		$res[$key]['isVisit']='上门+到店';
        	}else{
        		$res[$key]['isVisit']='到店';
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
    
    //获取店铺的服务区域
    public function getServiceArea($sid){
        $query=$this->db->select('ServiceArea')->where(array('sid' =>$sid))->get('store_detail');
        $re=$query->row();
        $serviceArea=$re->ServiceArea;
        $areaData=array();
        if($serviceArea){
            $serviceArea=unserialize($serviceArea);
            //var_dump( $serviceArea);//exit;
            foreach ($serviceArea as $key => $value) {
                $arr2=array();
                foreach ($value as $k1 => $v1) {
                    $arr=array();
                    foreach ($v1 as $k2 => $v2) {
                       $arr[$k2]=$this->getAreaName($v2);  
                      
                    }
                    $arr2[$this->getAreaName($k1)]=$arr;
                   
                }
                $areaData[$this->getAreaName($key)]=$arr2;
            }
        }

     return  $areaData;
    }

    public function getAreaName($id){
         $query=$this->db->select('name')->where(array('id'=>$id))->get('area');
         $data=$query->row();
         return $data->name;
    }

    
    //获取店铺位置信息
    public function getStoreInfo($sid){
        $query=$this->db->select('cityId,areaId')->where(array('id'=>$sid))->get('store');
        $query_data=$query->row_array();
        //通过城市id获取省份id
        $query=$this->db->select('pid')->where(array('id'=>$query_data['cityId']))->get('area');
        $data=$query->row_array();
        //ids-店铺省份id 城市id 区域id
        $ids=$data['pid'].','.implode(',', $query_data);
        $query=$this->db->select('id,pid,name')->where("id in ($ids)")->get('area');
        $data=$query->result_array();
        return $data;
    }
    
    //通过区域名称查找
    public function getAreaInfo($area){
        $query=$this->db->select('pid,id')->where(array('name'=>$area))->get('area'); //区域id
        $query_data=$query->row_array();
        $regionaId=$query_data['id'];
        //var_dump( $regionaId);exit;
        //通过区域id找城市id,以及
        $query=$this->db->select('pid,id')->where(array('id'=>$query_data['pid']))->get('area');
        $data=$query->row_array();
        $cityId=$data['id'];
        //省份id
        $query=$this->db->select('pid,id')->where(array('id'=>$data['pid']))->get('area');
        $data=$query->row_array();
        $provinceId=$data['id'];
        $ids=$provinceId.','.$cityId.','.$regionaId;

        $query=$this->db->select('id,pid,name')->where("id in ($ids)")->get('area');
        $data=$query->result_array();
        return $data;
    }
  

}