<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-30 17:13:45 by caowenpeng , caowenpeng1990@126.com
 * 区域管理
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area extends LM_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->twig->render('admin/area/index.twig');
    }

    public function getArea() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'regtime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $id = $this->input->post('name');
        $where = '';
        if (!empty($id)) {
            $where = "`pid` = '$id%'";
        }
        $this->load->model('Area_model', 'area_model');
        $rows = $this->area_model->getJsonRows('area', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function addArea() {
         if ($this->input->isPost()) {
            $post = $this->input->posts();
            $pid = $post['pid'];
            $query_area = $this->db->where(array('id'=>$pid))->get('area');
            $area = $query_area->row_array();
            $type = intval($area['type'])+1;
            $data = array(
                'pid' => $pid,
                'name' => $post['name'],
                'letter' => $post['letter'],
                'ctime' => date('Y-m-d H:i:s'),
                'status' => $post['status'],
                'code' => $post['code'],
                'type'=>$type
            );
            $query_ck_area = $this->db->where(array('name' => $post['name']))->get('area');
            $ck_node = $query_ck_area->row_array();
            //检测是否已被存在
            if (is_array($ck_node) && count($ck_node) > 0) {
                $response['status'] = 0;
                $response['msg'] = '该位置已经存在！';
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;
            }
            $ck_ins = $this->db->insert('area', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '添加成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('admin/area/add_area.twig');
    }

    public function get_area_tree() {
        $type = $this->input->get('type');
        $filename = 'area_tree.json';
        if (!empty($type)) {
            $filename = $type . '_area_tree.json';
        }
        $data = fcache($filename);
        if (!$data) {
            if ($type == 'all') {
                $query_areas = $this->db
                        ->where("status = 1 and type > 1")
                        ->get('area');
            } else {
                $query_areas = $this->db
                        ->where("status = 1 and type != 4 and type >1")
                        ->get('area');
            }
            $areas = $query_areas->result_array();
            $tree = array();
            foreach ($areas as $key => $value) {
//                $tree[0]['id'] = 0;
//                $tree[0]['text'] = 'root';
                if ($value['pid'] == 1) {
                    $tree[$key + 1]['id'] = $value['id'];
                    $tree[$key + 1]['text'] = $value['name'];
                    $tree[$key + 1]['state'] = 'closed';
                    foreach ($areas as $k => $v) {
                        if ($v['pid'] == $value['id']) {
                            $tree[$key + 1]['children'][] = ['id' => $v['id'], 'text' => $v['name']];
                            unset($areas[$k]);
                        }
                    }
                }
            }
            $json_data = json_encode(array_values($tree));
            fcache($filename, $json_data);
        } else {
            $json_data = $data;
        }
        $this->output->set_content_type('application/json')
                ->set_output($json_data);
    }

    public function asy_area_tree() {
        $id = $this->input->post('id');
        $id = !empty($id) ? intval($id) : 1;
        $query_areas = $this->db
                ->where("status = 1 and  `pid` = '$id'")
                ->get('area');
        $areas = $query_areas->result_array();
        $result = array();
        foreach ($areas as $value) {
            $tree = array();
            $has_child = $this->has_child($value['id']) ? 'closed' : 'open';
            $tree['id'] = $value['id'];
            $tree['text'] = $value['name'];
            $tree['state'] = $has_child;
            array_push($result,$tree);
        }
         $this->output->set_content_type('application/json')
                ->set_output(json_encode($result));
    }

    public function has_child($id) {
        $query_areas = $this->db
                ->where("`pid` = '$id'")
                ->count_all_results('area');
        return $query_areas>0 ? true : false;
    }

}
