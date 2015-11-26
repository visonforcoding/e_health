<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-9 10:24:53 by caowenpeng , caowenpeng1990@126.com
 * 资金管理
 */
class Balance extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function balanceInfo() {
        $store = $this->user;
        $store_id = $store['id'];
        $query_store_detail = $this->db->where("`sid` = '$store_id'")->get('store_detail');
        $store_detail = $query_store_detail->row_array();

        //交易明细
        $user = $this->user;
        $sid = $user['id'];
        //获取总记录数
        $nums = $this->db->where("`oid` = '$sid' and `otype` = '1' and 'status' != '1'")->count_all_results('flowing');
        //分页
        $this->load->library('Page', array('total' => $nums, 'pageSize' => 6));
        $this->page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => 'GO');
        $this->page->pageType = '<li><span class="pageher">第%page%页/共%pageToatl%页</span></li>%first%%up%%F%%omitFA%%numberF%%omitEA%%E%%down%%ending%';

        //
        $offset = $this->page->pageStart;
        $row = $this->page->pageSize;
        $query_following = $this->db->query("select * from flowing where `oid` = '$sid' and `otype` = '1' and `status` != '1' order by ctime desc limit $offset,$row");
        $following = $query_following->result();
        $pageShow = $this->page->pageShow();

        $this->twig->render('/shop/balance/balanceInfo.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'store_detail' => $store_detail,
            'followings' => $following,
            'pageShow' => $pageShow,
            'total_nums' => $nums
        ));
    }

    public function withdraw() {
        $store = $this->user;
        $store_id = $store['id'];
        $query_store_detail = $this->db->where("`sid` = '$store_id'")->get('store_detail');
        $store_detail = $query_store_detail->row_array();
        if ($this->input->isPost()) {
            $tel = $store['bossTel']; //老板手机号 发提现验证码
            $amount = $this->input->post('amount');
            if (empty($amount) || $amount > $store_detail['balance']) {
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode(['status' => false, 'msg' => '提现金额不正确']));
                return;
            }
            $vcode = $this->input->post('vcode');
            if (empty($vcode)) {
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode(['status' => false, 'msg' => '验证码不可为空']));
                return;
            }
            //验证码核对
            $query_msg_last = $this->db
                    ->where("`phone` = '$tel' and `code` = '$vcode' and `status` = '1'")
                    ->order_by('ctime', 'desc')
                    ->get('smslog');
            $msg_last = $query_msg_last->row_array();
            if ($msg_last) {
                $msg_id = $msg_last['id'];
                $msg_time = $msg_last['ctime'];
                if (time() - strtotime($msg_time) > 30 * 3600) {
                    $response['status'] = false;
                    $response['msg'] = '验证码已过期,请重新获取验证码';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            } else {
                $response['status'] = false;
                $response['msg'] = '验证码不正确';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }

            //验证通过 更改验证码状态 扣除余额 生成提现记录 交易流水生成 生成一条提现消息
            //开启事务
            $this->db->trans_start();
            $update_smslog_data['status'] = 0;
            $update_smslog_data['utime'] = date('Y-m-d H:i:s');
            $this->db->where("`id` = '$msg_id'")->update('smslog', $update_smslog_data);

            //更新 账户余额
            $now_time = date('Y-m-d H:i:s');
            $update_balance_data['balance'] = $store_detail['balance'] - $amount;
            $update_balance_data['utime'] = $now_time;
            $this->db->where("sid = '$store_id'")->update('store_detail', $update_balance_data);

            //生成提现记录
            $withdraw_data['sid'] = $store_id;
            $withdraw_data['type'] = 1;
            $withdraw_data['amount'] = $amount;
            $withdraw_data['ctime'] = $now_time;
            $this->db->insert('withdraw', $withdraw_data);
            $insert_withdraw_id = $this->db->insert_id();

            //生成交易流水
            $flowing_data['oid'] = $store_id;
            $flowing_data['otype'] = 1;
            $flowing_data['type'] = 2; //2为提现
            $flowing_data['relation_id'] = $insert_withdraw_id;
            $flowing_data['income'] = 2;
            $flowing_data['amount'] = $amount;
            $flowing_data['remark'] = '提现支出' . $amount . '元';
            $flowing_data['ctime'] = $now_time;
            $this->db->insert('flowing', $flowing_data);


            //生成提示消息
            $store_msg_data['title'] = '提现申请';
            $store_msg_data['sid'] = $store_id;
            $store_msg_data['content'] = '您于' . $now_time . '申请的' . $amount . '元提现已成功提交，请耐心等待平台审核。'; //2为提现
            $store_msg_data['ctime'] = $now_time;
            $this->db->insert('store_msg', $store_msg_data);
            $this->db->trans_complete();
            
            $this->load->helper('url');
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '确认成功!';
            } else {
                $response['status'] = false;
                $response['msg'] = '服务器错误!';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('/shop/balance/withdraw.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'store_detail' => $store_detail
        ));
    }

    public function getVCode() {
        $store = $this->user;
        $tel = $store['bossTel']; //老板手机号 发提现验证码
        $code = createRandomCode(4, 2);
        $content = '您将要申请一笔提现，您的提现验证码为:' . $code . '。如果这不是您本人操作，请注意您的账号安全。';
        $flag = $this->sendSms($tel, $content, $code);
        if ($flag) {
            $response['status'] = true;
            $response['msg'] = '发送成功';
        } else {
            $response['status'] = false;
            $response['msg'] = '发送失败';
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
    }

}
