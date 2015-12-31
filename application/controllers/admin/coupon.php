<?php

/*
 * Encoding     :   UTF-8
 * Created on   :   2015-10-21 15:32:03 by chenban   
 * 后台优惠劵管理   
 */
header('Content-type:text/html;charset=utf-8');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coupon extends LM_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->twig->render('admin/coupon/index.twig');
    }

    public function getCoupon() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        if (!empty($name)) {
            $where = "`coupon`.`name` like '$name%'";
        }
        $this->load->model('Coupon_model', 'coupon_model');
        $rows = $this->coupon_model->getJsonRows('coupon', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function add() {
        if ($this->input->isPost()) {
            $posts = $this->input->post();
            if ($this->input->post('name') == "") {
                $response['status'] = 0;
                $response['msg'] = '优惠劵名称不能为空！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $name = $this->input->post('name');
            //$type   = $this->input->post('type');
            $amount1 = $this->input->post('amount1');
            if ($amount1 == '0') {
                $type = '0';
            } else {
                $type = '1';
            }
            $amount2 = $this->input->post('amount2');
            $areaId = $this->input->post('areaId');
            $shopId = $this->input->post('shopId');
            $serviceId = $this->input->post('serviceId');
            $beginTime = $this->input->post('beginTime');
            $beginTime = $beginTime == '' ? date('Y-m-d H:i:s', time()) : $beginTime;
            $endTime = $this->input->post('endTime');
            $logo = $this->input->post('logo');
            $desc = $this->input->post('desc');
            $flag = $this->input->post('flag');


            $query = $this->db->insert('coupon', array('name' => $name,
                'type' => intval($type, 10),
                'amount1' => $amount1,
                'amount2' => $amount2,
                'areaId' => $areaId,
                'shopId' => $shopId,
                'serviceId' => $serviceId,
                'beginTime' => $beginTime,
                'endTime' => $endTime,
                'logo' => $logo,
                'desc' => $desc,
                'flag' => $flag == '0' ? '0' : '1'));
            if ($query) {
                $response['status'] = 1;
                $response['msg'] = '添加优惠劵成功！';
                $response['url'] = '/admin/coupon/index';
            } else {
                $response['status'] = 0;
                $response['msg'] = '添加优惠劵失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_shop = $this->db->where(array('status' => '1'))->get('store'); //没判断审核状态
        $shop = $query_shop->result_array();

        $query_service = $this->db->where(array('status' => '1'))->get('store_service');
        $service = $query_service->result_array();
        $this->twig->render('admin/coupon/add.twig', array('shops' => $shop, 'services' => $service));
    }

    public function edit($id) {
        $id = intval($id, 10);
        $query = $this->db->where(array('id' => $id))->get('coupon');
        $data['coupons'] = $query->row();

        $query_shop = $this->db->where(array('status' => '1'))->get('store'); //没判断审核状态
        $data['shops'] = $query_shop->result_array();

        $query_service = $this->db->where(array('status' => '1'))->get('store_service');
        $data['services'] = $query_service->result_array();

        if ($this->input->isPost()) {
            $posts = $this->input->post();
            if ($this->input->post('name') == "") {
                $response['status'] = 0;
                $response['msg'] = '优惠劵名称不能为空！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $name = $this->input->post('name');
            //$type   = $this->input->post('type');
            $amount1 = $this->input->post('amount1');
            if ($amount1 == '0') {
                $type = '0';
            } else {
                $type = '1';
            }
            $update_data['amount2'] = $this->input->post('amount2');
            $update_data['shopId'] = $this->input->post('shopId');
            $update_data['serviceId'] = $this->input->post('serviceId');
            $beginTime = $this->input->post('beginTime');
            $update_data['beginTime'] = $beginTime == '' ? date('Y-m-d H:i:s', time()) : $beginTime;
            $update_data['endTime'] = $this->input->post('endTime');
            $update_data['desc'] = $this->input->post('desc');
            $update_data['flag'] = $this->input->post('flag');
            $query = $this->db->update('coupon', $update_data, array('id' => $id));
            if ($query) {
                $response['status'] = 1;
                $response['msg'] = '更新优惠劵成功！';
                $response['url'] = '/admin/coupon/index';
            } else {
                $response['status'] = 0;
                $response['msg'] = '更新优惠劵失败！';
                $response['url'] = '/admin/coupon/index';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }


        $this->twig->render('admin/coupon/edit.twig', $data);
    }

    public function on_off_coupon($couponId, $flag) {
        $this->load->model('Coupon_model', 'coupon_model');

        $query = $this->coupon_model->on_off_coupon($couponId, $flag);
        if ($query) {
            echo "<script >alert('提交成功');location.href='/admin/coupon/index';</script>";
        } else {
            echo "<script >alert('系统繁忙，请稍候再试！');location.href='/admin/coupon/index';</script>";
        }
    }

    public function delCoupon() {
        if ($this->input->isPost()) {
            $id = $this->input->post('data');
            $ck = $this->db->delete('coupon', array('id' => $id));
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = 1;
                $response['msg'] = '删除成功！';
            } else {
                $response['status'] = 0;
                $response['msg'] = '删除失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

    /**
     * 
     */
    public function couponDetail() {
        $id = $this->input->get('id');
        $coupon_nums = $this->db->where("cid = '$id'")->count_all_results('user_coupon'); //总
        $use_coupon_nums = $this->db->where("cid = '$id' and flag = '2'")->count_all_results('user_coupon'); //使用的
        $this->twig->render('admin/coupon/couponDetail.twig', array(
            'coupon_nums'=>$coupon_nums,
            'use_coupon_nums'=>$use_coupon_nums
        ));
    }

}
