<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-10  by chenban
 * 后台提现审核
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Balance extends LM_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->twig->render('admin/balance/index.twig');
    }

    public function getbalance() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'ctime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name'); //搜索的条件

        if ($name) {
            $like = array('store.storeName' => $name);
        } else {
            $like = array();
        }
        $where = "withdraw.type='1'";
        $this->load->model('balance_model', 'balance_model');
        $rows = $this->balance_model->getJsonRows('withdraw', $curPage, $pageSize, $sort, $order, $where, $like);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function editBalance() {
        $id = $this->input->get('id');
        $query = $this->db->update('withdraw', array('status' => '1'), array('id' => $id));
        if ($query) {
            echo "<script >location.href='/admin/balance/index';</script>";
        } else {
            header('content-type:text/html;charset=utf-8');
            echo "<script >alert('提交失败！');history.go(-1);</script>";
        }
    }

    public function confirmWithdraw() {
        $id = $this->input->post('id');
        $confirm = $this->db->update('withdraw', ['status' => '1'], ['id' => $id]);
        if ($confirm) {
            $response['status'] = true;
            $response['msg'] = '操作成功';
        } else {
            $response['status'] = false;
            $response['msg'] = '操作失败';
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
    }

}
