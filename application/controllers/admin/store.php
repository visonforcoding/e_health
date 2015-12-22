<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-29 14:58:32 by caowenpeng , caowenpeng1990@126.com
 * 店铺管理
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store extends LM_Controller {

    public function index() {
        $this->twig->render('admin/store/index.twig');
    }

    public function getStore() {
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        if (!empty($name)) {
            $where = "`nick` like '$name%'";
        }
        $this->load->model('Store_model', 'store_model');
        $rows = $this->store_model->getJsonRows('store', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($rows));
    }

    public function addStore() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $areaId = $post['areaId'];
            $areaId = empty($areaId) ? -1 : $areaId;
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($areaId);
            if (!$area) {
                $response['status'] = 0;
                $response['msg'] = '区域类型错误！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $areaType = $area['type'];
                if ($areaType != 4) {
                    $response['status'] = 0;
                    $response['msg'] = '区域类型错误！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            }
            $bossTel = $post['bossTel'];
            $query = $this->db->where(array('bossTel'=>$bossTel))->get('store');
            $store = $query->row_array();
            if($store){
                 $response['status'] = 0;
                 $response['msg'] = '当前电话号码已经存在店铺！';
                 $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $cityId = $this->area_model->findPidByAreaId($areaId);
            $data = array(
                'areaId' => $areaId,
                'cityId' => $cityId,
                'storeName' => $post['storeName'],
                'bossName' => $post['bossName'],
                'pwd' =>  setPlainPassword('123456'),
                'idNum' => $post['idNum'],
                'idPic' => $post['idPic'],
                'cover' => $post['cover'],
                'bossTel' => $bossTel,
                'openTime' => $post['openTime'],
                'coordinate' => $post['coordinate'],
                'status' => $post['status'],
                'storeAddress' => $post['storeAddress'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            //开启事务
            $this->db->trans_start();
            $ck_ins = $this->db->insert('store', $data);
            $last_insert_id = $this->db->insert_id();
            $orderTime =  array('timeArr' => array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),'num'=>'5');
            $serviceNotice = isset($post['serviceNotice'])?$post['serviceNotice']:'';
            $orderNotice = isset($post['orderNotice'])?$post['orderNotice']:'';
            $detail_data = array(
                'sid' => $last_insert_id,
                'serviceNotice' =>$serviceNotice ,
                'orderNotice' =>  $orderNotice,
                'orderTime' => serialize($orderTime),
            );
            $this->db->insert('store_detail', $detail_data);
            $this->db->trans_complete();
            $response['status'] = $ck_ins;
            if ($this->db->trans_status()) {
                $response['msg'] = '添加成功！';
                $response['url'] = '/admin/store/index';
            } else {
                $response['msg'] = '添加失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->twig->render('admin/store/store_add.twig', array(
        ));
    }

    public function editStore() {
        if ($this->input->isPost()) {
            $post = $this->input->posts();
            $id = $post['id'];
            $regionId = $post['regionId'];
            $regionId = empty($regionId) ? -1 : $regionId;
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($regionId);
            if (!$area) {
                $response['status'] = 0;
                $response['msg'] = '区域类型错误！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            } else {
                $areaType = $area['type'];
                if ($areaType != 4) {
                    $response['status'] = 0;
                    $response['msg'] = '区域类型错误！';
                    $this->output->set_content_type('application/json')
                            ->set_output(json_encode($response));
                    return;
                }
            }

            $bossTel = $post['bossTel'];
            $query = $this->db->where(array('bossTel'=>$bossTel))->get('store');
            $store = $query->row_array();
            if($store && $store['id'] != $id){
                 $response['status'] = 0;
                 $response['msg'] = '当前电话号码已经存在店铺！';
                 $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $areaId = $this->area_model->findPidByAreaId($regionId);
            $cityId = $this->area_model->findPidByAreaId($areaId);
            $data = array(
                'regionId' => $regionId,
                'areaId' => $areaId,
                'cityId' => $cityId,
                'storeName' => $post['storeName'],
                'bossName' => $post['bossName'],
                'idNum' => $post['idNum'],
                'idPic' => $post['idPic'],
                'cover' => $post['cover'],
                'bossTel' => $post['bossTel'],
                'openTime' => $post['openTime'],
                'status' => $post['status'],
                'storeAddress' => $post['storeAddress'],
                'coordinate' => $post['coordinate'],
                'ctime' => date('Y-m-d H:i:s'),
            );
            //开启事务
            $this->db->trans_start();
            $ck_ins = $this->db->where("id = '$id'")->update('store', $data);
            $serviceNotice = isset($post['serviceNotice'])?$post['serviceNotice']:'';
            $orderNotice = isset($post['orderNotice'])?$post['orderNotice']:'';
            $detail_data = array(
                'serviceNotice' =>  $serviceNotice,
                'orderNotice' => $orderNotice
            );
            $this->db->where("sid = '$id'")->update('store_detail', $detail_data);
            $this->db->trans_complete();
            $response['status'] = $ck_ins;
            if ($this->db->trans_status()) {
                $response['msg'] = '更新成功！';
            } else {
                $response['msg'] = '更新失败！';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_store = $this->db->select('store.*,store_detail.serviceNotice,store_detail.orderNotice')
                        ->join('store_detail', 'store_detail.sid = store.id')
                        ->where("store.id = '$id' ")->get('store');
        $store = $query_store->row_array();
        if (!$store) {
            show_error('该记录不存在！');
        }
        $this->twig->render('admin/store/store_edit.twig', array(
            'store' => $store
        ));
    }

    //删除店铺
    public function storeDel(){
        if($this->input->isPost()){
            $ids = $this->input->post('data');
            $this->db->where_in('id',$ids);
            $query = $this->db->delete('store');
            if($query){
                $response['status'] =1;
                $response['msg'] = '删除成功';
            }else{
                $response['status'] = 0;
                $response['msg'] = '删除失败';
            }  

            $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
        }
    }

    /**
     * 店铺审核
     */
    public function check() {
        if ($this->input->isPost()) {
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
    }

    public function editRow() {
        if ($this->input->isPost()) {
            $datas = $this->input->post('data');
            $data = $datas[0];
            $id = $data['id'];
            $data['utime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->where("id = '$id'")->update('store', $data);
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

    public function storeDetail() {
        $store_id = $this->input->get('id');
        $this->load->model('Store_model', 'store_model');
        $store = $this->store_model->findStoreById($store_id);
        $query_detail = $this->db->where("sid = '$store_id'")->get('store_detail');
        $detail = $query_detail->row_array();

        //新增订单数 今天的订单数(已支付)
        $online_order_nums = $this->db
                ->where("`sid` = '$store_id' and `type` = '1'  ")
                ->count_all_results('order');

        $offline_order_nums = $this->db
                ->where("`sid` = '$store_id' and `type` = '3'  ")
                ->count_all_results('order');

        $comment_nums = $this->db
                ->where("`sid` = '$store_id' and `type` = '1'  ")
                ->count_all_results('comment');

        $query_today_income = $this->db->select('sum(amount) as today_income')
                ->where("`sid` = '$store_id' and `type` = '1' and (orderStatus = '5' or orderStatus = '6') and date(ctime) = date(now()) ")
                ->get('order');
        $today_income_row = $query_today_income->row_array();
        $today_income = $today_income_row['today_income'];
        //总营业额 订单收入+会员卡售出
        $query_total_income = $this->db->select('sum(amount) as total_income')
                ->where("`sid` = '$store_id' and `type` = '1' and (orderStatus = '5' or orderStatus = '6') ")
                ->get('order');
        $total_income_row = $query_total_income->row_array();
        $total_income = $total_income_row['total_income'];

        $query_card_income = $this->db->select('sum(price) as total_income')
                        ->where("store_id = '$store_id'")->get('member_card');
        $card_income = $query_card_income->row_array();
        $total_card_income = $card_income['total_income'];
        $total_income = $total_income + $total_card_income;

        $this->twig->render('/admin/store/storeDetail.twig', array(
            'store' => $store,
            'detail' => $detail,
            'online_order_nums' => $online_order_nums,
            'offline_order_nums' => $offline_order_nums,
            'comment_nums' => $comment_nums,
            'total_income' => $total_income,
            'today_income' => $today_income
        ));
    }

    public function getChartData() {
        if ($this->input->isPost()) {
            $store_id = $this->input->post('store_id');
            $posts = $this->input->posts();
            $time = $posts['time'];
            $timeType = $posts['timeType'];
            $column = $posts['column'];
            $income = $column == 'order' ? false : true;
            $this->load->model('Chart_model', 'chart_model');
            $where = "and `order`.`sid` = '$store_id' and `order`.`type` = '1'";
            if ($timeType == 'year') {
                $data = $this->chart_model->getOrderDataByYear($time, $where, true, $income);
            }
            if ($timeType == 'month') {
                $data = $this->chart_model->getOrderDataByMonth($time, $where, true, $income);
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }
    }

}
