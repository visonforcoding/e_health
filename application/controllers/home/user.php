<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-12 9:23:20 by caowenpeng , caowenpeng1990@126.com
 * 用户模块
 */
class User extends Home_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 登录页
     */
    public function login() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $phone = $post['phone'];
            $pwd = $post['pwd'];

            //验证电话号码格式  
            $this->load->library('validator');
            if (!$this->validator->isMobile($phone)) {
                $response['status'] = false;
                $response['msg'] = '电话号码格式不正确';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            //验证密码
            if (empty($pwd)) {
                $response['status'] = false;
                $response['msg'] = '密码不能为空';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $pwd = setPlainPassword($pwd);
            $query_user = $this->db->where("`tel` = '$phone' and `pwd` = '$pwd' and `status` = '1'")->get('member');
            $user = $query_user->row_array();
            if ($user) {
                $response['status'] = true;
                $response['msg'] = '登录成功！';
                $userdata['user'] = $user;
                $this->session->set_userdata($userdata);
            } else {
                $response['status'] = false;
                $response['msg'] = '用户不存在或密码错误！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('home/user/login.twig', array(
        ));
    }

    /**
     * 注册页
     */
    public function register() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            //接受表单传过来的密码
            $pwd = $post['pwd'];
            //验证手机号码不能为空
            if (empty($pwd)) {
                $response['status'] = false;
                $response['msg'] = '密码不能为空！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            //验证表单输入的验证码是否正确
            $code = $post['code'];
            if (empty($code)) {
                $response['status'] = false;
                $response['msg'] = '验证码不能为空！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }


            $sms_session = $this->session->userdata('reg_sms');
            if (md5($post['phone']) == $sms_session['phone'] && md5($post['code']) == $sms_session['smscode']) {
                $ck_time = time() - $sms_session['time'] > 1800 ? true : false; //短信验证码三十分钟失效
                if ($ck_time) {
                    $response['status'] = false;
                    $response['msg'] = '验证码已失效，请重新获取！';
                } else {
                    $phone = $post['phone'];
                    $query_user = $this->db->where("`tel` = '$phone' and `status` = '1'")->get('member');
                    $user = $query_user->row_array();
                    if ($user) {
                        $response['status'] = false;
                        $response['msg'] = '该手机号已经注册过！';
                        $this->output->set_content_type('application/json')
                                ->set_output(json_encode($response));
                        return;
                    }
                    $insert_data['tel'] = $phone;
                    $insert_data['pwd'] = setPlainPassword($post['pwd']);
                    $insert_data['ctime'] = date('Y-m-d H:i:s');
                    $ins_member = $this->db->insert('member', $insert_data);
                    if ($ins_member) {
                        $response['status'] = true;
                        $response['msg'] = '注册成功！';
                    } else {
                        $response['status'] = false;
                        $response['msg'] = '服务器错误！';
                    }
                }
            } else {
                $response['status'] = false;
                $response['msg'] = '验证码错误！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('home/user/register.twig', array());
    }

    /**
     * 获取注册短信验证码
     */
    public function getCode() {
        if ($this->input->isPost()) {
            $phone = '';
            $phone = $this->input->post('phone');
            $this->load->library('validator');
            $isPhone = $this->validator->isMobile($phone);
            if ($isPhone) {
                //控制在1分钟之内只允许发一次 避免恶意刷短信
                $query_sms = $this->db->where("`phone` = '$phone' and `status` = 1 "
                                . "and timestampdiff(second,ctime,now()) <=60")
                        ->order_by('ctime', 'desc')
                        ->get('smslog');
                $ck_sms = $query_sms->row_array();
                if (is_array($ck_sms) && !empty($ck_sms)) {
                    $output['status'] = false;
                    $output['msg'] = '请在一分钟之后再获取验证码。';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($output));
                    return;
                }
                $code = createRandomCode(4, 2);
                $userdata['reg_sms'] = array(
                    'smscode' => md5($code),
                    'phone' => md5($phone),
                    'time' => time()
                );
                $this->session->set_userdata($userdata);
                $content = '您的短信验证码为' . $code . ',请在页面中输入以完成注册【苗苗儿推】';
                $response = $this->sendSms($phone, $content); //发送验证码
                if ($response) {
                    $output['status'] = true;
                    $output['msg'] = '短信发送成功!';
                } else {
                    $output['status'] = false;
                    $output['msg'] = '短信发送失败!';
                }
            } else {
                $output['status'] = false;
                $output['msg'] = '手机号码不正确!';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($output));
        }
    }

    /**
     * 重置密码
     */
    public function resetPwd() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $sms_session = $this->session->userdata('reg_sms');
            if (md5($post['phone']) == $sms_session['phone'] && md5($post['code']) == $sms_session['smscode']) {
                $ck_time = time() - $sms_session['time'] > 1800 ? true : false; //短信验证码三十分钟失效
                if ($ck_time) {
                    $response['status'] = false;
                    $response['msg'] = '验证码已失效，请重新获取！';
                } else {
                    $phone = $post['phone'];
                    $query_user = $this->db->where("`tel` = '$phone' and `status` = '1'")->get('member');
                    $user = $query_user->row_array();
                    if (!$user) {
                        $response['status'] = false;
                        $response['msg'] = '该手机号未注册过，请直接注册！';
                        $this->output->set_content_type('application/json')
                                ->set_output(json_encode($response));
                        return;
                    }
                    $update_data['pwd'] = setPlainPassword($post['pwd']);
                    $update_data['utime'] = date('Y-m-d H:i:s');
                    $update_member = $this->db->where('id', $user['id'])->update('member', $update_data);
                    if ($update_member) {
                        $response['status'] = true;
                        $response['msg'] = '重置成功！';
                    } else {
                        $response['status'] = false;
                        $response['msg'] = '服务器错误！';
                    }
                }
            } else {
                $response['status'] = false;
                $response['msg'] = '验证码错误！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('home/user/reset_pwd.twig', array());
    }

    /**
     * 用户中心
     */
    public function userCenter() {
        $user = $this->checkLogin(); //监测登录
        //未读消息数量
        $user_id = $user['id'];
        $query_user = $this->db->where("`id` = '$user_id'")->get('member');
        $user = $query_user->row_array();
        $msg_count = $this->db
                ->from('msg')
                ->where("`uid` = '$user_id' and `isRead` = '0'")
                ->count_all_results();
        //待评价
        $comment_order_count = $this->db
                ->from('order')
                ->where("`uid` = '$user_id' and `orderStatus` = '5' ")
                ->count_all_results();
        $this->twig->render('home/user/user_center.twig', array(
            'msg_count' => $msg_count,
            'comment_order_count' => $comment_order_count,
            'user' => $user
        ));
    }

    /**
     * 用户信息
     */
    public function userInfo() {
        $user = $this->session->userdata('user');
        $where['id'] = $user['id'];
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $nick = $post['nick'];
            $gender = $post['sex'];
            $arr = array("nick" => $nick, "gender" => $gender);
            $this->db->where($where)->update('member', $arr);

            $response['status'] = true;
            $response['msg'] = $gender;
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_userInfo = $this->db
                        ->where($where)->get('member');
        $userInfo = $query_userInfo->row_array();
        $this->twig->render('home/user/user_info.twig', array(
            'userInfo' => $userInfo
        ));
    }

    public function moreSet() {
        $this->twig->render('home/user/more_set.twig', array());
    }

    /**
     * 我的收藏
     */
    public function myCollect() {
        $user = $this->checkLogin();
        $type = $this->input->get('type');
        $user_id = $user['id'];
        $where['collect.uid'] = $user_id;
        if (empty($type)) {
            $where['store.status'] = 1;
            $where['collect.type'] = 1;
            $query_collects = $this->db->select('store.id,store.commentNums,store.score,'
                            . 'store.cover,store.storeName,area.name')
                    ->join('store', 'store.id = collect.oid')
                    ->join('area', 'area.id = store.regionId')
                    ->where($where)
                    ->order_by('collect.ctime', 'desc')
                    ->get('collect');
        } else {
            $where['collect.type'] = 2;
            $where['engineer.status'] = 1;
            $query_collects = $this->db->select('engineer.name,engineer.cover,engineer.commentNums,'
                            . 'engineer.score,engineer.desc,engineer.sex')
                    ->join('engineer', 'engineer.id = collect.oid')
                    ->join('area', 'area.id = engineer.regionId', 'left')
                    ->where($where)
                    ->order_by('collect.ctime', 'desc')
                    ->get('collect');
        }
        $collects = $query_collects->result_array();
        if (empty($type)) {
            //查询所有服务项目
            $this->load->model('Service_model', 'service_model');
            $collects = $this->service_model->formatStores($collects, true);
            $this->twig->render('home/user/my_collect.twig', array(
                'collects' => $collects
            ));
        } else {
            $this->twig->render('home/user/my_collect_jishi.twig', array(
                'collects' => $collects
            ));
        }
    }

    /**
     * 消息列表
     */
    public function message() {
        $user = $this->checkLogin();
        $user_id = $user['id'];
        $query_messages = $this->db->where("`uid` = '$user_id'")
                ->order_by('ctime', 'desc')
                ->get('msg');
        $messages = $query_messages->result_array();
        $this->twig->render('home/user/message.twig', array(
            'messages' => $messages
        ));
    }

    public function readMsg() {
        $user = $this->checkLogin();
        if ($this->input->isPost()) {
            $user_id = $user['id'];
            $id = $this->input->post('mid');
            $update_data['isRead'] = 1;
            $update = $this->db->where("`id` = '$id' and `uid` = '$user_id' and `isRead` = '0'")
                    ->update('msg', $update_data);
            if ($update) {
                $response['status'] = true;
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
            } else {
                $response['status'] = false;
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
            }
        }
    }

    //验证用户
    private function checkPhone($url) {
        $user = $this->checkLogin();
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            //接受表单传过来的密码
            $code = $post['code'];
            //验证手机号码不能为空
            if (empty($code)) {
                $response['status'] = false;
                $response['msg'] = '密码不能为空！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            //验证手机号码是否是当前登陆的号码
            $userinfo = $this->session->userdata('user');
            if ($post['phone'] != $userinfo['tel']) {
                $response['status'] = false;
                $response['msg'] = '手机密码错误！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            $sms_session = $this->session->userdata('reg_sms');
            if (md5($post['phone']) == $sms_session['phone'] && md5($post['code']) == $sms_session['smscode']) {
                //验证码正确，验证是否在有效期内
                $ck_time = time() - $sms_session['time'] > 1800 ? true : false; //短信验证码三十分钟失效
                if ($ck_time) {
                    $response['status'] = false;
                    $response['msg'] = '验证码已失效，请重新获取！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                } else {
                    //验证码验证成功
                    $response['status'] = true;
                    $response['msg'] = '验证码正确';
                    $response['url'] = $url;
                    //验证成功之后跳转修改页面
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            } else {
                //验证不成功
                $response['status'] = false;
                $response['msg'] = '验证码错误';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
        }
        $this->twig->render('/home/user/check_phone.twig', array(
            'phone' => $user['tel'],
        ));
    }

    //修改电话号码
    public function changePhone() {
        //修改密码时要先验证手机，通过flag判断是显示那个表
        $flag = isset($_GET['flag']) ? $_GET['flag'] : true;
        if ($flag) {
            $this->checkPhone('/home/user/changePhone?flag=0');
        } else {
            if ($this->input->isPost()) {

                //数据验证
                $post = $this->input->posts();
                //接受表单传过来的密码
                $pwd = $post['pwd'];
                $code = $post['code'];
                //验证手机号码不能为空
                if (empty($pwd)) {
                    $response['status'] = false;
                    $response['msg'] = '密码不能为空！1223';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }


                if (empty($code)) {
                    $response['status'] = false;
                    $response['msg'] = '验证码不能为空！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }

                //验证表单输入的验证码是否正确
                $sms_session = $this->session->userdata('reg_sms');
                if (md5($post['phone']) == $sms_session['phone'] && md5($post['code']) == $sms_session['smscode']) {
                    $ck_time = time() - $sms_session['time'] > 1800 ? true : false; //短信验证码三十分钟失效
                    if ($ck_time) {
                        $response['status'] = false;
                        $response['msg'] = '验证码已失效，请重新获取！';
                    } else {
                        //验证码正确且没有失效，检测新号码是否注册过
                        $phone = $post['phone'];
                        $query_user = $this->db->where("`tel` = '$phone' and `status` = '1'")->get('member');
                        $user = $query_user->row_array();
                        if ($user) {
                            $response['status'] = false;
                            $response['msg'] = '该手机号已经注册过！';
                            $this->output->set_content_type('application/json')
                                    ->set_output(json_encode($response));
                            return;
                        }
                        //没有被注册过，组织要修改的数据
                        $updata_data['tel'] = $phone;
                        $updata_data['pwd'] = setPlainPassword($post['pwd']);
                        $updata_data['utime'] = date('Y-m-d H:i:s');
                        //获取当前用户的数据,登录成功时保存到session中的数据
                        $userinfo = $this->session->userdata('user');
                        $ins_member = $this->db->where('tel', $userinfo['tel'])->update('member', $updata_data);  //获取之前的手机号码
                        if ($ins_member) {
                            $response['status'] = true;
                            $response['msg'] = '修改成功！';
                            $response['url'] = '/home/user/login.html';
                            //删除session
                            $this->session->unset_userdata('user');
                            $this->session->unset_userdata('reg_sms');
                        } else {
                            $response['status'] = false;
                            $response['msg'] = '服务器错误！';
                        }
                    }
                } else {
                    $response['status'] = false;
                    $response['msg'] = '验证码错误！';
                }
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $this->twig->render('/home/user/change_phone.twig');
        }
    }

    //修改密码
    public function changePassWord() {
        //修改密码时要先验证手机，通过flag判断是显示那个表
        $flag = isset($_GET['flag']) ? $_GET['flag'] : true;
        if ($flag) {
            $this->checkPhone('/home/user/changePassword?flag=0');
        } else {

            if ($this->input->isPost()) {

                //数据验证
                $post = $this->input->posts();
                //接受表单传过来的密码
                $oldpwd = $post['oldPwd'];
                $newpwd = $post['newPwd'];
                $repwd = $post['rePwd'];
                //验证手机号码不能为空
                if (empty($oldpwd)) {
                    $response['status'] = false;
                    $response['msg'] = '旧密码不能为空！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }

                if (empty($newpwd)) {
                    $response['status'] = false;
                    $response['msg'] = '新密码不能为空！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }

                if ($newpwd != $repwd) {
                    $response['status'] = false;
                    $response['msg'] = '两次输入的密码不一致！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }

                $oldpwd = setPlainPassword($oldpwd);
                $userinfo = $this->session->userdata('user');
                $phone = $userinfo['tel'];
                $query_user = $this->db->where("`tel` = '$phone' and `pwd` = '$oldpwd' and `status` = '1'")->get('member');
                $user = $query_user->row_array();
                if ($user) {
                    //可以修改密码
                    $updata_data['pwd'] = setPlainPassword($newpwd);
                    $this->db->where('tel', $userinfo['tel'])->update('member', $updata_data);
                    $response['status'] = true;
                    $response['msg'] = '密码修改成功！';
                    $response['url'] = '/home/user/login.html';
                    //删除session
                    $this->session->unset_userdata('user');
                    $this->session->unset_userdata('reg_sms');
                } else {
                    $response['status'] = false;
                    $response['msg'] = '密码错误！';
                }
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }


            $this->twig->render('/home/user/change_password.twig');
        }
    }

    /**
     * 我的优惠券
     */
    public function myFavorable() {
        $user = $this->checkLogin();
        $user_id = $user['id'];
        $this->load->model('Usercoupon_model','usercoupon_model');
        $query_mycoupons = $this->db->select('user_coupon.*,coupon.amount1,coupon.amount2,member.tel')
                ->join('coupon','coupon.id = user_coupon.cid')
                ->join('member','member.id = user_coupon.uid')
                ->where("user_coupon.flag != '4' and user_coupon.uid = '$user_id'")
                ->order_by('user_coupon.ctime','desc')
                ->get('user_coupon');
        $mycoupons = $query_mycoupons->result_array();
        $this->twig->render('/home/user/my_favorable.twig', array(
            'mycoupons'=>$mycoupons
        ));
    }

    //退出登陆
    public function loginOut() {
        //退出登录 
        header('content-type:text/html;charset=utf-8');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('reg_sms');
        echo "<script >alert('注销成功');window.location.href = '/home/user/login.html';</script>";
    }

    public function setAvatar() {
        $this->twig->render('/home/user/setAvatar.twig', array(
        ));
    }

    public function uploadImg() {

        echo '123';
    }

}
