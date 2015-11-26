<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-30 11:34:56 by caowenpeng , caowenpeng1990@126.com
 * 用户模型
 */
class Member_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }

    public function fetchAll() {
        return $this->db->get('member')->result_array();
    }

    /**
     * 是否添加浏览记录 和 查询是否已收藏
     * @param type $user 用户对象数组
     * @param type $store_id  对象id 技师 or 店铺
     * @param type $type 类型 1 店铺 2技师
     * @return array is_login 是否登录 true false ,collect 是否收藏 true false
     */
    public function getMemberStoreRelation($user, $store_id, $type = '1') {
        $user_id = $user['id'];
        if ($type == '1') {
            //添加浏览记录
            $ck_view_query = $this->db->where("`userId` = '$user_id' and `storeId` = '$store_id'")->get('view_log');
            $ck_view = $ck_view_query->row_array();
            if (!$ck_view) {
                $this->db->insert('view_log', ['storeId' => $store_id, 'userId' => $user_id, 'vtime' => date('Y-m-d H:i:s')]);
            } else {
                $this->db->where("`userId` = '$user_id' and `storeId` = '$store_id'")->update('view_log', ['vtime' => date('Y-m-d H:i:s')]);
            }
        }
        //查询收藏
        $is_login = true;
        $query_collect = $this->db->where("`oid` = '$store_id' and `type` = '$type'"
                        . "and `uid` = '$user_id' and `status` = '1'")->get('collect');
        $my_collect = $query_collect->row_array();
        $collect = $my_collect ? true : false;
        return array(
            'is_login' => $is_login,
            'collect' => $collect
        );
    }

}
