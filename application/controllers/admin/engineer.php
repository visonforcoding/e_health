<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-29 14:58:32 by caowenpeng , caowenpeng1990@126.com
 * 店铺管理
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Engineer extends LM_Controller {

    /**
     * 管理页
     */
    public function index() {
        $this->twig->render('admin/engineer/index.twig');
    }

    public function getEngineer() {
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
        $this->load->model('Engineer_model', 'engineer_model');
        $rows = $this->engineer_model->getJsonRows('engineer', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    /**
     * 添加技师
     */
    public function addEngineer() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $regionId = $post['regionId'];
            $regionId = empty($regionId) ? -1 : $regionId;
            $sex = $this->input->post('sex') == 'on' ? 1 : 0;
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($regionId);
            if (!$area) {
                $response['status'] = 0;
                $response['msg'] = '区域类型错误！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $areaType = $area['type'];
                if ($areaType != 5) {
                    $response['status'] = 0;
                    $response['msg'] = '区域类型错误！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            }
            $areaId = $this->area_model->findPidByAreaId($regionId);
            $cityId = $this->area_model->findPidByAreaId($areaId);
            $data = array(
                'regionId' => $regionId,
                'areaId' => $areaId,
                'cityId' => $cityId,
                'name' => $post['name'],
                'idNum' => $post['idNum'],
                'idPic' => $post['idPic'],
                'cover' => $post['cover'],
                'sex' => $sex,
                'tel' => $post['tel'],
                'desc' => $post['desc'],
                'skilled' => $post['skilled'],
                'manifesto' => $post['manifesto'],
                'status' => $post['status'],
                'address' => $post['address'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            $ck_ins = $this->db->insert('engineer', $data);
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
        $this->twig->render('admin/engineer/engineer_add.twig', array(
        ));
    }

    public function editEngineer() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id = $post['id'];
            $regionId = $post['regionId'];
            $regionId = empty($regionId) ? -1 : $regionId;
            $sex = $this->input->post('sex') == 'on' ? 1 : 0;
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($regionId);
            if (!$area) {
                $response['status'] = 0;
                $response['msg'] = '区域类型错误！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $areaType = $area['type'];
                if ($areaType != 5) {
                    $response['status'] = 0;
                    $response['msg'] = '区域类型错误！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            }
            $areaId = $this->area_model->findPidByAreaId($regionId);
            $cityId = $this->area_model->findPidByAreaId($areaId);
            $data = array(
                'regionId' => $regionId,
                'areaId' => $areaId,
                'cityId' => $cityId,
                'name' => $post['name'],
                'idNum' => $post['idNum'],
                'idPic' => $post['idPic'],
                'cover' => $post['cover'],
                'sex' => $sex,
                'tel' => $post['tel'],
                'desc' => $post['desc'],
                'skilled' => $post['skilled'],
                'manifesto' => $post['manifesto'],
                'status' => $post['status'],
                'address' => $post['address'],
                'utime' => date('Y-m-d H:i:s'),
            );
            $ck_ins = $this->db->where("`id` = '$id'")->update('engineer', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
                $response['msg'] = '更新成功！';
            } else {
                $response['msg'] = '更新失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_engineer = $this->db->where("id = '$id' ")->get('engineer');
        $engineer = $query_engineer->row_array();
        if(!$engineer){
            show_error('该记录不存在！');
        }
        $this->twig->render('admin/engineer/engineer_edit.twig', array(
            'engineer'=>$engineer
        ));
    }

}
