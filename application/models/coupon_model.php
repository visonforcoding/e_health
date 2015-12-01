<?php

class Coupon_model extends LM_Model {
    
     /**
     * 获取优惠劵劵种数据
     * @param string $tablename 表名
     * @param int $curPage  当前页数
     * @param int $pageSize 每页显示的条数
     * @param string $sort 排序条件
     * @param string $order desc | asc 
     * @param string $where where条件 
     * @return array
     */
     public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = ''){
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $selectStr="coupon.*,store.storeName,store_service.name as service";
         if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                             ->join('store','store.id = coupon.shopId','left')
                             ->join('store_service','coupon.serviceId = store_service.id','left')
                             ->where($where)->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                             ->join('store','store.id = coupon.shopId','left')
                             ->join('store_service','coupon.serviceId = store_service.id','left')
                             ->where($where)->limit($pageSize, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->join('store','store.id = coupon.shopId','left')
                                ->join('store_service','coupon.serviceId = store_service.id','left')
                                ->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                                ->join('store','store.id = coupon.shopId','left')
                                ->join('store_service','coupon.serviceId = store_service.id','left')
                                ->limit($pageSize, $offset)->get($tableName);
            }
        }
       
        $res = $res->result_array();
        if (empty($res)) {
            $res = array();
        }

        foreach ($res as $k => $v) {
            if($v['type'] =='0'){
                $res[$k]['type'] = '现金劵';
            }else{
                $res[$k]['type'] = '满减劵';
            }

            if($v['storeName']==''){
                $res[$k]['storeName'] = '所有店铺';
            }

           if($v['service']==''){
             $res[$k]['service'] = '所有服务';
            }
        
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        return $arr_json;
     }


     //启动关闭优惠券
    public function on_off_coupon($couponId, $flag){
        $query = $this->db->query("update `coupon` set `flag` ='".$flag."' where `id` = '". $couponId."'");
                
        return $query;
    }

}
