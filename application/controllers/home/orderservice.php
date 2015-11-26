<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-11 10:24:48 by caowenpeng , caowenpeng1990@126.com
 * 预约上门服务
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orderservice extends Home_Controller {

    protected $pos_address;

    public function __construct() {
        parent::__construct();
        $this->pos_address = $this->input->cookie('pos_address', true);
    }

    /**
     * 预约上门服务选项目
     */
    public function service() {
        $this->session->set_userdata('isVisit', '1'); //上门服务
        $type = $this->input->get('type');
        if (!empty($type)) {
            switch (intval($type)) {
                case 1:
                    $order = 'price';
                    $sort = 'asc';
                    break;
                case 2:
                    $order = 'price';
                    $sort = 'desc';
                    break;
                case 3:
                    $order = 'stime';
                    $sort = 'asc';
                    break;
                case 4:
                    $order = 'stime';
                    $sort = 'desc';
                    break;
                default:
                    $order = 'price';
                    $sort = 'asc';
                    break;
            }
        } else {
            $order = 'price';
            $sort = 'asc';
        }
        $query_services = $this->db->order_by("$order", "$sort")->get('service');
        $services = $query_services->result_array();
        $this->twig->render('home/orderservice/service.twig', array(
            'services' => $services,
            'pos_address' => $this->pos_address
        ));
    }

    /**
     * 项目详情
     */
    public function serviceDetail() {
        $service_id = $this->input->get('id');
        if (!empty($service_id)) {
            $where['id'] = $service_id;
            $where['status'] = 1;
            $query_store = $this->db
                            ->where($where)->get('service');
            $service = $query_store->row_array();
            if ($service) {
                
            } else {
                show_404();
            }
        } else {
            show_404();
        }
        $this->twig->render('home/orderservice/service_detail.twig', array(
            'service' => $service
        ));
    }

    /**
     * 选店铺
     */
    public function choiceStore() {
        $service_id = $this->input->get('service_id');
        $isvisit_stores_ids = array();
        $service_where['isVisit'] = 1;
        if (!empty($service_id)) {
            $service_where['serviceId'] = $service_id;
        }
        $query_isvisit_stores = $this->db
                ->distinct('storeId')
                ->where($service_where)
                ->get('store_service');
        $isvisit_stores = $query_isvisit_stores->result_array();
        foreach ($isvisit_stores as $value) {
            $isvisit_stores_ids[] = $value['storeId'];
        }

        $location = '深圳';
        $query_area = $this->db->select('id')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        $location_id = $location_area['id']; //定位地点在数据库中的id
        $get = $this->input->gets();

        if (isset($get['area'])) {
            $where['store.areaId'] = $get['area'];
        } else {
            $where['store.cityId'] = $location_id;
        }
        $where['store.status'] = 1;
        $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.commentNums')
                ->join('area', 'area.id = store.regionId', 'left')
                ->where($where)
                ->where_in('store.id', $isvisit_stores_ids)
                ->get('store');
        $stores = $query_stores->result_array();


        //查询所有服务项目
        $this->load->model('Service_model', 'service_model');
        //格式化 店铺 信息 组织
        $stores = $this->service_model->formatStores($stores);
        $this->twig->render('home/orderservice/choice_store.twig', array(
            'stores' => $stores,
            'service_id' => $service_id,
            'pos_address' => $this->pos_address
        ));
    }

    /**
     * 选技师
     */
    public function choiceEngineer() {
        $service_id = $this->input->get('service_id');
        $isvisit_engineer_ids = array();
        $service_where['isVisit'] = 1;
        if (!empty($service_id)) {
            //提供该服务的技师
            $service_where['serviceId'] = $service_id;
        }
        $query_isvisit_engineer = $this->db
                ->where($service_where)
                ->get('engineer_service');
        $isvisit_engineers = $query_isvisit_engineer->result_array();
        foreach ($isvisit_engineers as $value) {
            $isvisit_engineer_ids[] = $value['engineerId'];
        }
        $location = '深圳';
        $query_area = $this->db->select('id')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        $location_id = $location_area['id']; //定位地点在数据库中的id
        $get = $this->input->gets();

        if (isset($get['area'])) {
            $where['engineer.areaId'] = $get['area'];
        } else {
            $where['engineer.cityId'] = $location_id;
        }
        $where['engineer.status'] = 1;
        if (!empty($service_id) && !empty($isvisit_engineer_ids)) {
            $query_engineer = $this->db->select('area.name,engineer.id,engineer.name,engineer.cover,'
                            . 'engineer.commentNums,engineer.desc')
                    ->join('area', 'area.id = engineer.regionId', 'left')
                    ->where($where)
                    ->where_in('engineer.id', $isvisit_engineer_ids)
                    ->get('engineer');
        } else {
            $query_engineer = $this->db->select('area.name,engineer.id,engineer.name,engineer.cover,'
                            . 'engineer.commentNums,engineer.desc')
                    ->join('area', 'area.id = engineer.regionId', 'left')
                    ->where($where)
                    ->get('engineer');
        }
        $engineers = $query_engineer->result_array();
        $this->twig->render('home/orderservice/choice_engineer.twig', array(
            'engineers' => $engineers,
            'sid' => $service_id,
            'pos_address' => $this->pos_address
        ));
    }

    /**
     * 技师详情
     */
    public function engineerDetail() {
        $engineer_id = $this->input->get('eid');
        $service_id = $this->input->get('sid');
        if (empty($engineer_id)) {
            show_404();
        } else {
            $this->session->set_userdata(array(
                'engineer_id' => $engineer_id,
            ));
        }
        $query_engineer = $this->db->where("`id` = '$engineer_id' and `status` = '1'")
                ->get('engineer');
        $engineer = $query_engineer->row_array();
        if (!empty($service_id)) {
            $query_service = $this->db->where("`id` = '$service_id'")->get('service');
            $service = $query_service->row_array();
            $this->twig->render('home/orderservice/engineer_detail_2.twig', array(
                'engineer' => $engineer,
                'service' => $service
            ));
        } else {
            $query_services = $this->db->select('service.name,service.id,service.price,service.stime')
                    ->join('service', 'service.id = engineer_service.serviceId')
                    ->where("`engineer_service.engineerId` = '$engineer_id'")
                    ->get('engineer_service');
            $services = $query_services->result_array();
            //查询所有服务项目
            $this->load->model('Comment_model', 'comment_model');
            //格式化 店铺 信息 组织
            $comment_info = $this->comment_model->fetchCommentInfo(2, $engineer_id);
            $comments = $this->comment_model->fetchComments('2', $engineer_id, 4);
            $this->twig->render('home/orderservice/engineer_detail_1.twig', array(
                'engineer' => $engineer,
                'services' => $services,
                'comments' => $comments,
                'comment_info' => $comment_info
            ));
        }
    }

    /**
     * 预定订单页
     */
    public function store() {
        $location = '深圳';
        $query_area = $this->db->select('id')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        $location_id = $location_area['id']; //定位地点在数据库中的id
        $get = $this->input->gets();

        if (isset($get['area'])) {
            $where['store.areaId'] = $get['area'];
        } else {
            $where['store.cityId'] = $location_id;
        }
        $where['store.status'] = 1;
        $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.serviceIds')
                        ->join('area', 'area.id = store.regionId', 'left')
                        ->where($where)->get('store');
        $stores = $query_stores->result_array();
        //查询所有服务项目
        $this->load->model('Service_model', 'service_model');
        $services_arr = $this->service_model->getServiceNameArr();
        $stores = $this->service_model->formatStoreArr($stores, $services_arr);
        $this->twig->render('home/store/store.twig', array(
            'stores' => $stores,
            'areas' => $sub_areas
        ));
    }

    /**
     * 技师预约页
     */
    public function engineerOrder() {
        $engineer_id = $this->input->get('eid');
        $service_id = $this->input->get('sid');
        $query_engineer = $this->db->where('id', $engineer_id)->get('engineer');
        $engineer = $query_engineer->row_array();
        $query_service = $this->db->where('id', $service_id)->get('service');
        $service = $query_service->row_array();
        $this->twig->render('home/orderservice/engineer_order.twig', array(
            'service' => $service,
            'engineer' => $engineer
        ));
    }

    /**
     * 评论页
     */
    public function comment() {
        $this->twig->render('home/store/comment.twig', array(
        ));
    }

    /**
     * 预约上门 店铺 预约页
     */
    public function orderHome() {
        $store_id = $this->input->get('id');
        $service_id = $this->input->get('sid');
        if (!empty($store_id)) {
            $where['store.id'] = $store_id;
            $where['store.status'] = 1;
            $query_store = $this->db->select('store.id,store.storeName,store.cover,store_detail.serviceArea,'
                                    . 'store_detail.serviceNotice,store_detail.orderNotice')
                            ->join('store_detail', 'store.id = store_detail.sid')
                            ->where($where)->get('store');
            $store = $query_store->row_array();
            if ($store) {
                //查询所有服务项目 组装门店服务字符串
                $this->load->model('Service_model', 'service_model');
                $services = $this->service_model->fetchServicesByStoreid($store['id'], true);
                $service_area_ids = unserialize($store['serviceArea']);
                foreach ($service_area_ids as $value) {
                    foreach ($value as $v) {
                        $service_area_arr[] = $v[0];
                    }
                }
                $query_services_area = $this->db->select('name')->where_in('id', $service_area_arr)->get('area');
                $services_areas = $query_services_area->result_array();
                $area_arr = array();
                foreach ($services_areas as $value) {
                    $area_arr[] = $value['name'];
                }
                $area_str = implode('、', $area_arr);
                //登录信息
                $login_user = $this->session->userdata('user');
                if ($login_user) {
                    //登录 ->是否添加观看记录  
                    $this->load->model('Member_model', 'member_model');
                    $userRelation = $this->member_model->getMemberStoreRelation($login_user, $store_id, '1');
                    $collect = $userRelation['collect'];
                    $is_login = $userRelation['is_login'];
                } else {
                    $is_login = false;
                    $collect = false;
                }
            } else {
                show_404();
            }
        } else {
            show_404();
        }
        $this->twig->render('home/orderservice/order_home_store.twig', array(
            'store' => $store,
            'services' => $services,
            'service_area' => $area_str,
            'service_id' => $service_id,
            'is_login' => $is_login,
            'collect' => $collect
        ));
    }

    /**
     * 预约上门 提交订单页
     */
    public function submitOrder() {
        $user = $this->checkLogin();
        $user_id = $user['id'];
        $store_id = $this->input->get('store_id');
        $engineer_id = $this->input->get('eid');
        $sid = $this->input->get('sid');  //服务id
        if (!empty($store_id)) {
            $good_name = 'store_id';
            $query_good = $this->db->select('storeName as name,id')->where('id', $store_id)->get('store');
            $query_good_detail = $this->db->select('orderTime')->where('sid', $store_id)->get('store_detail');
        }
        if (!empty($engineer_id)) {
            $good_name = 'engineer_id';
            $query_good = $this->db->where('id', $engineer_id)->get('engineer');
        }
        $good = $query_good->row_array();
        if ($query_good_detail) {
            $good_detail = $query_good_detail->row_array();
            $orderTime = unserialize($good_detail['orderTime']);
        }
        
        $query_service = $this->db->where('id', $sid)->get('service');
        $service = $query_service->row_array();
        

        $token = md5(time() . createRandomCode(4));  //表单令牌 防止重复提交
        $this->session->set_userdata(array('token' => $token));
        $this->twig->render('home/orderservice/submit_order.twig', array(
            'service' => $service,
            'good' => $good,
            'user' => $user,
            'token' => $token,
            'good_name' => $good_name,
            'orderTime' => $orderTime,
        ));
    }

    
    /**
     * 优惠券
     */
    public function useFavorable() {
        $this->twig->render('home/orderservice/use_favorable.twig', array(
        ));
    }

}
