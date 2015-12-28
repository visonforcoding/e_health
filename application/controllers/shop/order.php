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
            $payStatus = 1;

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
            $orderStatus = 3;
            $date = date("Y-m-d H:i:s");
            $mprice = $this->input->post('mprice');
            $card_id = $this->input->post('card');
            $user_id = 0;
            $flowing_remark = '线下开单' . $price . '元';

            $orderData = array('sid' => $store_id, 'uid' => $user_id, 'type' => $type, 'serviceId' => $serviceId,
                'type' => $type, 'nums' => $nums, 'amount' => $price, 'price' => $mprice,
                'orderNo' => 's_'. date("YmdHis"),
                'payType' => $payType, 'payStatus' => $payStatus, 'orderStatus' => $orderStatus,
                'cTime' => $date, 'serviceTime' => $date, 'payTime' => $date, 'finishTime' => $date,
                'isVisit' => $isVisit, 'consignee' => $phone);

            $nums = $this->input->post('num');
            $cargo = $this->input->post('cargo');

            if($nums && $cargo){
                $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');

                $cargos = $query_cargos->result_array();
                $cargo_num = []; //cargo id 对应 数量 数组
                foreach ($cargos as $key => $value) {
                    $cargo_num[$value['id']] = $value['nums'];
                }

                foreach ($cargo as $key => $value){
                       $num = $cargo_num[$value] - $nums[$key]; 
                       if( $num < 0){
                            $response['status'] = false;
                            $response['msg'] = '库存不足，请先入库';
                            $this->output->set_content_type('application/json')
                                    ->set_output(json_encode($response));
                            return;
                       }
                 }

            }
            
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

            //指派记录
            $this->load->model('Order_model', 'order_model');
            $flag_no = $this->order_model->getEmployeeOrderFlagNo($store_id);
            $employee_id = $this->input->post('employee');
            $ins_orderm_data['order_id'] = $insert_order_id;
            $ins_orderm_data['store_id'] = $store_id;
            $ins_orderm_data['employee_id'] = empty($employee_id) ? 0 : $employee_id;
            $ins_orderm_data['status'] = 0;
            $ins_orderm_data['flag_no'] = $flag_no;
            $ins_orderm_data['ctime'] = date('Y-m-d H:i:s');
            $this->db->insert('store_employee_order', $ins_orderm_data);

            //组织数据
        
            if($nums &&  $cargo){
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
            }
           
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

        $this->load->model('Service_model','service_model');
        $serviceData = $this->service_model->getStoreService($store_id);


        //查询店铺所有耗材
        $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');
        $cargos = $query_cargos->result_array();

        //  
        $query_employees = $this->db->where("store_id = '$store_id' and `status` = '1'")->get('store_employee');
        $employees = $query_employees->result_array();

        $this->twig->render('/shop/order/add.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'service' => $serviceData,
            'cargos' => $cargos,
            'employees' => $employees
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
            $query_order = $this->db->where("`order_id` = '$order_id'")->get('store_employee_order');
            $order = $query_order->row_array();
            if ($order && $order['employee_id'] >0) {
                $response['status'] = false;
                $response['msg'] = '该订单已经被指派过';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $ins_data['order_id'] = $order_id;
            $ins_data['store_id'] = $store_id;
            $ins_data['employee_id'] = $employee_id;
            $ins_data['employee_id'] = $employee_id;
            $ins_data['status'] = 1;
            $ins_data['ctime'] = date('Y-m-d H:i:s');

            $nums = $this->input->post('num');
            $cargo = $this->input->post('cargo');
            $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');

            $cargos = $query_cargos->result_array();
            $cargo_num = []; //cargo id 对应 数量 数组
            foreach ($cargos as $key => $value) {
                $cargo_num[$value['id']] = $value['nums'];
            }

            foreach ($cargo as $key => $value){
                   $num = $cargo_num[$value] - $nums[$key]; 
                   if( $num < 0){
                        $response['status'] = false;
                        $response['msg'] = '库存不足，请先入库';
                        $this->output->set_content_type('application/json')
                                ->set_output(json_encode($response));
                        return;
                   }
             }

            //开启事务
            $this->db->trans_start();
            $this->db->insert('store_employee_order', $ins_data);
            $insert_cargo_log_data = [];
            foreach ($cargo as $key => $value) {
                if($nums[$key]>0){
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
        $query_order = $this->db->where("id = $order_id")->get('order');
        $order = $query_order->row_array();

        $where = '';
        $where .= "store_employee.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $query_employees = $this->db->where("store_id = '$store_id' and `status` = '1'")->get('store_employee');
        $employees = $query_employees->result_array();

        $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');
        $cargos = $query_cargos->result_array();
        $this->twig->render('/shop/order/appoint.twig', array(
            'cargos' => $cargos,
            'employees' => $employees,
            'order' => $order
        ));
    }

    /**
     * 收银台
     * 今日订单
     */
    public function desk() {
        $query_today_orders = $this->db
                ->select('order.id,order.ctime,order.consignee,order.price,IFNULL(store_employee.truename,null) as truename'
                        . ',store_employee_order.status,store_service.name as service_name,store_employee_order.flag_no', false)
                ->join('store_service', 'store_service.id = order.serviceId')
                ->join('store_employee_order', 'store_employee_order.order_id = order.id', 'left')
                ->join('store_employee', 'store_employee_order.employee_id = store_employee.id', 'left')
                ->where('date(order.ctime) = date(now())')
                ->order_by('store_employee_order.status asc,order.ctime asc')
                ->get('order');
        $orders = $query_today_orders->result_array();
        $this->twig->render('/shop/order/desk.twig', array(
            'orders' => $orders
        ));
    }

    /**
     * 技师开始服务
     */
    public function taskStart() {
        $user = $this->user;
        $store_id = $user['id'];
        if ($this->input->post()) {
            $order_id = $this->input->post('order_id');
            $update = $this->db->where("store_id = '$store_id' and order_id = '$order_id'")
                    ->update('store_employee_order', ['status' => '1', 'utime' => date('Y-m-d H:i:s'), 'service_time' => date('Y-m-d H:i:s')]);
            if ($update) {
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
    }

    /**
     * 技师完成服务 结账
     * 更改订单order状态  更改服务store_employee_order 状态 添加交易流水记录
     */
    public function taskDone() {
        $user = $this->user;
        $store_id = $user['id'];
        if ($this->input->post()) {
            $order_id = $this->input->post('order_id');
            $query_order = $this->db->where("id = '$order_id'")->get('order');
            $order = $query_order->row_array();
            //开启事务
            $this->db->trans_start();
            //更改订单状态
            $this->db->where("id = '$order_id'")->update('order', ['payStatus' => '2', 'orderStatus' => 5]);
            //生成交易流水
            $flowing_data['oid'] = $user['id'];
            $flowing_data['otype'] = 1;
            $flowing_data['type'] = 4; //4线下开单
            $flowing_data['relation_id'] = $order_id;
            $flowing_data['income'] = 1; //店铺收入
            $flowing_data['amount'] = $order['price'];
            $flowing_data['remark'] = '线下服务订单收入' . $order['price'] . '元';
            $flowing_data['ctime'] = date('Y-m-d H:i:s');
            $this->db->insert('flowing', $flowing_data);

            //更改服务状态
            $this->db->where("store_id = '$store_id' and order_id = '$order_id'")
                    ->update('store_employee_order', ['status' => '2', 'utime' => date('Y-m-d H:i:s'), 'end_time' => date('Y-m-d H:i:s')]);
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
    }

}
