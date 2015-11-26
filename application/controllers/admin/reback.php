<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-10  by chenban
 * 后台退款审核
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reback extends LM_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->twig->render('admin/reback/index.twig');
    }

    public function getreback() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'ctime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name'); //搜索的条件
        $where = '';
        if ($name) {
            $where = "member.Tel like '%$name%'";
        }

        $this->load->model('reback_model', 'reback_model');
        $rows = $this->reback_model->getJsonRows('reback', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function refuse() {
        $id = $this->input->post('id');
        $reson = $this->input->post('reason');
        $confirm = $this->db->update('reback', ['status' => '2', 'refuseReason' => $reson], ['id' => $id]);
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

    public function confirm() {
        $id = $this->input->post('id');
        $confirm = $this->db->update('reback', ['status' => '3'], ['id' => $id]);
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
