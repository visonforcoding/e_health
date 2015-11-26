<?php

header('content-type:text/html;charset=utf-8');

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-19 13:12:01 by allen <blog.rc5j.cn> , caowenpeng1990@126.com
 */
class Order extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
        $this->load->model('Store_model', 'store_model');
        $this->load->model('Order_model', 'order_model');
    }

    /**
     * 订单列表
     */
    public function orderList() {

        $this->twig->render('/shop/order/orderList.twig', array(
            'user' => $this->user,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getOrderList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "order.sid = '$store_id'  and (order.type = '1' or order.type = '3') "; //条件查询 本店和店铺类型
        $keywords = $this->input->post('keywords');
        $type = $this->input->post('type');
        if (!empty($keywords)) {
            $where .= "and order.orderNo like '%$keywords%' ";
        }
        if (!empty($type)) {
            switch ($type) {
                case '1':
                    $where .= "and order.payStatus = '1' and order.orderStatus = '1' ";
                    break;
                case '2':
                    $where .= "and order.payStatus = '1' and order.orderStatus = '2' ";
                    break;
                case '3':
                    $where .= "and order.payStatus = '2' and order.orderStatus = '3' ";
                    break;
                case '4':
                    $where .= "and order.payStatus = '2' and order.orderStatus = '40' ";
                    break;
                case '5':
                    $where .= "and order.payStatus = '2' and order.orderStatus = '41' ";
                    break;
                case '6':
                    $where .= "and order.payStatus = '2' and order.orderStatus = '42' ";
                    break;
                case '7':
                    $where .= "and order.payStatus = '3' and order.orderStatus = '4' ";
                    break;
                case '8':
                    $where .= "and order.payStatus = '2' and order.orderStatus = '5' ";
                    break;
            }
        }
        $datas = $this->order_model
                ->getJsonData('order', $posts['page'], $posts['rows'], 'order.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    /**
     * 确认退款
     * 1, 更新退款记录（状态 由初始 转 商家确认 0->1） 
     * 2, 添加一条 用户消息（您的退款申请已确认，平台正在退款中）
     * 3, 订单状态orderStatus 40->41 申请退款-> 退款中
     * 
     */
    public function rebackPay() {
        $order_id = $this->input->post('id');
        $query_order = $this->db->where("`id` = '$order_id' and `payStatus` = '2' and `orderStatus` = '40'")->get('order');
        $order = $query_order->row_array();
        if ($order) {
            //开启事务
            $this->db->trans_start();
            //更新 退款记录 状态
            $update_reback_data['status'] = '1';
            $update_reback_data['utime'] = date('Y-m-d H:i:s');
            $this->db->where("order_id = '$order_id' and `status` = '0'")->update('reback', $update_reback_data);

            //添加用户消息
            $msg_data['title'] = '退款记录';
            $msg_data['uid'] = $order['uid'];
            $msg_data['content'] = '您的退款申请已确认，平台正在退款中';
            $msg_data['ctime'] = date('Y-m-d H:i:s');
            $this->db->insert('msg', $msg_data);

            //更改订单状态
            $update_msg_data['orderStatus'] = '41';
            $update_msg_data['utime'] = date('Y-m-d H:i:s');
            $this->db->where("id = '$order_id'")->update('order', $update_msg_data);

            $this->db->trans_complete();
            $this->load->helper('url');
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '确认成功!';
            } else {
                $response['status'] = false;
                $response['msg'] = '服务器错误!';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

    /**
     * 拒绝退款
     * 1.更改退款记录状态 0->11 初始->拒绝
     * 2.添加用户消息 您的退款申请已被商户拒绝
     * 2.更改订单状态 40->42
     */
    public function refusReback() {
        $order_id = $this->input->post('id');
        $refuseReason = $this->input->post('refuseReason');
        $query_order = $this->db->where("`id` = '$order_id' and `payStatus` = '2' and `orderStatus` = '40'")->get('order');
        $order = $query_order->row_array();
        if ($order) {
            //开启事务
            $this->db->trans_start();
            //更新 退款记录 状态
            $update_reback_data['status'] = '11';
            $update_reback_data['utime'] = date('Y-m-d H:i:s');
            $update_reback_data['refuseReason'] = $refuseReason;
            $this->db->where("order_id = '$order_id' and `status` = '0'")->update('reback', $update_reback_data);

            //添加用户消息
            $msg_data['title'] = '退款记录';
            $msg_data['uid'] = $order['uid'];
            $msg_data['content'] = '您的退款申请已被商户拒绝。拒绝理由：' . $refuseReason;
            $msg_data['ctime'] = date('Y-m-d H:i:s');
            $this->db->insert('msg', $msg_data);

            //更改订单状态
            $update_msg_data['orderStatus'] = '42';
            $update_msg_data['utime'] = date('Y-m-d H:i:s');
            $this->db->where("id = '$order_id'")->update('order', $update_msg_data);

            $this->db->trans_complete();
            $this->load->helper('url');
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '确认成功!';
            } else {
                $response['status'] = false;
                $response['msg'] = '服务器错误!';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

    //收银开单
    public function add() {

        $user = $this->user;
        $store_id = $user['id'];

        if ($this->input->isPost()) {
            $this->load->library('Validator');
            $posts = $this->input->post();
            if ($posts['price'] == "") {
                $response['status'] = false;
                $response['msg'] = '请填写金额';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $serviceId = intval($posts['serviceId'], 10);
            $nums = $posts['nums'];
            $phone = $posts['phone'];
            $isVisit = $posts['isVisit'];
            $price = $posts['price']; //开单支付金额

            if (!$this->validator->isNumber($nums)) {
                $response['status'] = false;
                $response['msg'] = '预约人数不合法';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            if (!$this->validator->isMobile($phone)) {
                $response['status'] = false;
                $response['msg'] = '请填写正确的手机号';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            if (!$this->validator->isMoney($price)) {
                $response['status'] = false;
                $response['msg'] = '订单金额不合法';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $type = 3;  //线下业务
            $payType = 5;
            $payStatus = 2;
            $orderStatus = 5;
            $date = date("Y-m-d H:i:s");
            $mprice = $this->input->post('mprice');
            $card_id = $this->input->post('card');
            $user_id = 0;
            $flowing_remark = '线下开单' . $price . '元';

            $orderData = array('sid' => $store_id, 'uid' => $user_id, 'type' => $type, 'serviceId' => $serviceId,
                'type' => $type, 'nums' => $nums, 'amount' => $price, 'price' => $mprice,
                'orderNo' => 's_' . str_pad($store_id, 4, '0') . date("YmdHis"),
                'payType' => $payType, 'payStatus' => $payStatus, 'orderStatus' => $orderStatus,
                'cTime' => $date, 'serviceTime' => $date, 'payTime' => $date, 'finishTime' => $date,
                'isVisit' => $isVisit, 'consignee' => $phone);
            //开启事务
            $this->db->trans_start();
            if (!empty($card_id)) {
                //使用会员卡
                $flowing_remark = '线下开单会员卡消费' . $price . '元';
                $query_card = $this->db->where("`id` = '$card_id'")->get('member_card');
                $card = $query_card->row_array();
                $content_arr = unserialize($card['content']);
                foreach ($content_arr as $key => $value) {
                    if ($value['id'] == $serviceId) {
                        $content_arr[$key]['nums'] = $value['nums'] - $nums;
                    }
                }
                $orderData['uid'] = $card['user_id'];
                $orderData['card_id'] = $card_id;
                //更新会员卡信息
                $this->db->where("id = '$card_id'")->update('member_card', ['content' => serialize($content_arr)]);
            }
            //添加订单
            $this->db->insert('order', $orderData);
            $insert_order_id = $this->db->insert_id();

            //组织数据
            $nums = $this->input->post('num');
            $cargo = $this->input->post('cargo');
            $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');

            $cargos = $query_cargos->result_array();
            $cargo_num = []; //cargo id 对应 数量 数组
            foreach ($cargos as $key => $value) {
                $cargo_num[$value['id']] = $value['nums'];
            }

            //生成交易流水
            $flowing_data['oid'] = $orderData['uid'];
            $flowing_data['otype'] = 2;
            $flowing_data['type'] = 4; //4现在开单
            $flowing_data['relation_id'] = $insert_order_id;
            $flowing_data['income'] = 2;
            $flowing_data['amount'] = $price;
            $flowing_data['remark'] = $flowing_remark;
            $flowing_data['ctime'] = date('Y-m-d H:i:s');
            $this->db->insert('flowing', $flowing_data);


            $insert_cargo_log_data = [];
            foreach ($cargo as $key => $value) {
                $num = $cargo_num[$value] - $nums[$key];
                //更新库存数据
                $this->db->where("`id` = '$value'")->update('store_cargo', ['nums' => $num, 'utime' => date('Y-m-d H:i:s')]);
                $insert_cargo_log_data[] = array(
                    'store_id' => $store_id,
                    'cargo_id' => $value,
                    'num' => $nums[$key],
                    'relation_id' => $insert_order_id,
                    'do_type' => '2',
                    'ctime' => date('Y-m-d H:i:s'),
                    'remark' => '线下开单消耗物品'
                );
            }
            //更新出入库记录
            $this->db->insert_batch('cargo_log', $insert_cargo_log_data);

            $this->db->trans_complete();
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '开单成功';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $response['status'] = false;
                $response['msg'] = '发生错误';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
        }

        //获取当前店铺的服务
        $query = $this->db->select('store_service.serviceId,service.name,store_service.isVisit,service.price')
                ->join('service', 'service.id=store_service.serviceId')
                ->where(array('store_service.storeId' => $store_id))
                ->get('store_service');
        $serviceData = $query->result_array();

        //查询店铺所有耗材
        $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');
        $cargos = $query_cargos->result_array();

        $this->twig->render('/shop/order/add.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'service' => $serviceData,
            'cargos' => $cargos
        ));
    }

    /**
     * 指派店员
     */
    public function appoint() {
        $user = $this->user;
        $store_id = $user['id'];
        if ($this->input->post()) {
            $employee_id = $this->input->post('employee');
            $order_id = $this->input->post('order_id');
            $ck_exist = $this->db->where("`order_id` = '$order_id'")->count_all_results('store_employee_order');
            if ($ck_exist) {
                $response['status'] = false;
                $response['msg'] = '该订单已经被指派过';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $ins_data['order_id'] = $order_id;
            $ins_data['store_id'] = $store_id;
            $ins_data['employee_id'] = $employee_id;
            $ins_data['status'] = 0;
            $ins_data['ctime'] = date('Y-m-d H:i:s');

            $nums = $this->input->post('num');
            $cargo = $this->input->post('cargo');
            $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');

            $cargos = $query_cargos->result_array();
            $cargo_num = []; //cargo id 对应 数量 数组
            foreach ($cargos as $key => $value) {
                $cargo_num[$value['id']] = $value['nums'];
            }

            //开启事务
            $this->db->trans_start();
            $this->db->insert('store_employee_order', $ins_data);
            $insert_cargo_log_data = [];
            foreach ($cargo as $key => $value) {
                $num = $cargo_num[$value] - $nums[$key];
                //更新库存数据
                $this->db->where("`id` = '$value'")->update('store_cargo', ['nums' => $num, 'utime' => date('Y-m-d H:i:s')]);
                $insert_cargo_log_data[] = array(
                    'store_id' => $store_id,
                    'cargo_id' => $value,
                    'num' => $nums[$key],
                    'relation_id' => $order_id,
                    'do_type' => '2',
                    'ctime' => date('Y-m-d H:i:s'),
                    'remark' => '线上订单消耗物品'
                );
            }
            //更新出入库记录
            $this->db->insert_batch('cargo_log', $insert_cargo_log_data);
            $this->db->trans_complete();
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '添加成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '添加失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $order_id = $this->input->get('id');
        $where = '';
        $where .= "store_employee.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $query_employees = $this->db->where("store_id = '$store_id' and `status` = '1'")->get('store_employee');
        $employees = $query_employees->result_array();

        $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');
        $cargos = $query_cargos->result_array();
        $this->twig->render('/shop/order/appoint.twig', array(
            'cargos' => $cargos,
            'employees' => $employees,
            'order_id' => $order_id
        ));
    }

}
