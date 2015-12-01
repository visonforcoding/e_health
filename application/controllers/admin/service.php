<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-6 16:15:03 by caowenpeng , caowenpeng1990@126.com
 * 服务管理
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends LM_Controller {
    
    

    public function index() {
        $this->twig->render('admin/service/index.twig');
    }

    public function getService() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        if (!empty($name)) {
            $where = "`nick` like '$name%'";
        }
        $this->load->model('Service_model', 'service_model');
        $rows = $this->service_model->getJsonRows('store_service', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function addService() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'price' => $post['price'],
                'ctime' => date('Y-m-d H:i:s'),
                'efficacy' => $post['efficacy'],
                'taboo' => $post['taboo'],
                'stime' => $post['stime'],
                'cover' => $post['cover'],
                'status' => $post['status'],
            );
            $query_ck = $this->db->where(array('name' => $post['name']))->get('service');
            $ck_node = $query_ck->row_array();
            //检测是否已被存在
            if (is_array($ck_node) && count($ck_node) > 0) {
                $response['status'] = 0;
                $response['msg'] = '该项目名已经存在！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $ck_ins = $this->db->insert('service', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
                $response['msg'] = '添加成功！';
            } else {
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('admin/service/addService.twig');
    }

    /**
     * 
     */
    public function editService() {
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'price' => $post['price'],
                'utime' => date('Y-m-d H:i:s'),
                'efficacy' => $post['efficacy'],
                'taboo' => $post['taboo'],
                'stime' => $post['stime'],
                'cover' => $post['cover'],
                'status' => $post['status'],
            );
//            $query_ck = $this->db
//                    ->where(array('name' => $post['name']))
//                    ->where_not_in('id',["$id"])
//                    ->get('service');
//            $ck_node = $query_ck->row_array();
//            //检测是否已被存在
//            if (is_array($ck_node) && count($ck_node) > 0) {
//                $response['status'] = 0;
//                $response['msg'] = '该项目名已经存在！';
//                $this->output->set_content_type('application/json')
//                        ->set_output(json_encode($response));
//                return;
//            }
            $ck_edit = $this->db->where("`id` = '$id'")->update('service', $data);
            $response['status'] = $ck_edit;
            if ($ck_edit) {
                $response['msg'] = '添加成功！';
            } else {
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_service = $this->db->where("id = '$id'")->get('service');
        $service = $query_service->row_array();
        $this->twig->render('admin/service/editService.twig', array(
            'service' => $service
        ));
    }

    /**
     * 
     */
    public function doUpload() {

        $config['upload_path'] = './uploads/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = date('Ymdhis') . createRandomCode(2);
        $this->lang->load('upload', 'chinese'); //加载语言类
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            $response['status'] = false;
            $response['msg'] = strip_tags($error);
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $response['status'] = true;
            $response['msg'] = '上传成功！';
            $response['url'] = '/uploads/admin/' . $filename;
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

}
