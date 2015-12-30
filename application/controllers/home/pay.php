<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-12-23 16:39:43 by caowenpeng , caowenpeng1990@126.com
 */
class Pay extends Home_Controller {

    public function submitPay() {
        header("Content-type:text/html;charset=utf-8");
        $order_id = $this->input->get('id');
        $payType = $this->input->get('paytype');
        $query_order = $this->db->select('*,store_service.name,store.storeName')
                ->join('store_service', 'store_service.id = order.serviceId')
                ->join('store', 'store.id = order.sid')
                ->where("`order`.`id` = '$order_id' and `order`.`payStatus` = '1' and `order`.`orderStatus` = '1' ")
                ->get('order');
        $order = $query_order->row_array();
        $payType = 'wx';
        if (empty($order)) {
            show_error('该订单不存在！');
        }
        $pay_data['order_no'] = $order['orderNo'];
        $pay_data['subject'] = $order['name'];
        //$pay_data['total_fee'] =  $order['amount'];
        $pay_data['total_fee'] = '0.01';
        $pay_data['body'] = $order['storeName'] . ':' . $order['name'];
        if ($payType == 'ali') {
            $show_url = "http://" . $_SERVER['SERVER_NAME'] . '/home/store/storeDetail/id/' . $order['sid'] . 'html';
            $pay_data['show_url'] = $show_url;
            $this->alipay($pay_data);
        }
        if ($payType == 'wx') {
            $this->load->helper('url');
            redirect("http://" . $_SERVER['SERVER_NAME'] . '/home/pay/wxpay?id=' . $order_id);
        }
    }

    /**
     *  支付宝支付调用
     * @param type $order_data
     */
    protected function alipay($order_data) {
        header("Content-Type: text/html;charset=utf-8");
        $alipay_config = require_once APPPATH . '/third_party/Alipay/alipay.config.php';
        require_once APPPATH . '/third_party/Alipay/lib/alipay_submit.class.php';
        $server_name = $_SERVER['SERVER_NAME'];
        //构造要请求的参数数组，无需改动
        $payment_type = "1";          //支付类型
        //服务器异步通知页面路径
        $notify_url = "http://$server_name/alipay.wap.create.direct.pay.by.user-PHP-UTF-8/notify_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数
        //页面跳转同步通知页面路径
        $return_url = "http://$server_name/home/pay/alipayCallback";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
        $parameter = array(
            "service" => "alipay.wap.create.direct.pay.by.user",
            "partner" => trim($alipay_config['partner']),
            "seller_id" => trim($alipay_config['seller_id']),
            "payment_type" => $payment_type,
            "notify_url" => $notify_url,
            "return_url" => $return_url,
            "out_trade_no" => $order_data['order_no'], //订单号
            "subject" => $order_data['subject'], //订单名称
            "total_fee" => $order_data['total_fee'], //支付金额
            "show_url" => $order_data['show_url'], //商品展示地址
            "body" => $order_data['body'], //订单描述
            "it_b_pay" => 120, //超时时间
//            "extern_token" => $extern_token,  //钱包token
            "_input_charset" => trim(strtolower($alipay_config['input_charset']))
        );
        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        echo $html_text;
    }

    /**
     * 支付宝支付回调
     * @return type
     */
    public function alipayCallback() {
        header("Content-Type: text/html;charset=utf-8");
        $alipay_config = require_once APPPATH . '/third_party/Alipay/alipay.config.php';
        require_once APPPATH . '/third_party/Alipay/lib/alipay_notify.class.php';
        //计算得出通知验证结果
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        if ($verify_result) {//验证成功
            $out_trade_no = $this->input->get('out_trade_no'); //商户订单号
            $trade_no = $this->input->get('trade_no');   //支付宝交易号
            $trade_status = $this->input->get('trade_status');  //交易状态
            $total_fee = $this->input->get('total_fee');  //交易状态
            if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                //支付宝端交易交易成功
                //本端更改订单状态
                $query_order = $this->db->select('*')
                        ->where("`orderNo` = '$out_trade_no' and `payStatus` = '1' and `orderStatus` = '1' ")
                        ->get('order');
                $order = $query_order->row_array();
                if (!$order) {
                    lmdebug('支付宝本端订单异常:订单号' . $out_trade_no, 'pay');
                    return;
                }
                $order_id = $order['id'];
                $update_order = $this->db->where("`id` = '$order_id'")->update('order', [
                    'payStatus' => '2',
                    'orderStatus' => '3',
                    'payType' => '2', //支付方式 支付宝
                    'payTime' => date('Y-m-d H:i:s'),
                    'true_amount' => $total_fee,
                    'out_trade_no' => $trade_no,
                    'utime' => date('Y-m-d H:i:s')
                ]);
                if ($update_order) {
                    $this->load->helper('url');
                    redirect("http://" . $_SERVER['SERVER_NAME'] . '/home/store/storeDetail/id/' . $order['sid'] . 'html');
                } else {
                    lmdebug('支付宝本端数据更新失败:' . $this->db->last_query(), 'pay');
                    echo '支付失败';
                }
            } else {
                lmdebug('支付宝支付端支付异常:订单号' . $out_trade_no, 'pay');
                return;
            }
        } else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            lmdebug('支付宝支付端验证失败:', 'pay');
            echo "sing error";
        }
    }

    public function wxpay() {
        ini_set('date.timezone', 'Asia/Shanghai');
        require_once APPPATH . '/third_party/Wxpay/lib/WxPay.Api.php';
        require_once APPPATH . '/third_party/Wxpay/lib/WxPay.JsApiPay.php';
        $order_id = $this->input->get('id');
        //①、获取用户openid
        $tools = new JsApiPay();
        $redirect_uri = "http://" . $_SERVER['SERVER_NAME'] . '/home/pay/wxpay?id=' . $order_id; //获取openid
        $openId = $tools->GetOpenid($redirect_uri);
        if(!$openId){
            exit();
        }
        $query_order = $this->db->select('*,store_service.name,store.storeName')
                ->join('store_service', 'store_service.id = order.serviceId')
                ->join('store', 'store.id = order.sid')
                ->where("`order`.`id` = '$order_id' and `order`.`payStatus` = '1' and `order`.`orderStatus` = '1' ")
                ->get('order');
        $order = $query_order->row_array();
        if (empty($order)) {
            show_error('该订单不存在！');
        }
        $pay_data['order_no'] = $order['orderNo'];
        $pay_data['subject'] = $order['name'];
        //$pay_data['total_fee'] =  $order['amount'];
        $pay_data['total_fee'] = '0.01';
        $pay_data['body'] = $order['storeName'] . ':' . $order['name'];
        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody($pay_data['body']);
        $input->SetAttach($pay_data['attach']);
        $input->SetOut_trade_no($pay_data['order_no']);
        $input->SetTotal_fee($pay_data['total_fee']);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url('http://' . $_SERVER['SERVER_NAME'] . '/home/pay/wxorderNotify');
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        printf_info($order);
    }

    public function wxorderNotify() {
        ini_set('date.timezone', 'Asia/Shanghai');
        require_once APPPATH . '/third_party/Wxpay/lib/WxPay.Api.php';
        require_once APPPATH . '/third_party/Wxpay/lib/WxPay.JsApiPay.php';
        $tools = new JsApiPay();
        $this->twig->render('home/pay/pay.twig', array(
//            'jsApiParameters' => $jsApiParameters,
        ));
    }

    public function getOpenid() {
        $order_id = $this->input->get('id');
    }

}
