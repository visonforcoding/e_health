<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //showoo();
    }

    public function index() {
        //登录  
        if ($this->input->post()) {
            $username = htmlspecialchars($_POST['name']);
            $password = MD5($_POST['password']);

            $this->load->model('admin/login_model', 'loginModel');
            $query = $this->db->where(array('name'=>$username,'password'=>$password))->get('manager');
            if ($result = $query->row_array()) {
                //登录成功  
                session_start();
                $_SESSION['admin_username'] = $username;
                $_SESSION['admin_userid'] = $result['id'];
                $_SESSION['admin_user_shell'] = MD5($username . $password . "zmc");
                $this->session->set_userdata(array('admin'=>$result));
                if (!empty($_GET['lasturl'])) {
                    $lastUrl = urldecode($_GET['lasturl']);
                } else {
                    $lastUrl = "/admin/baby";
                }
                echo "<script >location.href='" . $lastUrl . "';</script>";
            } else {
                die("<script type='text/javascript'> alert('用户名或者密码错误，请重试！');history.go(-1);</script>");
            }
        }
        $this->load->view('admin/login');
    }

    public function logout() {
        header('content-type:html/text,charset=utf-8');
        session_start();
        //退出登录  
        unset($_SESSION['admin_username']);
        unset($_SESSION['admin_userid']);
        unset($_SESSION['admin_user_shell']);
        echo "<script >alert('注销登录成功');history.go(-1);</script>";
    }

}
