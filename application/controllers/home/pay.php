<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-12-23 16:39:43 by caowenpeng , caowenpeng1990@126.com
 */
class Pay extends Home_Controller {

    public function submitPay() {
        $order_id = $this->input->get('id');
        $query_order = $this->db->select('*')->where("`id` = '$order_id'")->get('order');
        $order= $query_order->row_array();
        if (empty($order)) {
            show_error('该订单不存在！');
        }
        if ($order['payStatus'] == '1') {
            $pay_data['order_no'] = $order['orderNo'];
            $pay_data['subject'] = '这是个测试订单';
            $pay_data['total_fee'] = '0.01';
            $pay_data['show_url'] = "http://".$_SERVER['SERVER_NAME'];
            $pay_data['body'] = '0.01';
            $this->alipay($pay_data);
        }
    }

    protected function alipay($order_data) {
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
            "it_b_pay" => 120,   //超时时间
//            "extern_token" => $extern_token,  //钱包token
            "_input_charset" => trim(strtolower($alipay_config['input_charset']))
        );
        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        echo $html_text;
    }

}
