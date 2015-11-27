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
    }

    public function index(){
         //获取店铺下的所有服务
         $user = $this->user;
         $store_id = $user['id'];
         $re=$this->db->query("select concat(store_service.id,':',store_service.name) as serviceStr,concat(store_service.id,':',store_service.price) as price from store_service  where store_service.storeId='$store_id'");
         $service=$re->result_array();

         $serviceStr='';
         foreach ($service as $key => $value) {
             $serviceStr.=$value['serviceStr'].';';
          
         }
         
         $serviceStr=rtrim($serviceStr,';');

         $this->twig->render('shop/promo/index.twig',array(
             'serviceStr'=>$serviceStr,
             'realTimeInfo'=>  $this->getRealtimeInfo()
                 ));
    }

    public function getPromoData(){
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = "store_promo.sid = '$store_id'"; //条件查询 本店和店铺类型
        $datas = $this->promo_model
                -> getJsonData('store_promo', $posts['page'], $posts['rows'],'store_promo.'.$posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    //修改记录
    public function edit(){
        $posts = $this->input->posts();
        $oper = $posts['oper'];
        if(isset($posts['price'])){
                $prom_price = $posts['price']; //优惠价格
                $serviceId = $posts['service'];
                //获取当前服务的售价
                $re = $this->db->select('price')->where(array('id'=>$serviceId))->get('store_service');
                $re = $re->row_array();
                $price = $re['price'];
                if($prom_price > $price){
                    $data['success']=false;
                    $data['message']='优惠价格不能高于售价';
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode($data));
                    return ;
                }
        }
      
      
        //添加记录
        if($oper=='add'){
            $id=$posts['cid'];
            $re = $this->db->select('price')->where(array('id'=>$serviceId))->get('store_service');
            $re = $re->row_array();
            $posts['mprice']= $re['price'];
            unset($posts['cid']);
            unset($posts['service']);
            unset($posts['oper']);
            unset($posts['id']);
            //获取店铺id
            $user = $this->user;
            $store_id = $user['id'];
            $posts['sid']= $store_id;
            $posts['ctime']= date('Y-m-d H:i:s');
            $posts['serviceId']= $serviceId;
            $query=$this->db->insert('store_promo', $posts); 
            if($query){
                  $data['success']=true;
                  $data['message']='添加成功';
            }else{
                  $data['success']=false;
                  $data['message']='添加失败，请联系管理员';
            }

        }elseif($oper=='edit'){
            $id = $posts['cid'];
            $posts['serviceId'] = $serviceId;
            unset($posts['cid']);
            unset($posts['id']);
            unset($posts['service']);
            unset($posts['oper']);
            $query=$this->db->where('id',$id)->update('store_promo', $posts);
            if($query){
                  $data['success']=true;
                  $data['message']='修改成功';
            }else{
                  $data['success']=false;
                  $data['message']='修改失败，请联系管理员';
            }

        }else{
             $id=$posts['id'];
             $query=$this->db->delete('store_promo',array('id' => $id)); 
             if($query){
                  $data['success']=true;
                  $data['message']='删除成功';
            }else{
                  $data['success']=false;
                  $data['message']='删除失败，请联系管理员';
            }
        }

        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
      
    }

}

/* End of file promo.php */
/* Location: ./application/controllers/shop/promo.php */