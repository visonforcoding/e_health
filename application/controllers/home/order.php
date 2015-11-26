<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-13 16:57:33 by caowenpeng , caowenpeng1990@126.com
 * 订单
 */
class Order extends Home_Controller {

    /**
     *  生成订单  支付页
     */
    public function orderPay() {
        $user = $this->checkLogin();
        $user_id = $user['id'];
        if ($this->input->isPost()) {
            //生成订单
            $token = $this->session->userdata('token');
            $post = $this->input->posts();
            $post_token = $post['token'];
            if ($token != $post_token) {
                show_error('您的订单已提交，请勿重复提交！');
            }
            $store_id = $this->input->post('store_id');
            $engineer_id = $this->input->post('engineer_id');
            $address = $this->input->post('address');
            $address = $address ? $address : '';
            if (!empty($store_id)) {
                $oid = $store_id;
                $type = 1;
                $query_good = $this->db->where('id', $store_id)->get('store');
                $good = $query_good->row_array();
                $provider = $good['storeName'];
                $isVisit = $post['isVisit'];
            } else {
                $oid = $engineer_id;
                $query_good = $this->db->where('id', $engineer_id)->get('engineer');
                $good = $query_good->row_array();
                $provider = $good['name'];
                $isVisit = '1';
                $type = 2;
            }
            $service_id = $post['sid'];

            $query_service = $this->db->where('id', $service_id)->get('service');
            $service = $query_service->row_array();
            if ($good && $service) {
                $order_name = $service['name'];
                $nums = $post['num'];
                $sex = $post['sex'] == '1' ? '先生' : '女士';
                $amount = $nums * $service['price']; //总商品金额 订单金额
                $orderNo = date('YmdHis') . $user['id'];
                $insert_data['type'] = $type;
                $insert_data['serviceId'] = 1;
                $insert_data['nums'] = $nums;
                $insert_data['uid'] = $user['id'];
                $insert_data['orderStatus'] = 1;
                $insert_data['sid'] = $oid;
                $insert_data['price'] = $amount;  //订单金额
                $insert_data['orderNo'] = $orderNo;  //订单号
                $insert_data['serviceTime'] = $post['stime'];  //预约时间
                $insert_data['isVisit'] = $isVisit;  //是否上门
                $insert_data['remark'] = $post['remark'];  //客户留言
                $insert_data['ctime'] = date('Y-m-d H:i:s');  //订单生成时间
                $insert_data['consignee'] = $post['name'] . '(' . $sex . ')';  //收货人
                $insert_data['provider'] = $provider;  //收货人
                $insert_data['address'] = $address;  //收货人 
                $ins_order = $this->db->insert('order', $insert_data);
                if (!$ins_order) {
                    show_error('服务器错误!');
                } else {
                    $this->session->unset_userdata('token');
                }
            } else {
                show_error('数据错误!');
            }
        } else {
            //查询 待支付 订单信息
            $id = $this->input->get('id');
            $query_order = $this->db->select('order.price,order.sid,order.serviceId,order.id,order.orderNo,service.name,order.amount')
                    ->join('service', 'service.id = order.serviceId')
                    ->where("`order`.`id` = '$id' and `payStatus` = '1' and `orderStatus` = '1'")
                    ->get('order');
            $order = $query_order->row_array();
            if (!$order) {
                show_error('该订单不存在或该订单不可支付！');
            } else {
                $order_name = $order['name'];
                $amount = $order['price'];
                $store_id = $order['sid'];
                $service_id = $order['serviceId'];
            }
        }
        // 查询可用优惠券
        $this->load->model('Usercoupon_model', 'usercoupon_model');
        $coupons = $this->usercoupon_model->getUserCouponByUser($amount,$user_id, $service_id, $store_id);
        $this->twig->render('home/order/order_pay.twig', array(
            'order_name' => $order_name,
            'amount' => $amount,
            'coupons'=>$coupons
        ));
    }

    /**
     * 订单列表
     */
    public function orderList() {
        $user = $this->checkLogin();
        $isVisit = $this->input->get('isVisit');
        $orderType = $this->input->get('orderType');
        if (empty($orderType)) {
            $orderType = 'pay';
        }
        $type = '';
        if (!empty($isVisit) && $isVisit == 'no') {
            $isVisit = '0';
            $type = 'visit';
            $isVisitStr = '到店';
        } else {
            $isVisit = '1';
            $isVisitStr = '上门';
        }
        $user_id = $user['id'];
        $where['order.uid'] = $user['id'];
        $where['order.isVisit'] = $isVisit;
        $buttonText = '';
        switch ($orderType) {
            case 'pay':
                $where['order.payStatus'] = 1;  //未支付
                $where['order.orderStatus'] = 1;  //已下单
                $buttonText = '待支付';
                break;
            case 'service':
                $where['order.payStatus'] = 2;  //已支付
                $where['order.orderStatus'] = 3;  //待服务
                $buttonText = '待服务';
                break;
            case 'close':
                $where['order.payStatus'] = 2;  //已支付
                $where['order.orderStatus !='] = 3;  //待服务
                $where['orderStatus !='] = 1;  //待服务
                break;
            default:
                break;
        }
        if ($orderType != 'close') {
            $query_orders = $this->db
                    ->select('order.provider,order.type,order.serviceTime,service.name,'
                            . 'order.isVisit,order.id,service.cover,order.address,'
                            . 'order.orderStatus,order.payStatus')
                    ->join('service', 'service.id = order.serviceId')
                    ->where($where)
                    ->order_by('order.ctime', 'desc')
                    ->get('order');
        } else {
            $query_orders = $this->db
                    ->select('order.provider,order.type,order.serviceTime,service.name,'
                            . 'order.isVisit,order.id,service.cover,order.address,'
                            . 'order.orderStatus,order.payStatus')
                    ->join('service', 'service.id = order.serviceId')
                    ->where($where)
                    ->or_where("(order.payStatus = '1' and order.orderStatus = '2' and order.isVisit = '$isVisit' and order.uid = '$user_id')")
                    ->order_by('order.ctime', 'desc')
                    ->get('order');
        }
        $orders = $query_orders->result_array();
        $this->twig->render('home/order/order_list.twig', array(
            'orders' => $orders,
            'type' => $type,
            'ordertype' => $orderType,
            'buttonText' => $buttonText,
            'isVisitStr' => $isVisitStr
        ));
    }

