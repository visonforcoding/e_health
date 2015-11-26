<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-18 14:09:46 by caowenpeng , caowenpeng1990@126.com
 * 店铺版管理后台
 */
class Index extends Shop_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Store_model', 'store_model');
    }

    public function index() {
        $user = $this->checkLogin();
        $realTimeInfo = $this->getRealtimeInfo();
        $store_id = $user['id'];
        $store = $this->store_model->findStoreById($store_id);

        //新增订单数 今天的订单数(已支付)
        $new_order_nums = $this->db
                ->where("`sid` = '$store_id' and `type` = '1' and date(ctime) = date(now()) ")
                ->count_all_results('order');
        $new_comment_nums = $this->db
                ->where("`sid` = '$store_id' and `type` = '1' and date(ctime) = date(now()) ")
                ->count_all_results('comment');

        $query_today_income = $this->db->select('sum(amount) as today_income')
                ->where("`sid` = '$store_id' and `type` = '1' and (orderStatus = '5' or orderStatus = '6') and date(ctime) = date(now()) ")
                ->get('order');
        $today_income_row = $query_today_income->row_array();
        $today_income = $today_income_row['today_income'];
        //总营业额 订单收入+会员卡售出
        $query_total_income = $this->db->select('sum(amount) as total_income,round(sum(amount)/sum(nums)) as avg_price')
                ->where("`sid` = '$store_id' and `type` = '1' and (orderStatus = '5' or orderStatus = '6') ")
                ->get('order');
        $total_income_row = $query_total_income->row_array();
        $total_income = $total_income_row['total_income'];
        
        $query_card_income = $this->db->select('sum(price) as total_income')
                          ->where("store_id = '$store_id'")->get('member_card');
        $card_income = $query_card_income->row_array();
        $total_card_income = $card_income['total_income'];
        $total_income = $total_income + $total_card_income;
        

        $this->twig->render('/shop/index/index.twig', array(
            'user' => $user,
            'store' => $store,
            'realTimeInfo' => $realTimeInfo,
            'new_order_nums' => $new_order_nums,
            'new_comment_nums' => $new_comment_nums,
            'total_income_row'=>$total_income_row,
            'total_income' => $total_income,
            'today_income' => $today_income
        ));
    }

    public function login() {
        $errMsg = FALSE;
        if ($this->input->isPost()) {
            $tel = $this->input->post('tel');
            $pwd = $this->input->post('pwd');
            $this->load->model('Store_model', 'store_model');
            $store = $this->store_model->ckTelExit($tel);
            if ($store) {
                if ($store['pwd'] != setPlainPassword($pwd)) {
                    $errMsg = '密码不正确';
                } else {
                    unset($store['pwd']);
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['shop_user'] = $store;
                    //$this->session->set_userdata(array('shop_user'=>$store)); //用户版 后台 店铺版 登录session key 应区分
                    $this->load->helper('url');
                    redirect('/shop/index/index');
                }
            } else {
                $errMsg = '该手机号未注册';
            }
        }
        $this->twig->render('/shop/index/login.twig', array(
            'error' => $errMsg,
        ));
    }

    public function loginOut() {
        $this->session->unset_userdata('user');
        $this->load->helper('url');
        redirect('/shop/index/login');
    }

}
