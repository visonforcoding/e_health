<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-19 16:02:46 by allen <blog.rc5j.cn> , caowenpeng1990@126.com
 * 订单
 * 
 */
class Order_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getJsonData($tableName, $page, $rows, $sort = '', $order = '', $where = '') {
        $offset = ($page - 1) * $rows; //分页起始条数
        $selectStr = 'order.id as id,order.isVisit,order.ctime,order.nums,order.payStatus,order.orderStatus,'
                . 'store_service.name,order.orderNo,order.serviceTime,order.finishTime,order.remark,member.nick,member.tel,'
                . 'order.price,order.amount,member.gender,order.serviceTime,order.type,'
                . 'order.address,store_employee.truename,order.consignee,order.ucid,order.card_id,order.nums';
        if (!empty($where)) {
            $nums = $this->db->where($where)->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store', 'store.id = order.sid')
                                ->join('store_service', 'order.serviceId = store_service.id')
                                ->join('member', 'order.uid = member.id', 'left')
                                ->join('store_employee_order', 'order.id = store_employee_order.order_id', 'left')
                                ->join('store_employee', 'store_employee.id = store_employee_order.employee_id', 'left')
                                ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store', 'store.id = order.sid')
                                ->join('store_service', 'order.serviceId = store_service.id')
                                ->join('store_employee_order', 'order.id = store_employee_order.order_id', 'left')
                                ->join('store_employee', 'store_employee.id = store_employee_order.employee_id', 'left')
                                ->where($where)->limit($rows, $offset)->get($tableName);
            }
        } else {
            $nums = $this->db->count_all_results($tableName); //总条数
            if (!empty($order)) {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store', 'store.id = order.sid')
                                ->join('store_service', 'order.serviceId = store_service.id')
                                ->join('store_employee_order', 'order.id = store_employee_order.order_id', 'left')
                                ->join('store_employee', 'store_employee.id = store_employee_order.employee_id', 'left')
                                ->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
            } else {
                $res = $this->db
                                ->select($selectStr)
                                ->join('store', 'store.id = order.sid')
                                ->join('store_service', 'order.serviceId = store_service.id')
                                ->join('store_employee_order', 'order.id = store_employee_order.order_id', 'left')
                                ->join('store_employee', 'store_employee.id = store_employee_order.employee_id', 'left')
                                ->limit($rows, $offset)->get($tableName);
            }
        }
        $res = $res->result_array();
        foreach ($res as $key => $value) {
            $res[$key]['isVisitStr'] = $value['isVisit'] == '1' ? '上门' : '到店';
            if ($value['type'] == '3') {
                $res[$key]['isVisitStr'] = '线下开单';
                $res[$key]['tel'] = $value['consignee'];
            }
            if ($value['payStatus'] == '1' && $value['orderStatus'] == '1') {
                //未支付 已下单 -> 待支付
                $res[$key]['statusText'] = '待支付';
            }
            if ($value['payStatus'] == '1' && $value['orderStatus'] == '2') {
                //未付款 
                $res[$key]['statusText'] = '已取消';
            }
            if ($value['orderStatus'] == '3') {
                //已支付
                $res[$key]['statusText'] = '待服务';
            }
            if ($value['payStatus'] == '2' && $value['orderStatus'] == '40') {
                //已支付 退款中
                $res[$key]['statusText'] = '申请退款';
            }
            if ($value['payStatus'] == '2' && $value['orderStatus'] == '41') {
                //已支付 退款中
                $res[$key]['statusText'] = '退款中';
            }
            if ($value['payStatus'] == '2' && $value['orderStatus'] == '42') {
                //已支付 退款中
                $res[$key]['statusText'] = '拒绝退款';
            }
            if ($value['payStatus'] == '3' && $value['orderStatus'] == '4') {
                //已支付 退款中
                $res[$key]['statusText'] = '已退款';
            }
            if ($value['payStatus'] == '2' && $value['orderStatus'] == '5') {
                //已支付 退款中
                $res[$key]['statusText'] = '已服务';
            }
            if ($value['payStatus'] == '2' && $value['orderStatus'] == '6') {
                //已支付 退款中
                $res[$key]['statusText'] = '已评价';
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
    
    
    /**
     * 店铺线下挂单号的生成
     * 要短 每天都会从1开始
     * 格式为A1 A2
     * @param int $store_id 店铺id
     * @return string 挂单号
     */
    public function getEmployeeOrderFlagNo($store_id){
        $flag_no = 'A1';
        $today_order_nums = $this->db->where("`store_id` = '$store_id' and date(ctime) = date(now()) order by ctime desc")->count_all_results('store_employee_order');
        if(!$today_order_nums){
           $flag_no = 'A1'; 
        }else{
           $flag_no = 'A'.intval($today_order_nums+1);
        }
        return $flag_no;
    }

}