    /**
     * 订单详情页
     */
    public function orderDetail() {
        $user = $this->checkLogin();
        $userId = $user['id'];
        $id = $this->input->get('oid'); //对象id
        $where['order.id'] = $id;
        $where['order.uid'] = $userId;
        $query_order = $this->db
                ->select('order.provider,order.type,order.serviceTime,order.orderNo,order.ctime,'
                        . 'order.isVisit,order.id,service.cover,order.address,service.price,service.name,'
                        . 'order.payStatus,order.orderStatus')
                ->join('service', 'service.id = order.sid')
                ->where($where)
                ->order_by('order.ctime', 'desc')
                ->get('order');
        $order = $query_order->row_array();
        if (!$order) {
            show_error('服务器错误！');
        }
        if ($order['orderStatus'] == 1 && $order['payStatus'] == 1) {
            $orderType = 'waitPay';
        }
        if ($order['orderStatus'] == 3 && $order['payStatus'] == 2) {
            $orderType = 'waitService';
        }
        if ($order['orderStatus'] == 2) {
            $orderType = 'cancel';
        }
        $this->twig->render('home/order/order_detail.twig', array(
            'order' => $order,
            'orderType' => $orderType
        ));
    }

    /**
     * 取消订单
     */
    public function cancelOrder() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $user = $this->checkLogin(TRUE);
            $where['id'] = $id;
            $where['uid'] = $user['id'];
            $where['payStatus'] = 1;  //预定
            $where['orderStatus'] = 1;
            $order = $this->db->where($where)->get('order');
            if (!$order) {
                $response['status'] = false;
                $response['msg'] = '该订单不存在或不可取消！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $cancelOrder = $this->db->where($where)->update('order', ['orderStatus' => 2]);
                $this->load->helper('url');
                if ($cancelOrder) {
                    $response['status'] = true;
                    $response['msg'] = '取消订单成功！';
                    $response['url'] = base_url('home/order/orderList');
                } else {
                    $response['status'] = true;
                    $response['msg'] = '服务器错误';
                }
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
        }
    }

    /**
     * 确认服务
     */
    public function confirmService() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $user = $this->checkLogin(TRUE);
            $where['id'] = $id;
            $where['uid'] = $user['id'];
            $where['payStatus'] = 2;  //预定
            $where['orderStatus'] = 3;
            $order = $this->db->where($where)->get('order');
            if (!$order) {
                $response['status'] = false;
                $response['msg'] = '该订单不存在或不可确认服务！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $cancelOrder = $this->db->where($where)->update('order', ['orderStatus' => 5]);
                $this->load->helper('url');
                if ($cancelOrder) {
                    $response['status'] = true;
                    $response['msg'] = '已确认！';
                    $response['url'] = base_url('home/order/orderList');
                } else {
                    $response['status'] = true;
                    $response['msg'] = '服务器错误';
                }
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
        }
    }

    /**
     * 用户退款申请
     * 1,生成一条 退款记录
     * 2，更改订单状态 3->40 待服务->退款申请中
     * 
     */
    public function refund() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $user = $this->checkLogin(TRUE);
            $where['id'] = $id;
            $where['uid'] = $user['id'];
            $where['payStatus'] = 2;  //预定
            $where['orderStatus'] = 3;
            $query_order = $this->db->where($where)->get('order');
            $order = $query_order->row_array();
            if (!$order) {
                $response['status'] = false;
                $response['msg'] = '该订单不存在或不可确认退款！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $this->load->helper('url');
                //开启事务
                $this->db->trans_start();
                //添加退款记录
                $reback_data['order_id'] = $id;
                $reback_data['user_id'] = $order['uid'];
                $reback_data['store_id'] = $order['sid'];
                $reback_data['ctime'] = date('Y-m-d H:i:s');
                $reback_data['status'] = 0;
                $reback_data['amount'] = $order['amount'];
                $reback_data['payType'] = $order['payType'];
                $reback_data['remark'] = '用户退款申请';
                $reback_data['account'] = 'wxtestaccount';
                $this->db->insert('reback', $reback_data);
                //更改 订单状态
                $this->db->where($where)->update('order', ['orderStatus' => 40]);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $response['status'] = true;
                    $response['msg'] = '申请退款中,请等待服务方确认！';
                    $response['url'] = base_url('home/order/orderList');
                } else {
                    $response['status'] = true;
                    $response['msg'] = '服务器错误';
                }
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
        }
    }

}
