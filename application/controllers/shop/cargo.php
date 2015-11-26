<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-11-13 11:48:42 by caowenpeng , caowenpeng1990@126.com
 */
class Cargo extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function cargoList() {
        //出入库明细
        $user = $this->user;
        $store_id = $user['id'];
        $query_corage = $this->db
                ->join('store_cargo','store_cargo.id = cargo_log.cargo_id')
                ->where("cargo_log.`store_id` = '$store_id'")->order_by('cargo_log.ctime', 'desc')
                ->get('cargo_log');
        $corages = $query_corage->result_array();
        $this->twig->render('/shop/cargo/cargo.twig', array(
            'corages' => $corages,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    /**
     * 耗材列表数据
     */
    public function getCargoList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "store_cargo.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $this->load->model('Cargo_model', 'cargo_model');
        $datas = $this->cargo_model
                ->getJsonData('store_cargo', $posts['page'], $posts['rows'], 'store_cargo.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    /**
     * 添加耗材类别
     */
    public function cargoAdd() {
        if ($this->input->isPost()) {
            $store = $this->user;
            $store_id = $store['id'];
            $insert_data['cargo_name'] = $this->input->post('cargo_name');
            $insert_data['from'] = $this->input->post('from');
            $insert_data['price'] = $this->input->post('price');
            $insert_data['store_id'] = $store_id;
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $ck = $this->db->insert('store_cargo', $insert_data);
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
        $this->twig->render('/shop/cargo/cargoAdd.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    
     public function cargoEdit() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $insert_data['cargo_name'] = $this->input->post('cargo_name');
            $insert_data['from'] = $this->input->post('from');
            $insert_data['price'] = $this->input->post('price');
            $insert_data['nums'] = $this->input->post('nums');
            $insert_data['utime'] = date('Y-m-d H:i:s');
            $ck = $this->db->where("`id` = '$id'")->update('store_cargo', $insert_data);
            if ($ck) {
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
        $id = $this->input->get('id');
        $query_cargo = $this->db->where("`id` = '$id'")->get('store_cargo');
        $cargo = $query_cargo->row_array();
        $this->twig->render('/shop/cargo/cargoEdit.twig', array(
            'cargo'=>$cargo,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }
    
    /**
     * 入库
     * @return type
     */
    public function addCargoNum() {
        if ($this->input->isPost()) {
            $num = $this->input->post('pass');
            $id = $this->input->post('id');
            //开启事务
            $this->db->trans_start();
            $this->db->query("update store_cargo set `nums` = `nums` + '$num',`utime` = now() where id = '$id'");
            //更新出入库记录
            $user = $this->user;
            $insert_data['store_id'] = $user['id'];
            $insert_data['cargo_id'] = $id;
            $insert_data['num'] = $num;
            $insert_data['do_type'] = '1';
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $insert_data['relation_id'] = $id;
            $insert_data['remark'] = '入库';
            $this->db->insert('cargo_log', $insert_data);
            $this->db->trans_complete();
            if ($this->db->trans_status()) {
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
    }

    public function setCargo() {
        $user = $this->user;
        $store_id = $user['id'];
        $service_id = $this->input->get('id');
        if ($this->input->post()) {
            $store_cargo = $this->input->post('store_cargo');
            $nums = $this->input->post('nums');
            $service_cargos_arr = [];
            foreach ($store_cargo as $k => $v) {
                    $service_cargos_arr[] = array(
                        'cargo_id' => $v,
                        'nums' => $nums[$k]
                    );
            }
            $service_cargos = serialize($service_cargos_arr);
            $update = $this->db->where("`id` = '$service_id'")
                    ->update('store_service', ['cargo' => $service_cargos, 'utime' => date('Y-m-d H:i:s')]);
            if ($update) {
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
        $query_cargos = $this->db->where("`store_id` = '$store_id'")->get('store_cargo');
        $cargos = $query_cargos->result_array();
        $query_service = $this->db->where("`id` = '$service_id'")->get('store_service');
        $service = $query_service->row_array();
        $service_cargos = $service['cargo'];
        $service_cargos_arr = unserialize($service_cargos);
        $service_cargos_array= [];
        if ($service_cargos) {
            foreach ($service_cargos_arr as $value) {
                $service_cargos_array[$value['cargo_id']] = $value['nums'];
            }
        }
        $this->twig->render('shop/user/setCargo.twig', array(
            'cargos' => $cargos,
            'service_cargos' => $service_cargos_array
        ));
    }

}
