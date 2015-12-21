<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-09-23 chenban 
 */
class User extends Shop_Controller {

    private $row;
    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
        $this->row = 3;
        $this->load->model('User_model', 'user_model');
    }

    public function message() {
        $user = $this->user;
        $sid = $user['id'];
        //获取总记录数
        $query = $this->db->select('count(*) as num')->where(array('sid' => $sid))->get('store_msg');
        $total_rows = $query->row();
        $row = $total_rows->num;
        //分页
        $this->load->library('Page', array('total' => $row, 'pageSize' => $this->row));
        $this->page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => 'GO');
        $this->page->pageType = '<li><span class="pageher">第%page%页/共%pageToatl%页</span></li>%first%%up%%F%%omitFA%%numberF%%omitEA%%E%%down%%ending%';

        //取出信息
        $offset = $this->page->pageStart;
        $row = $this->page->pageSize;
        $query = $this->db->query("select * from store_msg where sid='$sid' order by ctime desc limit $offset,$row");
        $msg_data = $query->result();

        $pageShow = $this->page->pageShow();
        //var_dump($pageShow);exit;
        $this->twig->render('shop/user/message.twig', array(
            'msgs' => $msg_data,
            'pageShow' => $pageShow,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    //标记为已读
    public function setRead() {

        $id = $this->input->post('id');

        $query = $this->db->where(array('id' => $id))->update('store_msg', array('isRead' => 1));
        if ($query) {
            $data['status'] = '1';
            $data['mag'] = '修改成功';
        } else {
            $data['status'] = '0';
            $data['mag'] = '标记失败,请重新标记';
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    //服务项目管理、
    public function service() {
        //获取所有服务
        $this->twig->render('shop/user/service.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    //获取店铺服务项数据
    public function getData() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $keyword = isset($posts['keyword'])? $posts['keyword'] : '';
        $where = "store_service.storeId = '$store_id'"; //条件查询 本店和店铺类型
        if($keyword){
            $where .= "and store_service.name like '%$keyword%'";
        }

        $datas = $this->user_model
                ->getJsonData('store_service', $posts['page'], $posts['rows'], 'store_service.ctime', 'desc', $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }


    public function serviceAdd(){
        $user = $this->user;
        $store_id = $user['id'];
        if($this->input->isPost()){
            $posts = $this->input->post();
             $data = array(
                'name' => $posts['name'],
                //'mprice' => $posts['price'],
                'price' => $posts['price'],
                'ctime' => date('Y-m-d H:i:s'),
                'utime' => date('Y-m-d H:i:s'),
                'efficacy' => $posts['efficacy'],
                'taboo' => $posts['taboo'],
                'stime' => $posts['stime'],
                'cover' => $posts['cover'],
                'isVisit' => $posts['isVisit'],
                'status' => $posts['status'],
                'storeId' =>  $store_id,
            );
            $query_ck = $this->db->where(array('name' => $posts['name'],"storeId" =>$store_id))->get('store_service');
            $ck_node = $query_ck->row_array();
            //检测是否已被存在
            if (is_array($ck_node) && count($ck_node) > 0) {
                $response['status'] = true;
                $response['msg'] = '该项目名已经存在！';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($response));
                return;
            }
            $ck_ins = $this->db->insert('store_service', $data);
            $response['status'] = $ck_ins;
            if ($ck_ins) {
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
        $this->twig->render("shop/user/serviceAdd.twig",array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function serviceEdit(){
        if($this->input->isPost()){
             $posts = $this->input->post();
             //var_dump($posts);exit;
             $data = array(
                'cover' => $posts['cover'],
                'name' => $posts['name'],
                //'mprice' => $posts['price'],
                'price' => $posts['price'],
                'utime' => date('Y-m-d H:i:s'),
                'efficacy' => $posts['efficacy'],
                'taboo' => $posts['taboo'],
                'stime' => $posts['stime'],
                'isVisit' => $posts['isVisit'],
                'status' => $posts['status'],
            );
            
            $id = $posts['id'];
            $store_ins = $this->db->where(array('id'=>$id))->update('store_service', $data);
            if ($store_ins) {
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
        $id = $this->input->get('id');
        $query = $this->db->where(array('id'=>$id))->get('store_service');
        $service = $query->row_array();
        $this->twig->render('shop/user/serviceEdit.twig',array(
            'service' => $service,
            'realTimeInfo' => $this->getRealtimeInfo(),
        ));

    }

    public function servicerDel(){
        $id = $this->input->post('id');
        $query = $this->db->delete('store_service', array('id' => $id));
        if ($query) {
            $data['status'] = true;
            $data['msg'] = '删除成功';
        } else {
            $data['status'] = false;
            $data['msg'] = '删除失败，请联系管理员';
        }

        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    
    }
    
    public function doUpload(){
        $config['upload_path'] = './uploads/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = date('Ymdhis') . createRandomCode(2);
        $this->lang->load('upload', 'chinese'); //加载语言类
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            $response['status'] = false;
            $response['msg'] = strip_tags($error);
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $response['status'] = true;
            $response['msg'] = '上传成功！';
            $response['url'] = '/uploads/admin/' . $filename;
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }


    //店铺服务范围列表
    public function serviceArea() {
        $user = $this->user;
        $sid = $user['id'];

        $areaData = $this->user_model->getServiceArea($sid);

        //var_dump($areaData);exit;
        $this->twig->render('shop/user/serviceArea.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'areaData' => $areaData,
        ));
    }

    //添加、修改或删除当前店铺的服务区域
    public function editArea() {
        //获取店铺的地理地理位置
        $user = $this->user;
        $sid = $user['id'];
        $area = $this->input->get('area'); //修改时传过来的区域值，
        $type = $this->input->get('type');
        //删除
        if ($type == 'del') {
            $query = $this->db->select('pid,id')->where(array('name' => $area))->get('area'); //区域id
            $query_data = $query->row_array();
            $regionId = $query_data['id'];
            //获取当前店铺服务商圈
            $query = $this->db->select('ServiceArea')->where(array('sid' => $sid))->get('store_detail');
            $re = $query->row();
            $serviceArea = $re->ServiceArea;
            if ($serviceArea) {
                $serviceArea = unserialize($serviceArea);
                foreach ($serviceArea as $key => $value) {
                    foreach ($value as $k1 => $v1) {
                        if ($regionId == $k1) {
                            unset($serviceArea[$key][$k1]);
                        }
                    }
                }
                $serviceArea = array('serviceArea' => serialize($serviceArea));
                $query = $this->db->where(array('sid' => $sid))->update('store_detail', $serviceArea);
                if ($query) {
                    die("<script >location.href='/shop/user/serviceArea';</script>");
                }
            } else {
                die("<script type='text/javascript'> alert('删除失败，请重试！');history.go(-1);</script>");
            }
        }

        //添加或修改
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $cityId = $posts['cityId'];
            $areaId = $posts['areaId'];
            //获取当前店铺服务商圈
            $query = $this->db->select('ServiceArea')->where(array('sid' => $sid))->get('store_detail');
            $re = $query->row();
            $serviceArea = $re->ServiceArea;
            $regionId = isset( $posts['ids'])? $posts['ids']:'';
            if ($serviceArea) {
                $serviceArea = unserialize($serviceArea);
                foreach ($serviceArea as $key => $value) {
                    if ($key == $cityId) {
                        foreach ($value as $k1 => $v1) {
                            if ($areaId == $k1) {
                                $serviceArea[$key][$k1] = $regionId;
                                break 2;
                            } else {
                                $serviceArea[$key][$areaId] = $regionId;
                                //var_dump($serviceArea);exit;
                                break 2;
                            }
                        }
                    } else {
                        //城市不同时，直接在当前数组的后面添加
                        $serviceArea[$cityId] = array($areaId => $regionId);
                    }
                }
            } else {
                //当前店铺不存在服务商圈
                $serviceArea = array($cityId => array($areaId => $regionId));
            }
            $serviceArea = array('serviceArea' => serialize($serviceArea));
            $query = $this->db->where(array('sid' => $sid))->update('store_detail', $serviceArea);
            if ($query) {
                $data['status'] = '1';
                $data['msg'] = '修改成功';
            } else {
                $data['status'] = '0';
                $data['msg'] = '修改失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($data));
            return;
        }

        if ($area) {
            //默认省份。城市和当前区域为当前所修改的值
            $storeInfo = $this->user_model->getAreaInfo($area);
        } else {
            $storeInfo = $this->user_model->getStoreInfo($sid);
        }

        //var_dump($storeInfo);exit;
        $this->twig->render('shop/user/addArea.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'storeInfo' => $storeInfo,
            'type' => $type
        ));
    }

    //三级联动获取地区数据
    public function get_area_json() {
        $request = $this->input->posts();
        $type_config = array(
            'province' => 2,
            'city' => 3,
            'district' => 4
        );
        $type = $request['area'];
        $type = $type_config[$type];
        $pid = $request['pid'];
        $region_type = $type;
        $area_rows = array();
        $area_query = $this->db->where("`type` = '$region_type' and `pid` = '$pid' and `status` = '1'")
                ->get('area');
        $area_rows = $area_query->result_array();
        $data = json_encode($area_rows);
        echo $data;
    }

    //获取区域下的所有服务商圈
    public function getAllArea() {
        $user = $this->user;
        $sid = $user['id'];
        $regionId = $this->input->post('regionId');
        $type = $this->input->get('type');

        //获取当前区域下的所有服务商圈
        $query = $this->db->select('id,name')->where(array('pid' => $regionId))->get('area');
        $data = $query->result_array();

        //修改服务商圈，则通过数据库获取当前区域下已经选择的服务商圈
        if ($type) {
            //获取当前店铺服务商圈
            $query = $this->db->select('ServiceArea')->where(array('sid' => $sid))->get('store_detail');
            $re = $query->row();
            $serviceArea = $re->ServiceArea;
            $chooseArea ="";
            if ($serviceArea) {
                $serviceArea = unserialize($serviceArea);
                //获取当前店铺在当前区域下所选服务商圈
                foreach ($serviceArea as $key => $value) {
                    foreach ($value as $k1 => $v1) {
                        if ($k1 == $regionId) {
                            $chooseArea = $v1;
                        }
                    }
                }
                if(is_array($chooseArea)){
                    //给所选商圈添加一个标记
                    foreach ($chooseArea as $key => $value) {
                        foreach ($data as $k => $v) {
                            if ($v['id'] == $value) {
                                $data[$k]['type'] = '1';
                            }
                        }
                    }
                }
            }
        }
      
        array_unshift($data, array('id' => 0, 'name' => '全部'));
   
        //var_dump($data);exit;
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

  

}
