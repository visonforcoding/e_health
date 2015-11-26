<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-5 16:14:41 by caowenpeng , caowenpeng1990@126.com
 */
class Shop_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->twig->addGlobal('App', array(
            'user' => getSession('shop_user'),
        ));
    }

    /**
     * 发送短信
     * @param type $phone  手机号
     * @param type $content 发送内容
     * @param type $sendTime 定时发送时间
     * @return boolean  结果 
     */
    protected function sendSms($phone, $content, $code = '', $sendTime = '') {
        date_default_timezone_set("Asia/Shanghai");
        $post_data = array();
        $post_data['userid'] = 11053;
        $post_data['account'] = 'xifeo';
        $post_data['password'] = 'SHAOye1688';
        $post_data['content'] = $content;
        $post_data['mobile'] = $phone;
        $post_data['action'] = 'send';
        $post_data['sendtime'] = $sendTime; //不定时发送，值为空，定时发送，输入格式YYYYMMDDHHmmss的日期值
        $url = 'http://www.qf106.com/sms.aspx';
        $this->load->library('http'); //引入http类
        $response = $this->http->request($url, $post_data, 'post');
        $response = (array) simplexml_load_string($response);
        $status = 0;
        $flag = false;
        if (!empty($response) && $response['returnstatus'] == 'Success') {
            $status = 1;
            $flag = true;
        } else {
            lmdebug($response['message']);
            return $flag;
        }
        $insert_data = array(
            'phone' => $phone,
            'ctime' => date('Y-m-d H:i:s'),
            'content' => $post_data['content'],
            'status' => $status
        );
        if (!empty($code)) {
            $insert_data['code'] = $code;
        }
        $this->db->insert('smslog', $insert_data); //插入短信记录
        return $flag;
    }

    /**
     * 检测登陆 若没登陆则跳转到登录页 若登录则返回用户信息
     * @return array user 登录用户数组
     */
    protected function checkLogin($ajax = false, $url = '') {
//        $user = $this->session->userdata('shop_user');
        if (!isset($_SESSION)) {
            session_start();
        }
        $user = $_SESSION['shop_user'];
        if (!$user) {
            $nowUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            if (empty($url)) {
                $url = $nowUrl;
            }
            if ($ajax) {
                $response['status'] = false;
                $response['msg'] = '请先登录';
                $response['url'] = '/shop/index/login?lasturl=' . urlencode($url);
                ajaxReturn($response);
            } else {
                $this->load->helper('url');
                redirect('http://' . $_SERVER['HTTP_HOST'] . '/shop/index/login?lasturl=' . urlencode($nowUrl));
            }
        } else {
            return $user;
        }
    }

    /**
     * 返回
     * @return array 定位信息 location 城市 coordinate 坐标 pos_address 定位地址
     */
    protected function getLocation() {
        $pos_city = $this->input->cookie('pos_city', true); //获取cookie中的定位城市
        $pos_location = $this->input->cookie('pos_location', true); //获取cookie中的定位城市
        $pos_address = $this->input->cookie('pos_address', true);  //定位地址
        if (empty($pos_address)) {
            $pos_address = '未定位成功!';
        }
        $coordinate = '';
        if ($pos_location) {
            $coordinate = json_decode($pos_location)->lng . ',' . json_decode($pos_location)->lat;
        }
        $location = '深圳';
        if ($pos_city) {
            $location = mb_substr(unescape($pos_city), 0, 2, 'utf-8');
        }
        return array(
            'location' => $location,
            'coordinate' => $coordinate,
            'pos_address' => $pos_address
        );
    }

    public function getRealtimeInfo() {
        $user = $this->checkLogin();
        $store_id = $user['id'];
        $unReadMsg = $this->db->where("isRead = '0' and `sid` = '$store_id'")->count_all_results('store_msg');
        $unDoOrder = $this->db->where("(`orderStatus` = '3' or `orderStatus` = '40') and `sid` = '$store_id' and `type` = '1'")->count_all_results('order');
        return array(
            'unReadMsgNums' => $unReadMsg,
            'unDoOrderNums' => $unDoOrder
        );
    }
    
    protected function Del($tablename,$id) {
        if ($this->input->isPost()) {
            $ck = $this->db->delete($tablename, array('id' => $id));
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

}
