<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-11 10:24:48 by caowenpeng , caowenpeng1990@126.com
 * 养生知识
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Health extends Home_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 养生知识项目数据浏览
     */
    public function index() {

        $query_healths = $this->db->order_by("ctime", "desc")->get('health');
        $healths = $query_healths->result_array();
        $this->twig->render('home/health/health.twig', array(
            'healths' => $healths
        ));
    }

    /**
     * 项目详情
     */
    public function healthDetail() {
        $health_id = $this->input->get('id');

        if (!empty($health_id)) {

            //health hit点击次数处理
            $where1['id'] = $health_id;
            $this->db->where($where1)->set('hit', 'hit+1', FALSE)->update('health');
            //health表查询操作
            $query_health = $this->db
                            ->where($where1)->get('health');
            $health = $query_health->row_array();
            // comment表查询
            $this->load->model('Comment_model','comment_model');
            $comments  = $this->comment_model->fetchComments(3,$health_id);
            if ($health) {
                
            } else {
                show_404();
            }
        } else {
            show_404();
        }

        $this->twig->render('home/health/health_detail.twig', array(
            'health' => $health, 'comments' => $comments
        ));
    }

    /**
     * 评论
     */
    public function doComment() {
        $this->load->helper('url');
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id = $post['id'];
            $user = $this->checkLogin(TRUE, base_url('/home/health/healthDetail/id/' . $id . '#doComment'));
            $desc = $post['desc'];
            if (empty($desc)) {
                $response['status'] = false;
                $response['msg'] = '内容不能为空!';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $data = array(
                'uid' => $user['id'],
                'sid' => $id,
                'type' => 3,
                'desc' => $desc,
                'ctime' => date('Y-m-d H:i:s')
            );
            $ck_ins = $this->db->insert('comment', $data);
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '评论成功!';
            } else {
                $response['status'] = true;
                $response['msg'] = '评论出错!';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

}
