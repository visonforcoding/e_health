<?php

class Usercoupon_model extends LM_Model {

     /**
     * 获取用户优惠劵数据
     * @param string $tablename 表名
     * @param int $curPage  当前页数
     * @param int $pageSize 每页显示的条数
     * @param string $sort 排序条件
     * @param string $order desc | asc 
     * @param string $where where条件 
     * @return array
     */
    public function getJsonRows($tableName, $curPage, $pageSize, $sort = '', $order = '', $where = '') {
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $selectStr = "user_coupon.*,coupon.type,coupon.amount1,coupon.amount2,member.tel,store.storeName,store_service.name as service";
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->join('coupon', 'coupon.id = user_coupon.cid')
                                ->join('member', 'member.id = user_coupon.uid')
                                ->join('store', 'store.id = coupon.shopId', 'left')
                                ->join('store_service', 'coupon.serviceId = store_service.id', 'left')
                                ->where($where)->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                                ->join('coupon', 'coupon.id = user_coupon.cid')
                                ->join('member', 'member.id = user_coupon.uid')
                                ->join('store', 'store.id = coupon.shopId', 'left')
                                ->join('store_service', 'coupon.serviceId = store_service.id', 'left')
                                ->where($where)->limit($pageSize, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db->select($selectStr)
                                ->join('coupon', 'coupon.id = user_coupon.cid')
                                ->join('member', 'member.id = user_coupon.uid')
                                ->join('store', 'store.id = coupon.shopId', 'left')
                                ->join('store_service', 'coupon.serviceId = store_service.id', 'left')
                                ->limit($pageSize, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db->select($selectStr)
                                ->join('coupon', 'coupon.id = user_coupon.cid')
                                ->join('member', 'member.id = user_coupon.uid')
                                ->join('store', 'store.id = coupon.shopId', 'left')
                                ->join('store_service', 'coupon.serviceId = store_service.id', 'left')
                                ->limit($pageSize, $offset)->get($tableName);
            }
        }

        $res = $res->result_array();
        if (empty($res)) {
            $res = array();
        }

        foreach ($res as $k => $v) {
            if ($v['type'] == '0') {
                $res[$k]['type'] = '现金劵';
            } else {
                $res[$k]['type'] = '满减劵';
            }

            if ($v['storeName'] == '') {
                $res[$k]['storeName'] = '所有店铺';
            }

            if ($v['service'] == '') {
                $res[$k]['service'] = '所有服务';
            }
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        return $arr_json;
    }

    /**
     * 启动关闭优惠券
     * @param int $id 优惠劵id
     * @param int $flag 开启或关闭状态
     * @return type
     */
    public function on_off_usercoupon($id, $flag) {
        $query = $this->db->query("update `user_coupon` set `flag` ='" . $flag . "' where `id` = '" . $id . "'");

        return $query;
    }

    /**
     * 返回可用红包
     * @param type $amount 订单金额
     * @param type $user_id
     * @param type $service_id
     * @param type $shop_id
     * @return type
     */
    public function getUserCouponByUser($amount,$user_id, $service_id, $shop_id) {
        $query = $this->db->select('coupon.amount2,user_coupon.id')
                ->join('coupon', 'coupon.id = user_coupon.cid')
                ->where("user_coupon.uid = '$user_id' and (coupon.shopId = '$shop_id' or coupon.shopId = '0')"
                        . " and (coupon.serviceId = '$service_id' or coupon.serviceId = '0')"
                        . " and curdate() >= user_coupon.beginTime and curdate() <= user_coupon.endTime"
                        . " and $amount >=coupon.amount1 "
                        . " and user_coupon.flag = '1'")
                ->order_by('coupon.amount2', 'desc')
                ->get('user_coupon');
        $rows = $query->result_array();
        return $rows;
    }

}
