<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-29 10:33:19 by caowenpeng , caowenpeng1990@126.com
 */
class LM_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->check_acl(); //检测权限
    }

    /**
     * 输出json 数据
     * @param array $response
     */
    protected function ajaxReturn(array $response) {
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
        exit();
    }

    public function check_login() {
        //echo "admin";
        session_start();
        if (!empty($_SESSION['admin_username']) && !empty($_SESSION['admin_userid']) && !empty($_SESSION['admin_user_shell'])) {
            //echo $_SESSION['userid'];
            $id = intval($_SESSION['admin_userid'], 10);
            $user_shell = $_SESSION['admin_user_shell'];
            $name = $_SESSION['admin_username'];
        } else {
            if ($this->input->is_ajax_request()) {
                $data['status'] = false;
                $data['msg'] = '请先登录!';
                ajaxReturn($data);
                exit();
            } else {
                $nowUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                echo "<script >location.href='/admin/login?lasturl=" . urlencode($nowUrl) . "';</script>";
                exit();
            }
        }
    }

    /**
     * 权限检测
     * @author allen caowenpeng1990@126.com
     */
    protected function check_acl() {
        $controller = $this->uri->rsegment(1) ? $this->uri->rsegment(1) : getgpc("mod");
        $action = $this->uri->rsegment(2) ? $this->uri->rsegment(2) : getgpc("act");
        $node_str = $controller . '/' . $action;
        $query_node = $this->db->get_where('admin_node', array('node' => $node_str, 'status' => 1));
        $node = $query_node->row_array(); //查出被权限的节点
        if (is_array($node) && count($node) > 0) {
            $admin_id = $_SESSION['admin_userid'];
            $query_acl = $this->db->select('admin_group.acl')
                    ->from('admin_group')
                    ->join('manager', 'manager.role = admin_group.id')
                    ->where(array('manager.id' => $admin_id))
                    ->get();
            $acl = unserialize($query_acl->row_array()['acl']);
            if (!in_array($node['id'], $acl)) {
                if ($this->input->is_ajax_request()) {
                    $data['status'] = false;
                    $data['msg'] = '您没有权限进行此操作!';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($data));
                    exit();
                } else {
                    header("Content-type:text/html;charset=utf-8");
                    alert("您没有权限进行此操作！");
                    exit();
                }
            }
        }
    }

}
