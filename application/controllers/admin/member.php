<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-29 11:31:27 by caowenpeng , caowenpeng1990@126.com
 * 用户管理
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends LM_Controller {

    public function index() {
        $this->twig->render('admin/member/index.twig', array(
            'admin_name' => $_SESSION['admin_username']
        ));
    }

    /**
     * 返回适用于jeasyui datagrid 的json 数据
     */
    public function getMembers() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'regtime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        if (!empty($name)) {
            $where = "`nick` like '$name%'";
        }
        $this->load->model('Member_model', 'member_model');
        $rows = $this->member_model->getJsonRows('member', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function addMember() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $tel = $post['tel'];
            $ck_tel = $this->db->where("tel = '$tel' and `status` = '1'")->count_all_results('member');
            if ($ck_tel) {
                $response['msg'] = '该手机号已被注册！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $data = array(
                'nick' => $post['nick'],
                'tel' => $post['tel'],
                'trueName' => $post['trueName'],
                'pwd' => setPlainPassword($post['pwd']),
                'gender' => $post['gender'],
                'birthday' => $post['birthday'],
                'status' => $post['status'],
                'address' => $post['address'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            //开启事务
            $ck_ins = $this->db->insert('member', $data);
            if ($ck_ins) {
                $response['msg'] = '添加成功！';
            } else {
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('admin/member/addMember.twig', array(
            'admin_name' => $_SESSION['admin_username']
        ));
    }

    public function editMember() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id = $post['id'];
            $tel = $post['tel'];
            $ck_tel = $this->db->where("tel = '$tel' and `id` !='$id'  and `status` = '1'")->count_all_results('member');
            if ($ck_tel) {
                $response['msg'] = '该手机号已被注册！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $data = array(
                'nick' => $post['nick'],
                'tel' => $post['tel'],
                'trueName' => $post['trueName'],
                'pwd' => setPlainPassword($post['pwd']),
                'gender' => $post['gender'],
                'birthday' => $post['birthday'],
                'status' => $post['status'],
                'address' => $post['address'],
                'utime' => date('Y-m-d H:i:s'),
            );
            //开启事务
            $ck_ins = $this->db->where("`id` = '$id'")->update('member', $data);
            if ($ck_ins) {
                $response['msg'] = '添加成功！';
            } else {
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_member = $this->db->where("`id` = '$id'")->get('member');
        $member = $query_member->row_array();
        $this->twig->render('admin/member/editMember.twig', array(
            'admin_name' => $_SESSION['admin_username'],
            'member'=>$member
        ));
    }
    
    public function editRow(){
         if ($this->input->isPost()) {
            $datas = $this->input->post('data');
            $data = $datas[0];
            $id = $data['id'];
            $data['utime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->where("id = '$id'")->update('member', $data);
            if ($ck_ins) {
                $response['info'] = '更新成功！';
            } else {
                $response['info'] = '更新失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

}
