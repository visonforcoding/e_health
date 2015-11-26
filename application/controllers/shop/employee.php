<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-8 15:19:48 by caowenpeng , caowenpeng1990@126.com
 */
class Employee extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function employeeList() {
        $this->twig->render('/shop/employee/employeeList.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
        ));
    }

    public function getEmployeeList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "store_employee.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $keywords = $this->input->post('keywords');
        if (!empty($keywords)) {
            $where .= "and (`employee_no` like '%$keywords%' or `truename` like '%$keywords%' or `tel` like '%$keywords%')";
        }
        $this->load->model('Employee_model', 'employee_model');
        $datas = $this->employee_model
                ->getJsonData('store_employee', $posts['page'], $posts['rows'], 'store_employee.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    public function employeeAdd() {
        if ($this->input->isPost()) {
            $store = $this->user;
            $store_id = $store['id'];
            $tel = $this->input->post('tel');
            $ck_username = $this->db->where("`store_id` = '$store_id' and `tel` = '$tel'")->count_all_results('store_employee');
            if ($ck_username > 0) {
                $response['status'] = false;
                $response['msg'] = '该手机号已经存在';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $query_last_employee = $this->db->where("`store_id` = '$store_id'")->order_by('employee_no','desc')->get('store_employee');
            $last_employee = $query_last_employee->row_array();
            if($last_employee){
                $employee_no = $last_employee['employee_no']+1;
            }else{
                $employee_no = date('ymd').'001';
            }
            $insert_data['truename'] = $this->input->post('truename');
            $insert_data['tel'] = $this->input->post('tel');
            $insert_data['job'] = $this->input->post('job');
            $insert_data['id_no'] = $this->input->post('id_no');
            $insert_data['email'] = $this->input->post('email');
            $insert_data['intime'] = $this->input->post('intime');
            $insert_data['store_id'] = $store['id'];
            $insert_data['employee_no'] = $employee_no;
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $ck = $this->db->insert('store_employee', $insert_data);
            if ($ck) {
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
        $this->twig->render('/shop/employee/employeeAdd.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
        ));
    }

    public function employeeEdit() {
        $employee_id = $this->input->get('id');
        if ($this->input->isPost()) {
            $data = $this->input->posts();
            $data['utime'] = date('Y-m-d H:i:s');
            $ck = $this->db->where("id = '$employee_id'")->update('store_employee', $data);
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '更新成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '更新失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_employee = $this->db->where("id = '$employee_id'")->get('store_employee');
        $employee = $query_employee->row_array();
        $this->twig->render('/shop/employee/employeeEdit.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'employee' => $employee
        ));
    }

    public function employeeDel() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $ck = $this->db->delete('store_employee', array('id' => $id));
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '删除成功';
            } else {
                $response['status'] = true;
                $response['msg'] = '删除失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

    public function exportExcel() {
        // 输出Excel文件头，可把user.csv换成你要的文件名  
        $user = $this->user;
        $keywords = $this->input->get('keywords');
        $where = '';
        if(!empty($keywords)){
          $where =  " and (`employee_no` like '%$keywords%' or `truename` like '%$keywords%' or `tel` like '%$keywords%')";
        }
        $store_id = $user['id'];
        $query_employees = $this->db->select('employee_no,id_no,truename,gender,job,tel,intime,status')
                ->where("`store_id` = '$store_id'$where")
                ->get('store_employee');
        $employees = $query_employees->result_array();
        foreach($employees as $key=>$value){
            $gender = $value['gender'];
            $employees[$key]['gender'] = $gender=='1'?'男':'女';
            $status = $value['status'];
            $employees[$key]['status'] = $status=='1'?'在职':'离职';
        }
        $columnArr= array('编号', '身份证号', '姓名', '性别', '职务','手机号','入职时间', '状态');
        $filename = '员工记录.csv';
        exportExcel($columnArr, $employees, $filename);
    }

}
