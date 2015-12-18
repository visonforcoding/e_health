<?php

class Comment_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 查阅评论
     * @param $where
     * @param $order
     * @param $where
     * @param $limit  
     * @return array
     */
    public function fetchComments($where,$order,$sort,$limit = null) {
        if (!empty($limit)) {
            $query_comments = $this->db->select('member.tel,member.avatar,comment.ctime,comment.desc,comment.score')
                    ->join('member', 'member.id = comment.uid')
                    ->where($where)
                    ->order_by($order, $sort)
                    ->limit($limit)
                    ->get('comment');
        } else {
            $query_comments = $this->db->select('member.tel,member.avatar,comment.ctime,comment.desc,comment.score')
                    ->join('member', 'member.id = comment.uid')
                    ->where($where)
                    ->order_by($order, $sort)
                    ->get('comment');
        }
        $comments = $query_comments->result_array();
        foreach ($comments as $key => $value) {
            $comments[$key]['tel'] = format_tel($value['tel']);
        }
        return $comments;
    }

    
    /**
     * 查询出评论信息
     * @param type $type
     * @param type $id
     */
    public function fetchCommentInfo($type,$id) {
        $query_comments_info = $this->db->select("count(*) as totalnum,format(avg(score),1) as avgscore", false)
                ->where("`sid` = '$id' and `type` = '$type'")
                ->get('comment');
        $comments_info = $query_comments_info->row_array();
        return $comments_info;
    }
    
    
    //获取评论数据
     public function getJsonData($tableName,$page, $rows, $sort = '', $order = '', $where = '',$type=''){
        $offset = ($page - 1) * $rows; //分页起始条数
        $nums = $this->db->where($where)->count_all_results($tableName); //总条数
        $selectStr="comment.*, member.tel AS phoneNo, member.nick AS uname , reply.id AS rid, reply.content AS rcontent";
        if (!empty($order)) {
           $res = $this->db->select($selectStr)
                         ->join('member','comment.uid = member.id','left')
                         ->join('reply','comment.id = reply.cid','left')
                         ->where($where)->limit($rows, $offset)->order_by($sort, $order)->get($tableName);
        } else {
            $res = $this->db
                        ->select($selectStr)
                        ->join('member','comment.uid = member.id','left')
                        ->join('reply','comment.id = reply.cid','left')
                        ->where($where)->limit($rows, $offset)->get($tableName);  
        }
        $res = $res->result_array();
        if (empty($res)) {
            $res = array();
        }
        if ($nums > 0) {
            $total_pages = ceil($nums / $rows);
        } else {
            $total_pages = 0;
        }
        $arr_json = array('total' => $nums, 'page' => $page, 'total'=>$total_pages,'records'=>$nums,'rows' => $res);
        return $arr_json;
     }
}
