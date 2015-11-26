<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-27 17:09:03 by caowenpeng , caowenpeng1990@126.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends LM_Controller {

    public function index() {
        $this->twig->render('admin/article/index.twig');
    }

    public function getArticle() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'regtime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $id = $this->input->post('name');
        $where = '';
        $this->load->model('Article_model', 'article_model');
        $rows = $this->article_model->getJsonRows('health', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function editArticle() { 
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id = $post['id'];
            $data = array(
                'title' => $post['title'],
                'abstract' => $post['abstract'],
                'from' => $post['from'],
                'detail' => $post['detail'],
                'status' => $post['status'],
                'utime' => date('Y-m-d H:i:s'),
            );
            $ck_ins = $this->db->where("id = '$id'")->update('health', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
                $response['msg'] = '修改成功！';
            } else {
                $response['msg'] = '修改失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_article = $this->db->where("id = '$id'")->get('health');
        $article = $query_article->row_array();
        if(!$article){
            show_error('该记录不存在！');
        }
        $this->twig->render('admin/article/article_edit.twig', array(
            'article'=>$article
        ));
    }

}
