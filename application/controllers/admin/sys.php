<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-30 18:59:52 by caowenpeng , caowenpeng1990@126.com
 * 系统权限管理
 */
class Sys extends LM_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function admin() {
        $this->twig->render('admin/sys/admin.twig', array(
        ));
    }

    public function getAdmin() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = 'manager.' . $sort;
        $sort = empty($sort) ? 'regtime' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        if (!empty($name)) {
            $where = "`nick` like '$name%'";
        }
        $this->load->model('Manager_model', 'manager_model');
        $rows = $this->manager_model->getJsonRows('manager', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    /**
     *  管理员编辑
     * @return type
     */
    public function editAdmin() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'phoneNo' => $post['phoneNo'],
                'utime' => date('Y-m-d H:i:s'),
                'mail' => $post['mail'],
                'role' => $post['role'],
                'status' => $post['status'],
            );
            $id = $this->input->post('id');
            $ck = $this->db->where('id', $id)
                    ->update('manager', $data);
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '修改成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '修改失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $admin_id = $this->input->get('id');
        $query_admin = $this->db->where(['id' => $admin_id])->get('manager');
        $admin = $query_admin->row_array();
        $query_groups = $this->db->get('admin_group');
        $groups = $query_groups->result_array();
        $this->twig->render('admin/sys/admin_edit.twig', array(
            'cur_admin' => $admin,
            'groups' => $groups
        ));
    }

    /**
     * 添加管理员
     */
    public function addAdmin() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'phoneNo' => $post['phoneNo'],
                'ctime' => date('Y-m-d H:i:s'),
                'mail' => $post['mail'],
                'role' => $post['role'],
                'status' => $post['status'],
                'password' =>md5($post['password']),
            );
            $ck = $this->db->insert('manager', $data);
            $response['status'] = $ck;
            if ($ck) {
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
        $query_groups = $this->db->get('admin_group');
        $groups = $query_groups->result_array();
        $this->twig->render('admin/sys/admin_add.twig', array(
            'groups' => $groups
        ));
    }
    
    
    /**
     * 删除管理员
     */
    public function  delAdmin(){
         if ($this->input->isPost()) {
            $id = $this->input->post('data');
            $ck = $this->db->delete('manager', array('id' => $id));
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '删除成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '删除失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

    /**
     * 群组管理
     */
    public function adminGroup() {
        $this->twig->render('admin/sys/group.twig', array(
        ));
    }

    public function getGroup() {
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
        $this->load->model('Admingroup_model', 'admingroup_model');
        $rows = $this->admingroup_model->getJsonRows('admin_group', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    /**
     * 添加群组
     */
    public function addGroup() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'remark' => $post['remark'],
                'ctime' => date('Y-m-d H:i:s'),
                'acl' => serialize($post['node_id']),
                'status' => $post['status'],
            );
            $ck = $this->db->insert('admin_group', $data);
            $response['status'] = $ck;
            if ($ck) {
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
        $query_nodes = $this->db->get('admin_node');
        $nodes = $query_nodes->result_array();
        $nodes_format = get_menu(tree($nodes));
        $this->twig->render('admin/sys/group_add.twig', array(
            'nodes' => $nodes_format
        ));
    }

    /**
     * 编辑群组
     */
    public function editGroup() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $data = array(
                'name' => $post['name'],
                'remark' => $post['remark'],
                'utime' => date('Y-m-d H:i:s'),
                'acl' => serialize($post['node_id']),
                'status' => $post['status'],
            );
            $group_id = $this->input->post('id');
            $ck = $this->db->where('id', $group_id)
                    ->update('admin_group', $data);
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '修改成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '修改失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $group_id = $this->input->get('id');
        $query_group = $this->db->where(array('id' => $group_id))->get('admin_group');
        $group = $query_group->row_array();
        $acl = unserialize($group['acl']);
        //查询出节点树
        $query_nodes = $this->db->get('admin_node');
        $nodes = $query_nodes->result_array();
        foreach ($nodes as $key => $value) {
            foreach ($acl as $v) {
                if ($v == $value['id']) {
                    $nodes[$key]['checked'] = true;
                }
            }
        }
        $nodes_format = get_menu(tree($nodes));
        $this->twig->render('admin/sys/group_edit.twig', array(
            'cur_group' => $group,
            'nodes' => $nodes_format
        ));
    }

    /**
     * 删除群组
     */
    public function delGroup() {
        if ($this->input->isPost()) {
            $id = $this->input->post('data');
            $ck = $this->db->delete('admin_group', array('id' => $id));
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '删除成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '删除失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

    public function node() {
        $this->twig->render('admin/sys/node.twig', array(
        ));
    }

    public function getNode() {
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
        $this->load->model('Adminnode_model', 'adminnode_model');
        $rows = $this->adminnode_model->getJsonRows('admin_node', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    /**
     * 删除节点
     */
    public function delNode() {
        if ($this->input->isPost()) {
            $node_id = $this->input->post('data');
            $ck = $this->db->delete('admin_node', array('id' => $node_id));
            $response['status'] = $ck;
            if ($ck) {
                $response['status'] = true;
                $response['msg'] = '删除成功！';
            } else {
                $response['status'] = false;
                $response['msg'] = '删除失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

    /**
     * 添加节点
     */
    function addNode() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $node = $post['node'];
            $data = array(
                'node' => $node,
                'pid' => $post['pid'],
                'name' => $post['name'],
                'remark' => $post['remark'],
                'ctime' => date('Y-m-d H:i:s'),
                'status' => $post['status']
            );
            $query_ck_node = $this->db->where(array('node' => $node))->get('admin_node');
            $ck_node = $query_ck_node->row_array();
            //检测节点是否已被占用
            if (is_array($ck_node) && count($ck_node) > 0) {
                $response['status'] = 0;
                $response['msg'] = '该节点已经存在！';
                $this->ajaxReturn($response);
            }
            $ck_ins = $this->db->insert('admin_node', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '添加成功！';
                fcache('node_tree.json', NULL);
            } else {
                $response['status'] = false;
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('/admin/sys/node_add.twig', array(
        ));
    }

    /**
     * 获取节点树结构
     */
    public function get_node_tree() {
        $filename = APPPATH . '/cache/node_tree.json';
        $data = false;
        if (file_exists($filename)) {
            $data = file_get_contents($filename);
        }
        if (!$data) {
            $query_nodes = $this->db->select('id,pid,node,name')
                    ->where("status = 1")
                    ->get('admin_node');
            $nodes = $query_nodes->result_array();
            $tree = array();
            foreach ($nodes as $key => $value) {
                $tree[0]['id'] = 0;
                $tree[0]['text'] = 'root';
                if ($value['pid'] == 0) {
                    $tree[$key + 1]['id'] = $value['id'];
                    $tree[$key + 1]['text'] = $value['node'];
                    foreach ($nodes as $k => $v) {
                        if ($v['pid'] == $value['id']) {
                            $tree[$key + 1]['children'][] = ['id' => $v['id'], 'text' => $v['node']];
                            unset($nodes[$k]);
                        }
                    }
                }
            }
            $json_data = json_encode(array_values($tree));
            file_put_contents($filename, $json_data);
        } else {
            $json_data = $data;
        }
        $this->output->set_content_type('application/json')
                ->set_output($json_data);
    }

}
