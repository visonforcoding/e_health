<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baby extends Home_Controller {

    public function index() {
        $login_user = $this->session->userdata('user');
        $position = $this->getLocation();
        $location = $position['location'];
        $query_area = $this->db->select('id,name')->where("`name` like '%$location%'")
                ->get('area');
        $location_area = $query_area->row_array();
        if ($location_area) {
            $location_id = $location_area['id']; //定位地点在数据库中的id
            $location_city = $location_area['name']; //定位地点在数据库中的id
        } else {
            $location_id = 77;
        }
        //焦点图
        $query_banners = $this->db
                ->where("`status` = '1'")
                ->order_by('utime desc,ctime desc')
                ->get('banner');
        $banners = $query_banners->result_array();

        $this->load->model('Service_model', 'service_model');
        $this->load->model('Store_model', 'store_model');

        //猜你喜欢
        $stores = $this->store_model->guessYouLike($login_user, $location_id);
        $stores = $this->service_model->formatStores($stores, true, $position['coordinate']);
        $this->twig->render('home/index.twig', array(
            'stores' => $stores,
            'banners' => $banners,
            'location' => $location
        ));
    }

}
