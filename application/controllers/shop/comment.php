<?php
/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-21 10:30:46 by chenban 
 * 店铺版后台评论管理
 */
class Comment extends Shop_Controller{
    protected $user;
    public function __construct() {
        parent::__construct();
        $user=$this->checkLogin();
        $this->user=$user;
        $this->load->model('Comment_model', 'comment_model');
    }
    
    public function index(){
        $user = $this->checkLogin();
        $type = $this->input->get('type');
        //type='pay' 为评价管理
        $this->twig->render('shop/comment/index.twig',array(
          'user'=>$user,
          'type'=>$type,
          'realTimeInfo'=>$this->getRealtimeInfo()
         ));
    }
    
    //获取评论数据
    public function getComment(){
        $type = $this->input->get('type'); 
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        //评价管理
        if($type=='pay'){
            $where = "comment.sid = '$store_id'  and comment.type = '1'  and comment.oid>'0'";
            $datas = $this->comment_model->getJsonData('comment',$posts['page'], $posts['rows'], 'ctime', 'desc', $where,'pay');
            
        }else{
        //点评 
            $where = "comment.sid = '$store_id'  and comment.type = '1'  and comment.oid='0'";
            $datas = $this->comment_model->getJsonData('comment',$posts['page'], $posts['rows'], 'ctime', 'desc', $where);
        }
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($datas));
    }
    
    //删除评论
    public function del(){
    		$id = intval($this->input->get('id'));
    		$type = $this->input->get('type');
            //删除评论信息
    		if($type == 'reply'){
    			$re = $this->db->query("delete FROM comment where id=$id");
    		}
    		else{
                //删除回复和评论信息
    			$re = $this->db->query("delete FROM comment where id=$id");
    			$re = $this->db->query("delete FROM reply where cid=$id");
    		}
    		exit('{"code":"ok"}');
    }
  
    //新增或修改
    public function edit(){
        $user=$this->user;
        $sid=$user['id'];
        $type=$this->input->get('type');
        if($type=='update'){

            $rid = intval($this->input->post('id'));
            $content = $this->input->post('content');
            $this->db->update('reply', array('content'=>$content, 'cTime'=>date("Y-m-d H:i:s")), array('cid'=>$rid));
            exit('{"code":"ok"}'); 
        }

        $cid = intval($this->input->post('id'));
        $content = $this->input->post('content');
        $this->db->insert('reply', array('cid'=>$cid,'sid'=>$sid, 'content'=>$content, 'cTime'=>date("Y-m-d H:i:s")));
        $id = $this->db->insert_id();
        exit('{"code":"ok", "id":"'.$id.'"}');
    }
    
    
   
}