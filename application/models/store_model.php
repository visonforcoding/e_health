<?php

class Store_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }

    
    
    /**
     * 猜你喜欢
     * @param type $login_user
     * @param type $location_id
     * @return type
     */
    public function guessYouLike($login_user,$location_id) {
        $stores_view = array();
        if ($login_user) {
            $user_id = $login_user['id'];
            $query_viewlog = $this->db->select('store.id,store.storeName,store.cover,store.commentNums,store.score,'
                            . 'area.name,store.coordinate')
                    ->join('store', 'store.id = view_log.storeId')
                    ->join('area', 'area.id = store.regionId', 'left')
                    ->where("view_log.userId = '$user_id' and store.status = '1'")
                    ->order_by('view_log.vtime', 'desc')
                    ->limit(5)
                    ->get('view_log');
            $stores_view = $query_viewlog->result_array();
            $stores_view_count = count($stores_view);
        }
        $where['store.cityId'] = $location_id;
        $where['store.status'] = 1;
        if ($stores_view) {
            if ($stores_view_count < 5) {
                $storesIds_arr = array();
                foreach ($stores_view as $value) {
                    $storesIds_arr[] = $value['id'];
                }
                $limit_nums = 5 - count($stores_view);
                $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.commentNums,'
                        . 'store.coordinate,store.score')
                        ->join('area', 'area.id = store.regionId', 'left')
                        ->where($where)
                        ->where_not_in('store.id', $storesIds_arr)
                        ->limit($limit_nums)
                        ->order_by('rand()')
                        ->get('store');
                $stores = $query_stores->result_array();
                $stores = array_merge($stores_view, $stores);
            } else {
                $stores = $stores_view;
            }
        } else {
            $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.commentNums,'
                    . 'store.coordinate,store.score')
                    ->join('area', 'area.id = store.regionId', 'left')
                    ->where($where)
                    ->limit(5)
                    ->order_by('rand()')
                    ->get('store');
            $stores = $query_stores->result_array();
        }
        return $stores;
    }
    
    public function ckTelExit($tel){
        $query_tel = $this->db->select('id,pwd,bossName,bossTel')
                ->where("bossTel = '$tel' and `status` = '1'")
                ->get('store');
        $store= $query_tel->row_array();
        
        return $store;
    }
    
    public function findStoreById($id){
        $query_store = $this->db
                ->where("`id` = '$id'")
                ->get('store');
        $store = $query_store->row_array();
        return $store;
    }

}
