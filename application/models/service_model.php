<?php

class Service_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }

     /**
     * 通用型获取适用jesyui datagird 的数据形式
     * @param type $tableName 表名
     * @param type $curPage  当前页码
     * @param type $pageSize 每页数量
     * @param type $sort   排序字段
     * @param type $order  排序方式 asc desc
     * @param type $where  查询条件
     * @return array
     */
    public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = '') {
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $selectStr = "store_service.*,store.storeName as store";
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->where($where)
                                ->join('store','store_service.storeId=store.id')
                                ->limit($pageSize, $offset)
                                ->order_by($sort, $order)
                                ->get($tableName);
            } else {
                $res = $this->db
                            ->select($selectStr)
                            ->join('store','store_service.storeId=store.id')
                            ->where($where)
                            ->limit($pageSize, $offset)
                            ->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->join('store','store_service.storeId=store.id')
                                ->limit($pageSize, $offset)
                                ->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                                ->join('store','store_service.store.storeId=store.id')
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


    /**
     * 查出id 对应 服务名的数组结构
     * @return type
     */
    public function getServiceNameArr() {
        $query_services = $this->db->get('service');
        $services = $query_services->result_array();
        $services_arr = array();
        foreach ($services as $value) {
            $services_arr[$value['id']] = $value['name'];
        }
        return $services_arr;
    }

    
    /**
     * 
     * @return type
     */
    public function getServiceArrPlus() {
        $query_services = $this->db->get('store_service');
        $services = $query_services->result_array();
        $services_arr = array();
        foreach ($services as $value) {
            $services_arr[$value['id']] = $value;
        }
        return $services_arr;
    }

    /**
     * 格式化店铺数据
     * @param array $stores
     * @param array $services_arr
     * @return type
     */
    public function formatStoreArr(array $stores, array $services_arr) {
        foreach ($stores as $key => $value) {
            $service_ids = unserialize($value['serviceIds']);
            $stores[$key]['services'] = '';
            if (is_array($service_ids) && !empty($service_ids)) {
                $service_arr = array();
                foreach ($service_ids as $v) {
                    $service_arr[] = $services_arr[$v];
                }
                $stores[$key]['services'] = implode('、', $service_arr);
            }
        }
        return $stores;
    }

    /**
     * 格式化数据升级版
     * @param array $stores
     * @param array $services_arr
     * @return array
     */
    public function formatStoreArrPlus(array $stores, array $services_arr) {
        foreach ($stores as $key => $value) {
            $service_ids = unserialize($value['serviceIds']);
            $stores[$key]['services'] = '';
            if (is_array($service_ids) && !empty($service_ids)) {
                $service_arr = array();
                foreach ($service_ids as $v) {
                    $service_arr[] = $services_arr[$v];
                }
                $stores[$key]['services'] = $service_arr;
            }
        }
        return $stores;
    }

    /**
     * 组织店铺数据结构
     * @param array $stores  店铺数据数组 一定要包含id
     * @param bollen $stringService true services输出字符串 false 输出数组
     * @return array
     */
    public function formatStores(array $stores, $stringService = false,$coordinate='') {
        $stores_ids = array();
        if(empty($stores)){
            return array();
        }
        foreach ($stores as $value) {
            $stores_ids[] = $value['id'];
        }
        //查询所有服务项目
        $query_services = $this->db->select('store_service.name,store_service.price,store_service.storeId')
                ->where_in('store_service.storeId', $stores_ids)
                ->get('store_service');
        $store_services = $query_services->result_array();

        $services_arr = array();
        foreach ($store_services as $value) {
            $services_arr[$value['storeId']][] = $value['name'];
        }
        
        $store_service_struct = array();
        foreach ($store_services as $value) {
            $storeId = $value['storeId'];
            if (!$stringService) {
                $store_service_struct["$storeId"][] = array(
                    'name' => $value['name'],
                    'price' => $value['price']
                );
            } else {
                $store_service_struct[$storeId] = implode('、', $services_arr[$storeId]);
            }
        }
        foreach ($stores as $key => $value) {
            $coordinate2 = isset($value['coordinate'])?$value['coordinate']:null;
            if(!empty($coordinate)&&!empty($coordinate2)){
                $stores[$key]['distance'] = getDistance($coordinate,$coordinate2);
            }else{
                $stores[$key]['distance'] = 'error';
            }
            $arr_key = $value['id'];
            if (!$stringService) {
                if (array_key_exists($arr_key, $store_service_struct)) {
                    $stores[$key]['services'] = $store_service_struct[$arr_key];
                } else {
                    $stores[$key]['services'] = array();
                }
            } else {
                if (array_key_exists($arr_key, $store_service_struct)) {
                    $stores[$key]['services'] = $store_service_struct[$arr_key];
                } else {
                    $stores[$key]['services'] = '';
                }
            }
        }
        return $stores;
    }
    
    
    /**
     * 组织技师数据结构
     * @param array $engineers  店铺数据数组 一定要包含id
     * @param bollen $stringService true services输出字符串 false 输出数组
     * @return array
     */
    public function formatEngineers(array $engineers, $stringService = false) {
        $engineers_ids = array();
        foreach ($engineers as $value) {
            $engineers_ids[] = $value['id'];
        }
        //查询所有服务项目
        $query_services = $this->db->select('service.name,service.price,engineer_service.engineerId')
                ->join('service', 'service.id = engineer_service.serviceId')
                ->where_in('engineer_service.engineerId', $engineers_ids)
                ->get('engineer_service');
        $engineers_services = $query_services->result_array();

        $services_arr = array();
        foreach ($engineers_services as $value) {
            $services_arr[$value['storeId']][] = $value['name'];
        }
        
        $engineer_service_struct = array();
        foreach ($engineers_services as $value) {
            $engineerId = $value['engineerId'];
            if (!$stringService) {
                $engineer_service_struct["$engineerId"][] = array(
                    'name' => $value['name'],
                    'price' => $value['price']
                );
            } else {
                $engineer_service_struct[$engineerId] = implode('、', $services_arr[$engineerId]);
            }
        }
        foreach ($engineers as $key => $value) {
            $arr_key = $value['id'];
            if (!$stringService) {
                if (array_key_exists($arr_key, $engineer_service_struct)) {
                    $engineers[$key]['services'] = $engineer_service_struct[$arr_key];
                } else {
                    $engineers[$key]['services'] = array();
                }
            } else {
                if (array_key_exists($arr_key, $engineer_service_struct)) {
                    $engineers[$key]['services'] = $engineer_service_struct[$arr_key];
                } else {
                    $engineers[$key]['services'] = '';
                }
            }
        }
        return $engineers;
    }

    /**
     * 通过店铺id 查找它的所有服务
     * @param type $storeId 店铺id
     * @param type $isVisit  true 上门 false 所有
     * @param boolean $isString false 返回数组 true 返回字符串
     * @return type
     */
    public function fetchServicesByStoreid($storeId, $isVisit = false,$isString = false) {
        //查询所有服务项目
        $where['store_service.storeId'] = $storeId;
        if ($isVisit) {
            $where['store_service.isVisit'] = 1;
        }
        $query_services = $this->db->select('store_service.stime,store_service.id,store_service.name,store_service.price,store_service.storeId,'
                        . 'store_service.efficacy')
                ->where($where)
                ->get('store_service'); 
        $services = $query_services->result_array();
        if($isString){
            if($services){
                foreach ($services as $value){
                    $services_arr[] = $value['name'];
                }
                $services = implode('、', $services_arr);
            }else{
                $services = '';
            }
        }
        return $services;
    }

    /**
     * 通过店铺id查找店铺服务项
     * @param int $store_id  店铺id
     * @return array
     */
    public function getStoreService($store_id){
        $query = $this->db->select('store_service.id as serviceId,store_service.name,store_service.isVisit,store_service.price')
                ->where(array('store_service.storeId' => $store_id))
                ->get('store_service');

        $services = $query->result_array();

        if(!$services){
            $services = array();
        }

        return $services;
    }

    /**
     * 通过服务项id获取服务项信息
     * @param int $id  店铺id
     * @return array
     */
    public function getServiceById($id){
        $query = $this->db->where(array('id'=>$id))->get('store_service');
        $service = $query->row_array();
        return $service;
    }
       

}
