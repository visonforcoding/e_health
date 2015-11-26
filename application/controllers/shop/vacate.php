<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-21 14:59:26 by caowenpeng , caowenpeng1990@126.com
 */
class Vacate extends Shop_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function vacateList() {
        $this->twig->render('shop/vacate/vacateList.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getVacateList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "store_employee_vacate.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $keywords = $this->input->post('keywords');
        if (!empty($keywords)) {
            $where .= "and (`employee_no` like '%$keywords%' or `truename` like '%$keywords%' or `tel` like '%$keywords%')";
        }
        $this->load->model('Vacate_model', 'vacate_model');
        $datas = $this->vacate_model
                ->getJsonData('store_employee_vacate', $posts['page'], $posts['rows'], 'store_employee_vacate.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    public function vacateAdd() {
        $user = $this->user;
        $store_id = $user['id'];
        if ($this->input->post()) {
            $posts = $this->input->posts();
            $insert_data['store_id'] = $store_id;
            $insert_data['employee_id'] = $posts['employee_id'];
            $insert_data['days'] = $posts['days'];
            $insert_data['begin_time'] = $posts['begin_time'];
            $insert_data['end_time'] = $posts['end_time'];
            $insert_data['remark'] = $posts['remark'];
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->insert('store_employee_vacate', $insert_data);
            if ($ck_ins) {
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
        $query_employees = $this->db->where("`store_id` = '$store_id' and `status` = '1'")->get('store_employee');
        $employees = $query_employees->result_array();
        $this->twig->render('shop/vacate/vacateAdd.twig', array(
            'employees' => $employees,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function vacateEdit() {
        $user = $this->user;
        $store_id = $user['id'];
        $id = $this->input->get('id');
        if ($this->input->post()) {
            $posts = $this->input->posts();
            $insert_data['store_id'] = $store_id;
            $insert_data['employee_id'] = $posts['employee_id'];
            $insert_data['days'] = $posts['days'];
            $insert_data['begin_time'] = $posts['begin_time'];
            $insert_data['end_time'] = $posts['end_time'];
            $insert_data['remark'] = $posts['remark'];
            $insert_data['utime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->where("`id` = '$id'")->update('store_employee_vacate', $insert_data);
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '修改成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '修改失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_vacate = $this->db->where("`store_id` = '$store_id' and `id` = '$id'")->get('store_employee_vacate');
        $vacate = $query_vacate->row_array();
        $query_employees = $this->db->where("`store_id` = '$store_id' and `status` = '1'")->get('store_employee');
        $employees = $query_employees->result_array();
        $this->twig->render('shop/vacate/vacateEdit.twig', array(
            'employees' => $employees,
            'vacate' => $vacate,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }
    
    public function vacateDel(){
        $tablename = 'store_employee_vacate';
        $id = $this->input->post('id');
        $this->Del($tablename, $id);
    }
}
