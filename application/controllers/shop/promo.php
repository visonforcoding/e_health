<?php
/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-22 11:07:12 by chenban 
 * 店铺后台优惠管理
 */

class Promo extends Shop_Controller{
    protected $user;
    public function __construct(){
      
        parent::__construct();
        $user=$this->checkLogin();
        $this->user=$user;
        $this->load->model('Promo_model', 'promo_model');
        $this->load->model('Service_model', 'service_model');
    }

    public function index(){

         $this->twig->render('shop/promo/index.twig',array(
             'realTimeInfo'=>  $this->getRealtimeInfo()
                 ));
    }

    public function getPromoData(){
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = "store_promo.sid = '$store_id'"; //条件查询 本店和店铺类型
        $keyword = isset($posts['keyword'])?$posts['keyword']:'';
        if($keyword){
             $where .= " and store_promo.title like '%$keyword%'";
        }
        $datas = $this->promo_model
                -> getJsonData('store_promo', $posts['page'], $posts['rows'],'store_promo.'.$posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }


    public function promoAdd(){
       $user = $this->user;
       $store_id = $user['id'];
       if($this->input->isPost()){
           $posts = $this->input->posts();
           $mprice = $posts['mprice'];
           $price = $posts['price'];
           if($price > $mprice){
                    $data['status'] = false;
                    $data['msg'] = '优惠价格不能高于售价';
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode($data));
                    return ;
          }

          //一个服务项不能设置多个优惠
          $serviceId = $posts['service'];
          $where = array(
            'serviceId'=>$serviceId,
            'sid'=>$store_id,
            'isVisit'=>$posts['isVisit'],
            'status'=>'1',
            'begintime <' => date('Y-m-d H:i:s'),
            'endtime >' => date('Y-m-d H:i:s'),
          );
         //var_dump($where);exit;
          $query = $this->db->where($where)->get('store_promo');
          $promo = $query->row_array();
          if($promo){
              $data['status'] = false;
              $data['msg'] = '不能设置同一类型优惠';
              $this->output->set_content_type('application/json')
                  ->set_output(json_encode($data));
              return ;
          }

          $query = $this->db->where(array('id'=>$serviceId))->get('store_service');
          $store_service = $query->row_array();
          if( $store_service['isVisit'] == '0' && $posts['isVisit'] == '1'){
              $data['status'] = false;
              $data['msg'] = '该服务项不提供上门,无法设置上门优惠';
              $this->output->set_content_type('application/json')
                  ->set_output(json_encode($data));
              return ;
          }

          $insert_data['title'] = $posts['title'];
          $insert_data['sid'] = $store_id;
          $insert_data['serviceId'] = $serviceId;
          $insert_data['mprice'] = $mprice;
          $insert_data['price'] = $price;
          $insert_data['begintime'] = $posts['begintime'];
          $insert_data['ctime'] = date('Y-m-d H:i:s');
          $insert_data['endtime'] = $posts['endtime'];
          $insert_data['status'] = $posts['status'];
          $insert_data['isVisit'] = $posts['isVisit'];

        $query = $this->db->where($where)->get('store_promo');
        $promo = $query->row_array();
        if($promo){
            $service['price'] = $promo['price'];
        }
          $query=$this->db->insert('store_promo', $insert_data); 
          if($query){
                $data['status']=true;
                $data['msg']='添加成功';
          }else{
                $data['status']=false;
                $data['msg']='添加失败，请联系管理员';
          }
          $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
          return ;

       }
       $service = $this->service_model->getStoreService( $store_id);
       $this->twig->render('shop/promo/promoAdd.twig',array(
             'service' => $service,
             'realTimeInfo'=>  $this->getRealtimeInfo()
       ));
    }

    public function getPrice(){
        $serviceId = $this->input->post('serviceId');
        $service = $this->service_model->getServiceById($serviceId);
        $price = $service['price'];
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($price));
        return ;
    }

    public function promoEdit(){
       $user = $this->user;
       $store_id = $user['id'];
      if($this->input->isPost()){
          $posts = $this->input->posts();
           $mprice = $posts['mprice'];
           $price = $posts['price'];
           if($price > $mprice){
                    $data['status']=false;
                    $data['msg']='优惠价格不能高于售价';
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode($data));
                    return ;
          }

          $update_data['title'] = $posts['title'];
          $update_data['sid'] = $store_id;
          $update_data['serviceId'] = $posts['service'];
          $update_data['mprice'] = $mprice;
          $update_data['price'] = $price;
          $update_data['ctime'] = date('Y-m-d H:i:s');
          $update_data['begintime'] = $posts['begintime'];
          $update_data['endtime'] = $posts['endtime'];
          $update_data['status'] = $posts['status'];
          $update_data['isVisit'] = $posts['isVisit'];

          $id = $posts['id'];
          $query=$this->db->update('store_promo', $update_data,array('id'=>$id)); 
          if($query){
                $data['status']=true; 
                $data['msg']='修改成功';
          }else{
                $data['status']=false;
                $data['msg']='修改失败，请联系管理员';
          }
          $this->output->set_content_type('application/json')
                        ->set_output(json_encode($data));
          return ;

      }

      $id = $this->input->get('id');
      $promo = $this->promo_model->getPromoById($id);
      $store_service = $this->service_model->getStoreService($store_id);
      $this->twig->render('shop/promo/promoEdit.twig',array(
           'promo' => $promo,
           'store_service' => $store_service,
           'realTimeInfo'=>  $this->getRealtimeInfo(),
     ));
    }
    public function promoDel(){
       $id = $this->input->post('id');
       $query = $this->db->delete('store_promo',array('id' => $id)); 

       if($query){
            $data['status']=true;
            $data['msg']='删除成功';
       }else{
            $data['status']=false;
            $data['msg']='删除失败，请联系管理员';
       }
       $this->output->set_content_type('application/json')
           ->set_output(json_encode($data));
       return ;
      
    }
  

}

/* End of file promo.php */
/* Location: ./application/controllers/shop/promo.php */