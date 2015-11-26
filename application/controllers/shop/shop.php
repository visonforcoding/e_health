<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-23 18:46:56 by caowenpeng , caowenpeng1990@126.com
 */
class Shop extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
        $this->load->model('Store_model', 'store_model');
        $this->load->model('Order_model', 'order_model');
    }

    /**
     * 店铺信息
     * @return type
     */
    public function shopInfo() {
        $store = $this->user;
        $store_id = $store['id'];
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $update_data['cover'] = $posts['cover'];
            $update_data['idPic'] = $posts['idPic'];
            $update_data['storeAddress'] = $posts['storeAddress'];
            $update_data['storeName'] = $posts['storeName'];
            $update_data['storeTel'] = $posts['storeTel'];
            $update_data['coordinate'] = $posts['coordinate'];
            $update_data['utime'] = date('Y-m-d H:i:s');
            $startTime = $posts['startTime'];
            $endTime = $posts['endTime'];
            $update_data['openTime'] = $startTime . '~' . $endTime;
            $ck_update = $this->db->where("id = '$store_id'")->update('store', $update_data); //更新店铺信息
            if ($ck_update) {
                $response['status'] = true;
                $response['msg'] = '修改成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '保存失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_store = $this->db->select('store.*,store_detail.serviceNotice,store_detail.orderNotice')
                        ->join('store_detail', 'store_detail.sid = store.id')
                        ->where("store.id = '$store_id' ")->get('store');
        $store = $query_store->row_array();
        $service_time = $store['openTime'];
        if (!empty($service_time)) {
            $service_time_arr = explode('~', $service_time);
            if (is_array($service_time_arr) && !empty($service_time_arr)) {
                $service_start_time = $service_time_arr[0];
                $service_end_time = $service_time_arr[1];
            }
        }
        $this->twig->render('/shop/shop/shopInfo.twig', array(
            'user' => $this->user,
            'store' => $store,
            'service_start_time' => $service_start_time,
            'service_end_time' => $service_end_time,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    /**
     * 预约时间管理
     */
    public function orderTime() {
        $store = $this->user;
        $store_id = $store['id'];
        if ($this->input->isPost()) {
            $nums = $this->input->post('nums');
            $timeArr = $this->input->post('timeArr');
            $orderTime = array(
                'timeArr' => $timeArr,
                'nums' => $nums
            );
            $update_data['orderTime'] = serialize($orderTime);
            $update_data['utime'] = date('Y-m-d H:i:s');
            $ck_update = $this->db->where("`sid` = '$store_id'")->update('store_detail',$update_data);
            if ($ck_update) {
                $response['status'] = true;
                $response['msg'] = '保存成功';
            } else {
                $response['status'] = true;
                $response['msg'] = '保存失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_storeDetail = $this->db->where("sid = '$store_id'")->get('store_detail');
        $storeDetail = $query_storeDetail->row_array();
        if (!$storeDetail) {
            show_error('服务器错误');
        }
        $this->twig->render('/shop/shop/orderTime.twig', array(
            'orderTime' => unserialize($storeDetail['orderTime']),
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

}
