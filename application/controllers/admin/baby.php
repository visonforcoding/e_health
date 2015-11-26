<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baby extends LM_Controller {

    public function index() {

        //新增订单数 今天的订单数(已支付)
        $new_order_nums = $this->db
                ->where("(orderStatus = '5' or orderStatus = '6') and date(ctime) = date(now()) ")
                ->count_all_results('order');

        $month_order_nums = $this->db
                ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = year(now()) and month(ctime) = month(now()) ")
                ->count_all_results('order');

        $new_member_nums = $this->db
                ->where("date(ctime) = date(now()) ")
                ->count_all_results('member');
        
        $this->twig->render('admin/index.twig', array(
            'admin' => $this->session->userdata('admin'),
            'new_order_nums' => $new_order_nums,
            'month_order_nums' => $month_order_nums,
            'new_member_nums' => $new_member_nums
        ));
    }

}
