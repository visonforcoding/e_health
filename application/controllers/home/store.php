<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-5 14:21:45 by caowenpeng , caowenpeng1990@126.com
 * 店铺
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Service_model', 'service_model'); //引入服务模型
    }

    /**
     * 店铺列表页
     */
    public function index() {
        $this->session->set_userdata('isVisit', '0'); //预约到店

        //定位数据
        $position = $this->getLocation();
        $location = $position['location'];
        $query_area = $this->db->select('id')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        $location_id = $location_area['id']; //定位地点在数据库中的id
        $query_subarea = $this->db->select('id,name')
                        ->where("`pid` = '$location_id' and `status` = '1'")->get('area'); //查区级位置
        $sub_areas = $query_subarea->result_array();
        $get = $this->input->gets();
        $serviceArr = $this->service_model->getServiceArrPlus();  //查询所有服务项目

        $search_area = '';
        if (!empty($get['area'])) {
            //该区域的门店
            $where['store.areaId'] = $get['area'];
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($get['area']);
            $search_area = $area['name'];
        } else {
            $where['store.cityId'] = $location_id;
        }

        $service_id = $this->input->get('service');
        if (!empty($service_id)) {
            $service_where['serviceId'] = $service_id;
            //筛选出所有 提供该服务的门店
            $query_service_stores = $this->db
                    ->distinct('storeId')
                    ->where($service_where)
                    ->get('store_service');
            $service_stores = $query_service_stores->result_array();
            foreach ($service_stores as $value) {
                $service_stores_ids[] = $value['storeId'];
            }
        }
        $type = $this->input->get("sortType");
 
        if($type == "comment"){  //人气最高
            $order = 'store.commentNums';
            $sort = 'desc';
        }elseif($type == "score" ){  //评价最高
            $order = 'store.score';
            $sort = 'desc';
        }else{
            $order = 'store.id';
            $sort = 'desc';
        }

        $search_sortType = array(
            'dist' => "离我最近",
            'comment' => "人气最高",
            'score' => "评价最好",
        );
        
        $where['store.status'] = 1;
        if (!empty($service_id) && !empty($service_stores_ids)) {
            $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.commentNums,'
                            . 'store.coordinate')
                    ->join('area', 'area.id = store.regionId', 'left')
                    ->where($where)
                    ->where_in('store.id', $service_stores_ids)
                    ->order_by($order,$sort)
                    ->get('store');
        } else {
            $query_stores = $this->db->select('area.name,store.id,store.storeName,store.cover,store.commentNums,'
                            . 'store.coordinate')
                    ->join('area', 'area.id = store.regionId', 'left')
                    ->where($where)
                    ->order_by($order,$sort)
                    ->get('store');
        }
        $stores = $query_stores->result_array();
        //格式化门店数据
        $stores = $this->service_model->formatStores($stores, true, $position['coordinate']);
       
        if($type == "dist"){ //按距离最近
            if($stores){
                foreach ($stores as $k => $v) {
                   $distance[] = $v['distance'];
                }  
                 
                array_multisort($distance, SORT_ASC, $stores); 
            }
        }


        $this->twig->render('home/store/store.twig', array(
            'stores' => $stores,
            'areas' => $sub_areas,
            'services' => $serviceArr,
            'search_area' => $search_area,
            'sortType' => isset($search_sortType[$type])?$search_sortType[$type]:"",
            'pos_address' => $position['pos_address']
        ));
    }


    /**
     * 优惠商家
     */
    public function promoStore() {
        $position = $this->getLocation();
        $location = $position['location'];
        $query_area = $this->db->select('id')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        $location_id = $location_area['id']; //定位地点在数据库中的id
        $query_subarea = $this->db->select('id,name')
                        ->where("`pid` = '$location_id' and `status` = '1'")->get('area'); //查区级位置
        $sub_areas = $query_subarea->result_array();
        $get = $this->input->gets();


        $search_area = '';
        if (!empty($get['area'])) {
            //该区域的门店
            $where['store.areaId'] = $get['area'];
            $this->load->model('Area_model', 'area_model');
            $area = $this->area_model->findAreaById($get['area']);
            $search_area = $area['name'];
        } else {
            $where['store.cityId'] = $location_id;
        }

        $where['store.status'] = 1;

         $type = $this->input->get("sortType");
 
        if($type == "comment"){  //人气最高
            $order = 'store.commentNums';
            $sort = 'desc';
        }elseif($type == "score" ){  //评价最高
            $order = 'store.score';
            $sort = 'desc';
        }else{
            $order = 'store.id';
            $sort = 'desc';
        }

         $search_sortType = array(
            'dist' => "离我最近",
            'comment' => "人气最高",
            'score' => "评价最好",
        );

        //组织 有 优惠活动的 店铺列表
        $time =  date("Y-m-d H:i:s");
        $query_promo_stores = $this->db->select('store_service.name,store_service.cover,store_service.id as service_id,,store_promo.price,store_promo.id,store_promo.isVisit'
                        . ',store_promo.mprice,store_promo.sid as store_id,store_promo.title')
                ->join('store_service', 'store_service.id = store_promo.serviceId', 'left')
                ->where("store_promo.`status` = '1' and store_promo.`begintime` < '$time' and store_promo.`endtime` > '$time' ")
                ->get('store_promo');
        $promo_stores = $query_promo_stores->result_array();
        $store_ids = array();
        if ($promo_stores) {
            foreach ($promo_stores as $key => $value) {
                $store_ids[] = $value['store_id'];
            }
        }

        if( $store_ids){
            $store_ids = array_values(array_flip(array_flip($store_ids)));
            $query_stores = $this->db->select('id,storeName,commentNums,score')->where($where)
                            ->where_in('id', $store_ids)->order_by($order,$sort)->get('store');
            $stores = $query_stores->result_array();
              //格式化门店数据
            $stores = $this->service_model->formatStores($stores, true, $position['coordinate']);

            if($type == "dist"){ //按距离最近
                if($stores){
                    foreach ($stores as $k => $v) {
                       $distance[] = $v['distance'];
                    }  
                    array_multisort($distance, SORT_ASC, $stores); //通过距离排序
                }
            }


            $new_promo_stores = array();
            //查询订单
            $query_orders = $this->db->select('count(1) as orderCount,sid,serviceId', false)
                    ->where("`type` = '1' and `payStatus` = '2' and `orderStatus` = '5'")
                    ->get('order');
            $orders_info = $query_orders->result_array();
            $i = 0;
            foreach ($stores as $key => $value) {
                $new_promo_stores[$i] = $value;
                foreach ($promo_stores as $k => $v) {
                    $v['orderCount'] = '0';
                    foreach ($orders_info as $km => $vm) {
                        if ($vm['sid'] == $value['id'] && $v['service_id'] == $vm['serviceId']) {
                            $v['orderCount'] = $vm['orderCount'];
                        }
                    }
                    if ($value['id'] == $v['store_id']) {
                        $new_promo_stores[$i]['promo_services'][] = $v;
                    }
                }
                $i++;
            }

        }else{
            $new_promo_stores = array();
        }

        //var_dump($new_promo_stores);exit;
        //组织结束
        $this->twig->render('home/store/promo_store.twig', array(
            'stores' => $new_promo_stores,
            'areas' => $sub_areas,
            'pos_address' => $position['pos_address'],
            'search_area' =>$search_area,
            'sortType' => isset($search_sortType[$type])?$search_sortType[$type]:"",
        ));
    }

    /**
     * 门店详情
     */
    public function storeDetail() {
        $store_id = $this->input->get('id');
        if (!empty($store_id)) {
            $where['id'] = $store_id;
            $where['status'] = 1;
            $query_store = $this->db
                            ->where($where)->get('store');
            $store = $query_store->row_array();
            if ($store) {
                //查询所有服务项目 组装门店服务字符串
                $this->load->model('Service_model', 'service_model');
                $services = $this->service_model->fetchServicesByStoreid($store['id'], false, true);
                $store['services'] = $services;
                //查询门店是否有促销
                $time = date("Y-m-d H:i:s");
                $query_promos = $this->db
                                ->select('store_promo.*,store_service.name')
                                ->where("`store_promo.status` = '1' and store_promo.`sid` = '$store_id'  and store_promo.`begintime` < '$time' and store_promo.`endtime` > '$time' ")
                                ->join('store_service','store_service.id = store_promo.serviceId')
                                ->get('store_promo');
                $promos = $query_promos->result_array();
                //查询门店评论
                $this->load->model('Comment_model', 'comment_model');
                $comments_info = $this->comment_model->fetchCommentInfo(1, $store_id);
                $where = "`sid` = '$store_id' and comment.type = '1'";
                $comments = $this->comment_model->fetchComments($where,'ctime','desc',2);

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

        //var_dump($comments);exit;
        $this->twig->render('home/store/store_detail.twig', array(
            'store' => $store,
            'promos' => $promos,
            'comments' => $comments,
            'comments_info' => $comments_info,
            'user' => $login_user,
            'collect' => $collect,
            'is_login' => $is_login
        ));
    }

    /**
     * 预定订单页
     */
    public function storeOrder() {
        $store_id = $this->input->get('id');
        $service_id = $this->input->get('service_id');
        $isVisit = $this->input->get('isVisit'); //店铺优惠活动id
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
                $services = $this->service_model->fetchServicesByStoreid($store_id);
                //获取店铺的优惠活动
                $time = date('Y-m-d H:i:s');
                $query_promo_stores = $this->db
                                           ->where("store_promo.`status` = '1' and store_promo.`begintime` < '$time' and store_promo.`endtime` > '$time' and store_promo.sid='$store_id'")
                                           ->get('store_promo');
                $promo_stores = $query_promo_stores->result_array();
                //var_dump($promo_stores);
                //组装店铺的服务的优惠价格
              
                $new_promo_services = array();
                foreach ($services as $key => $value) {
                    $new_promo_services[$key] = $value;
                    $new_promo_services[$key]['isVisitPromoPrice']='';
                    $new_promo_services[$key]['PromoPrice'] = "";
                    foreach ($promo_stores as $k => $v) {
                        if ($value['id'] == $v['serviceId']) {
                            if($v['isVisit'] == '1'){
                                $new_promo_services[$key]['isVisitPromoPrice'] = $v['price'];
                            }else{
                                $new_promo_services[$key]['PromoPrice'] = $v['price'];
                            }    
                        }
                    }
                }
             
                $home_services = $this->service_model->fetchServicesByStoreid($store_id, true);
                
                $this->load->model('User_model', 'user_model');
                $areaData = $this->user_model->getServiceArea($store_id);
                $area_str = "";
                if($areaData){
                     foreach ($areaData as $value) {
                           foreach ($value as $key => $v) {
                               if($v){
                                    $area_str .= $key.':'.implode(',', $v).'&nbsp;&nbsp;';
                               }else{
                                     $area_str .= $key.'&nbsp;&nbsp;';
                               }
                               
                           }
                     }

                }
                
            } else {
                show_404();
            }
        } else {
            show_404();
        }
        //var_dump($new_promo_services);exit;
        $this->twig->render('home/store/store_order.twig', array(
            'store' => $store,
            'services' => $new_promo_services,
            'service_area' => $area_str,
            'service_id' => $service_id,
            'isVisit' => $isVisit,
            'homeservices' => $home_services
        ));
    }

    /**
     * 评论
     * @return type
     */
    public function comment() {
        $storeId = $this->input->get('sid');
        if (empty($storeId)) {
            show_error('参数错误');
        }
        if ($this->input->isPost()) {
            $user = $this->checkLogin(true);
            $userId = $user['id'];
            $score = $this->input->post('score');
            $desc = $this->input->post('content');
            //开启事务
            $this->db->trans_start();
            //添加一条评论
            $this->db->insert('comment', array(
                'uid' => $userId,
                'sid' => $storeId,
                'type' => 1,
                'score' => $score,
                'desc' => $desc,
                'ctime' => date('Y-m-d H:i:s')
            ));
            $query_comments_info = $this->db->select("count(*) as totalnum,format(avg(score),1) as avgscore", false)
                    ->where("`sid` = '$storeId'")
                    ->get('comment');
            $comments_info = $query_comments_info->row_array();
            $commentNums = $comments_info['totalnum'];
            $avgscore = $comments_info['avgscore'];
            $this->db->where("id = '$storeId'")->update('store', array(
                'score' => $avgscore,
                'commentNums' => $commentNums,
                'utime' => date('Y-m-d H:i:s')
            ));
            $this->db->trans_complete();
            $this->load->helper('url');
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '评论成功!';
                $response['url'] = base_url('home/store/storeDetail/id/' . $storeId);
            } else {
                $response['status'] = false;
                $response['msg'] = '服务器错误!';
                $response['url'] = base_url('home/store/storeDetail/id/' . $storeId);
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_comment_desc = $this->db->get('comment_desc');
        $comment_desc = $query_comment_desc->result_array();
        $this->twig->render('home/store/comment.twig', array(
            'comment_desc' => $comment_desc,
            'sid' => $storeId
        ));
    }

    public function viewComment() {
        $id = $this->input->get('id'); //店铺id
        $type = $this->input->get('type');
        $where = "`sid` = '$id' and comment.type = '$type'";
        $score = $this->input->get('score');
        if($score){
            switch (intval($score)) {
                case 5:
                    $where .= "and comment.score >8 and comment.score <=10";
                    break;
                case 4:
                    $where .= "and comment.score >6 and comment.score <=8";
                    break;
                case 3:
                    $where .= "and comment.score >4 and comment.score <=6";
                    break;
                case 2:
                    $where .= "and comment.score >4 and comment.score <=2";
                    break;
                case 1:
                    $where .= "and comment.score >0 and comment.score < 2";
                    break;
                default:
                    break;
            }
        }
        $sort = $this->input->get('sort') ? $this->input->get('sort'):'desc';
        if($sort=='desc'){
            $order = 'ctime';
            $sort = 'desc';
        }else{
            $order = 'ctime';
            $sort = 'asc';
        }
        $scoreArr = array('全部星级','一星级点评','二星级点评','三级星级点评','四星级点评','五星级点评');
        //var_dump($where);exit;
        $this->load->model('Comment_model', 'comment_model');
        $comments = $this->comment_model->fetchComments($where,$order,$sort);
        $this->twig->render('home/store/view_comment.twig', array(
            'comments' => $comments,
            'score' =>$score,
            'sort' => $sort,
            'scortStr' => $scoreArr[$score],
            'sid'=>$id
        ));
        
    }

    public function storeMap() {

        $this->twig->render('home/store/store_map.twig', array(
        ));
    }

    /**
     * 预约到店服务
     */
    public function onlineOrder() {
        $user = $this->checkLogin();
        $get = $this->input->gets();
        $store_id = $get['store_id'];
        $sid = $get['sid'];
        $isVisit = $get['visit'];
        $token = md5(time() . createRandomCode(4));  //表单令牌 防止重复提交
        $this->session->set_userdata(array('token' => $token));

        $query_store = $this->db->where('id', $store_id)->get('store');
        $store = $query_store->row_array();

        $query_store_detail = $this->db->where('sid', $store_id)->get('store_detail');
        $store_detail = $query_store_detail->row_array();
        $orderTime = unserialize($store_detail['orderTime']);

        $query_service = $this->db->where('id', $sid)->get('store_service');
        $service = $query_service->row_array();
        //查找当前服务是否有优惠价
        $where = array(
            'serviceId'=>$sid,
            'sid'=>$store_id,
            'isVisit'=>$isVisit,
            'status'=>'1',
            'begintime <' => date('Y-m-d H:i:s'),
            'endtime >' => date('Y-m-d H:i:s'),
            );

        $query = $this->db->where($where)->get('store_promo');
        $promo = $query->row_array();
        if($promo){
            $service['price'] = $promo['price'];
        }
        $this->twig->render('home/store/online_order.twig', array(
            'service' => $service,
            'store' => $store,
            'token' => $token,
            'isVisit' => $isVisit,
            'orderTime' => $orderTime
        ));
    }

}
