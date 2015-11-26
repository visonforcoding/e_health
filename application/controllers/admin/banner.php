<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-28 14:54:52 by caowenpeng , caowenpeng1990@126.com
 */
class Banner extends LM_Controller {

    public function index() {

        $this->twig->render('/admin/banner/index.twig', array(
        ));
    }

    /**
     * 
     */
    public function getBanners() {
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
        $this->load->model('Banner_model', 'banner_model');
        $rows = $this->banner_model->getJsonRows('banner', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function addBanner() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'link' => $post['link'],
                'desc' => $post['desc'],
                'pic' => $post['pic'],
                'status' => $post['status'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            $ck_ins = $this->db->insert('banner', $data);
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
        $this->twig->render('/admin/banner/banner_add.twig', array(
        ));
    }
    
    
    public function editBanner() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id =$post['id'];
            $data = array(
                'link' => $post['link'],
                'desc' => $post['desc'],
                'pic' => $post['pic'],
                'status' => $post['status'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            $ck_ins = $this->db->where("id = '$id'")->update('banner', $data);
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
        $query_banner = $this->db->where("id = '$id'")->get('banner');
        $banner = $query_banner->row_array();
        $this->twig->render('/admin/banner/banner_edit.twig', array(
            'banner'=>$banner
        ));
    }

}
