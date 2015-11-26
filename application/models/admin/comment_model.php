<?php

class Comment_Model extends CI_Model
{
    private $name = '';
    private $phoneNo = '';
    private $coordinate = '';
    private $carId = '';
    private $logo = '';
    private $desc = '';


    public function __construct()
    {
        parent::__construct();
    }

    //查找全部评论
    public function get_all_comments()
    {
        $query = $this->db->get('comment');
        return $query;
    }

    //通过店铺查询评论
    public function get_comment_by_sid($sid)
    {
        if(!$sid){
            $query = $this->db->get('comment');
        }else{
            $query = $this->db->query("select * from comment where sid='" . $sid . "';");
        }

        return $query;
    }

    //通过评论id删除评论
    public function delete_comment_by_id($id)
    {
        $query = $this->db->query("DELETE FROM comment WHERE  id='" . $id . "';");
        return $query;
    }

    //通过用户id查询评论
    public function get_comment_by_uid($uid)
    {
        $query = $this->db->query("select * FROM comment WHERE  uid='$uid';");
        return $query;
    }

}
