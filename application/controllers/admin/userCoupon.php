<?php 

/*
 * Encoding     :   UTF-8
 * Created on   :   2015-10-22 15:32:03 by chenban   
 * 后台用户优惠劵管理   
 */
header('content-type:text/html;charset=utf-8');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usercoupon extends CI_Controller{
    private $row;
    public function __construct()
    {
        parent::__construct();
        $this->row = 20;
    }

    public function index(){
        $this->twig->render('admin/userCoupon/index.twig');
        
    }
    
   public function getUserCoupon(){
        $curPage = $this->input->post('page');
        $pageSize = $this->input->post('rows');
        $sort = $this->input->post('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = $this->input->post('order');
        $order = empty($order) ? 'desc' : $order;
        $name = $this->input->post('name');
        $where = '';
        /*if (!empty($name)) {
          $where = "`coupon`.`name` like '$name%'";
        }*/
        $this->load->model('Usercoupon_model', 'usercoupon_model');
        $rows = $this->usercoupon_model->getJsonRows('user_coupon', $curPage, $pageSize, $sort, $order, $where);
        $this->output->set_content_type('application/json')
                    ->set_output(json_encode($rows));   

   }

    //修改启动状态
    public function on_off_usercoupon($id, $flag){
        $this->load->model('Usercoupon_model', 'usercoupon_model');

        $query = $this->usercoupon_model->on_off_usercoupon($id, $flag);
        if($query){
            echo "<script >alert('提交成功');location.href='/admin/userCoupon/index';</script>"; 
        }else{
            echo "<script >alert('系统繁忙，请稍候再试！');location.href='/admin/userCoupon/index';</script>"; 
        }
    }


    public function add()
    {
        if($this->input->post())
        {
            if($this->input->post('phone') == "")
            {
                $response['status'] = 0;
                $response['msg'] = '请填写用户手机号！';
                $response['url'] = '/admin/userCoupon/add';
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;
            }

            if($this->input->post('phone') == "0"){

                $cid = $this->input->post('cid');
                $query = $this->db->query("select * from coupon where id = $cid ");
                if($result = $query->row_array()){ 
                    $beginTime2 = $result['beginTime'];
                    $endTime2 = $result['endTime'];
                }

                $beginTime = $this->input->post('beginTime') == "" ? date('Y-m-d H:i:s', time())  : $this->input->post('beginTime');
                $endTime = $this->input->post('endTime')  == "" ? $endTime2 : $this->input->post('endTime');
                $twice = $this->input->post('twice') == "0" ? '1' : $this->input->post('twice');
                $time = time();
                $query2 = $this->db->query("select * from member");
                $msgdata = array();
                foreach ($query2->result() as $k=>$item){
                   $code = $time.$item->id;
                   $userCoupon = array('uid' => intval($item->id,10), 'cid' => intval($cid ,10) , 'code' => $code,  'ctime' =>date("Y-m-d H:i:s"), 'beginTime' => $beginTime, 'endTime' => $endTime , 'flag' => '1');
                   $query3 = $this->db->insert('user_coupon', $userCoupon);
                   $msgdata[$k] = array('uid'=>intval($item->id,10),'title'=>'恭喜你','content'=>'您获得了一张优惠劵','ctime'=>date('Y-m-d H:i:s'));
                   if(!$query3){
                       $response['status'] = 0;
                       $response['msg'] = '发放优惠劵失败！';
                       $response['url'] = '/admin/userCoupon/add';
                     
                   }
                }

                $response['status'] = 1;
                $response['msg'] = '发放优惠成功！';
                $response['url'] = '/admin/userCoupon/index';       
                $this->db->insert_batch('msg', $msgdata);


    
            }else{
                $cid = $this->input->post('cid');
                $phone = $this->input->post('phone');
                $query_member = $this->db->where(array('tel'=>$phone))->get('member');
                $member_data = $query_member->row_array();
                if(!$member_data){
                    $response['status'] = 0;
                    $response['msg'] = '请填写正确的用户手机号！';
                    $response['url'] = '/admin/userCoupon/add';
                    $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
                    return;
                }
                $uid = $member_data['id'];
                $query = $this->db->query("select * from coupon where id = $cid ");
                if($result = $query->row_array()){ 
                    $beginTime2 = $result['beginTime'];
                    $endTime2 = $result['endTime'];
                }
                
                $beginTime = $this->input->post('beginTime') == "" ? date('Y-m-d H:i:s', time())  : $this->input->post('beginTime');
                $endTime = $this->input->post('endTime')  == "" ? $endTime2 : $this->input->post('endTime');
                $time = time();
                $code = $time.$cid;
                $userCoupon = array('uid' => intval($uid,10), 'cid' => intval($cid ,10) , 'code' => $code, 'ctime' =>date("Y-m-d H:i:s"), 'beginTime' => $beginTime, 'endTime' => $endTime , 'flag' => '1');

                $query3 = $this->db->insert('user_coupon', $userCoupon);
                if($query3){
                       $msg = array('uid' => intval($uid,10),'title' =>'恭喜你','content' =>'您获得了一张优惠劵','ctime'=>date('Y-m-d H:i:s'));
                       $this->db->insert('msg',$msg);
                       $response['status'] = 1;
                       $response['msg'] = '发放优惠成功！';
                       $response['url'] = '/admin/userCoupon/index';
                      
                }else{
                       $response['status'] = 0;
                       $response['msg'] = '发放优惠劵失败！';
                       $response['url'] = '/admin/userCoupon/add';
                     
                }
                
            }

            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;

            
        }

        $query2 = $this->db->query("select * from coupon where flag='1'");
        $coupon= $query2 -> result();

        $this->twig->render('/admin/usercoupon/add.twig', array('coupons'=>$coupon));
    }
}
  
/* End of file userCoupon.php */
/* Location: ./application/controllers/admin/userCoupon.php */