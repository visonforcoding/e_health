<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-15 14:45:44 by caowenpeng , caowenpeng1990@126.com
 * 
 * 门店会员 主要线下业务   门店会员 使用 member 表 ,可升级会平台会员 进行线上操作
 */
class Member extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function memberList() {

        $this->twig->render('/shop/member/memberList.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
        ));
    }

    public function getMemberList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = "member.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $this->load->model('Member_model', 'member_model');
        $datas = $this->member_model
                ->getJsonData('member', $posts['page'], $posts['rows'], 'member.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    public function memberAdd() {
        if ($this->input->isPost()) {
            $store = $this->user;
            $store_id = $store['id'];
            $tel = $this->input->post('tel');
            $ck_tel = $this->db->where("`store_id` = '$store_id' and `tel` = '$tel'")->count_all_results('store_member');
            if ($ck_tel > 0) {
                $response['status'] = true;
                $response['msg'] = '该手机号已经存在';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $insert_data['trueName'] = $this->input->post('trueName');
            $insert_data['tel'] = $this->input->post('tel');
            $insert_data['gender'] = $this->input->post('gender');
            $insert_data['nick'] = $this->input->post('nick');
            $insert_data['store_id'] = $store_id;
            $insert_data['type'] = '2';
            $insert_data['birthday'] = $this->input->post('birthday');
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $insert_data['status'] = '0';
            $ck = $this->db->insert('member', $insert_data);
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
        $this->twig->render('/shop/member/memberAdd.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
        ));
    }

    public function memberEdit() {
        $member_id = $this->input->get('id');
        if ($this->input->isPost()) {
            $tel = $this->input->post('tel');
            $ck_tel = $this->db->where("`tel` = '$tel' and `id` != '$member_id'")->count_all_results('store_member');
            if ($ck_tel > 0) {
                $response['status'] = true;
                $response['msg'] = '该手机号已经存在';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $data['trueName'] = $this->input->post('trueName');
            $data['nick'] = $this->input->post('nick');
            $insert_data['gender'] = $this->input->post('gender');
            $insert_data['birthday'] = $this->input->post('birthday');
            $insert_data['utime'] = date('Y-m-d H:i:s');
            $ck = $this->db->where("id = '$member_id'")->update('member', $data);
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '更新成功';
            } else {
                $response['status'] = true;
                $response['msg'] = '更新失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_employee = $this->db->where("id = '$member_id'")->get('member');
        $employee = $query_employee->row_array();
        $this->twig->render('/shop/member/memberEdit.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'member' => $employee
        ));
    }

    public function memberDel() {
        $user = $this->user;
        $store_id = $user['id'];
        if ($this->input->isPost()) {
            $id = $this->input->post('id');
            $ck = $this->db->delete('member', array('id' => $id, 'store_id' => $store_id));
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

    public function getMemberJsonByTel() {
        $tel = $this->input->post('tel');
        if (empty($tel)) {
            $response['status'] = false;
            $response['msg'] = '请输入手机号';
        } else {
            $query_member = $this->db->where("`tel` = '$tel'")->get('member');
            $member = $query_member->row_array();
            if ($member) {
                $response['status'] = true;
                $response['data'] = $member;
            } else {
                $response['status'] = false;
                $response['msg'] = '该手机号的用户还不存在';
            }
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
        return;
    }
    
    /**
     * 查看该会员 消费记录 
     */
    public function viewBuy(){
        $uid = $this->input->get('id');

        //交易明细
        //获取总记录数
        $query_info = $this->db->select('count(*) as nums,IFNULL(sum(amount),0) AS total',false)
                ->where("`oid` = '$uid' and `otype` = '2' and `status` != '1' and `income` = '2'")->get('flowing');
        $info = $query_info->row_array();
        //分页
        //
        $query_following = $this->db->query("select * from flowing where `oid` = '$uid' and `otype` = '2' and `status` != '1' order by ctime desc");
        $following = $query_following->result();
        $this->twig->render('/shop/member/viewBuy.twig',array(
            'info'=>$info,
            'uid'=>$uid,
            'followings'=>$following,
        ));
    }
    
    public function getMemberOrders(){
         $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $uid = $posts['uid'];
        $where = '';
        $where .= "order.sid = '$store_id'  and  order.type = '3' and order.uid = '$uid' "; //条件查询 本店和店铺类型
         $this->load->model('Order_model', 'order_model');
        $datas = $this->order_model
                ->getJsonData('order', $posts['page'], $posts['rows'], 'order.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

}
