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
        $re = $this->db->query("select concat(id,':',name) as serviceStr from service");
        $service = $re->result_array();

        $serviceStr = '';
        foreach ($service as $key => $value) {
            $serviceStr.=$value['serviceStr'] . ';';
        }

        $serviceStr = rtrim($serviceStr, ';');
        $this->twig->render('shop/user/service.twig', array(
            'serviceStr' => $serviceStr,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    //获取店铺服务项数据
    public function getData() {

        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = "store_service.storeId = '$store_id'"; //条件查询 本店和店铺类型

        $datas = $this->user_model
                ->getJsonData('store_service', $posts['page'], $posts['rows'], 'store_service.ctime', 'desc', $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    //修改服务项设置，添加，或删除
    public function editService() {
        $user = $this->user;
        $sid = $user['id'];

        $posts = $this->input->posts();
        $oper = $posts['oper'];
        if ($oper == 'add') {
            $serviceId = $posts['service'];
            $isVisit = $posts['isVisit'];
            //判断当前店铺是否存在相同的类型的服务项
            $where = array('storeId' => $sid, 'serviceId' => $serviceId);
            $query = $this->db->where($where)->get('store_service');
            if ($query->result()) {
                $data['success'] = false;
                $data['message'] = '已存在相同类型的服务项';
                $this->output->set_content_type('application/json')
                        ->set_output(json_encode($data));
                return;
            }
            $insert_data['storeId'] = $sid;
            $insert_data['serviceId'] = $serviceId;
            $insert_data['isVisit'] = $isVisit;
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $query = $this->db->insert('store_service', $insert_data);
            if ($query) {
                $data['success'] = true;
                $data['message'] = '新增服务项成功';
            } else {
                $data['success'] = false;
                $data['message'] = '新增失败，请联系管理员';
            }
        } else {
            $id = $posts['id'];
            $query = $this->db->delete('store_service', array('id' => $id));
            if ($query) {
                $data['success'] = true;
                $data['message'] = '删除成功';
            } else {
                $data['success'] = false;
                $data['message'] = '删除失败，请联系管理员';
            }
        }

        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    //修改服务类型
    public function changeVisitStatus() {
        $id = $this->input->post('id');
        $query = $this->db->select('isVisit')->where(array('id' => $id))->get('store_service');
        $re = $query->row();
        $isVisit = $re->isVisit;

        if ($isVisit == '1') {
            //本来是上门，则是取消上门
            $query = $this->db->update('store_service', array('isVisit' => '0'), array('id' => $id));
            if ($query) {
                exit('{"code":"ok","isVisit":"0"}');
            }
        } else {
            $query = $this->db->update('store_service', array('isVisit' => '1'), array('id' => $id));
            if ($query) {
                exit('{"code":"ok","isVisit":"1"}');
            }
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
            $regionId = $posts['regionId'];
            //获取当前店铺服务商圈
            $query = $this->db->select('ServiceArea')->where(array('sid' => $sid))->get('store_detail');
            $re = $query->row();
            $serviceArea = $re->ServiceArea;

            if ($serviceArea) {
                $serviceArea = unserialize($serviceArea);
                foreach ($serviceArea as $key => $value) {
                    if ($key == $cityId) {
                        foreach ($value as $k1 => $v1) {
                            if ($regionId == $k1) {
                                $serviceArea[$key][$k1] = $posts['ids'];
                                break 2;
                            } else {
                                $serviceArea[$key][$regionId] = $posts['ids'];
                                //var_dump($serviceArea);exit;
                                break 2;
                            }
                        }
                    } else {
                        //城市不同时，直接在当前数组的后面添加
                        $serviceArea[$cityId] = array($regionId => $posts['ids']);
                    }
                }
            } else {
                //当前店铺不存在服务商圈
                $serviceArea = array($cityId => array($regionId => $posts['ids']));
            }

            //var_dump( $serviceArea);exit;
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
        if ($data) {
            array_unshift($data, array('id' => 0, 'name' => '全部'));
        }
        //var_dump($data);exit;
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

  

}
